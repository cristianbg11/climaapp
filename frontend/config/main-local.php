<?php

$config = [
    'components' => [
        'api' => [
            'class' => 'Nadar\YiiRestClient\Api',
            'server' => 'https://climared.caribehub.com',
            'accessToken' => '28|rSGwTXTOXaCgavUGPIKSKFLGQTsospZMLCu8VFYY',
        ],
        /*
        'view' => [
            'theme' => [
                'pathMap' => [
                   '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
       ],
       */
       
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'n9DNHsv1VTm3_bk4fEYXJYDjE8bctBgZ',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
