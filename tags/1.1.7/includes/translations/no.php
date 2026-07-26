<?php
return [
    'settings_title' => 'Innstillinger for VerseLinker',
    'language_label' => 'Velg språk:',
    'version_label' => 'Velg versjon:',
    'version_description' => 'Hvis du velger en versjon som kun inkluderer Det gamle testamentet eller Det nye testamentet, vil referanser til bøker som ikke er inkludert i den valgte versjonen bli behandlet ved hjelp av standardversjonen. 
    For eksempel, hvis du velger en versjon som kun inkluderer Det nye testamentet og refererer til 1. Mosebok 1:1 (fra Det gamle testamentet), vil systemet automatisk bruke standardversjonen for å hente teksten. 
    Dette sikrer at alle referanser kobles korrekt, selv når den valgte versjonen ikke dekker boken det refereres til.',
    'plugin_description' => 'Konfigurasjonsalternativene for VerseLinker-pluginen gir en enkel måte å tilpasse hvordan bibelreferanser på nettstedet ditt automatisk blir gjort om til interaktive lenker. 
    Denne pluginen oppdager bibelversene du publiserer (f.eks. Johannes 3:16) og gjør dem om til lenker som leder til det aktuelle verset på Bibliatodo.com. 
    Når du holder musepekeren over en lenke, vises en popup med teksten til verset, slik at brukerne kan lese Skriften uten å forlate siden din. 
    Hvis brukeren klikker på lenken, blir de sendt til hele verset på Bibliatodo.com. 
    Med denne funksjonaliteten forbedrer VerseLinker nettleseropplevelsen ved å gi umiddelbar tilgang til bibeltekster, og hjelper leserne dine med å utforske Guds Ord uten avbrudd.',
    'save_changes' => 'Lagre endringer',
    'error_loading_languages' => 'Feil ved lasting av språkliste. Sjekk at filen <code>/json/idiomas.json</code> eksisterer og er gyldig.',
    'complete_bible' => 'Hele Bibelen (HB)',
    'old_testament' => 'Kun Det gamle testamentet (GT)',
    'new_testament' => 'Kun Det nye testamentet (NT)',
    'examples_title' => 'Test funksjonaliteten til pluginen',
    'examples_description' => 'Hold musepekeren over de uthevede bibelreferansene nedenfor for å se hvordan pluginen fungerer.',
    'data_trueTooltip' => 'Aktiver verktøytips i bibelhenvisninger.',
    'data_trueTooltip_description' => 'Her kan du aktivere verktøytipset som vises i bibelhenvisninger. Selv om verktøytipset gir en praktisk måte å se verset uten å forlate siden, vil denne forhåndsvisningen ikke være tilgjengelig hvis den deaktiveres. Selv om dette gjør grensesnittet renere, vil det også hindre automatisk lasting av versinformasjonen, noe som betyr at bibelhenvisningen kun vil bli forespurt når brukeren klikker på lenken. Vurder om du virkelig trenger å deaktivere denne nyttige funksjonen. Fjern avmerkingen nedenfor bare hvis du er sikker.',
    'data_trueCredit' => 'Vis meldingen "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Her kan du aktivere meldingen "Powered by Bibliatodo.com", som vises nederst i verktøytipset. Denne meldingen hjelper flere mennesker med å oppdage dette nyttige verktøyet. Selv om deaktivering renser opp i grensesnittet, støtter det også prosjektet og lar flere brukere dra nytte av denne ressursen. Vi oppfordrer deg til å holde det aktivert for å bidra til å spre dette verktøyet. La boksen være uavmerket bare hvis du er sikker på at du vil skjule den.',
    'tb' => 'Hele Bibelen',
    'solo_at' => 'Kun Det gamle testamentet',
    'solo_nt' => 'Kun Det nye testamentet',
    'example_references' => 'Søk etter vers: Johannes 3:16
        Søk etter kapittel: Salmene 91
        Kapitler på rad: Salmene 91-93
        Ulike kapitler: Salmene 91,94
        Versene nedenfor: Forkynneren 11:1-7
        Vers etter grupper: Forkynneren 11:1-3,10,5
        Mange bøker og kombinasjoner: Johannes 1:1-4;Matteus 2:2,6-7',
    'data_trueLinks' => 'Erstatt eksisterende bibelreferanse-URL-er',
    'data_trueLinks_description' => 'Aktiver dette alternativet for automatisk å erstatte eksisterende bibelreferanse-URL-er med VerseLinker-formatet. Ved å gjøre dette vil alle referanser på nettstedet ditt dra nytte av verktøytipsfunksjonen og andre funksjoner. Hvis du deaktiverer denne avmerkingsboksen, vil ikke VerseLinker konvertere noen eksisterende URL-er, slik at du kan beholde de originale koblingene eller bruke et annet referansesystem. Fjern bare merket for denne boksen hvis du virkelig vil beholde de nåværende URL-ene dine uendret.',
];