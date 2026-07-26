<?php
return [
    'settings_title' => 'Nastavenia VerseLinker',
    'language_label' => 'Vyberte jazyk:',
    'version_label' => 'Vyberte verziu:',
    'version_description' => 'Ak vyberiete verziu, ktorá obsahuje iba Starý alebo Nový zákon, akékoľvek odkazy na knihy, ktoré nie sú zahrnuté vo vybranej verzii, sa spracujú pomocou predvolenej verzie. 
    Napríklad, ak vyberiete verziu, ktorá obsahuje iba Nový zákon a odkazuje na Genesis 1:1 (zo Starého zákona), systém automaticky použije predvolenú verziu na získanie textu. 
    Týmto spôsobom sa zabezpečuje presné prepojenie všetkých odkazov, aj keď vybraná verzia nezahŕňa knihu, na ktorú sa odkazuje.',
    'plugin_description' => 'Možnosti konfigurácie pluginu VerseLinker ponúkajú jednoduchý spôsob, ako automaticky prepojiť biblické odkazy na vašej webovej stránke. 
    Tento plugin rozpozná biblické odkazy (napr. Ján 3:16) a premení ich na odkazy vedúce k príslušnému textu na Bibliatodo.com. 
    Pri presunutí myši na odkaz sa zobrazí vyskakovacie okno s textom verša, čo umožní čitateľom vidieť biblické texty bez opustenia stránky. 
    Po kliknutí na odkaz sa čitateľ presunie na úplný text na stránke Bibliatodo.com. 
    VerseLinker zlepšuje používateľský zážitok tým, že poskytuje okamžitý prístup k biblickým textom.',
    'save_changes' => 'Uložiť zmeny',
    'error_loading_languages' => 'Chyba pri načítavaní zoznamu jazykov. Skontrolujte, či súbor <code>/json/idiomas.json</code> existuje a je platný.',
    'complete_bible' => 'Kompletná Biblia (TB)',
    'old_testament' => 'Iba Starý zákon (AT)',
    'new_testament' => 'Iba Nový zákon (NT)',
    'examples_title' => 'Vyskúšajte funkčnosť pluginu',
    'examples_description' => 'Presuňte kurzor na vyznačené biblické odkazy nižšie, aby ste videli, ako plugin funguje.',
    'data_trueTooltip' => 'Aktivovať tooltip v biblických odkazoch.',
    'data_trueTooltip_description' => 'Tu môžete aktivovať tooltip, ktorý sa zobrazí v biblických odkazoch. Aj keď tooltip ponúka pohodlný spôsob, ako si pozrieť verš bez opustenia stránky, jeho deaktiváciou táto možnosť nebude dostupná. Hoci to vyčistí rozhranie, tiež to zabráni automatickému načítaniu informácií o verši, čo znamená, že biblický odkaz sa zobrazí iba vtedy, keď naň používateľ klikne. Zvážte, či naozaj potrebujete túto užitočnú funkciu vypnúť. Odznačte políčko nižšie iba v prípade, že ste si istí.',
    'data_trueCredit' => 'Zobraziť správu "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Tu môžete aktivovať správu "Powered by Bibliatodo.com", ktorá sa zobrazí v spodnej časti tooltipu. Táto správa pomáha viacerým ľuďom dozvedieť sa o tomto nástroji požehnania. Aj keď jej deaktivácia vyčistí rozhranie, ponechaním viditeľnosti podporíte projekt a umožníte, aby tento zdroj využilo viac používateľov. Odporúčame vám ponechať túto možnosť aktívnu, aby ste pomohli šíriť tento nástroj. Nechajte políčko nezačiarknuté iba v prípade, že ste si istí, že ho chcete skryť.',
    'tb' => 'Kompletná Biblia',
    'solo_at' => 'Iba Starý zákon',
    'solo_nt' => 'Iba Nový zákon',
    'example_references' => 'Hľadaj podľa verša: Ján 3:16
        Hľadať podľa kapitoly: Žalmy 91
        Kapitoly v rade: Žalmy 91-93
        Rôzne kapitoly: Žalmy 91,94
        Verše nižšie: Kazateľ 11:1-7
        Verše podľa skupín: Kazateľ 11:1-3,10,5
        Veľa kníh a kombinácií: Ján 1:1-4;Matúš 2:2,6-7',
    'data_trueLinks' => 'Nahradiť existujúce URL odkazy na Bibliu',
    'data_trueLinks_description' => 'Povoľte túto možnosť, aby sa existujúce URL odkazy na Bibliu automaticky nahradili formátom VerseLinker. Týmto spôsobom budú všetky odkazy na vašej stránke využívať funkciu vyskakovacieho okna a ďalšie funkcie. Ak zrušíte zaškrtnutie tohto políčka, VerseLinker neprevedie žiadne existujúce URL adresy, čo vám umožní ponechať si pôvodné odkazy alebo použiť iný systém odkazovania. Toto políčko odškrtnite iba v prípade, že naozaj chcete ponechať svoje aktuálne URL adresy nezmenené.',
];