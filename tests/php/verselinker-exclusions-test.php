<?php

define('ABSPATH', __DIR__ . '/');

function add_filter() {
    return true;
}

function add_action() {
    return true;
}

function wp_unslash($value) {
    return is_string($value) ? stripslashes($value) : $value;
}

function wp_json_encode($value) {
    return json_encode($value);
}

function esc_attr($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$test_options = array();
function get_option($name, $default = false) {
    global $test_options;

    return array_key_exists($name, $test_options) ? $test_options[$name] : $default;
}

$registered_settings = array();
function register_setting($group, $name, $args) {
    global $registered_settings;
    $registered_settings[$name] = array(
        'group' => $group,
        'args' => $args,
    );
}

require dirname(__DIR__, 2) . '/trunk/includes/helpers.php';
require dirname(__DIR__, 2) . '/trunk/includes/scripts.php';
require dirname(__DIR__, 2) . '/trunk/includes/admin-settings.php';

function assert_same($expected, $actual, $message) {
    if ($expected !== $actual) {
        fwrite(STDERR, $message . "\nExpected: " . var_export($expected, true) . "\nActual: " . var_export($actual, true) . "\n");
        exit(1);
    }
}

assert_same(
    "sidebar\nwidget\ncustom-reference-exclusion",
    verselinker_sanitize_exclusion_list(" sidebar \r\nwidget\n\nsidebar\rcustom-reference-exclusion "),
    'Lists should normalize newlines, trim, remove empty lines, and preserve first-seen order.'
);
assert_same('', verselinker_sanitize_exclusion_list(array('sidebar')), 'Arrays should be rejected safely.');
assert_same('', verselinker_sanitize_exclusion_list(null), 'Null should be rejected safely.');
assert_same(
    "valid_name\nvalid-id",
    verselinker_sanitize_exclusion_list(".sidebar\n#widget\nhas space\nhas,comma\nhas[bracket]\nvalid_name\nvalid-id"),
    'Selector syntax and whitespace should be rejected.'
);
assert_same(str_repeat('a', 128), verselinker_sanitize_exclusion_list(str_repeat('a', 128)), 'A 128-byte name should be accepted.');
assert_same('', verselinker_sanitize_exclusion_list(str_repeat('a', 129)), 'A name over 128 bytes should be rejected.');

$items = array();
for ($index = 0; $index < 105; $index++) {
    $items[] = 'item-' . $index;
}
$limited = verselinker_exclusion_list_to_array(implode("\n", $items));
assert_same(100, count($limited), 'Only the first 100 valid unique names should be retained.');
assert_same('item-0', $limited[0], 'The first item should retain its position.');
assert_same('item-99', $limited[99], 'The item limit should retain input order.');

verselinker_register_settings();
assert_same(
    true,
    $registered_settings['verselinker_keep_default_exclusions']['args']['default'],
    'The registered legacy exclusion default should be true.'
);
assert_same(
    'verselinker_sanitize_checkbox',
    $registered_settings['verselinker_keep_default_exclusions']['args']['sanitize_callback'],
    'The existing checkbox sanitizer should be reused.'
);

// A missing option receives the default, while an explicitly saved false remains false.
$test_options = array();
assert_same(
    true,
    get_option('verselinker_keep_default_exclusions', true),
    'A missing legacy exclusion option should use true.'
);
$test_options['verselinker_keep_default_exclusions'] = false;
assert_same(
    false,
    get_option('verselinker_keep_default_exclusions', true),
    'An explicitly false legacy exclusion option should remain false.'
);

$test_options['verselinker_excluded_classes'] = "sidebar\ncustom-exclusion";
$test_options['verselinker_excluded_ids'] = 'footer-scripture-list';
$attributes = verselinker_get_exclusion_script_attributes();
assert_same(
    true,
    strpos($attributes, 'data-keep-default-exclusions="false"') !== false,
    'The explicit false value should reach the script attributes.'
);
assert_same(
    true,
    strpos($attributes, 'data-excluded-classes="[&quot;sidebar&quot;,&quot;custom-exclusion&quot;]"') !== false,
    'Classes should be JSON encoded and escaped for an HTML attribute.'
);
assert_same(
    true,
    strpos($attributes, 'data-excluded-ids="[&quot;footer-scripture-list&quot;]"') !== false,
    'IDs should be JSON encoded and escaped for an HTML attribute.'
);

fwrite(STDOUT, "VerseLinker exclusion PHP tests passed.\n");
