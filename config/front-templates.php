<?php
return [
    'template' => [
        'navbar'                  => TEMPLATE_PATH . 'navbar.php',
        ':view'                   => ':content',
        'footer'                  => TEMPLATE_PATH . 'footer.php'
    ],
    'head_resources' => [
        'css' => [
            'bootstrap'           => CSS . 'bootstrap.min.css',
            'font-awesome'        => CSS . 'font-awesome.min.css',
            'owl-carousel'        => CSS . 'owl.carousel.min.css',
            'main'                => CSS . 'main.css',
            'responsive'          => CSS . 'responsive.css',
            'aos'                 => CSS . 'aos.css',




        ],
        'js' => [
          //No JS Files in Head in this Projekt
        ]
    ],
    'footer_resources' => [
        'jquery'                  => JS . 'jquery.min.js',
        'bootstrap'               => JS . 'bootstrap.min.js',
        'owl-carousel'            => JS . 'owl.carousel.min.js',
        'slider'                  => JS . 'slider.js',
        'main'                    => JS . 'main.js',
        'aos'                     => JS . 'aos.js',

    ]
];
