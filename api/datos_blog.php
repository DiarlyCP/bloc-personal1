<?php
$perfil = [
    'nombre' => 'Diarly Tatiana Cabanillas Polo',
    'titulo_blog' => 'Diarly Tatiana Cabanillas Polo | Blog Personal',
    'subtitulo' => 'Gestión de datos, tecnología y apuntes de décimo ciclo',
    'bio' => 'Hola, soy Diarly Tatiana Cabanillas Polo, estudiante de décimo ciclo de Ingeniería de Sistemas e Informática. Me apasiona la tecnología, la gestión y el análisis de datos: me interesa descubrir cómo la información bien organizada ayuda a comprender patrones y tomar mejores decisiones. En mis tiempos libres disfruto escuchar música y explorar nuevas herramientas digitales y pequeños proyectos de gestión.',
    'github' => 'https://github.com/DiarlyCP',
    'usuario_github' => '@DiarlyCP',
    'correo' => 'tatiana.cp.ing@gmail.com',
    'ciclo' => 'Décimo Ciclo — Ing. de Sistemas e Informática',
    'foto' => '/perfil.png'
];

$articulos = [
    [
        'id' => 1,
        'titulo' => '¿Por qué me interesa el análisis de datos en Ingeniería de Sistemas?',
        'categoria' => 'Análisis de Datos',
        'slug' => 'analisis-datos',
        'fecha' => '15 Nov 2026',
        'lectura' => '3 min de lectura',
        'resumen' => 'A lo largo de la carrera vemos código y bases de datos, pero entender qué nos dicen esos números es lo que más me llama la atención.',
        'contenido' => [
            'Cuando empecé la carrera, pensaba que todo se trataba de programar sistemas desde cero. Sin embargo, conforme avancé, vi que todo sistema genera información constante que muchas veces se queda sin aprovechar.',
            'Lo que me atrae de la gestión de datos es tomar registros desordenados —como asistencias o reportes— y organizarlos para encontrar patrones claros y tomar mejores decisiones.'
        ]
    ],
    [
        'id' => 2,
        'titulo' => 'Lo que aprendí llegando al décimo ciclo de Ingeniería de Sistemas',
        'categoria' => 'Décimo Ciclo',
        'slug' => 'decimo-ciclo',
        'fecha' => '10 Nov 2026',
        'lectura' => '4 min de lectura',
        'resumen' => 'Un repaso por los retos de los últimos semestres, el trabajo en equipo y cómo resolvemos problemas reales.',
        'contenido' => [
            'Llegar al décimo ciclo se siente como una mezcla de emoción y responsabilidad. Hoy los cursos nos piden integrar todo en proyectos complejos.',
            'Aprendí que organizar el tiempo y comunicarte bien en equipo vale tanto como saber programar.'
        ]
    ],
    [
        'id' => 3,
        'titulo' => 'Desplegando mi primer proyecto PHP en Vercel con GitHub',
        'categoria' => 'Tecnología y Web',
        'slug' => 'tecnologia',
        'fecha' => '28 Oct 2026',
        'lectura' => '3 min de lectura',
        'resumen' => 'Cómo subí mis archivos a un repositorio y logré que una página en PHP funcione en línea usando Vercel.',
        'contenido' => [
            'Poder compartir un enlace en vivo para que cualquiera vea tu proyecto desde el navegador es genial.',
            'Estructurando la carpeta api/ y un archivo vercel.json, logré que Vercel ejecute PHP de forma automática.'
        ]
    ],
    [
        'id' => 4,
        'titulo' => 'Entre código y música: cómo desconecto en mis tiempos libres',
        'categoria' => 'Personal y Música',
        'slug' => 'personal',
        'fecha' => '09 Oct 2026',
        'lectura' => '2 min de lectura',
        'resumen' => 'No todo es pantallas y bases de datos: escuchar música y probar herramientas por curiosidad son mi mejor pausa.',
        'contenido' => [
            'Pasar varias horas revisando informes cansa la vista. Por eso, al terminar mis pendientes, me gusta poner música y relajarme.',
            'Equilibrar la carrera con los gustos personales es clave para disfrutar lo que estudiamos.'
        ]
    ]
];
?>