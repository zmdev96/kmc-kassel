<?php
return [
    'template' => [
        'sidebar'                 => ADMIN_TEMPLATE_PATH . 'sidebar.php',
        'navbar'                  => ADMIN_TEMPLATE_PATH . 'navbar.php',
        ':view'                   => ':content',
        'footer'                  => ADMIN_TEMPLATE_PATH . 'footer.php'
    ],
    'head_resources' => [
        'css' => [
            'fontawesome'         => ADMIN_VENDOR . 'fontawesome-free/css/all.min.css',
            'font'                => 'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
            'datatabelcss'        => ADMIN_VENDOR . 'datatables/dataTables.bootstrap4.min.css',
            'animate'             => ADMIN_VENDOR . 'bootstrap-notify/animate.css',
            'main'                => ADMIN_CSS . 'sb-admin-2.css',
            'login'               => ADMIN_CSS . 'login.css',

        ],
        'js' => [

        ]
    ],
    'footer_resources' => [
        'jquery'                  => ADMIN_VENDOR . 'jquery/jquery.min.js',
        'bootstrap'               => ADMIN_VENDOR . 'bootstrap/js/bootstrap.bundle.min.js',
        'j-easing'                => ADMIN_VENDOR . 'jquery-easing/jquery.easing.min.js',
        'chartist'                => ADMIN_VENDOR . 'chart.js/Chart.min.js',
        'chartist1'               => ADMIN_JS . 'demo/chart-area-demo.js',
        'chartist2'               => ADMIN_JS . 'demo/chart-pie-demo.js',
        'main'                    => ADMIN_JS . 'sb-admin-2.min.js',
        'jquery-datatables1'      => ADMIN_VENDOR . 'datatables/jquery.dataTables.min.js',
        'bootstrap-datatable'     => ADMIN_VENDOR . 'datatables/dataTables.bootstrap4.min.js',
        'notify'                  => ADMIN_VENDOR . 'bootstrap-notify/bootstrap-notify.js',
        'editor'                  => ADMIN_VENDOR . 'ckeditor/ckeditor.js',
        'jquery-datatables'       => ADMIN_JS . 'demo/datatables-demo.js',
        'plugin'                  => ADMIN_JS . 'plugin.js',

    ]
];
