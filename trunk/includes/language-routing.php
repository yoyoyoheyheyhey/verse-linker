<?php
// Evitar accesos directos
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Sanitize the language resolution mode.
 *
 * @param mixed $input Raw setting value.
 * @return string Either fixed or per_page.
 */
function verselinker_sanitize_language_resolution_mode($input) {
    return is_string($input) && $input === 'per_page' ? 'per_page' : 'fixed';
}

/**
 * Normalize a site-relative URL path prefix.
 *
 * Empty paths are valid for profiles that should only match document language.
 * Invalid non-empty paths also return an empty string, so callers must compare
 * the raw value before deciding whether to keep the route.
 *
 * @param mixed $input Raw path prefix.
 * @return string Normalized path prefix or an empty string.
 */
function verselinker_normalize_language_route_path($input) {
    if (!is_string($input)) {
        return '';
    }

    $path = trim(wp_unslash($input));

    if ($path === '') {
        return '';
    }

    if (
        strlen($path) > 200
        || $path[0] !== '/'
        || strpos($path, '://') !== false
        || strpos($path, '?') !== false
        || strpos($path, '#') !== false
        || strpos($path, '\\') !== false
        || preg_match('/[\x00-\x20\x7F]/', $path)
        || preg_match('/%(?![0-9A-Fa-f]{2})/', $path)
    ) {
        return '';
    }

    $path = rawurldecode($path);

    if (
        preg_match('//u', $path) !== 1
        || strpos($path, '\\') !== false
        || preg_match('/[\x00-\x20\x7F]/', $path)
    ) {
        return '';
    }

    $segments = array();
    foreach (explode('/', $path) as $segment) {
        if ($segment === '') {
            continue;
        }

        if ($segment === '.' || $segment === '..') {
            return '';
        }

        $segments[] = $segment;
    }

    if (empty($segments)) {
        return '/';
    }

    return '/' . implode('/', $segments) . '/';
}

/**
 * Build a language and version lookup from the bundled language catalog.
 *
 * @return array<string, array{default: string, versions: array<string, bool>}>
 */
function verselinker_get_language_version_index() {
    static $index = null;

    if (is_array($index)) {
        return $index;
    }

    $data = verselinker_fetch_languages_json();
    $index = array();

    if (!$data || empty($data['languages']) || !is_array($data['languages'])) {
        return $index;
    }

    foreach ($data['languages'] as $language) {
        if (
            empty($language['abreviacion'])
            || !is_string($language['abreviacion'])
            || empty($language['versiones'])
            || !is_array($language['versiones'])
        ) {
            continue;
        }

        $language_code = $language['abreviacion'];
        $versions = array();
        $default_version = '';

        foreach ($language['versiones'] as $version) {
            if (!empty($version['abreviacion']) && is_string($version['abreviacion'])) {
                if ($default_version === '') {
                    $default_version = $version['abreviacion'];
                }
                $versions[$version['abreviacion']] = true;
            }
        }

        if (!empty($versions)) {
            $index[$language_code] = array(
                'default'  => $default_version,
                'versions' => $versions,
            );
        }
    }

    return $index;
}

/**
 * Sanitize configured per-page language routes.
 *
 * A route may omit its path and then acts only as a document-language profile.
 * Languages and versions must be a valid pair from the bundled catalog.
 *
 * @param mixed $input Raw setting value.
 * @return array<int, array{path: string, language: string, version: string}>
 */
function verselinker_sanitize_language_routes($input) {
    $max_routes = 20;
    $index = verselinker_get_language_version_index();

    if (!is_array($input) || empty($index)) {
        return array();
    }

    $routes = array();
    $seen_paths = array();
    $seen_profiles = array();

    foreach (array_slice($input, 0, $max_routes, true) as $route) {
        if (!is_array($route)) {
            continue;
        }

        $raw_path = isset($route['path']) && is_string($route['path'])
            ? trim(wp_unslash($route['path']))
            : '';
        $path = verselinker_normalize_language_route_path($raw_path);
        $language = isset($route['language']) && is_string($route['language'])
            ? sanitize_text_field(wp_unslash($route['language']))
            : '';
        $version = isset($route['version']) && is_string($route['version'])
            ? sanitize_text_field(wp_unslash($route['version']))
            : '';

        if (
            ($raw_path !== '' && $path === '')
            || !isset($index[$language])
            || !isset($index[$language]['versions'][$version])
        ) {
            continue;
        }

        if ($path !== '') {
            if (isset($seen_paths[$path])) {
                continue;
            }
            $seen_paths[$path] = true;
        } else {
            $profile_key = $language;
            if (isset($seen_profiles[$profile_key])) {
                continue;
            }
            $seen_profiles[$profile_key] = true;
        }

        $routes[] = array(
            'path'     => $path,
            'language' => $language,
            'version'  => $version,
        );

        if (count($routes) >= $max_routes) {
            break;
        }
    }

    return $routes;
}

/**
 * Match a locale value to an exact supported language code.
 *
 * @param mixed $input Raw locale or language code.
 * @param array $index Supported language index.
 * @return string Supported language code or an empty string.
 */
function verselinker_match_supported_language($input, $index) {
    if (!is_string($input) || !is_array($index)) {
        return '';
    }

    $normalized = strtolower(str_replace('_', '-', trim($input)));

    if ($normalized === '') {
        return '';
    }

    $base = explode('-', $normalized)[0];
    $base_match = '';

    foreach (array_keys($index) as $language_code) {
        $candidate = strtolower(str_replace('_', '-', $language_code));

        if ($candidate === $normalized) {
            return $language_code;
        }

        if ($base_match === '' && $candidate === $base) {
            $base_match = $language_code;
        }
    }

    return $base_match;
}

/**
 * Get the language that WordPress will place on the document element.
 *
 * @return string Raw document language.
 */
function verselinker_get_document_language() {
    $attributes = function_exists('get_language_attributes')
        ? get_language_attributes('html')
        : '';

    if (
        is_string($attributes)
        && preg_match('/(?:^|\s)lang\s*=\s*(["\'])([^"\']+)\1/i', $attributes, $matches)
    ) {
        return sanitize_text_field(html_entity_decode($matches[2], ENT_QUOTES, 'UTF-8'));
    }

    return function_exists('get_bloginfo')
        ? sanitize_text_field(get_bloginfo('language'))
        : '';
}

/**
 * Get the current WordPress request as a site-relative normalized path.
 *
 * @return string Normalized request path.
 */
function verselinker_get_current_request_path() {
    global $wp;

    $request = isset($wp->request) && is_string($wp->request)
        ? '/' . trim($wp->request, '/') . '/'
        : '/';
    $path = verselinker_normalize_language_route_path($request);

    return $path === '' ? '/' : $path;
}

/**
 * Find the most specific route matching the current request path.
 *
 * @param array $routes Sanitized route list.
 * @param string $request_path Normalized current path.
 * @return array|null Matching route.
 */
function verselinker_find_path_language_route($routes, $request_path) {
    $match = null;

    foreach ($routes as $route) {
        if (
            empty($route['path'])
            || strpos($request_path, $route['path']) !== 0
        ) {
            continue;
        }

        if ($match === null || strlen($route['path']) > strlen($match['path'])) {
            $match = $route;
        }
    }

    return $match;
}

/**
 * Find the first configured version profile for a document language.
 *
 * @param array $routes Sanitized route list.
 * @param string $language Supported language code.
 * @return array|null Matching profile.
 */
function verselinker_find_document_language_route($routes, $language) {
    foreach ($routes as $route) {
        if (
            empty($route['path'])
            && isset($route['language'])
            && $route['language'] === $language
        ) {
            return $route;
        }
    }

    return null;
}

/**
 * Resolve the language and Bible version for the current frontend page.
 *
 * @param string|null $request_path Optional path override for tests and filters.
 * @param string|null $document_language Optional document language override.
 * @return array{language: string, version: string, source: string}
 */
function verselinker_resolve_frontend_language($request_path = null, $document_language = null) {
    $fallback = array(
        'language' => sanitize_text_field(get_option('verselinker_language', 'en')),
        'version'  => sanitize_text_field(get_option('verselinker_version', 'KJV')),
        'source'   => 'fixed',
    );
    $mode = verselinker_sanitize_language_resolution_mode(
        get_option('verselinker_language_resolution_mode', 'fixed')
    );

    if ($mode !== 'per_page') {
        return $fallback;
    }

    $routes = verselinker_sanitize_language_routes(
        get_option('verselinker_language_routes', array())
    );
    $index = verselinker_get_language_version_index();
    $path = $request_path === null
        ? verselinker_get_current_request_path()
        : verselinker_normalize_language_route_path($request_path);

    if ($path === '') {
        $path = '/';
    }

    $path_match = verselinker_find_path_language_route($routes, $path);
    if ($path_match !== null) {
        return array(
            'language' => $path_match['language'],
            'version'  => $path_match['version'],
            'source'   => 'path',
        );
    }

    $document_value = $document_language === null
        ? verselinker_get_document_language()
        : $document_language;
    $language = verselinker_match_supported_language($document_value, $index);

    if ($language !== '') {
        $profile = verselinker_find_document_language_route($routes, $language);

        return array(
            'language' => $language,
            'version'  => $profile !== null
                ? $profile['version']
                : $index[$language]['default'],
            'source'   => 'document',
        );
    }

    return $fallback;
}
