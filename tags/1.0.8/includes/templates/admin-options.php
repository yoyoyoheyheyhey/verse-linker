<?php
// Evitar accesos directos
if (!defined('ABSPATH')) {
    exit;
}

global $verseLinkerTranslations;
?>
<div class="wrap">
    <h1 style="font-size: 2em; margin-bottom: 20px;">
        <?php echo esc_html($verseLinkerTranslations['settings_title']); ?>
    </h1>
    <form method="post" action="options.php">
        <?php settings_fields('verselinker_options'); ?>
        <?php do_settings_sections('verselinker'); ?>
        <table class="form-table" style="width: 100%; margin: 0 auto;">
            <tr valign="top">
                <th scope="row" style="text-align: left; font-weight: bold;">
                    <?php echo esc_html($verseLinkerTranslations['language_label']); ?>
                </th>
                <td>
                    <select name="verselinker_language" id="verselinker_language" style="width: 100%; padding: 10px; font-size: 1em;">
                        <?php foreach ($idiomas['languages'] as $idioma) : ?>
                            <option value="<?php echo esc_attr($idioma['abreviacion']); ?>" 
                                <?php selected($selected_language, $idioma['abreviacion']); ?>>
                                <?php echo esc_html($idioma['nombre']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row" style="text-align: left; font-weight: bold;">
                    <?php echo esc_html($verseLinkerTranslations['version_label']); ?>
                </th>
                <td>
                    <select name="verselinker_version" id="verselinker_version" style="width: 100%; padding: 10px; font-size: 1em;">
                        <?php 
                        if (!empty($idiomas['languages']) && is_array($idiomas['languages'])) {
                            foreach ($idiomas['languages'] as $idioma) {
                                if ($idioma['abreviacion'] === $selected_language && !empty($idioma['versiones'])) {

                                    // Categorías para agrupar versiones
                                    $categorias = [
                                        'tb' => esc_html($verseLinkerTranslations['tb'] ?? 'Complete Bibles'),
                                        'at' => esc_html($verseLinkerTranslations['solo_at'] ?? 'Old Testament Only'),
                                        'nt' => esc_html($verseLinkerTranslations['solo_nt'] ?? 'New Testament Only')
                                    ];

                                    // Iterar por categorías
                                    foreach ($categorias as $categoria => $titulo) {
                                        $versiones_filtradas = array_filter($idioma['versiones'], function($version) use ($categoria) {
                                            return $version['categoria'] === $categoria;
                                        });

                                        if (!empty($versiones_filtradas)) {
                                            echo '<optgroup label="' . esc_attr($titulo) . '">';
                                            foreach ($versiones_filtradas as $version) {
                                                echo '<option value="' . esc_attr($version['abreviacion']) . '" ' 
                                                    . selected($selected_version, $version['abreviacion'], false) . '>';
                                                echo esc_html($version['nombre_version']);
                                                echo '</option>';
                                            }
                                            echo '</optgroup>';
                                        }
                                    }
                                }
                            }
                        } else {
                            echo '<option value="">' . esc_html($verseLinkerTranslations['no_versions_found'] ?? 'No versions found.') . '</option>';
                        }
                        ?>
                    </select>
                    <p class="description" style="font-style: italic; color: #555;">
                        <?php echo nl2br(esc_html($verseLinkerTranslations['version_description'] ?? 'Select a version to be displayed as the priority version.')); ?>
                    </p>
                </td>


                <tr style="background: #f9f9f9; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                    <th scope="row" style="padding: 10px; vertical-align: top; text-align: left;">
                        <label for="verseLinker_data_trueTooltip" style="font-weight: bold; color: #555;">
                            <?php echo esc_html($verseLinkerTranslations['data_trueTooltip'] ?? 'Enable tooltip in Bible references.'); ?>
                        </label>
                    </th>
                    <td style="padding: 10px;">
                        <input id="verseLinker_data_trueTooltip" type="checkbox" name="verseLinker_data_trueTooltip" value="1" 
                            <?php checked($verseLinker_data_trueTooltip, true); ?>>

                        <p style="font-size: 14px; color: #777; font-style: italic; margin-top: 5px;">
                            <?php echo esc_html($verseLinkerTranslations['data_trueTooltip_description'] ?? 
                            'Here you can enable the tooltip that appears in Bible references. Although the tooltip provides a convenient way to view the verse without leaving the page, disabling it will make this preview unavailable. While this cleans up the interface, it will also prevent the automatic loading of verse information, meaning the Bible reference will only be requested when the user clicks on the link. Consider whether you really need to disable this useful feature. Uncheck the box below only if you are sure.'); ?>
                        </p>
                    </td>
                </tr>
                <tr style="background: #f9f9f9; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                    <th scope="row" style="padding: 10px; vertical-align: top; text-align: left;">
                        <label for="verseLinker_data_trueCredit" style="font-weight: bold; color: #555;">
                            <?php echo esc_html($verseLinkerTranslations['data_trueCredit'] ?? 'Display the message "Powered by Bibliatodo.com".'); ?>
                        </label>
                    </th>
                    <td style="padding: 10px;">
                        <input id="verseLinker_data_trueCredit" type="checkbox" name="verseLinker_data_trueCredit" value="1" 
                            <?php checked($verseLinker_data_trueCredit, true); ?>>

                        <p style="font-size: 14px; color: #777; font-style: italic; margin-top: 5px;">
                            <?php echo esc_html($verseLinkerTranslations['data_trueCredit_description'] ?? 
                            'Here you can enable the message "Powered by Bibliatodo.com," which appears at the bottom of the tooltip. This message helps more people discover this blessing tool. While disabling it cleans up the interface, keeping it visible supports the project and allows more users to benefit from this resource. We encourage you to keep it enabled to help spread this tool. Leave the box unchecked only if you are sure you want to hide it.'); ?>
                        </p>
                    </td>
                </tr>

                <tr style="background: #f9f9f9; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                    <th scope="row" style="padding: 10px; vertical-align: top; text-align: left;">
                        <label for="verseLinker_data_trueLinks" style="font-weight: bold; color: #555;">
                            <?php echo esc_html($verseLinkerTranslations['data_trueLinks'] ?? 'Replace existing Bible reference URLs'); ?>
                        </label>
                    </th>
                    <td style="padding: 10px;">
                        <input id="verseLinker_data_trueLinks" type="checkbox" name="verseLinker_data_trueLinks" value="1" 
                            <?php checked($verseLinker_data_trueLinks, true); ?>>

                        <p style="font-size: 14px; color: #777; font-style: italic; margin-top: 5px;">
                            <?php echo esc_html($verseLinkerTranslations['data_trueLinks_description'] ?? 
                            'Enable this option to automatically replace existing Bible reference URLs with the VerseLinker format. By doing so, all references on your site will benefit from the tooltip feature and other functions. If you disable this checkbox, VerseLinker will not convert any existing URLs, allowing you to preserve the original links or use a different referencing system. Only uncheck this box if you truly want to keep your current URLs intact.'); ?>
                        </p>
                    </td>
                </tr>
            </tr>
        </table>
        <div style="margin-top: 20px;">
            <?php submit_button(esc_html($verseLinkerTranslations['save_changes']), 'primary', 'submit', false); ?>
        </div>
    </form><br/>

    <!-- Ejemplos de funcionamiento -->
    <div style="margin-top: 40px;">
        <h2 style="font-size: 1.5em; margin-bottom: 20px;">
            <?php echo esc_html($verseLinkerTranslations['examples_title']); ?>
        </h2>
        <p style="color: #333; font-size: 1.2em;">
            <?php echo nl2br(esc_html($verseLinkerTranslations['examples_description'])); ?>
        </p>
        <div style="background: #f9f9f9; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
            <ul style="list-style-type: none; padding: 0; margin: 0; font-size: 1.2em; line-height: 1.8;">
                <?php

                $lines = $verseLinkerTranslations['example_references'] ?? 'Search by verse: John 3:16
                    Search by chapter: Psalms 91
                    Chapters in a row: Psalms 91-93
                    Different chapters: Psalms 91,94
                    Verses below: Ecclesiastes 11:1-7
                    Verses by groups: Ecclesiastes 11:1-3,10,5
                    Many books and combinations: 1 John 1:1-4;matthew 2:2,6-7';

                $lines = nl2br(esc_html($lines));
                $lines = explode("<br />", $lines);

                foreach ($lines as $line) {
                    $line = trim($line); // Evitar líneas vacías
                    if (!empty($line)) {
                        echo "<li><strong>" . esc_html($line) . "</strong></li>\n";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>