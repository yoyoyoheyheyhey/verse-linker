function verselinkerAdminEscapeHtml(value) {
    return String(value == null ? '' : value).replace(/[&<>"']/g, function(character) {
        return {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        }[character];
    });
}

function verselinkerAdminGetLanguagesData() {
    if (window.verselinkerData && Array.isArray(verselinkerData.languages) && verselinkerData.languages.length) {
        return Promise.resolve({ languages: verselinkerData.languages });
    }

    return fetch(verselinkerData.json_url).then(function(response) {
        if (!response.ok) {
            throw new Error('HTTP ' + response.status);
        }

        return response.json();
    });
}

jQuery(document).ready(function($) {
    $('#verselinker_language').on('change', function() {
        const selectedLanguage = $(this).val();

        // Obtener el JSON local desde la URL proporcionada por WordPress
        verselinkerAdminGetLanguagesData().then(function(data) {
            if (!Array.isArray(data.languages)) {
                console.error('Estructura inválida en el archivo JSON.');
                return;
            }

            const idioma = data.languages.find(lang => lang.abreviacion === selectedLanguage);

            if (idioma) {
                let options = '';
                idioma.versiones.forEach(version => {
                    const abreviacion = verselinkerAdminEscapeHtml(version.abreviacion);
                    const nombreVersion = verselinkerAdminEscapeHtml(version.nombre_version);
                    options += `<option value="${abreviacion}">${nombreVersion} (${abreviacion})</option>`;
                });

                $('#verselinker_version').html(options);
            }
        }).catch(function(error) {
            console.error(error);
            console.error('Error al cargar el archivo JSON de idiomas.');
        });
    });
});

// Retrasar la ejecución hasta que todo esté cargado
window.addEventListener('load', function() {
    if (typeof VerseTagger !== 'undefined') {
        VerseTagger.tag({
            lang: 'en',
            version: 'KJV'
        });
    } else {
        console.warn('VerseTagger no está disponible. Verifique que el script se haya cargado correctamente.');
    }
});

// Refresco dinámico con JavaScript agrupar versiones en tb, at y nt
document.getElementById('verselinker_language').addEventListener('change', function() {
    const selectedLanguage = this.value;
    const versionDropdown = document.getElementById('verselinker_version');
    versionDropdown.innerHTML = '<option value="">Loading...</option>';

    // Usar primero los datos ya cargados por PHP; solo pedir el JSON si no vienen disponibles.
    verselinkerAdminGetLanguagesData()
        .then(data => {
            if (!Array.isArray(data.languages)) {
                console.error('Estructura inválida en el archivo JSON.');
                versionDropdown.innerHTML = '<option value="">Error loading versions</option>';
                return;
            }

            versionDropdown.innerHTML = ''; // Limpiar opciones
            const idioma = data.languages.find(lang => lang.abreviacion === selectedLanguage);

            if (idioma && idioma.versiones) {
                const categorias = {
                    tb: 'Complete Bibles',
                    at: 'Old Testament Only',
                    nt: 'New Testament Only'
                };

                Object.keys(categorias).forEach(categoria => {
                    const versiones = idioma.versiones.filter(version => version.categoria === categoria);

                    if (versiones.length > 0) {
                        const optgroup = document.createElement('optgroup');
                        optgroup.label = categorias[categoria];
                        versiones.forEach(version => {
                            const option = document.createElement('option');
                            option.value = String(version.abreviacion || '');
                            option.textContent = String(version.nombre_version || version.abreviacion || '');
                            optgroup.appendChild(option);
                        });
                        versionDropdown.appendChild(optgroup);
                    }
                });

                                // ===== NUEVO: preseleccionar la versión guardada =====
                if (window.verselinkerData && verselinkerData.selected) {
                    const savedLang = verselinkerData.selected.lang || '';
                    const savedVer  = verselinkerData.selected.ver  || '';

                    // Solo aplicamos la versión guardada si el idioma coincide
                    if (savedLang && savedVer && savedLang === selectedLanguage) {
                        // Intentamos asignar directamente el value
                        versionDropdown.value = savedVer;

                        // Y por si acaso, reforzamos el selected explícito
                        const opt = versionDropdown.querySelector('option[value="' + savedVer + '"]');
                        if (opt) {
                            opt.selected = true;
                        }
                    }
                }
                // ===== FIN BLOQUE NUEVO =====

            } else {
                versionDropdown.innerHTML = '<option value="">No versions available</option>';
            }
        })
        .catch(error => {
            console.error('Error fetching versions:', error);
            versionDropdown.innerHTML = '<option value="">Error loading versions</option>';
        });
});

// ===== NUEVO: inicializar el select de versiones al cargar la página =====
(function () {
    const langSelect = document.getElementById('verselinker_language');

    if (!langSelect || !window.verselinkerData || !verselinkerData.selected) {
        return;
    }

    const savedLang = verselinkerData.selected.lang || '';

    // Si tenemos un idioma guardado, nos aseguramos de que el <select> lo use
    if (savedLang) {
        langSelect.value = savedLang;
    }

    // Disparamos el evento change UNA sola vez para rellenar el select de versiones
    const evt = new Event('change', { bubbles: true });
    langSelect.dispatchEvent(evt);
})();
// ===== FIN BLOQUE NUEVO =====


(function(){
  'use strict';

  function $(sel){ return document.querySelector(sel); }
  function setText(el, s){ el.textContent = s == null ? '' : String(s); }
  // Sólo letras, números, guion y guion_bajo (defensa en profundidad para values)
  function sanitizeValue(v){ return String(v).replace(/[^\w-]/g, ''); }

  document.addEventListener('DOMContentLoaded', function(){
    var input   = $('#verselinker_language_search');
    var select  = $('#verselinker_language');
    var vSelect = $('#verselinker_version');
    var counter = $('#verselinker_language_counter');

    if(!select || !vSelect) return;

    var LANGS  = (window.verselinkerData && Array.isArray(verselinkerData.languages)) ? verselinkerData.languages : [];
    var LABELS = (window.verselinkerData && verselinkerData.labels) || {tb:'Complete Bibles',at:'Old Testament Only',nt:'New Testament Only',no_versions:'No versions found.'};

    var ALL = LANGS.map(function(l){
      return { value: String(l.abreviacion||'').trim(), label: String(l.nombre||'').trim() };
    });
    if (!ALL.length) {
      ALL = Array.prototype.map.call(select.options, function(op){
        return { value: op.value, label: op.text };
      });
    }

    function rebuildVersionSelectFor(langCode){
      while(vSelect.firstChild){ vSelect.removeChild(vSelect.firstChild); }

      var lang = LANGS.find(function(l){ return String(l.abreviacion) === String(langCode); });
      if(!lang || !Array.isArray(lang.versiones) || !lang.versiones.length){
        var no = document.createElement('option');
        no.value = '';
        setText(no, LABELS.no_versions || 'No versions found.');
        vSelect.appendChild(no);
        return;
      }

      var order = ['tb','at','nt'];
      var firstValue = null;

      order.forEach(function(cat){
        var list = lang.versiones.filter(function(v){ return v.categoria === cat; });
        if(!list.length) return;

        var og = document.createElement('optgroup');
        og.label = LABELS[cat] || cat.toUpperCase();

        list.forEach(function(v){
          var op = document.createElement('option');
          op.value = sanitizeValue(v.abreviacion);
          setText(op, v.nombre_version);
          if(firstValue === null) firstValue = op.value;
          og.appendChild(op);
        });

        vSelect.appendChild(og);
      });

      if (!vSelect.value && firstValue !== null){
        vSelect.value = firstValue; // evita guardar versión de otro idioma
      }
    }

    function render(list){
      var before = select.value;
      var hadCurrent = false;
      while(select.options.length){ select.remove(0); }

      list.forEach(function(it){
        var opt = document.createElement('option');
        opt.value = sanitizeValue(it.value);
        setText(opt, it.label);
        if (opt.value === before){ opt.selected = true; hadCurrent = true; }
        select.add(opt);
      });

      if (!hadCurrent && select.options.length){
        select.selectedIndex = 0;
      }

      var after = select.value;
      if (after !== before){
        rebuildVersionSelectFor(after);
      }

      if (counter){
        counter.textContent = list.length + ' ' + (list.length === 1 ? 'result' : 'results');
      }
    }

    function filter(q){
      q = String(q||'').toLowerCase().trim();
      if (!q){ render(ALL); return; }
      var parts = q.split(/\s+/);
      var out = ALL.filter(function(it){
        var hay = (it.label + ' ' + it.value).toLowerCase();
        return parts.every(function(p){ return hay.indexOf(p) !== -1; });
      });
      render(out);
    }

    // inicial
    render(ALL);
    rebuildVersionSelectFor(select.value);

    // eventos
    var t;
    if (input){
      input.addEventListener('input', function(){
        clearTimeout(t);
        var q = this.value;
        t = setTimeout(function(){ filter(q); }, 120);
      });
      input.addEventListener('keydown', function(e){
        if (e.key === 'Enter'){
          var first = select.options[0];
          if (first){
            select.value = first.value;
            select.dispatchEvent(new Event('change'));
            this.value = first.text + ' (' + first.value + ')';
          }
          e.preventDefault();
        }
      });
    }

    select.addEventListener('change', function(){
      rebuildVersionSelectFor(this.value);
      if (input) {
        var op = select.options[select.selectedIndex];
        if (op){ input.value = op.text + ' (' + op.value + ')'; }
      }
    });
  });
})();
