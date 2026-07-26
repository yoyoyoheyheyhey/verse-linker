<?php
return [
    'settings_title' => 'Nastavení VerseLinker',
    'language_label' => 'Vybrat jazyk:',
    'version_label' => 'Vybrat verzi:',
    'version_description' => 'Pokud vyberete verzi, která obsahuje pouze Starý nebo Nový zákon, jakýkoli odkaz na knihy, které nejsou ve vybrané verzi, bude zpracován pomocí výchozí verze. 
    Například pokud zvolíte verzi, která obsahuje pouze Nový zákon, a odkazujete na Genesis 1:1 (ze Starého zákona), systém automaticky použije výchozí verzi pro načtení textu. 
    To zajišťuje, že všechny odkazy jsou přesně propojeny, i když vybraná verze nepokrývá knihu, na kterou odkazujete.',
    'plugin_description' => 'Možnosti nastavení pluginu VerseLinker poskytují jednoduchý způsob, jak přizpůsobit automatické převádění biblických odkazů na vašem webu na interaktivní odkazy. 
    Tento plugin rozpozná biblické citace, které publikujete (například Jan 3:16), a přemění je na odkazy, které vedou k odpovídající pasáži na Bibliatodo.com. 
    Když najedete myší na odkaz, zobrazí se vyskakovací okno s textem verše, což uživatelům umožňuje číst Písmo, aniž by opustili vaši stránku. 
    Kliknutím na odkaz bude uživatel přesměrován na celou pasáž na Bibliatodo.com. 
    Díky této funkci VerseLinker zlepšuje zážitek z prohlížení tím, že umožňuje okamžitý přístup k biblickým textům a pomáhá čtenářům objevovat Boží slovo bez přerušení.',
    'save_changes' => 'Uložit změny',
    'error_loading_languages' => 'Chyba při načítání seznamu jazyků. Zkontrolujte, zda soubor <code>/json/idiomas.json</code> existuje a je platný.',
    'complete_bible' => 'Kompletní Bible (TB)',
    'old_testament' => 'Pouze Starý zákon (SZ)',
    'new_testament' => 'Pouze Nový zákon (NZ)',
    'examples_title' => 'Vyzkoušejte fungování pluginu',
    'examples_description' => 'Najedete-li myší na níže uvedené zvýrazněné biblické odkazy, uvidíte, jak plugin funguje.',
    'data_trueTooltip' => 'Aktivovat tooltip v biblických odkazech.',
    'data_trueTooltip_description' => 'Zde můžete aktivovat tooltip, který se zobrazí u biblických odkazů. Ačkoli tooltip nabízí pohodlný způsob, jak si zobrazit verš, aniž byste opustili stránku, při jeho deaktivaci nebude tato náhledová funkce dostupná. I když tím rozhraní získá čistší vzhled, zabrání to také automatickému načítání informací o verši, což znamená, že biblický odkaz bude načten pouze tehdy, když na něj uživatel klikne. Zvažte, zda tuto užitečnou funkci opravdu potřebujete deaktivovat. Zrušte zaškrtnutí níže pouze v případě, že jste si jisti.',
    'data_trueCredit' => 'Zobrazit zprávu "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Zde můžete aktivovat zprávu "Powered by Bibliatodo.com", která se zobrazí ve spodní části tooltipu. Tato zpráva pomáhá více lidem objevit tento užitečný nástroj. Ačkoli jeho deaktivace zjednoduší rozhraní, ponechání viditelné pomáhá podpořit tento projekt a umožňuje více uživatelům z něj mít prospěch. Doporučujeme jej ponechat aktivní, abyste pomohli šířit tento nástroj. Nechte políčko nezaškrtnuté pouze v případě, že si přejete tuto zprávu skrýt.',
    'tb' => 'Kompletní Bible',
    'solo_at' => 'Pouze Starý zákon',
    'solo_nt' => 'Pouze Nový zákon',
    'example_references' => 'Hledat podle verše: Yohane 3:16
        Hledat podle kapitoly: Masalimo 91
        Kapitoly v řadě: Masalimo 91-93
        Různé kapitoly: Masalimo 91,94
        Níže uvedené verše: Mlaliki 11:1-7
        Verše podle skupin: Mlaliki 11:1-3,10,5
        Mnoho knih a kombinací: Yohane 1:1-4;Mateyu 2:2,6-7',
    'data_trueLinks' => 'Nahraďte stávající odkazy na biblické reference',
    'data_trueLinks_description' => 'Povolte tuto možnost, aby se stávající odkazy na biblické reference automaticky nahradily formátem VerseLinker. Tímto způsobem všechny reference na vašem webu využijí výhod funkce tooltip a dalších funkcí. Pokud tuto možnost vypnete, VerseLinker nebude převádět žádné stávající odkazy, což vám umožní zachovat původní odkazy nebo použít jiný systém odkazování. Zrušte zaškrtnutí tohoto pole pouze v případě, že skutečně chcete ponechat své aktuální odkazy beze změny.',
];