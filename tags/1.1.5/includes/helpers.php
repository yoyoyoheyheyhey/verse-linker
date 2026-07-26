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


// Evita usar $_POST directamente y satisface el chequeo de nonce.
add_filter('pre_update_option_verselinker_language', 'verselinker_capture_language_before_update', 10, 3);
function verselinker_capture_language_before_update($new_value, $old_value, $option) {
    // options.php ya valida nonce; aun así comprobamos capacidad.
    if ( ! current_user_can('manage_options') ) {
        return $old_value;
    }
    // Desescapar + sanear
    $GLOBALS['verselinker_pending_language'] = sanitize_text_field( wp_unslash( $new_value ) );
    return $GLOBALS['verselinker_pending_language'];
}

function verselinker_sanitize_version_for_language( $input ) {
    $input = sanitize_text_field( wp_unslash( $input ) );

    // Idioma que se está guardando en esta misma petición (si existe),
    // si no, usamos el que ya está almacenado.
    $lang = '';
    if ( ! empty( $GLOBALS['verselinker_pending_language'] ) ) {
        $lang = sanitize_text_field( $GLOBALS['verselinker_pending_language'] );
    } else {
        $lang = sanitize_text_field( get_option( 'verselinker_language', 'en' ) );
    }

    $data = verselinker_fetch_languages_json();
    if ( ! $data || empty( $data['languages'] ) || ! is_array( $data['languages'] ) ) {
        return '';
    }

    foreach ( $data['languages'] as $l ) {
        if ( empty( $l['abreviacion'] ) || $l['abreviacion'] !== $lang ) {
            continue;
        }
        if ( ! empty( $l['versiones'] ) && is_array( $l['versiones'] ) ) {
            // ¿La versión enviada pertenece a este idioma?
            foreach ( $l['versiones'] as $v ) {
                if ( isset( $v['abreviacion'] ) && $v['abreviacion'] === $input ) {
                    return $input;
                }
            }
            // Fallback: primera versión disponible del idioma
            return isset( $l['versiones'][0]['abreviacion'] )
                ? sanitize_text_field( $l['versiones'][0]['abreviacion'] )
                : '';
        }
    }
    return '';
}