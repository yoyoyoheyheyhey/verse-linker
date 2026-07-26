<?php
return [
    'settings_title' => 'Indstillinger for VerseLinker',
    'language_label' => 'Vælg sprog:',
    'version_label' => 'Vælg version:',
    'version_description' => 'Hvis du vælger en version, der kun inkluderer Det Gamle Testamente eller Det Nye Testamente, vil enhver henvisning til bøger, der ikke er inkluderet i den valgte version, blive behandlet med standardversionen. 
    For eksempel, hvis du vælger en version, der kun inkluderer Det Nye Testamente og refererer til 1 Mosebog 1:1 (fra Det Gamle Testamente), vil systemet automatisk bruge standardversionen til at hente teksten. 
    Dette sikrer, at alle henvisninger nøjagtigt linkes, selv når den valgte version ikke dækker den bog, der henvises til.',
    'plugin_description' => 'Indstillingerne for VerseLinker-pluginet giver en nem måde at tilpasse, hvordan bibelhenvisninger på din hjemmeside automatisk konverteres til interaktive links. 
    Dette plugin registrerer bibelcitater, du offentliggør (f.eks. Johannes 3:16), og konverterer dem til links, der fører til det tilsvarende afsnit på Bibliatodo.com. 
    Når du holder musen over et link, vises en pop-up med versets tekst, hvilket giver brugerne mulighed for at læse Skriften uden at forlade din side. 
    Klikker brugeren på linket, bliver vedkommende omdirigeret til hele afsnittet på Bibliatodo.com. 
    Med denne funktion forbedrer VerseLinker browsingoplevelsen ved at give øjeblikkelig adgang til bibeltekster og hjælpe dine læsere med at udforske Guds ord uden afbrydelser.',
    'save_changes' => 'Gem ændringer',
    'error_loading_languages' => 'Fejl ved indlæsning af sproglisten. Sørg for, at filen <code>/json/idiomas.json</code> findes og er gyldig.',
    'complete_bible' => 'Hele Bibelen (TB)',
    'old_testament' => 'Kun Det Gamle Testamente (GT)',
    'new_testament' => 'Kun Det Nye Testamente (NT)',
    'examples_title' => 'Test plugin-funktionaliteten',
    'examples_description' => 'Hold musen over de fremhævede bibelhenvisninger nedenfor for at se, hvordan pluginet fungerer.',
    'data_trueTooltip' => 'Aktiver tooltip i bibelske referencer.',
    'data_trueTooltip_description' => 'Her kan du aktivere tooltippet, der vises i bibelske referencer. Selvom tooltippet giver en bekvem måde at se verset på uden at forlade siden, vil denne forhåndsvisning ikke være tilgængelig, hvis det deaktiveres. Selvom dette gør grænsefladen renere, forhindrer det også automatisk indlæsning af versinformationen, hvilket betyder, at den bibelske reference kun vil blive anmodet om, når brugeren klikker på linket. Overvej, om du virkelig har brug for at deaktivere denne nyttige funktion. Fjern markeringen i boksen nedenfor, kun hvis du er sikker.',
    'data_trueCredit' => 'Vis beskeden "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Her kan du aktivere beskeden "Powered by Bibliatodo.com", som vises nederst i tooltippet. Denne besked hjælper flere mennesker med at opdage dette velsignelsesværktøj. Selvom deaktivering gør grænsefladen renere, støtter det også projektet og giver flere brugere mulighed for at drage fordel af denne ressource. Vi opfordrer dig til at holde det aktiveret for at hjælpe med at udbrede dette værktøj. Fjern kun markeringen, hvis du er sikker på, at du vil skjule det.',
    'tb' => 'Hele Bibelen',
    'solo_at' => 'Kun Det Gamle Testamente',
    'solo_nt' => 'Kun Det Nye Testamente',
    'example_references' => 'Søg på vers: Johannes 3:16
        Søg efter kapitel: Salme 91
        Kapitler i træk: Salme 91-93
        Forskellige kapitler: Salme 91,94
        Nedenstående vers: Prædikeren 11:1-7
        Vers efter grupper: Prædikeren 11:1-3,10,5
        Mange bøger og kombinationer: Johannes 1:1-4;Matthæus 2:2,6-7',
    'data_trueLinks' => 'Erstat eksisterende bibelreference-URL\'er',
    'data_trueLinks_description' => 'Aktivér denne indstilling for automatisk at erstatte eksisterende bibelreference-URL\'er med VerseLinker-formatet. Ved at gøre dette vil alle referencer på din hjemmeside drage fordel af værktøjstip-funktionen og andre funktioner. Hvis du deaktiverer dette afkrydsningsfelt, vil VerseLinker ikke konvertere nogen eksisterende URL\'er, hvilket giver dig mulighed for at bevare de originale links eller bruge et andet referencesystem. Fjern kun markeringen i dette felt, hvis du virkelig ønsker at beholde dine nuværende URL\'er uændrede.',
];