<?php
// Evitar accesos directos
if (!defined('ABSPATH')) {
    exit;
}

// Registrar configuraciones
function verselinker_register_settings() {
    register_setting('verselinker_options', 'verselinker_language', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'en'
    ));
    register_setting('verselinker_options', 'verselinker_version', array(
        'type'              => 'string',
        'sanitize_callback' => 'verselinker_sanitize_version_for_language',
        'default'           => 'KJV'
    ));

    register_setting(
        'verselinker_options',
        'verseLinker_data_trueTooltip',
        array(
            'type'              => 'boolean',
            'sanitize_callback' => 'verselinker_sanitize_checkbox',
            'default'           => true,
        )
    );
    register_setting(
        'verselinker_options',
        'verseLinker_data_trueCredit',
        array(
            'type'              => 'boolean',
            'sanitize_callback' => 'verselinker_sanitize_checkbox',
            'default'           => false,
        )
    );
    register_setting(
        'verselinker_options',
        'verseLinker_data_trueLinks',
        array(
            'type'              => 'boolean',
            'sanitize_callback' => 'verselinker_sanitize_checkbox',
            'default'           => true,
        )
    );
    register_setting(
        'verselinker_options',
        'verselinker_keep_default_exclusions',
        array(
            'type'              => 'boolean',
            'sanitize_callback' => 'verselinker_sanitize_checkbox',
            'default'           => true,
        )
    );
    register_setting(
        'verselinker_options',
        'verselinker_excluded_classes',
        array(
            'type'              => 'string',
            'sanitize_callback' => 'verselinker_sanitize_exclusion_list',
            'default'           => '',
        )
    );
    register_setting(
        'verselinker_options',
        'verselinker_excluded_ids',
        array(
            'type'              => 'string',
            'sanitize_callback' => 'verselinker_sanitize_exclusion_list',
            'default'           => '',
        )
    );
}
add_action('admin_init', 'verselinker_register_settings');

// Agregar página de opciones
function verselinker_add_options_page() {
    add_options_page(
        __('VerseLinker Settings', 'verselinker'),
        'VerseLinker',
        'manage_options',
        'verselinker',
        'verselinker_options_page'
    );
}
add_action('admin_menu', 'verselinker_add_options_page');



// Mostrar página de opciones
function verselinker_options_page() {
    global $verseLinkerTranslations; // Cargar traducciones
    $idiomas = verselinker_fetch_languages_json();
    if (!$idiomas || !isset($idiomas['languages'])) {
        echo '<div class="error"><p>' . esc_html($verseLinkerTranslations['error_loading_languages']) . '</p></div>';
        return;
    }

    $selected_language = sanitize_text_field(get_option('verselinker_language', 'en'));
    $selected_version = sanitize_text_field(get_option('verselinker_version', ''));
    $verseLinker_data_trueTooltip = filter_var(get_option('verseLinker_data_trueTooltip', true), FILTER_VALIDATE_BOOLEAN);
    $verseLinker_data_trueCredit = filter_var(get_option('verseLinker_data_trueCredit', false), FILTER_VALIDATE_BOOLEAN);
    $verseLinker_data_trueLinks = filter_var(get_option('verseLinker_data_trueLinks', true), FILTER_VALIDATE_BOOLEAN);
    $verselinker_keep_default_exclusions = verselinker_sanitize_checkbox(
        get_option('verselinker_keep_default_exclusions', true)
    );
    $verselinker_excluded_classes = verselinker_sanitize_exclusion_list(
        get_option('verselinker_excluded_classes', '')
    );
    $verselinker_excluded_ids = verselinker_sanitize_exclusion_list(
        get_option('verselinker_excluded_ids', '')
    );


    include VERSELINKER_PATH . 'includes/templates/admin-options.php';
}
