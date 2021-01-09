<?php
//$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());
//die( (new Request)->getBaseUrl());
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-enterprise',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'enterprise\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-enterprise',
        ],
        'user' => [
            'identityClass' => 'enterprise\models\Enterprises',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-enterprise', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the enterprise
            'name' => 'advanced-enterprise',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            //   'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],

    'params' => $params,
    'defaultRoute' => 'site/login',
    'params' => [
        'icon-framework' => \kartik\icons\Icon::FAS, // Font Awesome Icon framework
    ],
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module',
            // other module settings
        ],
    ],

];
