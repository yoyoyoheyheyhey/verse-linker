<?php
return [
    'settings_title' => 'Paramètres de VerseLinker',
    'language_label' => 'Sélectionnez la langue :',
    'version_label' => 'Sélectionnez la version :',
    'version_description' => 'Si vous sélectionnez une version qui inclut uniquement l’Ancien Testament ou le Nouveau Testament, toutes les références aux livres non inclus dans la version sélectionnée seront traitées à l’aide de la version par défaut. 
    Par exemple, si vous choisissez une version qui inclut uniquement le Nouveau Testament et que vous faites référence à Genèse 1:1 (de l’Ancien Testament), le système utilisera automatiquement la version par défaut pour récupérer le texte. 
    Cela garantit que toutes les références sont liées avec précision, même lorsque la version sélectionnée ne couvre pas le livre référencé.',
    'plugin_description' => 'Les paramètres du plugin VerseLinker offrent un moyen simple de personnaliser la manière dont les références bibliques sur votre site Web sont automatiquement transformées en liens interactifs. 
    Ce plugin détecte les citations bibliques que vous publiez (par exemple, Jean 3:16) et les convertit en liens menant au passage correspondant sur Bibliatodo.com. 
    En survolant un lien, une infobulle affiche le texte du verset, permettant aux utilisateurs de lire l’Écriture sans quitter votre page. 
    Si l’utilisateur clique sur le lien, il sera redirigé vers le passage complet sur Bibliatodo.com. 
    Avec cette fonctionnalité, VerseLinker améliore l’expérience de navigation en offrant un accès immédiat aux textes bibliques, aidant vos lecteurs à explorer la Parole de Dieu en toute fluidité.',
    'save_changes' => 'Enregistrer les modifications',
    'error_loading_languages' => 'Erreur lors du chargement de la liste des langues. Assurez-vous que le fichier <code>/json/idiomas.json</code> existe et est valide.',
    'complete_bible' => 'Bible complète (TB)',
    'old_testament' => 'Ancien Testament uniquement (AT)',
    'new_testament' => 'Nouveau Testament uniquement (NT)',
    'examples_title' => 'Tester le fonctionnement du plugin',
    'examples_description' => 'Passez la souris sur les références bibliques mises en évidence ci-dessous pour voir comment fonctionne le plugin.',
    'data_trueTooltip' => 'Activer l’infobulle dans les références bibliques.',
    'data_trueTooltip_description' => 'Ici, vous pouvez activer l’infobulle qui apparaît dans les références bibliques. Bien que l’infobulle offre un moyen pratique de voir le verset sans quitter la page, sa désactivation empêchera cet aperçu d’être disponible. Cela nettoie l’interface, mais empêche également le chargement automatique des informations du verset, ce qui signifie que la référence biblique ne sera demandée que lorsque l’utilisateur cliquera sur le lien. Réfléchissez bien avant de désactiver cette fonctionnalité utile. Décochez la case ci-dessous uniquement si vous en êtes sûr.',
    'data_trueCredit' => 'Afficher le message "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Ici, vous pouvez activer le message "Powered by Bibliatodo.com", qui apparaît en bas de l’infobulle. Ce message aide davantage de personnes à découvrir cet outil de bénédiction. Bien que le désactiver épure l’interface, le laisser visible soutient le projet et permet à davantage d’utilisateurs de profiter de cette ressource. Nous vous encourageons à l’activer pour aider à diffuser cet outil. Laissez la case décochée uniquement si vous êtes sûr de vouloir le masquer.',
    'tb' => 'Bibles complètes',
    'solo_at' => 'Seulement Ancien Testament',
    'solo_nt' => 'Seulement Nouveau Testament',
    'example_references' => 'Recherche par verset Jean 3:16
        Chapitre Recherche Psaumes 91
        Chapitres suivis Psaumes 91-93
        Chapitres Psaumes 91,94
        Verses suivi Ecclésiaste 11:1-7
        Versets lot Ecclésiaste 11:1-3,10,5
        Plusieurs livres et combinaisons Jean 1:1-4; Matthieu 2:2,6-7',
    'data_trueLinks' => 'Remplacer les URL de références bibliques existantes',
    'data_trueLinks_description' => 'Activez cette option pour remplacer automatiquement les URL de références bibliques existantes par le format VerseLinker. Ce faisant, toutes les références sur votre site bénéficieront de la fonction d’infobulle et d’autres fonctionnalités. Si vous désactivez cette case, VerseLinker ne convertira aucune URL existante, vous permettant ainsi de conserver les liens d’origine ou d’utiliser un autre système de référencement. Décochez cette case uniquement si vous souhaitez vraiment conserver vos URL actuelles intactes.',
];