<?php
return [
    'settings_title' => 'Configurações do VerseLinker',
    'language_label' => 'Selecione o idioma:',
    'version_label' => 'Selecione a versão:',
    'version_description' => 'Se você selecionar uma versão que inclua apenas o Antigo Testamento ou o Novo Testamento, todas as referências a livros que não estão incluídos na versão selecionada serão processadas usando a versão padrão. 
    Por exemplo, se você escolher uma versão que inclua apenas o Novo Testamento e fizer referência a Gênesis 1:1 (do Antigo Testamento), o sistema usará automaticamente a versão padrão para recuperar o texto. 
    Isso garante que todas as referências sejam vinculadas com precisão, mesmo quando a versão selecionada não cobre o livro referenciado.',
    'plugin_description' => 'As configurações do plugin VerseLinker oferecem uma maneira simples de personalizar como as referências bíblicas no seu site são automaticamente transformadas em links interativos. 
    Este plugin detecta as citações bíblicas que você publica (por exemplo, João 3:16) e as converte em links que levam à passagem correspondente no Bibliatodo.com. 
    Ao passar o cursor sobre um link, é exibido um pop-up com o texto do versículo, permitindo que os usuários leiam a Escritura sem sair da sua página. 
    Se o usuário clicar no link, ele será redirecionado para a passagem completa no Bibliatodo.com. 
    Com essa funcionalidade, o VerseLinker melhora a experiência de navegação ao oferecer acesso imediato aos textos bíblicos, ajudando seus leitores a explorar a Palavra de Deus sem interrupções.',
    'save_changes' => 'Salvar alterações',
    'error_loading_languages' => 'Erro ao carregar a lista de idiomas. Verifique se o arquivo <code>/json/idiomas.json</code> existe e é válido.',
    'complete_bible' => 'Bíblia completa (TB)',
    'old_testament' => 'Somente Antigo Testamento (AT)',
    'new_testament' => 'Somente Novo Testamento (NT)',
    'examples_title' => 'Testar o funcionamento do plugin',
    'examples_description' => 'Passe o cursor sobre as referências bíblicas destacadas abaixo para ver como o plugin funciona.',
    'data_trueTooltip' => 'Ativar tooltip em referências bíblicas.',
    'data_trueTooltip_description' => 'Aqui você pode ativar o tooltip que aparece nas referências bíblicas. Embora o tooltip ofereça uma forma conveniente de visualizar o versículo sem sair da página, ao desativá-lo essa pré-visualização não estará disponível. Embora isso torne a interface mais limpa, também impedirá o carregamento automático das informações do versículo, o que significa que a referência bíblica só será solicitada quando o usuário clicar no link. Considere se realmente precisa desativar essa função útil. Desmarque a caixa abaixo apenas se tiver certeza.',
    'data_trueCredit' => 'Exibir a mensagem "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Aqui você pode ativar a mensagem "Powered by Bibliatodo.com", que aparece na parte inferior do tooltip. Essa mensagem ajuda mais pessoas a conhecerem esta ferramenta de bênção. Embora desativá-la torne a interface mais limpa, mantê-la visível apoia o projeto e permite que mais usuários se beneficiem deste recurso. Incentivamos você a ativá-la para ajudar a divulgar esta ferramenta. Deixe a caixa desmarcada apenas se tiver certeza de que deseja ocultá-la.',
    'tb' => 'Bíblias Completas',
    'solo_at' => 'Somente Antigo Testamento',
    'solo_nt' => 'Somente Novo Testamento',
    'example_references' => 'Procurar versículo: João 3:16
        Procurar capítulo: Salmos 91
        Capítulos seguidos: Salmos 91-93
        Capítulos diferentes: Salmos 91,94
        Versículos seguidos: Eclesiastes 11:1-7
        Versículos por grupo: Eclesiastes 11:1-3,10,5
        Vários livros e combinações: João 1:1-4;Mateus 2:2,6-7',
    'data_trueLinks' => 'Substituir os URLs de referência bíblica existentes',
    'data_trueLinks_description' => 'Ative esta opção para substituir automaticamente os URLs de referência bíblica existentes pelo formato VerseLinker. Ao fazer isso, todas as referências em seu site se beneficiarão do recurso de tooltip e outras funções. Se você desativar esta caixa de seleção, o VerseLinker não converterá nenhum URL existente, permitindo que você mantenha os links originais ou utilize um sistema de referência diferente. Desmarque esta opção apenas se realmente quiser manter seus URLs atuais inalterados.',
];