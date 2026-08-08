=== VerseLinker  ===
Contributors: BibliaTodo
Donate link: https://www.bibliatodo.com/en/verselinker
Tags: bible, Bible references, Bible Links, RefTagger, ScriptTagger
Tested up to: 6.9
Stable tag: 1.1.12
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

VerseLinker detects Bible references in WordPress content, converting them into links with tooltips and quick access to verses on Bibliatodo.com.

== Description ==

VerseLinker is a simple yet powerful plugin that automatically transforms Bible verse references in your WordPress posts and pages into interactive links. Imagine enriching your content with instant access to scripture, without lifting a finger! Just type the verse reference (e.g., John 3:16), and VerseLinker will seamlessly convert it into a clickable link, connecting your readers directly to the passage on BibliaTodo.com.

**Unlock the Power of Scripture in Multiple Languages:** VerseLinker goes beyond simple linking. It provides access to **over 3520 versions of the Bible in 2214 languages**, making it a truly global tool for sharing the Word. Engage a diverse audience and cater to readers from all corners of the world.

**VerseLinker offers two modes of operation:**

*   **Default Mode:** Links the references and displays the verse text from the BibliaTodo.com API when the user hovers the cursor over the link. This mode sends **only the Bible verse reference** to the API. **No personal information is sent.**
*   **Simple Link Mode:** Only links the Bible references to the corresponding study page on BibliaTodo.com. **No data is sent to the API in this mode.**

You can easily switch between these modes in the plugin's settings page.

**Key Features:**

*   **Effortless Integration:** No complicated setup is required. Just install and activate the plugin, and it starts working immediately.
*   **Automatic Linking:** VerseLinker intelligently detects and links Bible verse references in your content, saving you time and effort.
*   **Unparalleled Multilingual Support:**  Connect with your audience in their native language. VerseLinker supports **over 3520 Bible versions in 2214 languages**, ensuring accessibility for a global readership. Explore the available languages here: [https://www.bibliatodo.com/en/verselinker](https://www.bibliatodo.com/en/verselinker)
*   **Customizable Links:** Control the target and behavior of the links to suit your preferences.
*   **Widget Support:** Add a Bible verse widget to your sidebar for quick access to inspiring scriptures.

**Benefits:**

*   **Enhanced User Experience:** Help your readers easily access and explore Bible passages, enriching their understanding and engagement.
*   **Improved Content Quality:** Elevate your content by seamlessly integrating Bible references, adding depth and authority to your writing.
*   **Time-Saving Automation:** Free yourself from manually adding links, allowing you to focus on creating compelling content.
*   **Global Reach:**  Connect with a wider audience by providing access to scripture in their preferred language.

**Get started today and enrich your content with the power and global reach of VerseLinker!**


== External Services ==

This plugin offers an optional connection to the BibliaTodo.com API to provide enhanced functionality in **Default Mode**. This connection allows VerseLinker to display the text of Bible verses when a user hovers over a linked reference on your website.

**Transparency and User Control:**

*   **Optional Connection:** Connecting to the API is **optional**. You can choose to use VerseLinker in **Simple Link Mode**, which does not connect to any external services.
*   **Default Mode:** In Default Mode, **only the Bible verse reference** (e.g., John 3:16) is sent to the BibliaTodo.com API when a user hovers their cursor over the linked reference.
*   **No Personal Information Sent:** We **do not send** any personally identifiable information (PII) about your users or any information about your website to BibliaTodo.com.
*   **Simple Link Mode:** In this mode, no data is sent to external services, the plugin simply adds a link to the corresponding verse on BibliaTodo.com.

**Data Sent to BibliaTodo.com (Default Mode Only):**

*   **The specific Bible verse reference** (e.g., John 3:16) triggered by the user hovering over the link.

This data is used solely to retrieve the corresponding verse text from the BibliaTodo.com API and display it temporarily in a tooltip.

**Your Privacy Matters:**

We are committed to protecting your privacy and the privacy of your users. We encourage you to review the following:

*   **BibliaTodo.com Terms of Service:** [https://www.bibliatodo.com/en/website-terms-verselinker](https://www.bibliatodo.com/en/website-terms-verselinker)
*   **BibliaTodo.com Privacy Policy:** [https://www.bibliatodo.com/en/privacypolicy-verselinker](https://www.bibliatodo.com/en/privacypolicy-verselinker)

By using VerseLinker, you acknowledge and agree to the data practices described above and in the linked documents.


== Installation ==

VerseLinker is designed for ease of use and integrates seamlessly into your WordPress website.

**1. Standard Plugin Installation:**

1.  Upload the plugin files to the `/wp-content/plugins/verselinker` directory, or install the plugin through the WordPress plugins screen directly.
2.  Activate the plugin through the 'Plugins' screen in WordPress.
3.  That's it! VerseLinker will now automatically detect and link Bible verses in your posts and pages. You can configure the plugin's settings by going to **Settings > VerseLinker**.

**2. Configuration:**

1.  Go to **Settings > VerseLinker** in your WordPress admin panel.
2.  **Choose your preferred mode of operation:**
    *   **Default Mode:** Links Bible references and displays the verse text from the BibliaTodo.com API when the user hovers the cursor over the link.
    *   **Simple Link Mode:** Only links the Bible references to the corresponding study page on BibliaTodo.com. No data is sent to the API in this mode.
3.  **Select your default Bible version:** Choose the version that will be used for displaying verse text (e.g., NIV, KJV, ESV). You can find a complete list of available versions here: [link a la lista de versiones de bibliatodo.com]
4.  **Select your default language:** Choose the language for the verse text. VerseLinker supports over 3520 versions of the Bible in 2214 languages. You can find the list of supported languages on the VerseLinker page: [https://www.bibliatodo.com/en/verselinker](https://www.bibliatodo.com/en/verselinker)
5.  **Choose how the language is resolved:** Keep the default fixed mode to use the selected language and version everywhere, or enable per-page detection for multilingual sites.
6.  **Optional per-page rules:** Add site-relative URL path prefixes such as `/english/` or `/japanese/`, then select the language and Bible version for each path. The longest matching path wins. Leave the path empty to override the Bible version selected from the document `<html lang>` value. Locale variants are normalized when possible, such as `ja-JP` to `ja` and `en-US` to `en`.
7.  **Configure exclusions if needed:** The legacy default exclusion rules are enabled by default to preserve existing behavior. These rules include substring matching for `sidebar` and `widget` in class names and IDs. If a theme, plugin, or custom markup uses a conflicting name, disable the legacy rules and enter explicit class names or IDs instead.
8.  Click "Save Changes".

In per-page mode, VerseLinker resolves each request in this order: an explicit URL path mapping, a supported document `<html lang>` value, and then the fixed language and version. If the document language is supported but has no empty-path version profile, the first bundled version for that language is used. Only one language dictionary is loaded on each page.

**3. Configuring Excluded Class Names and IDs:**

*   **Legacy default exclusions:** Enabled by default. Disable them only when their broad substring matching unintentionally excludes content.
*   **Additional class names:** Enter one class name per line without a leading `.`. Additional classes use exact class-token matching, not substring matching.
*   **Additional IDs:** Enter one ID per line without a leading `#`. Additional IDs use exact ID matching, not substring matching.
*   Class names and IDs may contain ASCII letters, numbers, hyphens, and underscores. Each list accepts up to 100 names, with a maximum length of 128 characters per name.
*   Additional class names and IDs remain active whether the legacy default exclusions are enabled or disabled.
*   When the legacy rules are disabled, add `sidebar` and `widget` explicitly as additional class names if those exact class tokens should still be excluded.

**4. How VerseLinker Detects Bible References:**

VerseLinker automatically scans your content for various formats of Bible references, including:

*   **Specific verse:** `John 3:16`, `Matthew 6:33`, `Psalm 23:1`
*   **Chapter:** `Psalms 91`, `Genesis 1`, `Exodus 20`
*   **Chapters in a row:** `Psalms 91-93`, `Genesis 1-3`, `Exodus 20-22`
*   **Different chapters:** `Psalms 91,94`, `Genesis 1,3`, `Exodus 20,22`
*   **Verses in a range:** `Ecclesiastes 11:1-7`, `Romans 8:28-39`
*   **Verses in groups:** `Ecclesiastes 11:1-3,10,5`, `Romans 8:28,38-39`
*   **Multiple books and combinations:** `1 John 1:1-4; Matthew 2:2,6-7`, `Genesis 1; Exodus 20:1-17; Psalm 23`

**5. Specifying a Bible Version:**

You can specify a particular Bible version for a reference by adding the version abbreviation in parentheses after the reference. For example:

*   `John 3:16 (NIV)` will display the verse in the New International Version.
*   `Psalm 23 (KJV)` will display the verse in the King James Version.

**Note:** If no version is specified, VerseLinker will use the default version you selected in the plugin settings.


== Frequently Asked Questions ==

= What is VerseLinker? =
VerseLinker is a WordPress plugin that automatically detects and links Bible verse references in your content, making it easier for your readers to access and understand the verses.

= How do I install VerseLinker? =
You can install VerseLinker directly from the WordPress plugin directory or by uploading the plugin files manually. See the "Installation" section for detailed instructions.

= How do I configure VerseLinker? =
After activating the plugin, go to Settings > VerseLinker in your WordPress admin panel to configure the default language, Bible version, and mode of operation.

= Does VerseLinker send any personal data? =
No, VerseLinker does not send any personally identifiable information (PII) about your users or your website. In Default Mode, only the Bible verse reference is sent to BibliaTodo.com's API to retrieve the verse text. In Simple Link Mode, no data is sent to external services.

= What Bible versions are supported? =
VerseLinker supports over 3520 Bible versions in 2214 languages. You can find a complete list of available versions on the BibliaTodo.com website: [https://www.bibliatodo.com/en/verselinker](https://www.bibliatodo.com/en/verselinker)

= How can I specify a particular Bible version for a reference? =
You can specify a Bible version by adding the version abbreviation in parentheses after the reference e.g., John 3:16 (NIV).

= Where can I report issues or suggest features? =
You can report issues or suggest features by contacting us through our website: [https://www.bibliatodo.com/en/contacto/]



== Changelog ==

= 1.1.12 =
* Added: Optional per-page language and Bible version routing for multilingual sites.
* Added: URL path mappings take precedence over document language detection, with the existing fixed settings retained as a backward-compatible fallback.
* Fixed: The settings page now keeps the saved Bible version selected after reloading.
* Fixed: Removed duplicate registration of the Bible version setting.
* Added: Configurable excluded class names and IDs.
* Added: An option to enable or disable the legacy built-in exclusion rules.
* Added: A way to avoid overbroad built-in substring matching without changing the default behavior for existing installations.

= 1.0.9 =
* Improved compatibility with other plugins, especially Modern Footnotes.
* Refined the link cleanup regex to avoid removing non-Bible reference links such as footnote anchors.
* Ensured only links containing complete Bible references (book + chapter or book + chapter and verses) are affected.

= 1.0.8 =
Fixed: Resolved an issue where some menu items lost their links due to a JavaScript conflict.
Fixed: Improved handling of Bible references inside existing links to prevent unintended modifications.
Improved: Enhanced detection logic for both full and abbreviated Bible book names.
Optimized: General code refinements for better compatibility with various themes and page builders.

= 1.0.7 =
* Improved detection for semicolon-separated references (e.g., `Job 38:33;40:7-8`) without rewriting user text.
* Introduced the `data_trueLinks` setting to optionally replace external Bible reference URLs with VerseLinker’s format.
* Minor code refactoring for clarity and chapter-range checks.

= 1.0.6 =
* Introduced example references in multiple languages to improve verse searches in the VerseLinker plugin.
* Enhanced usability for users searching Bible references in various languages.  
* Please update to ensure a better multilingual experience.

= 1.0.5 =
* Added example references in multiple languages to improve Bible verse search functionality.
* Enhanced multilingual support for better usability.

= 1.0.4 =
* Enhanced: Updated to comply with WordPress plugin guidelines and best practices.
* Fixed: Corrected the "Tested up to" version to only include the major version number.
* Fixed: Removed unnecessary parameters in the `readme.txt` file.
* Enhanced: Added an option to enable/disable "Powered by" link, which is disabled by default.
* Fixed: Removed whitespace before PHP opening tags and PHP closing tags from translation files.
* Fixed: Improved sanitization and validation across plugin settings.
* Fixed: Various minor bug fixes and improvements to error handling.

= 1.0.2 =
* Enhanced: Improved compliance with WordPress plugin guidelines.
* Fixed: Eliminated unnecessary use of `error_log()` for better production safety.
* Updated: Enhanced input sanitization and validation across the plugin.
* Improved: Minor updates to error handling and default behaviors.

= 1.0.1 =
* Fixed: Resolved issues reported by the WordPress.org plugins team to ensure compliance with plugin guidelines.
* Fixed: Corrected the sanitization of the checkbox input for disabling the tooltip.
* Fixed: Improved error handling for JSON decoding in `verselinker_fetch_languages_json()`.
* Fixed: Ensured accurate boolean value checking for the `data_trueTooltip` option in script attributes.
* Fixed: Shortened the description of the "Disable Tooltip" option on the settings page for better readability.
* Fixed: Added specific error handling for JSON decoding failures.
* Fixed: Updated `readme.txt` to include links to BibliaTodo.com's Terms of Service and Privacy Policy.
* Fixed: Added a note in the "Installation" section of the `readme.txt` linking to the list of available Bible versions on BibliaTodo.com.

= 1.0 =
* Initial release.


== Upgrade Notice ==
= 1.1.12 =
Fixes the settings page so the saved Bible version remains selected after reload.

= 1.0.9 =
Improved compatibility: Adjusted the link cleanup logic to avoid conflicts with other plugins such as Modern Footnotes. Now, only links matching full Bible references (book + chapter or book + chapter and verses) are cleaned, preventing the removal of legitimate links like footnotes.
