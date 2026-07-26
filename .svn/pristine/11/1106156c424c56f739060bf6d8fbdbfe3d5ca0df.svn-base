<?php
/**
 * Plugin Name: VerseLinker
 * Plugin URI: https://wordpress.org/plugins/verselinker/
 * Description: Automatically link Bible verses in your WordPress content. VerseLinker detects scripture references and transforms them into interactive links, allowing users to view verse text directly on your site or access additional context on Bibliatodo.com. Enhance your content with seamless Bible integration!
 * Version: 1.1.5
 * Requires at least: 5.2
 * Author: BibliaTodo.com
 * Author URI: https://www.bibliatodo.com/en/verselinker
 * License: GPL2
 * Text Domain: verselinker
 */

// Evitar accesos directos
if (!defined('ABSPATH')) {
    exit;
}

// Definir constantes
define('VERSELINKER_PATH', plugin_dir_path(__FILE__));
define('VERSELINKER_URL', plugin_dir_url(__FILE__));
define('VERSELINKER_VERSION', '1.1.5');

// Incluir archivos
require_once VERSELINKER_PATH . 'includes/helpers.php';
require_once VERSELINKER_PATH . 'includes/scripts.php';
require_once VERSELINKER_PATH . 'includes/admin-settings.php';

// Cargar traducciones
add_action('plugins_loaded', function () {
    // Obtener idioma predeterminado desde WordPress
    $locale = get_locale(); // Idioma de WordPress, e.g., "es_ES"
    $translations_path = VERSELINKER_PATH . 'includes/translations/';

    // Obtener idioma del plugin configurado por el usuario
    $selected_language = sanitize_text_field(get_option('verselinker_language', 'en'));


    // Si no hay idioma seleccionado, validar usando el idioma de WordPress
    if (!$selected_language) {
        // Intentar cargar el idioma completo
        $idiomas = verselinker_fetch_languages_json();
        $available_languages = is_array($idiomas) && isset($idiomas['languages']) 
            ? array_column($idiomas['languages'], 'abreviacion') 
            : [];


        // Verificar el idioma completo (e.g., "es_ES")
        if (in_array($locale, $available_languages)) {
            $selected_language = $locale;
        } else {
            // Reducir al idioma base (e.g., "es")
            $base_locale = explode('_', $locale)[0];
            $selected_language = in_array($base_locale, $available_languages) ? $base_locale : 'en';
        }

        // Guardar el idioma predeterminado detectado
        update_option('verselinker_language', $selected_language);
    }

    // Cargar el archivo de traducción
    $translation_file = $translations_path . $selected_language . '.php';

    if (!file_exists($translation_file)) {
        // Usar inglés como predeterminado si el archivo no existe
        $translation_file = $translations_path . 'en.php';
    }

    global $verseLinkerTranslations;
    $verseLinkerTranslations = require $translation_file;
});


function verselinker_add_action_links($links) {
    // Obtener el idioma seleccionado, o usar "en" como predeterminado si no está configurado
    $selected_language = sanitize_text_field(get_option('verselinker_language', 'en'));
    
    // Comprobar si el idioma seleccionado está disponible
    $idiomas = verselinker_fetch_languages_json(); // Asegúrate de que esta función esté disponible
    $available_languages = array_column($idiomas['languages'], 'abreviacion');
    $faq_language = in_array($selected_language, $available_languages) ? $selected_language : 'en';

    // Construir los enlaces utilizando traducciones estándar
    $settings_link = '<a href="admin.php?page=verselinker">' . esc_html__('Settings', 'verselinker') . '</a>';
    $faq_link = '<a href="https://www.bibliatodo.com/' . esc_attr($faq_language) . '/verselinker">' . esc_html__('FAQ', 'verselinker') . '</a>';


    // Agregar los enlaces al principio del array de enlaces
    array_unshift($links, $faq_link, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'verselinker_add_action_links');