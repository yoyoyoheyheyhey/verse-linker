jQuery(document).ready(function($) {
    $('#verselinker_language').on('change', function() {
        const selectedLanguage = $(this).val();

        // Obtener el JSON local desde la URL proporcionada por WordPress
        $.getJSON(verselinkerData.json_url, function(data) {
            if (!Array.isArray(data.languages)) {
                console.error('Estructura inválida en el archivo JSON.');
                return;
            }

            const idioma = data.languages.find(lang => lang.abreviacion === selectedLanguage);

            if (idioma) {
                let options = '';
                idioma.versiones.forEach(version => {
                    options += `<option value="${_.escape(version.abreviacion)}">${_.escape(version.nombre_version)} (${_.escape(version.abreviacion)})</option>`;
                });

                $('#verselinker_version').html(options);
            }
        }).fail(function() {
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

    // Llamada AJAX para obtener versiones del idioma seleccionado
    fetch(verselinkerData.json_url)
        .then(response => response.json())
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
                            option.value = _.escape(version.abreviacion);
                            option.textContent = _.escape(version.nombre_version);
                            optgroup.appendChild(option);
                        });
                        versionDropdown.appendChild(optgroup);
                    }
                });
            } else {
                versionDropdown.innerHTML = '<option value="">No versions available</option>';
            }
        })
        .catch(error => {
            console.error('Error fetching versions:', error);
            versionDropdown.innerHTML = '<option value="">Error loading versions</option>';
        });
});