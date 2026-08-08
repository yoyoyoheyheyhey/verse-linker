'use strict';

const assert = require('node:assert/strict');
const fs = require('node:fs');
const path = require('node:path');
const exclusions = require('../../trunk/assets/js/verselinker-exclusions.js');
const mainScript = fs.readFileSync(
    path.join(__dirname, '../../trunk/assets/js/verselinker.js'),
    'utf8'
);

function createScript(attributes) {
    return {
        getAttribute(name) {
            return Object.prototype.hasOwnProperty.call(attributes, name)
                ? attributes[name]
                : null;
        }
    };
}

function legacyMatch(element) {
    let current = element;

    while (current) {
        const classValue = Array.from(current.classes).join(' ');

        if (
            current.classes.has('sidebar')
            || current.classes.has('widget')
            || classValue.includes('sidebar')
            || classValue.includes('widget')
            || current.id.includes('sidebar')
            || current.id.includes('widget')
        ) {
            return current;
        }

        current = current.parentElement;
    }

    return null;
}

function createElement(options = {}) {
    const classes = new Set(options.classes || []);

    return {
        classes,
        id: options.id || '',
        parentElement: options.parent || null,
        classList: {
            contains(className) {
                return classes.has(className);
            }
        },
        closest(selector) {
            assert.equal(selector, exclusions.LEGACY_DEFAULT_SELECTOR);
            return legacyMatch(this);
        }
    };
}

function config(attributes = {}) {
    return exclusions.createConfig(createScript(attributes));
}

assert.equal(
    exclusions.LEGACY_DEFAULT_SELECTOR,
    '.sidebar, .widget, [class*="sidebar"], [class*="widget"], [id*="sidebar"], [id*="widget"]'
);
assert.equal(
    mainScript.includes('window.VerseLinkerExclusions.createConfig(e)'),
    true,
    'The shipped main script should initialize the exclusion configuration once.'
);
assert.equal(
    mainScript.includes('C?C.shouldExclude(t):t.closest(w)'),
    true,
    'The shipped main script should use the configurable exclusion decision with a legacy fallback.'
);

// Missing attributes preserve the VerseLinker 1.1.12 legacy behavior.
for (const className of ['sidebar', 'widget', 'et_no_sidebar', 'et_right_sidebar', 'not-a-widget']) {
    assert.equal(config().shouldExclude(createElement({ classes: [className] })), true);
}
assert.equal(config().shouldExclude(createElement({ id: 'main-sidebar-layout' })), true);

// Explicit false disables all six legacy selectors.
const noDefaults = config({ 'data-keep-default-exclusions': 'false' });
for (const className of ['sidebar', 'widget', 'et_no_sidebar', 'et_right_sidebar', 'not-a-widget']) {
    assert.equal(noDefaults.shouldExclude(createElement({ classes: [className] })), false);
}
for (const id of ['sidebar', 'widget', 'main-sidebar-layout']) {
    assert.equal(noDefaults.shouldExclude(createElement({ id })), false);
}

// Custom classes and IDs are exact and apply through ancestors.
const custom = config({
    'data-keep-default-exclusions': 'false',
    'data-excluded-classes': JSON.stringify(['sidebar', 'widget', 'custom-reference-exclusion']),
    'data-excluded-ids': JSON.stringify(['footer-scripture-list'])
});
assert.equal(custom.shouldExclude(createElement({ classes: ['sidebar'] })), true);
assert.equal(custom.shouldExclude(createElement({ classes: ['content', 'sidebar'] })), true);
assert.equal(custom.shouldExclude(createElement({ classes: ['sidebar-extra'] })), false);
assert.equal(custom.shouldExclude(createElement({ classes: ['et_no_sidebar'] })), false);
assert.equal(custom.shouldExclude(createElement({ classes: ['not-a-widget'] })), false);
assert.equal(custom.shouldExclude(createElement({ id: 'footer-scripture-list' })), true);
assert.equal(custom.shouldExclude(createElement({ id: 'footer-scripture-list-extra' })), false);

const customAncestor = createElement({ classes: ['custom-reference-exclusion'] });
assert.equal(custom.shouldExclude(createElement({ parent: customAncestor })), true);
const customBody = createElement({ id: 'footer-scripture-list' });
assert.equal(custom.shouldExclude(customBody), true);

// Legacy and custom exclusions work together.
const combined = config({
    'data-keep-default-exclusions': 'true',
    'data-excluded-classes': JSON.stringify(['verse-suppressed'])
});
assert.equal(combined.shouldExclude(createElement({ classes: ['et_no_sidebar'] })), true);
assert.equal(combined.shouldExclude(createElement({ classes: ['verse-suppressed'] })), true);

// Bad or unexpected attributes fall back without throwing.
assert.deepEqual(exclusions.readJsonArrayAttribute(createScript({
    'data-excluded-classes': '{broken'
}), 'data-excluded-classes'), []);
assert.deepEqual(exclusions.readJsonArrayAttribute(createScript({
    'data-excluded-classes': '{"not":"an array"}'
}), 'data-excluded-classes'), []);
assert.equal(config({ 'data-keep-default-exclusions': 'unexpected' }).keepDefaultExclusions, true);

const normalized = exclusions.normalizeNames([
    'sidebar',
    'sidebar',
    '',
    null,
    '.selector',
    'has space',
    'valid_name-2',
    'x'.repeat(129)
]);
assert.deepEqual(normalized, ['sidebar', 'valid_name-2']);
assert.equal(
    exclusions.normalizeNames(Array.from({ length: 105 }, (_, index) => `item-${index}`)).length,
    100
);

console.log('VerseLinker exclusion JavaScript tests passed.');
