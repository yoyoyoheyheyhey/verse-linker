<?php
return [
    'settings_title' => 'VerseLinker Settings',
    'language_label' => 'Select Language:',
    'version_label' => 'Select Version:',
    'version_description' => 'If you select a version that includes only the Old Testament or the New Testament, any references to books not included in the selected version will be processed using the default version. 
    For example, if you choose a version that includes only the New Testament and reference Genesis 1:1 (from the Old Testament), the system will automatically use the default version to retrieve the text. 
    This ensures that all references are accurately linked, even when the selected version does not cover the referenced book.',
    'plugin_description' => 'The VerseLinker plugin settings provide a simple way to customize how Bible references on your website are automatically transformed into interactive links. 
    This plugin detects the Bible citations you publish (e.g., John 3:16) and converts them into links leading to the corresponding passage on Bibliatodo.com. 
    Hovering over a link displays a tooltip with the verse text, allowing users to read the Scripture without leaving your page. 
    If the user clicks on the link, they will be taken to the full passage on Bibliatodo.com. 
    With this functionality, VerseLinker enhances the browsing experience by providing immediate access to Bible texts, helping your readers explore God’s Word seamlessly.',
    'save_changes' => 'Save Changes',
    'error_loading_languages' => 'Error loading the language list. Please ensure the file <code>/json/idiomas.json</code> exists and is valid.',
    'complete_bible' => 'Complete Bible (TB)',
    'old_testament' => 'Old Testament Only (AT)',
    'new_testament' => 'New Testament Only (NT)',
    'examples_title' => 'Test the plugin functionality',
    'examples_description' => 'Hover over the highlighted Bible references below to see how the plugin works.',
    'data_trueTooltip' => 'Enable tooltip in Bible references.',
    'data_trueTooltip_description' => 'Here you can enable the tooltip that appears in Bible references. Although the tooltip provides a convenient way to view the verse without leaving the page, disabling it will make this preview unavailable. While this cleans up the interface, it will also prevent the automatic loading of verse information, meaning the Bible reference will only be requested when the user clicks on the link. Consider whether you really need to disable this useful feature. Uncheck the box below only if you are sure.',
    'data_trueCredit' => 'Display the message "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Here you can enable the message "Powered by Bibliatodo.com," which appears at the bottom of the tooltip. This message helps more people discover this blessing tool. While disabling it cleans up the interface, keeping it visible supports the project and allows more users to benefit from this resource. We encourage you to keep it enabled to help spread this tool. Leave the box unchecked only if you are sure you want to hide it.',
    'tb' => 'Complete Bibles',
    'solo_at' => 'Only Old Testament',
    'solo_nt' => 'Only New Testament',
    'example_references' => 'Search by verse: John 3:16
        Search by chapter: Psalms 91
        Chapters in a row: Psalms 91-93
        Different chapters: Psalms 91,94
        Verses below: Ecclesiastes 11:1-7
        Verses by groups: Ecclesiastes 11:1-3,10,5
        Many books and combinations: 1 John 1:1-4;matthew 2:2,6-7',
    'data_trueLinks' => 'Replace existing Bible reference URLs',
    'data_trueLinks_description' => 'Enable this option to automatically replace existing Bible reference URLs with the VerseLinker format. By doing so, all references on your site will benefit from the tooltip feature and other functions. If you disable this checkbox, VerseLinker will not convert any existing URLs, allowing you to preserve the original links or use a different referencing system. Only uncheck this box if you truly want to keep your current URLs intact.',
];