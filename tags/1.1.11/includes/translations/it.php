<?php
return [
    'settings_title' => 'Impostazioni di VerseLinker',
    'language_label' => 'Seleziona lingua:',
    'version_label' => 'Seleziona versione:',
    'version_description' => 'Se selezioni una versione che include solo l\'Antico Testamento o il Nuovo Testamento, qualsiasi riferimento a libri non inclusi nella versione selezionata verrà elaborato utilizzando la versione predefinita. 
    Ad esempio, se scegli una versione che include solo il Nuovo Testamento e fai riferimento a Genesi 1:1 (dall\'Antico Testamento), il sistema utilizzerà automaticamente la versione predefinita per recuperare il testo. 
    Questo garantisce che tutti i riferimenti siano collegati con precisione, anche quando la versione selezionata non copre il libro a cui si fa riferimento.',
    'plugin_description' => 'Le opzioni di configurazione del plugin VerseLinker offrono un modo semplice per personalizzare come i riferimenti biblici sul tuo sito web vengono automaticamente convertiti in link interattivi. 
    Questo plugin rileva le citazioni bibliche che pubblichi (ad esempio, Giovanni 3:16) e le converte in link che portano al passaggio corrispondente su Bibliatodo.com. 
    Passando il cursore su un link, viene mostrato un popup con il testo del versetto, consentendo agli utenti di leggere le Scritture senza lasciare la tua pagina. 
    Se l\'utente fa clic sul link, verrà reindirizzato al passaggio completo su Bibliatodo.com. 
    Con questa funzionalità, VerseLinker migliora l\'esperienza di navigazione facilitando l\'accesso immediato ai testi biblici, aiutando i tuoi lettori a esplorare la Parola di Dio senza interruzioni.',
    'save_changes' => 'Salva modifiche',
    'error_loading_languages' => 'Errore durante il caricamento della lista delle lingue. Controlla che il file <code>/json/idiomas.json</code> esista ed è valido.',
    'complete_bible' => 'Bibbia completa (TB)',
    'old_testament' => 'Solo Antico Testamento (AT)',
    'new_testament' => 'Solo Nuovo Testamento (NT)',
    'examples_title' => 'Prova il funzionamento del plugin',
    'examples_description' => 'Passa il cursore sui riferimenti biblici evidenziati qui sotto per vedere come funziona il plugin.',
    'data_trueTooltip' => 'Attiva tooltip nei riferimenti biblici.',
    'data_trueTooltip_description' => 'Qui puoi attivare il tooltip che appare nei riferimenti biblici. Sebbene il tooltip offra un modo comodo per vedere il versetto senza lasciare la pagina, disattivandolo questa anteprima non sarà disponibile. Anche se questo rende l’interfaccia più pulita, impedirà anche il caricamento automatico delle informazioni del versetto, il che significa che il riferimento biblico verrà richiesto solo quando l’utente cliccherà sul link. Valuta se è davvero necessario disattivare questa utile funzione. Deseleziona la casella qui sotto solo se sei sicuro.',
    'data_trueCredit' => 'Mostra il messaggio "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Qui puoi attivare il messaggio "Powered by Bibliatodo.com", che appare nella parte inferiore del tooltip. Questo messaggio aiuta più persone a conoscere questo strumento di benedizione. Sebbene disattivarlo renda l’interfaccia più pulita, mantenerlo visibile supporta il progetto e permette a più utenti di beneficiare di questa risorsa. Ti incoraggiamo ad attivarlo per aiutare a diffondere questo strumento. Lascia la casella deselezionata solo se sei sicuro di volerlo nascondere.',
    'tb' => 'Bibbia completa',
    'solo_at' => 'Solo Antico Testamento',
    'solo_nt' => 'Solo Nuovo Testamento',
    'example_references' => 'Cerca per versetto: Giovanni 3:16
        Cerca per capitolo: Salmi 91
        Capitoli di seguito: Salmi 91-93
        Diversi capitoli: Salmi 91,94
        Versetti seguenti: Ecclesiaste 11:1-7
        Versi per gruppi: Ecclesiaste 11:1-3,10,5
        Molti libri e combinazioni: Giovanni 1:1-4;Matteo 2:2,6-7',
    'data_trueLinks' => 'Sostituisci gli URL di riferimento alla Bibbia esistenti',
    'data_trueLinks_description' => 'Abilita questa opzione per sostituire automaticamente gli URL di riferimento alla Bibbia esistenti con il formato VerseLinker. Facendo ciò, tutti i riferimenti sul tuo sito potranno beneficiare della funzione tooltip e di altre funzionalità. Se disabiliti questa casella di controllo, VerseLinker non convertirà alcun URL esistente, permettendoti di mantenere i link originali o di utilizzare un diverso sistema di riferimento. Deseleziona questa casella solo se desideri davvero mantenere intatti i tuoi URL attuali.',
];