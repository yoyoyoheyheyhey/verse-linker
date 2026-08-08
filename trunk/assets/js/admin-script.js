(function() {
  'use strict';

  function asString(value) {
    return value == null ? '' : String(value);
  }

  function optionValue(value) {
    return asString(value).trim();
  }

  function setText(element, value) {
    element.textContent = asString(value);
  }

  function getConfig() {
    return window.verselinkerData || {};
  }

  function getLabels() {
    var labels = getConfig().labels || {};

    return {
      tb: labels.tb || 'Complete Bibles',
      at: labels.at || 'Old Testament Only',
      nt: labels.nt || 'New Testament Only',
      no_versions: labels.no_versions || 'No versions found.'
    };
  }

  function getSavedVersionFor(langCode) {
    var selected = getConfig().selected || {};
    var savedLang = optionValue(selected.lang);
    var savedVersion = optionValue(selected.ver);

    return savedLang && savedVersion && savedLang === optionValue(langCode) ? savedVersion : '';
  }

  function loadLanguages() {
    var config = getConfig();

    if (Array.isArray(config.languages) && config.languages.length) {
      return Promise.resolve(config.languages);
    }

    if (!config.json_url || typeof fetch !== 'function') {
      return Promise.resolve([]);
    }

    return fetch(config.json_url, { credentials: 'same-origin' })
      .then(function(response) {
        if (!response.ok) {
          throw new Error('HTTP ' + response.status);
        }

        return response.json();
      })
      .then(function(data) {
        return Array.isArray(data.languages) ? data.languages : [];
      })
      .catch(function(error) {
        if (window.console && typeof window.console.error === 'function') {
          window.console.error('VerseLinker: could not load languages JSON.', error);
        }

        return [];
      });
  }

  function clearSelect(select) {
    while (select.firstChild) {
      select.removeChild(select.firstChild);
    }
  }

  function getLanguageItems(select, languages) {
    if (Array.isArray(languages) && languages.length) {
      return languages.map(function(language) {
        return {
          value: optionValue(language.abreviacion),
          label: optionValue(language.nombre)
        };
      }).filter(function(language) {
        return language.value !== '';
      });
    }

    return Array.prototype.map.call(select.options, function(option) {
      return {
        value: option.value,
        label: option.text
      };
    });
  }

  function findLanguage(languages, langCode) {
    return languages.find(function(language) {
      return optionValue(language.abreviacion) === optionValue(langCode);
    });
  }

  function addEmptyVersionOption(versionSelect, label) {
    var option = document.createElement('option');
    option.value = '';
    setText(option, label);
    versionSelect.appendChild(option);
  }

  function rebuildVersionSelect(versionSelect, languages, langCode, preferredVersion, labels) {
    if (!Array.isArray(languages) || !languages.length) {
      return;
    }

    var language = findLanguage(languages, langCode);

    if (!language || !Array.isArray(language.versiones) || !language.versiones.length) {
      clearSelect(versionSelect);
      addEmptyVersionOption(versionSelect, labels.no_versions);
      return;
    }

    clearSelect(versionSelect);

    var categories = [
      { key: 'tb', label: labels.tb },
      { key: 'at', label: labels.at },
      { key: 'nt', label: labels.nt }
    ];
    var preferred = optionValue(preferredVersion);
    var firstValue = null;
    var matchedPreferred = false;

    categories.forEach(function(category) {
      var versions = language.versiones.filter(function(version) {
        return optionValue(version.categoria) === category.key;
      });

      if (!versions.length) {
        return;
      }

      var group = document.createElement('optgroup');
      group.label = category.label;

      versions.forEach(function(version) {
        var value = optionValue(version.abreviacion);
        var option = document.createElement('option');
        option.value = value;
        setText(option, optionValue(version.nombre_version) || value);

        if (firstValue === null) {
          firstValue = value;
        }

        if (preferred !== '' && value === preferred) {
          option.selected = true;
          matchedPreferred = true;
        }

        group.appendChild(option);
      });

      versionSelect.appendChild(group);
    });

    if (matchedPreferred) {
      versionSelect.value = preferred;
    } else if (firstValue !== null) {
      versionSelect.value = firstValue;
    }
  }

  function initAdminSettings(languages) {
    var searchInput = document.getElementById('verselinker_language_search');
    var languageSelect = document.getElementById('verselinker_language');
    var versionSelect = document.getElementById('verselinker_version');
    var counter = document.getElementById('verselinker_language_counter');

    if (!languageSelect || !versionSelect) {
      return;
    }

    var labels = getLabels();
    var allLanguages = getLanguageItems(languageSelect, languages);

    function updateCounter(count) {
      if (!counter) {
        return;
      }

      counter.textContent = count + ' ' + (count === 1 ? 'result' : 'results');
    }

    function renderLanguages(list) {
      var previousValue = languageSelect.value;
      var hasPrevious = false;

      clearSelect(languageSelect);

      list.forEach(function(language) {
        var option = document.createElement('option');
        option.value = language.value;
        setText(option, language.label);

        if (language.value === previousValue) {
          option.selected = true;
          hasPrevious = true;
        }

        languageSelect.appendChild(option);
      });

      if (!hasPrevious && languageSelect.options.length) {
        languageSelect.selectedIndex = 0;
      }

      if (languageSelect.value !== previousValue) {
        rebuildVersionSelect(
          versionSelect,
          languages,
          languageSelect.value,
          getSavedVersionFor(languageSelect.value),
          labels
        );
      }

      updateCounter(list.length);
    }

    function filterLanguages(query) {
      var value = optionValue(query).toLowerCase();

      if (value === '') {
        renderLanguages(allLanguages);
        return;
      }

      var terms = value.split(/\s+/);
      var filtered = allLanguages.filter(function(language) {
        var haystack = (language.label + ' ' + language.value).toLowerCase();

        return terms.every(function(term) {
          return haystack.indexOf(term) !== -1;
        });
      });

      renderLanguages(filtered);
    }

    renderLanguages(allLanguages);
    rebuildVersionSelect(
      versionSelect,
      languages,
      languageSelect.value,
      getSavedVersionFor(languageSelect.value),
      labels
    );

    languageSelect.addEventListener('change', function() {
      rebuildVersionSelect(
        versionSelect,
        languages,
        this.value,
        getSavedVersionFor(this.value),
        labels
      );

      if (searchInput) {
        var selectedOption = this.options[this.selectedIndex];
        if (selectedOption) {
          searchInput.value = selectedOption.text + ' (' + selectedOption.value + ')';
        }
      }
    });

    if (searchInput) {
      var searchTimer = null;

      searchInput.addEventListener('input', function() {
        var query = this.value;
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function() {
          filterLanguages(query);
        }, 120);
      });

      searchInput.addEventListener('keydown', function(event) {
        if (event.key !== 'Enter') {
          return;
        }

        var firstOption = languageSelect.options[0];
        if (firstOption) {
          languageSelect.value = firstOption.value;
          languageSelect.dispatchEvent(new Event('change'));
        }

        event.preventDefault();
      });
    }
  }

  function populateLanguageSelect(select, languages, preferredLanguage) {
    var languageItems = getLanguageItems(select, languages);
    var preferred = optionValue(preferredLanguage);
    var matchedPreferred = false;

    clearSelect(select);

    languageItems.forEach(function(language) {
      var option = document.createElement('option');
      option.value = language.value;
      setText(option, language.label || language.value);

      if (language.value === preferred) {
        option.selected = true;
        matchedPreferred = true;
      }

      select.appendChild(option);
    });

    if (matchedPreferred) {
      select.value = preferred;
    } else if (select.options.length) {
      select.selectedIndex = 0;
    }
  }

  function initLanguageRoutes(languages) {
    var modeSelect = document.getElementById('verselinker_language_resolution_mode');
    var routesSetting = document.getElementById('verselinker_language_routes_setting');
    var routesBody = document.getElementById('verselinker_language_routes_rows');
    var routeTemplate = document.getElementById('verselinker_language_route_template');
    var addButton = document.getElementById('verselinker_add_language_route');

    if (!modeSelect || !routesSetting || !routesBody || !routeTemplate || !addButton) {
      return;
    }

    var labels = getLabels();
    var maxRoutes = 20;
    var selected = getConfig().selected || {};

    function getRows() {
      return Array.prototype.slice.call(
        routesBody.querySelectorAll('[data-verselinker-language-route]')
      );
    }

    function reindexRows() {
      getRows().forEach(function(row, index) {
        row.querySelector('.verselinker-route-path').name =
          'verselinker_language_routes[' + index + '][path]';
        row.querySelector('.verselinker-route-language').name =
          'verselinker_language_routes[' + index + '][language]';
        row.querySelector('.verselinker-route-version').name =
          'verselinker_language_routes[' + index + '][version]';
      });

      addButton.disabled = getRows().length >= maxRoutes;
    }

    function initializeRow(row) {
      var languageSelect = row.querySelector('.verselinker-route-language');
      var versionSelect = row.querySelector('.verselinker-route-version');
      var removeButton = row.querySelector('.verselinker-remove-language-route');
      var preferredLanguage = optionValue(languageSelect.getAttribute('data-selected')) ||
        optionValue(selected.lang);
      var preferredVersion = optionValue(versionSelect.getAttribute('data-selected')) ||
        (preferredLanguage === optionValue(selected.lang) ? optionValue(selected.ver) : '');

      populateLanguageSelect(languageSelect, languages, preferredLanguage);
      rebuildVersionSelect(
        versionSelect,
        languages,
        languageSelect.value,
        preferredVersion,
        labels
      );

      languageSelect.removeAttribute('data-selected');
      versionSelect.removeAttribute('data-selected');

      languageSelect.addEventListener('change', function() {
        rebuildVersionSelect(versionSelect, languages, this.value, '', labels);
      });

      removeButton.addEventListener('click', function() {
        row.remove();
        reindexRows();
      });
    }

    function updateModeVisibility() {
      routesSetting.hidden = modeSelect.value !== 'per_page';
    }

    getRows().forEach(initializeRow);
    reindexRows();
    updateModeVisibility();

    modeSelect.addEventListener('change', updateModeVisibility);
    addButton.addEventListener('click', function() {
      if (getRows().length >= maxRoutes) {
        return;
      }

      var fragment = routeTemplate.content.cloneNode(true);
      var row = fragment.querySelector('[data-verselinker-language-route]');
      routesBody.appendChild(fragment);
      initializeRow(row);
      reindexRows();
    });
  }

  function boot() {
    loadLanguages().then(function(languages) {
      initAdminSettings(languages);
      initLanguageRoutes(languages);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();
