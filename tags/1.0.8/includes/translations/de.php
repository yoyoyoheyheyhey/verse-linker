<?php
return [
    'settings_title' => 'VerseLinker-Einstellungen',
    'language_label' => 'Sprache auswählen:',
    'version_label' => 'Version auswählen:',
    'version_description' => 'Wenn Sie eine Version auswählen, die nur das Alte oder Neue Testament enthält, werden alle Verweise auf Bücher, die nicht in der ausgewählten Version enthalten sind, mit der Standardversion verarbeitet. 
    Zum Beispiel: Wenn Sie eine Version auswählen, die nur das Neue Testament enthält, und auf Genesis 1:1 (aus dem Alten Testament) verweisen, verwendet das System automatisch die Standardversion, um den Text abzurufen. 
    Dies stellt sicher, dass alle Verweise genau verlinkt werden, auch wenn die ausgewählte Version das Buch nicht abdeckt.',
    'plugin_description' => 'Die VerseLinker-Plugin-Einstellungen bieten eine einfache Möglichkeit, zu personalisieren, wie biblische Verweise auf Ihrer Website automatisch in interaktive Links umgewandelt werden. 
    Dieses Plugin erkennt biblische Zitate, die Sie veröffentlichen (z. B. Johannes 3:16), und konvertiert sie in Links, die zu der entsprechenden Passage auf Bibliatodo.com führen. 
    Wenn Sie mit der Maus über einen Link fahren, wird ein Pop-up-Fenster mit dem Vers-Text angezeigt, sodass die Benutzer die Schrift lesen können, ohne Ihre Seite zu verlassen. 
    Wenn der Benutzer auf den Link klickt, wird er zur vollständigen Passage auf Bibliatodo.com weitergeleitet. 
    Mit dieser Funktion verbessert VerseLinker die Benutzererfahrung, indem es einen sofortigen Zugriff auf biblische Texte ermöglicht und Ihren Lesern hilft, das Wort Gottes ohne Unterbrechung zu erkunden.',
    'save_changes' => 'Änderungen speichern',
    'error_loading_languages' => 'Fehler beim Laden der Sprachenliste. Überprüfen Sie, ob die Datei <code>/json/idiomas.json</code> existiert und gültig ist.',
    'complete_bible' => 'Gesamte Bibel (TB)',
    'old_testament' => 'Nur Altes Testament (AT)',
    'new_testament' => 'Nur Neues Testament (NT)',
    'examples_title' => 'Testen Sie das Plugin',
    'examples_description' => 'Fahren Sie mit der Maus über die hervorgehobenen Bibelstellen unten, um zu sehen, wie das Plugin funktioniert.',
    'data_trueTooltip' => 'Tooltip bei biblischen Verweisen aktivieren.',
    'data_trueTooltip_description' => 'Hier kannst du das Tooltip aktivieren, das bei biblischen Verweisen erscheint. Obwohl das Tooltip eine bequeme Möglichkeit bietet, den Vers anzuzeigen, ohne die Seite zu verlassen, ist diese Vorschau nicht verfügbar, wenn es deaktiviert wird. Dies sorgt zwar für eine aufgeräumtere Benutzeroberfläche, verhindert jedoch auch das automatische Laden der Versinformationen. Das bedeutet, dass die biblische Referenz erst angefordert wird, wenn der Benutzer auf den Link klickt. Überlege gut, ob du diese nützliche Funktion wirklich deaktivieren möchtest. Deaktiviere das Kontrollkästchen unten nur, wenn du sicher bist.',
    'data_trueCredit' => 'Die Nachricht "Powered by Bibliatodo.com" anzeigen.',
    'data_trueCredit_description' => 'Hier kannst du die Nachricht "Powered by Bibliatodo.com" aktivieren, die am unteren Rand des Tooltips erscheint. Diese Nachricht hilft, dass mehr Menschen von diesem wertvollen Tool erfahren. Das Deaktivieren sorgt zwar für eine aufgeräumtere Benutzeroberfläche, aber das Sichtbarlassen unterstützt das Projekt und ermöglicht es mehr Nutzern, von dieser Ressource zu profitieren. Wir empfehlen dir, es aktiviert zu lassen, um die Verbreitung dieses Tools zu unterstützen. Lasse das Kontrollkästchen nur deaktiviert, wenn du sicher bist, dass du es ausblenden möchtest.',
    'tb' => 'Komplette Bibeln',
    'solo_at' => 'Nur Altes Testament',
    'solo_nt' => 'Nur Neues Testament',
    'example_references' => 'Suche nach Vers: Johannes 3:16
        Suche nach Kapitel: Psalm 91
        Kapitel hintereinander: Psalm 91-93
        Verschiedene Kapitel: Psalm 91,94
        Nachfolgende Verse: Prediger 11:1-7
        Verse nach Gruppen: Prediger 11:1-3,10,5
        Viele Bücher und Kombinationen: Johannes 1:1-4;Matthäus 2:2,6-7',
    'data_trueLinks' => 'Bestehende Bibelverweis-URLs ersetzen',
    'data_trueLinks_description' => 'Aktivieren Sie diese Option, um bestehende Bibelverweis-URLs automatisch im VerseLinker-Format zu ersetzen. Dadurch profitieren alle Verweise auf Ihrer Website von der Tooltip-Funktion und anderen Features. Wenn Sie dieses Kontrollkästchen deaktivieren, wird VerseLinker keine bestehenden URLs umwandeln, sodass Sie die ursprünglichen Links beibehalten oder ein anderes Verweissystem verwenden können. Deaktivieren Sie dieses Kontrollkästchen nur, wenn Sie Ihre aktuellen URLs wirklich unverändert lassen möchten.',
];