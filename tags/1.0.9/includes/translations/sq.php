<?php
return [
    'settings_title' => 'Cilësimet e VerseLinker',
    'language_label' => 'Zgjidhni gjuhën:',
    'version_label' => 'Zgjidhni versionin:',
    'version_description' => 'Nëse zgjidhni një version që përfshin vetëm Dhiatën e Vjetër ose të Re, çdo referencë për libra që nuk janë në versionin e zgjedhur do të përpunohet me versionin parazgjedhur. 
    Për shembull, nëse zgjidhni një version që përfshin vetëm Dhiatën e Re dhe referoni Zanafilla 1:1 (nga Dhiata e Vjetër), sistemi do të përdorë automatikisht versionin parazgjedhur për të marrë tekstin. 
    Kjo siguron që të gjitha referencat të lidhen me saktësi, edhe kur versioni i zgjedhur nuk përfshin librin e referuar.',
    'plugin_description' => 'Opsionet e konfigurimit të plugin-it VerseLinker ofrojnë një mënyrë të thjeshtë për të kthyer automatikisht referencat biblike në lidhje interaktive në faqen tuaj. 
    Ky plugin zbulon referencat biblike që publikoni (p.sh., Gjoni 3:16) dhe i kthen ato në lidhje që çojnë te pasazhi përkatës në Bibliatodo.com. 
    Kur vendosni kursorin mbi një lidhje, shfaqet një kuti dialogu me tekstin e vargut, duke lejuar përdoruesit të lexojnë Shkrimin pa lënë faqen tuaj. 
    Duke klikuar mbi lidhjen, përdoruesi do të dërgohet te pasazhi i plotë në Bibliatodo.com. 
    Kjo veçori përmirëson përvojën e leximit duke ofruar akses të menjëhershëm në tekstet biblike.',
    'save_changes' => 'Ruani ndryshimet',
    'error_loading_languages' => 'Gabim gjatë ngarkimit të listës së gjuhëve. Sigurohuni që skedari <code>/json/idiomas.json</code> të ekzistojë dhe të jetë i vlefshëm.',
    'complete_bible' => 'Bibla e plotë (TB)',
    'old_testament' => 'Vetëm Dhiata e Vjetër (AT)',
    'new_testament' => 'Vetëm Dhiata e Re (NT)',
    'examples_title' => 'Provo funksionalitetin e plugin-it',
    'examples_description' => 'Vendosni kursorin mbi referencat biblike të theksuara më poshtë për të parë si funksionon plugin-i.',
    'data_trueTooltip' => 'Aktivizo tooltip në referencat biblike.',
    'data_trueTooltip_description' => 'Këtu mund të aktivizoni tooltip-in që shfaqet në referencat biblike. Edhe pse tooltip-i ofron një mënyrë të përshtatshme për të parë vargun pa lënë faqen, çaktivizimi i tij do ta bëjë këtë pamje paraprake të padisponueshme. Megjithëse kjo e bën ndërfaqen më të pastër, gjithashtu do të parandalojë ngarkimin automatik të informacionit të vargut, që do të thotë se referenca biblike do të kërkohet vetëm kur përdoruesi klikon mbi lidhjen. Merrni parasysh nëse me të vërtetë keni nevojë të çaktivizoni këtë funksion të dobishëm. Hiqni shenjën nga kutia më poshtë vetëm nëse jeni të sigurt.',
    'data_trueCredit' => 'Shfaq mesazhin "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Këtu mund të aktivizoni mesazhin "Powered by Bibliatodo.com", i cili shfaqet në fund të tooltip-it. Ky mesazh ndihmon që më shumë njerëz të mësojnë për këtë mjet bekimi. Edhe pse çaktivizimi i tij e pastron ndërfaqen, ta mbani atë të dukshëm mbështet projektin dhe lejon më shumë përdorues të përfitojnë nga ky burim. Ju inkurajojmë ta aktivizoni atë për të ndihmuar në përhapjen e këtij mjeti. Lëreni kutinë të pazgjedhur vetëm nëse jeni të sigurt që dëshironi ta fshehni atë.',
    'tb' => 'Bibla e plotë',
    'solo_at' => 'Vetëm Dhiata e Vjetër',
    'solo_nt' => 'Vetëm Dhiata e Re',
    'example_references' => 'Kërko sipas vargut: Gjoni 3:16
        Kërko sipas kapitullit: Psalmet 91
        Kapitujt me radhë: Psalmet 91-93
        Kapituj të ndryshëm: Psalmet 91,94
        Vargjet më poshtë: Kuvendari 11:1-7
        Vargjet sipas grupeve: Kuvendari 11:1-3,10,5
        Shumë libra dhe kombinime: Gjoni 1:1-4;Mateu 2:2,6-7',
    'data_trueLinks' => 'Zëvendëso lidhjet ekzistuese të referencave të Biblës',
    'data_trueLinks_description' => 'Aktivizoni këtë opsion për të zëvendësuar automatikisht lidhjet ekzistuese të referencave të Biblës me formatin VerseLinker. Duke vepruar kështu, të gjitha referencat në faqen tuaj do të përfitojnë nga funksioni i dritares informuese dhe veçori të tjera. Nëse çaktivizoni këtë kutizë, VerseLinker nuk do të konvertojë asnjë lidhje ekzistuese, duke ju lejuar të ruani lidhjet origjinale ose të përdorni një sistem tjetër referimi. Çaktivizoni këtë opsion vetëm nëse me të vërtetë dëshironi të mbani lidhjet tuaja aktuale të pandryshuara.',
];