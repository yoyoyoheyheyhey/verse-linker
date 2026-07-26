<?php
// Evitar accesos directos
if (!defined('ABSPATH')) {
    exit;
}

// Cargar JSON de idiomas utilizando WP_Filesystem
function verselinker_fetch_languages_json() {
    global $wp_filesystem;

    // Inicializar WP_Filesystem
    if (!function_exists('WP_Filesystem')) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }
    if (!WP_Filesystem()) {
        return null;
    }

    $file_path = VERSELINKER_PATH . 'json/idiomas.json';

    // Verificar si el archivo existe
    if (!$wp_filesystem->exists($file_path)) {
        return null;
    }

    // Leer el contenido del archivo
    $json_content = $wp_filesystem->get_contents($file_path);

    if ($json_content === false) {
        return null;
    }

    $data = json_decode($json_content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return null;
    }

    return $data;
}



function verselinker_detect_language($locale, $idiomas) {
    // Verificar si la estructura de $idiomas es válida
    if (!isset($idiomas['languages']) || !is_array($idiomas['languages'])) {
        return 'en'; // Idioma predeterminado
    }

    $available_languages = array_column($idiomas['languages'], 'abreviacion');

    // Verificar el idioma completo
    if (in_array($locale, $available_languages)) {
        return $locale;
    }

    // Reducir al idioma base y verificar
    $base_locale = explode('_', $locale)[0];
    if (in_array($base_locale, $available_languages)) {
        return $base_locale;
    }

    // Devolver el idioma predeterminado (en)
    return 'en';
}

function verselinker_sanitize_checkbox($input) {
    // Validar que el valor sea un booleano
    return (in_array($input, array(true, 'true', '1', 'on', 'yes'), true));
}