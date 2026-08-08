<?php

define('ABSPATH', __DIR__ . '/');

$GLOBALS['verselinker_test_options'] = array();
$GLOBALS['verselinker_test_registered_settings'] = array();
$GLOBALS['verselinker_test_language_attributes'] = 'dir="ltr" lang="en-US"';
$GLOBALS['verselinker_test_assertions'] = 0;

function wp_unslash($value) {
    return $value;
}

function sanitize_text_field($value) {
    return trim(strip_tags((string) $value));
}

function get_option($name, $default = false) {
    return array_key_exists($name, $GLOBALS['verselinker_test_options'])
        ? $GLOBALS['verselinker_test_options'][$name]
        : $default;
}

function get_language_attributes($doctype = 'html') {
    return $GLOBALS['verselinker_test_language_attributes'];
}

function get_bloginfo($show = '') {
    return $show === 'language' ? 'en-US' : '';
}

function esc_attr($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function add_action($hook, $callback, $priority = 10, $accepted_args = 1) {
}

function add_filter($hook, $callback, $priority = 10, $accepted_args = 1) {
}

function register_setting($group, $name, $args = array()) {
    $GLOBALS['verselinker_test_registered_settings'][$name] = array(
        'group' => $group,
        'args'  => $args,
    );
}

function verselinker_fetch_languages_json() {
    return array(
        'languages' => array(
            array(
                'abreviacion' => 'en',
                'versiones'   => array(
                    array('abreviacion' => 'KJV'),
                    array('abreviacion' => 'ESV'),
                ),
            ),
            array(
                'abreviacion' => 'ja',
                'versiones'   => array(
                    array('abreviacion' => 'JNIV'),
                    array('abreviacion' => 'JCB'),
                ),
            ),
            array(
                'abreviacion' => 'fr',
                'versiones'   => array(
                    array('abreviacion' => 'LSG'),
                ),
            ),
        ),
    );
}

function verselinker_test_assert_same($expected, $actual, $message) {
    $GLOBALS['verselinker_test_assertions']++;

    if ($expected !== $actual) {
        fwrite(
            STDERR,
            "FAIL: {$message}\nExpected: " . var_export($expected, true)
                . "\nActual: " . var_export($actual, true) . "\n"
        );
        exit(1);
    }
}

function verselinker_test_assert_contains($needle, $haystack, $message) {
    $GLOBALS['verselinker_test_assertions']++;

    if (strpos($haystack, $needle) === false) {
        fwrite(STDERR, "FAIL: {$message}\nMissing: {$needle}\nValue: {$haystack}\n");
        exit(1);
    }
}

require dirname(__DIR__, 2) . '/trunk/includes/language-routing.php';
require dirname(__DIR__, 2) . '/trunk/includes/admin-settings.php';
require dirname(__DIR__, 2) . '/trunk/includes/scripts.php';

verselinker_test_assert_same('fixed', verselinker_sanitize_language_resolution_mode('unexpected'), 'Unknown modes use fixed behavior.');
verselinker_test_assert_same('per_page', verselinker_sanitize_language_resolution_mode('per_page'), 'Per-page mode is accepted.');

verselinker_test_assert_same('/english/', verselinker_normalize_language_route_path('/english'), 'A trailing slash is normalized.');
verselinker_test_assert_same('/english/about/', verselinker_normalize_language_route_path('//english//about//'), 'Duplicate separators are normalized.');
verselinker_test_assert_same('/日本語/教会/', verselinker_normalize_language_route_path('/日本語/%E6%95%99%E4%BC%9A'), 'Unicode and encoded path segments are normalized.');
verselinker_test_assert_same('/', verselinker_normalize_language_route_path('/'), 'The root path is valid.');
verselinker_test_assert_same('', verselinker_normalize_language_route_path('https://example.com/english/'), 'Absolute URLs are rejected.');
verselinker_test_assert_same('', verselinker_normalize_language_route_path('/english/?preview=1'), 'Query strings are rejected.');
verselinker_test_assert_same('', verselinker_normalize_language_route_path('/english/#section'), 'Fragments are rejected.');
verselinker_test_assert_same('', verselinker_normalize_language_route_path('/english/../private/'), 'Parent traversal is rejected.');
verselinker_test_assert_same('', verselinker_normalize_language_route_path('/english/%2E%2E/private/'), 'Encoded parent traversal is rejected.');
verselinker_test_assert_same('', verselinker_normalize_language_route_path('/english page/'), 'Whitespace is rejected.');
verselinker_test_assert_same('', verselinker_normalize_language_route_path('/' . str_repeat('a', 201) . '/'), 'Overlong paths are rejected.');
verselinker_test_assert_same('', verselinker_normalize_language_route_path("/\xFF/"), 'Invalid UTF-8 paths are rejected.');

$sanitized_routes = verselinker_sanitize_language_routes(array(
    array('path' => '/english', 'language' => 'en', 'version' => 'ESV'),
    array('path' => '/english/', 'language' => 'en', 'version' => 'KJV'),
    array('path' => '', 'language' => 'ja', 'version' => 'JCB'),
    array('path' => '', 'language' => 'ja', 'version' => 'JNIV'),
    array('path' => '/invalid/', 'language' => 'ja', 'version' => 'ESV'),
    array('path' => '/unsafe/../path/', 'language' => 'en', 'version' => 'KJV'),
));
verselinker_test_assert_same(
    array(
        array('path' => '/english/', 'language' => 'en', 'version' => 'ESV'),
        array('path' => '', 'language' => 'ja', 'version' => 'JCB'),
    ),
    $sanitized_routes,
    'Routes are normalized, deduplicated, and validated against language/version pairs.'
);

$too_many_routes = array();
for ($index = 0; $index < 25; $index++) {
    $too_many_routes[] = array(
        'path'     => '/route-' . $index . '/',
        'language' => 'en',
        'version'  => 'KJV',
    );
}
verselinker_test_assert_same(20, count(verselinker_sanitize_language_routes($too_many_routes)), 'At most 20 routes are retained.');

$language_index = verselinker_get_language_version_index();
verselinker_test_assert_same('en', verselinker_match_supported_language('en-US', $language_index), 'A locale falls back to its supported base language.');
verselinker_test_assert_same('ja', verselinker_match_supported_language('JA_jp', $language_index), 'Locale matching is case-insensitive and accepts underscores.');
verselinker_test_assert_same('', verselinker_match_supported_language('de-DE', $language_index), 'Unsupported languages do not match.');

$GLOBALS['verselinker_test_options'] = array(
    'verselinker_language' => 'en',
    'verselinker_version'  => 'ESV',
);
verselinker_test_assert_same(
    array('language' => 'en', 'version' => 'ESV', 'source' => 'fixed'),
    verselinker_resolve_frontend_language('/japanese/about/', 'ja-JP'),
    'Fixed mode remains the default and ignores page signals.'
);

$GLOBALS['verselinker_test_options']['verselinker_language_resolution_mode'] = 'per_page';
$GLOBALS['verselinker_test_options']['verselinker_language_routes'] = array(
    array('path' => '/english/', 'language' => 'en', 'version' => 'ESV'),
    array('path' => '/english/special/', 'language' => 'en', 'version' => 'KJV'),
    array('path' => '/japanese/', 'language' => 'ja', 'version' => 'JNIV'),
    array('path' => '', 'language' => 'en', 'version' => 'ESV'),
    array('path' => '', 'language' => 'ja', 'version' => 'JCB'),
);

verselinker_test_assert_same(
    array('language' => 'ja', 'version' => 'JNIV', 'source' => 'path'),
    verselinker_resolve_frontend_language('/japanese/about/', 'en-US'),
    'An explicit URL path mapping has highest precedence.'
);
verselinker_test_assert_same(
    array('language' => 'en', 'version' => 'KJV', 'source' => 'path'),
    verselinker_resolve_frontend_language('/english/special/article/', 'ja-JP'),
    'The longest matching URL path prefix wins.'
);
verselinker_test_assert_same(
    array('language' => 'ja', 'version' => 'JCB', 'source' => 'document'),
    verselinker_resolve_frontend_language('/englishman/', 'ja-JP'),
    'Path matching respects segment boundaries and then uses a document-language profile.'
);
verselinker_test_assert_same(
    array('language' => 'en', 'version' => 'ESV', 'source' => 'document'),
    verselinker_resolve_frontend_language('/unmapped/', 'en-US'),
    'A supported document locale uses its configured empty-path profile.'
);
verselinker_test_assert_same(
    array('language' => 'fr', 'version' => 'LSG', 'source' => 'document'),
    verselinker_resolve_frontend_language('/unmapped/', 'fr-FR'),
    'A supported document language without a profile uses its bundled default version.'
);
verselinker_test_assert_same(
    array('language' => 'en', 'version' => 'ESV', 'source' => 'fixed'),
    verselinker_resolve_frontend_language('/unmapped/', 'de-DE'),
    'An unsupported document language falls back to the fixed settings.'
);

$GLOBALS['verselinker_test_options']['verselinker_language_routes'] = array(
    array('path' => '/english/', 'language' => 'en', 'version' => 'ESV'),
);
verselinker_test_assert_same(
    array('language' => 'en', 'version' => 'KJV', 'source' => 'document'),
    verselinker_resolve_frontend_language('/unmapped/', 'en-US'),
    'A path-specific route is not reused as a document-language version profile.'
);

$GLOBALS['verselinker_test_options']['verselinker_language_routes'] = 'malformed';
verselinker_test_assert_same(
    array('language' => 'en', 'version' => 'ESV', 'source' => 'fixed'),
    verselinker_resolve_frontend_language('/unmapped/', 'de-DE'),
    'Malformed route settings do not stop fixed fallback processing.'
);

$GLOBALS['verselinker_test_options']['verselinker_language_routes'] = array(
    array('path' => '/english/', 'language' => 'en', 'version' => 'ESV'),
    array('path' => '/english/special/', 'language' => 'en', 'version' => 'KJV'),
    array('path' => '/japanese/', 'language' => 'ja', 'version' => 'JNIV'),
    array('path' => '', 'language' => 'en', 'version' => 'ESV'),
    array('path' => '', 'language' => 'ja', 'version' => 'JCB'),
);

$GLOBALS['verselinker_test_language_attributes'] = 'dir="ltr" lang="ja-JP"';
verselinker_test_assert_same('ja-JP', verselinker_get_document_language(), 'The filtered WordPress document language is extracted.');

$wp = (object) array('request' => 'japanese/about');
verselinker_test_assert_same('/japanese/about/', verselinker_get_current_request_path(), 'The WordPress request is normalized as a site-relative path.');

$frontend_tag = verselinker_add_attributes_to_script(
    '<script src="verselinker.js"></script>',
    'verselinker-frontend',
    'verselinker.js'
);
verselinker_test_assert_contains('lang="ja"', $frontend_tag, 'The resolved language is passed to the frontend script.');
verselinker_test_assert_contains('version="JNIV"', $frontend_tag, 'The resolved version is passed to the frontend script.');

$admin_tag = verselinker_add_attributes_to_admin_script(
    '<script src="verselinker.js"></script>',
    'verselinker',
    'verselinker.js'
);
verselinker_test_assert_contains('lang="en"', $admin_tag, 'The admin preview continues to use the fixed language.');
verselinker_test_assert_contains('version="ESV"', $admin_tag, 'The admin preview continues to use the fixed version.');

verselinker_register_settings();
verselinker_test_assert_same(
    'verselinker_sanitize_language_resolution_mode',
    $GLOBALS['verselinker_test_registered_settings']['verselinker_language_resolution_mode']['args']['sanitize_callback'],
    'The resolution mode is registered with its sanitizer.'
);
verselinker_test_assert_same(
    'verselinker_sanitize_language_routes',
    $GLOBALS['verselinker_test_registered_settings']['verselinker_language_routes']['args']['sanitize_callback'],
    'Language routes are registered with their sanitizer.'
);

fwrite(STDOUT, 'OK (' . $GLOBALS['verselinker_test_assertions'] . " assertions)\n");
