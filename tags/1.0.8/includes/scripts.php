<?php
// Evitar accesos directos
if (!defined('ABSPATH')) {
    exit;
}

// Agregar scripts al frontend
function verselinker_enqueue_frontend_scripts() {
    // Cargar el script principal del frontend
    wp_enqueue_script(
        'verselinker-frontend',
        VERSELINKER_URL . 'assets/js/verselinker.js', // Ruta del archivo JS
        [], // Dependencias
        VERSELINKER_VERSION, // Versión del plugin
        true // Cargar en el footer
    );

    // Obtener las opciones
    $lang = sanitize_text_field(get_option('verselinker_language', 'en'));
    $version = sanitize_text_field(get_option('verselinker_version', 'KJV'));
    $data_trueTooltip = get_option('verseLinker_data_trueTooltip', false);
    $data_trueCredit = get_option('verseLinker_data_trueCredit', true);
    $data_trueLinks = get_option('verseLinker_data_trueLinks', false);

    
    

    // Agregar un filtro para modificar la etiqueta script
    add_filter('script_loader_tag', 'verselinker_add_attributes_to_script', 10, 3);
}
add_action('wp_enqueue_scripts', 'verselinker_enqueue_frontend_scripts');

// Función para agregar atributos a la etiqueta script
function verselinker_add_attributes_to_script($tag, $handle, $src) {
    if ('verselinker-frontend' === $handle) {
        // Obtener las opciones
        $lang = sanitize_text_field(get_option('verselinker_language', 'en'));
        $version = sanitize_text_field(get_option('verselinker_version', 'KJV'));
        $data_trueTooltip = get_option('verseLinker_data_trueTooltip', true) ? 'true' : 'false';
        $data_trueCredit = get_option('verseLinker_data_trueCredit', false) ? 'true' : 'false';
        $data_trueLinks = get_option('verseLinker_data_trueLinks', true) ? 'true' : 'false';
        

        // Construir los atributos
        $attributes = ' lang="' . esc_attr($lang) . '"';
        $attributes .= ' version="' . esc_attr($version) . '"';
        if ($data_trueTooltip === 'false') {
            $attributes .= ' data-trueTooltip="false"';
        }
        if ($data_trueCredit === 'false') {
            $attributes .= ' data-trueCredit="false"';
        }
        if ($data_trueLinks === 'false') {
            $attributes .= ' data-trueLinks="false"';
        }

        // Modificar la etiqueta script
        $tag = str_replace('<script ', '<script ' . $attributes . ' ', $tag);
    }
    return $tag;
}

// Agregar scripts y lógica para el área de administración
function verselinker_enqueue_admin_scripts($hook) {
    if ($hook !== 'settings_page_verselinker') {
        return; // Solo cargar en la página del plugin
    }

    // Cargar el script de administración
    wp_enqueue_script(
        'verselinker-admin-script',
        VERSELINKER_URL . 'assets/js/admin-script.js', // Ruta del archivo JS
        ['jquery'], // Dependencias
        VERSELINKER_VERSION, // Versión del plugin
        true // Cargar en el footer
    );

    // Pasar datos dinámicos al script
    wp_localize_script('verselinker-admin-script', 'verselinkerData', array(
        'json_url' => esc_url(VERSELINKER_URL . 'json/idiomas.json'), // Ruta del JSON
    ));

    // Cargar el script para detección de referencias bíblicas
    wp_enqueue_script(
        'verselinker',
        VERSELINKER_URL . 'assets/js/verselinker.js', // Ruta local del archivo
        [],
        VERSELINKER_VERSION, // Usar la constante de versión del plugin
        true
    );

    // Agregar un filtro para modificar la etiqueta script
    add_filter('script_loader_tag', 'verselinker_add_attributes_to_admin_script', 10, 3);
}
add_action('admin_enqueue_scripts', 'verselinker_enqueue_admin_scripts');

// Función para agregar atributos a la etiqueta script en el área de administración
function verselinker_add_attributes_to_admin_script($tag, $handle, $src) {
    if ('verselinker' === $handle) {
        // Valores por defecto para la administración
        $lang = sanitize_text_field(get_option('verselinker_language', 'en'));
        $version = sanitize_text_field(get_option('verselinker_version', 'KJV'));
        $data_trueTooltip = get_option('verseLinker_data_trueTooltip', true) ? 'true' : 'false';
        $data_trueCredit = get_option('verseLinker_data_trueCredit', false) ? 'true' : 'false';
        $data_trueLinks = get_option('verseLinker_data_trueLinks', true) ? 'true' : 'false';

        // Construir los atributos
        $attributes = ' lang="' . esc_attr($lang) . '"';
        $attributes .= ' version="' . esc_attr($version) . '"';
        if ($data_trueTooltip === 'false') {
            $attributes .= ' data-trueTooltip="false"';
        }
        if ($data_trueCredit === 'false') {
            $attributes .= ' data-trueCredit="false"';
        }
        if ($data_trueLinks === 'false') {
            $attributes .= ' data-trueLinks="false"';
        }

        // Modificar la etiqueta script
        $tag = str_replace('<script ', '<script ' . $attributes . ' ', $tag);
    }
    return $tag;
}