(function(root, factory) {
    'use strict';

    var api = factory();

    if (typeof module === 'object' && module.exports) {
        module.exports = api;
    }

    if (root) {
        root.VerseLinkerExclusions = api;
    }
}(typeof window !== 'undefined' ? window : null, function() {
    'use strict';

    var LEGACY_DEFAULT_SELECTOR = '.sidebar, .widget, [class*="sidebar"], [class*="widget"], [id*="sidebar"], [id*="widget"]';
    var MAX_ITEMS = 100;
    var MAX_NAME_LENGTH = 128;
    var VALID_NAME_PATTERN = /^[A-Za-z0-9_-]+$/;

    function normalizeNames(values) {
        if (!Array.isArray(values)) {
            return [];
        }

        var normalized = [];
        var seen = new Set();

        values.some(function(value) {
            if (
                typeof value !== 'string'
                || value.length === 0
                || value.length > MAX_NAME_LENGTH
                || !VALID_NAME_PATTERN.test(value)
                || seen.has(value)
            ) {
                return false;
            }

            seen.add(value);
            normalized.push(value);

            return normalized.length >= MAX_ITEMS;
        });

        return normalized;
    }

    function readJsonArrayAttribute(script, attributeName) {
        if (!script || typeof script.getAttribute !== 'function') {
            return [];
        }

        var rawValue = script.getAttribute(attributeName);

        if (!rawValue) {
            return [];
        }

        try {
            return normalizeNames(JSON.parse(rawValue));
        } catch (error) {
            return [];
        }
    }

    function readBooleanAttribute(script, attributeName, defaultValue) {
        if (!script || typeof script.getAttribute !== 'function') {
            return defaultValue;
        }

        var rawValue = script.getAttribute(attributeName);

        if (rawValue === 'true') {
            return true;
        }
        if (rawValue === 'false') {
            return false;
        }

        return defaultValue;
    }

    function createConfig(script) {
        var keepDefaultExclusions = readBooleanAttribute(
            script,
            'data-keep-default-exclusions',
            true
        );
        var excludedClasses = new Set(
            readJsonArrayAttribute(script, 'data-excluded-classes')
        );
        var excludedIds = new Set(
            readJsonArrayAttribute(script, 'data-excluded-ids')
        );

        function matchesCustomExclusion(element) {
            if (excludedClasses.size === 0 && excludedIds.size === 0) {
                return false;
            }

            var current = element;

            while (current) {
                if (excludedClasses.size > 0 && current.classList) {
                    for (var className of excludedClasses) {
                        if (current.classList.contains(className)) {
                            return true;
                        }
                    }
                }

                if (excludedIds.size > 0 && current.id && excludedIds.has(current.id)) {
                    return true;
                }

                current = current.parentElement;
            }

            return false;
        }

        function shouldExclude(element) {
            if (!element) {
                return false;
            }

            if (
                keepDefaultExclusions
                && typeof element.closest === 'function'
                && element.closest(LEGACY_DEFAULT_SELECTOR)
            ) {
                return true;
            }

            return matchesCustomExclusion(element);
        }

        return {
            keepDefaultExclusions: keepDefaultExclusions,
            excludedClasses: excludedClasses,
            excludedIds: excludedIds,
            matchesCustomExclusion: matchesCustomExclusion,
            shouldExclude: shouldExclude
        };
    }

    return {
        LEGACY_DEFAULT_SELECTOR: LEGACY_DEFAULT_SELECTOR,
        MAX_ITEMS: MAX_ITEMS,
        MAX_NAME_LENGTH: MAX_NAME_LENGTH,
        normalizeNames: normalizeNames,
        readJsonArrayAttribute: readJsonArrayAttribute,
        readBooleanAttribute: readBooleanAttribute,
        createConfig: createConfig
    };
}));
