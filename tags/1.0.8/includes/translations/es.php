<?php
return [
    'settings_title' => 'Configuración de VerseLinker',
    'language_label' => 'Seleccionar idioma:',
    'version_label' => 'Seleccionar versión:',
    'version_description' => 'Si selecciona una versión que incluya solo el Antiguo Testamento o el Nuevo Testamento, cualquier referencia a libros que no estén en la versión seleccionada se procesará utilizando la versión predeterminada. 
    Por ejemplo, si elige una versión que incluya solo el Nuevo Testamento y hace referencia a Génesis 1:1 (del Antiguo Testamento), el sistema utilizará automáticamente la versión predeterminada para recuperar el texto. 
    Esto garantiza que todas las referencias estén vinculadas con precisión, incluso cuando la versión seleccionada no cubra el libro al que se hace referencia.',
    'plugin_description' => 'Las opciones de configuración del plugin VerseLinker ofrecen una forma sencilla de personalizar cómo las referencias bíblicas en su sitio web se convierten automáticamente en enlaces interactivos. 
    Este plugin detecta las citas bíblicas que publiques (por ejemplo, Juan 3:16) y las convierte en enlaces que llevan al pasaje correspondiente en Bibliatodo.com. 
    Al pasar el cursor sobre un enlace, se muestra un cuadro emergente con el texto del versículo, lo que permite a los usuarios leer la Escritura sin salir de tu página. 
    Si el usuario hace clic en el enlace, será dirigido al pasaje completo en Bibliatodo.com. 
    Con esta funcionalidad, VerseLinker mejora la experiencia de navegación al facilitar el acceso inmediato a los textos bíblicos, ayudando a tus lectores a explorar la Palabra de Dios sin interrupciones.',
    'save_changes' => 'Guardar cambios',
    'error_loading_languages' => 'Error al cargar la lista de idiomas. Verifique que el archivo <code>/json/idiomas.json</code> exista y sea válido.',
    'complete_bible' => 'Biblia completa (TB)',
    'old_testament' => 'Solo Antiguo Testamento (AT)',
    'new_testament' => 'Solo Nuevo Testamento (NT)',
    'examples_title' => 'Prueba el funcionamiento del plugin',
    'examples_description' => 'Pase el cursor sobre las referencias bíblicas destacadas a continuación para ver cómo funciona el plugin.',
    'data_trueTooltip' => 'Activar tooltip en referencias bíblicas.',
    'data_trueTooltip_description' => 'Aquí puedes activar el tooltip que aparece en las referencias bíblicas. Aunque el tooltip ofrece una forma cómoda de ver el versículo sin salir de la página, al desactivarlo esta previsualización no estará disponible. Si bien esto limpia la interfaz, también impedirá la carga automática de la información del versículo, lo que significa que la referencia bíblica solo se solicitará cuando el usuario haga clic en el enlace. Considera si realmente necesitas desactivar esta útil función. Desmarca la casilla a continuación solo si estás seguro.',
    'data_trueCredit' => 'Mostrar el mensaje "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Aquí puedes activar el mensaje "Powered by Bibliatodo.com", que aparece en la parte inferior del tooltip. Este mensaje ayuda a que más personas conozcan esta herramienta de bendición. Aunque desactivarlo limpia la interfaz, mantenerlo visible apoya el proyecto y permite que más usuarios se beneficien de este recurso. Te animamos a activarlo para ayudar a difundir esta herramienta. Deja la casilla desmarcada solo si estás seguro de que deseas ocultarlo.',
    'tb' => 'Biblias completas',
    'solo_at' => 'Solo Antiguo Testamento',
    'solo_nt' => 'Solo Nuevo Testamento',
    'example_references' => 'Búsqueda por versículo: Juan 3:16
        Búsqueda por capitulo: Salmos 91
        Capítulos seguidos: Salmos 91-93
        Capítulos distintos: Salmos 91,94
        Versículos seguidos: Eclesiastés 11:1-7
        Versículos por lote: Eclesiastés 11:1-3,10,5
        Varios libros y combinaciones: Juan 1:1-4;mateo 2:2,6-7',
    'data_trueLinks' => 'Reemplazar las URLs de referencias bíblicas existentes',
    'data_trueLinks_description' => 'Habilita esta opción para reemplazar automáticamente las URLs de referencias bíblicas existentes con el formato de VerseLinker. Al hacerlo, todas las referencias en tu sitio se beneficiarán de la función de herramienta emergente y otras características. Si desactivas esta casilla, VerseLinker no convertirá ninguna URL existente, permitiéndote conservar los enlaces originales o utilizar un sistema de referencias diferente. Desmarca esta casilla solo si realmente deseas mantener intactas tus URLs actuales.',
];
