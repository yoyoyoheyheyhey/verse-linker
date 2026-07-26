<?php
return [
    'settings_title' => 'Inställningar för VerseLinker',
    'language_label' => 'Välj språk:',
    'version_label' => 'Välj version:',
    'version_description' => 'Om du väljer en version som bara innehåller Gamla eller Nya testamentet kommer referenser till böcker som inte ingår i den valda versionen att bearbetas med standardversionen. 
    Till exempel, om du väljer en version som endast innehåller Nya testamentet och hänvisar till 1 Mosebok 1:1 (i Gamla testamentet), kommer systemet automatiskt att använda standardversionen för att hämta texten. 
    Detta säkerställer att alla referenser är exakt länkade, även när den valda versionen inte täcker boken som refereras till.',
    'plugin_description' => 'Inställningarna för VerseLinker-pluginet erbjuder ett enkelt sätt att anpassa hur bibliska referenser på din webbplats automatiskt omvandlas till interaktiva länkar. 
    Detta plugin identifierar bibelreferenser som du publicerar (t.ex. Johannes 3:16) och omvandlar dem till länkar som leder till motsvarande avsnitt på Bibliatodo.com. 
    När du håller muspekaren över en länk visas en pop-up med versens text, vilket låter användare läsa Skriften utan att lämna din sida. 
    Om användaren klickar på länken skickas de till hela avsnittet på Bibliatodo.com. 
    Med denna funktion förbättrar VerseLinker surfupplevelsen genom att erbjuda omedelbar åtkomst till bibliska texter och hjälper dina läsare att utforska Guds ord utan avbrott.',
    'save_changes' => 'Spara ändringar',
    'error_loading_languages' => 'Fel vid laddning av språklistan. Kontrollera att filen <code>/json/idiomas.json</code> finns och är giltig.',
    'complete_bible' => 'Hela Bibeln (TB)',
    'old_testament' => 'Endast Gamla Testamentet (GT)',
    'new_testament' => 'Endast Nya Testamentet (NT)',
    'examples_title' => 'Testa pluginens funktionalitet',
    'examples_description' => 'Håll muspekaren över de markerade bibelreferenserna nedan för att se hur pluginet fungerar.',
    'data_trueTooltip' => 'Aktivera verktygstips i bibliska referenser.',
    'data_trueTooltip_description' => 'Här kan du aktivera verktygstipset som visas i bibliska referenser. Även om verktygstipset ger ett bekvämt sätt att se versen utan att lämna sidan, kommer denna förhandsvisning inte att vara tillgänglig om den är inaktiverad. Även om detta gör gränssnittet renare, kommer det också att förhindra automatisk inläsning av versinformationen, vilket innebär att den bibliska referensen endast kommer att begäras när användaren klickar på länken. Överväg om du verkligen behöver inaktivera denna användbara funktion. Avmarkera rutan nedan endast om du är säker.',
    'data_trueCredit' => 'Visa meddelandet "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Här kan du aktivera meddelandet "Powered by Bibliatodo.com", som visas längst ner i verktygstipset. Detta meddelande hjälper fler människor att upptäcka detta välsignade verktyg. Även om det gör gränssnittet renare att inaktivera det, stöder det projektet och gör det möjligt för fler användare att dra nytta av denna resurs. Vi uppmuntrar dig att hålla det aktiverat för att hjälpa till att sprida detta verktyg. Lämna rutan avmarkerad endast om du är säker på att du vill dölja det.',
    'tb' => 'Kompletta Biblar',
    'solo_at' => 'Endast Gamla Testamentet',
    'solo_nt' => 'Endast Nya Testamentet',
    'example_references' => 'Sök efter vers: Joh 3:16
        Sök efter kapitel: Ps 91
        Kapitel i rad: Ps 91-93
        Olika kapitel: Ps 91,94
        Verserna nedan: Ords 11:1-7
        Verser efter grupper: Ords 11:1-3,10,5
        Många böcker och kombinationer: Joh 1:1-4;Matt 2:2,6-7',
    'data_trueLinks' => 'Ersätt befintliga URL:er för bibelreferenser',
    'data_trueLinks_description' => 'Aktivera detta alternativ för att automatiskt ersätta befintliga URL:er för bibelreferenser med VerseLinker-formatet. Genom att göra detta kommer alla referenser på din webbplats att dra nytta av verktygstipsfunktionen och andra funktioner. Om du avmarkerar den här rutan kommer VerseLinker inte att konvertera några befintliga URL:er, vilket gör att du kan behålla de ursprungliga länkarna eller använda ett annat referenssystem. Avmarkera endast denna ruta om du verkligen vill behålla dina nuvarande URL:er intakta.',
];