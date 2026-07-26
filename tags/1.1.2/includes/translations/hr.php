<?php
return [
    'settings_title' => 'Postavke za VerseLinker',
    'language_label' => 'Odaberite jezik:',
    'version_label' => 'Odaberite verziju:',
    'version_description' => 'Ako odaberete verziju koja uključuje samo Stari ili Novi zavjet, bilo koja referenca na knjige koje nisu u odabranoj verziji obradit će se pomoću zadane verzije. 
    Na primjer, ako odaberete verziju koja uključuje samo Novi zavjet i spomenete Postanak 1:1 (iz Starog zavjeta), sustav će automatski koristiti zadanu verziju za dohvaćanje teksta. 
    Ovo osigurava da su sve reference precizno povezane, čak i kada odabrana verzija ne pokriva knjigu na koju se poziva.',
    'plugin_description' => 'Postavke za plugin VerseLinker nude jednostavan način za prilagodbu načina na koji se biblijske reference na vašoj web stranici automatski pretvaraju u interaktivne poveznice. 
    Ovaj plugin detektira biblijske citate koje objavite (npr. Ivan 3:16) i pretvara ih u poveznice koje vode na odgovarajući odlomak na Bibliatodo.com. 
    Kada zadržite pokazivač iznad poveznice, pojavljuje se skočni okvir s tekstom stiha, omogućujući korisnicima da pročitaju Pismo bez napuštanja vaše stranice. 
    Ako korisnik klikne na poveznicu, bit će preusmjeren na cijeli odlomak na Bibliatodo.com. 
    Ova funkcionalnost poboljšava iskustvo pregledavanja olakšavajući trenutan pristup biblijskim tekstovima, pomažući vašim čitateljima da istraže Božju Riječ bez prekida.',
    'save_changes' => 'Spremi promjene',
    'error_loading_languages' => 'Pogreška prilikom učitavanja popisa jezika. Provjerite da datoteka <code>/json/idiomas.json</code> postoji i da je ispravna.',
    'complete_bible' => 'Cijela Biblija (TB)',
    'old_testament' => 'Samo Stari zavjet (AT)',
    'new_testament' => 'Samo Novi zavjet (NT)',
    'examples_title' => 'Isprobajte kako plugin funkcionira',
    'examples_description' => 'Zadržite pokazivač iznad istaknutih biblijskih referenci u nastavku kako biste vidjeli kako plugin radi.',
    'data_trueTooltip' => 'Aktiviraj tooltip u biblijskim referencama.',
    'data_trueTooltip_description' => 'Ovdje možete aktivirati tooltip koji se pojavljuje u biblijskim referencama. Iako tooltip nudi praktičan način za pregled stiha bez napuštanja stranice, njegova deaktivacija onemogućit će ovu značajku. To može učiniti sučelje čišćim, ali će također spriječiti automatsko učitavanje informacija o stihu, što znači da će se biblijska referenca dohvatiti tek kada korisnik klikne na poveznicu. Razmislite trebate li doista onemogućiti ovu korisnu funkciju. Poništite okvir ispod samo ako ste sigurni.',
    'data_trueCredit' => 'Prikaži poruku "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Ovdje možete omogućiti prikaz poruke "Powered by Bibliatodo.com", koja se pojavljuje na dnu tooltipa. Ova poruka pomaže da više ljudi sazna za ovaj blagoslovljeni alat. Iako njegovo onemogućavanje čini sučelje čišćim, ostavljanjem vidljivim podržavate projekt i omogućujete većem broju korisnika da iskoriste ovaj resurs. Potičemo vas da ga zadržite uključenim kako biste pomogli u širenju ovog alata. Ostavite okvir neoznačenim samo ako ste sigurni da ga želite sakriti.',
    'tb' => 'Cijela Biblija',
    'solo_at' => 'Samo Stari zavjet',
    'solo_nt' => 'Samo Novi zavjet',
    'example_references' => 'Traži po stihu: Ivan 3:16
        Pretraživanje po poglavlju: Psalmi 91
        Poglavlja u nizu: Psalmi 91-93
        Različita poglavlja: Psalmi 91,94
        Stihovi ispod: Propovjednik 11:1-7
        Stihovi po skupinama: Propovjednik 11:1-3,10,5
        Mnogo knjiga i kombinacija: Ivan 1:1-4;Matej 2:2,6-7',
    'data_trueLinks' => 'Zamijenite postojeće URL-ove biblijskih referenci',
    'data_trueLinks_description' => 'Omogućite ovu opciju kako biste automatski zamijenili postojeće URL-ove biblijskih referenci formatom VerseLinker. Time će sve reference na vašoj web stranici imati koristi od značajke oblačića s informacijama i drugih funkcija. Ako onemogućite ovu opciju, VerseLinker neće pretvarati postojeće URL-ove, omogućujući vam da zadržite izvorne veze ili koristite drugačiji sustav referenciranja. Isključite ovu opciju samo ako doista želite zadržati svoje trenutne URL-ove nepromijenjene.',
];