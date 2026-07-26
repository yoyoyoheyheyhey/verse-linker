<?php
return [
    'settings_title' => 'Configuració de VerseLinker',
    'language_label' => 'Selecciona idioma:',
    'version_label' => 'Selecciona versió:',
    'version_description' => 'Si selecciones una versió que només inclogui l\'Antic Testament o el Nou Testament, qualsevol referència a llibres que no estiguin en la versió seleccionada es processarà utilitzant la versió predeterminada. Per exemple, si tries una versió que només inclogui el Nou Testament i fas referència a Gènesi 1:1 (de l\'Antic Testament), el sistema utilitzarà automàticament la versió predeterminada per recuperar el text. Això assegura que totes les referències estiguin enllaçades amb precisió, encara que la versió seleccionada no inclogui el llibre referenciat.',
    'plugin_description' => 'Les opcions de configuració del plugin VerseLinker ofereixen una manera senzilla de personalitzar com les referències bíbliques al teu lloc web es converteixen automàticament en enllaços interactius. Aquest plugin detecta les cites bíbliques que publiques (per exemple, Joan 3:16) i les converteix en enllaços que dirigeixen al passatge corresponent a Bibliatodo.com. Quan el cursor passa per sobre d\'un enllaç, apareix un quadre emergent amb el text del verset, cosa que permet als usuaris llegir les Escriptures sense sortir de la teva pàgina. Si l\'usuari fa clic a l\'enllaç, serà redirigit al passatge complet a Bibliatodo.com. Amb aquesta funcionalitat, VerseLinker millora l\'experiència de navegació facilitant l\'accés immediat als textos bíblics i ajudant als teus lectors a explorar la Paraula de Déu sense interrupcions.',
    'save_changes' => 'Desa els canvis',
    'error_loading_languages' => 'Error en carregar la llista d\'idiomes. Comprova que el fitxer <code>/json/idiomas.json</code> existeix i és vàlid.',
    'complete_bible' => 'Bíblia completa (TB)',
    'old_testament' => 'Només Antic Testament (AT)',
    'new_testament' => 'Només Nou Testament (NT)',
    'examples_title' => 'Prova el funcionament del plugin',
    'examples_description' => 'Passa el cursor sobre les referències bíbliques destacades a continuació per veure com funciona el plugin.',
    'data_trueTooltip' => 'Activar la informació sobre eines en referències bíbliques.',
    'data_trueTooltip_description' => 'Aquí pots activar la informació sobre eines que apareix en les referències bíbliques. Encara que aquesta eina ofereix una manera còmoda de veure el vers sense sortir de la pàgina, si la desactives, aquesta previsualització no estarà disponible. Tot i que això neteja la interfície, també impedirà la càrrega automàtica de la informació del vers, cosa que significa que la referència bíblica només es sol·licitarà quan l’usuari faci clic a l’enllaç. Considera si realment necessites desactivar aquesta funció útil. Desmarca la casella a continuació només si n\'estàs segur.',
    'data_trueCredit' => 'Mostrar el missatge "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Aquí pots activar el missatge "Powered by Bibliatodo.com", que apareix a la part inferior de la informació sobre eines. Aquest missatge ajuda a donar a conèixer aquesta eina de benedicció. Encara que desactivar-lo neteja la interfície, mantenir-lo visible dona suport al projecte i permet que més usuaris es beneficiïn d’aquesta eina. Et recomanem que l’activis per ajudar a difondre aquesta eina. Deixa la casella desmarcada només si estàs segur que vols ocultar-lo.',
    'tb' => 'Bíbliques completes',
    'solo_at' => 'Només Antic Testament',
    'solo_nt' => 'Només Nou Testament',
    'example_references' => 'Cerca per vers: Joan 3:16
        Cerca per capítol: Salms 91
        Capítols seguits: Salms 91-93
        Diferents capítols: Salms 91,94
        A continuació els versos: Cohèlet 11:1-7
        Versos per grups: Cohèlet 11:1-3,10,5
        Molts llibres i combinacions: Joan 1:1-4;Mateu 2:2,6-7',
    'data_trueLinks' => 'Reemplaça les URL de referència bíblica existents',
    'data_trueLinks_description' => 'Activa aquesta opció per substituir automàticament les URL de referència bíblica existents pel format VerseLinker. En fer-ho, totes les referències del teu lloc es beneficiaran de la funció de suggeriment emergent i altres característiques. Si desmarques aquesta casella, VerseLinker no convertirà cap URL existent, permetent-te conservar els enllaços originals o utilitzar un sistema de referències diferent. Desmarca aquesta casella només si realment vols mantenir les teves URL actuals intactes.',
];