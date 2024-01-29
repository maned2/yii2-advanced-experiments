<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\user\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module'
        ],
    ],
    'components' => [
        'request' => [
            // 'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => false,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-api',
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
        // 'errorHandler' => [
        //     'errorAction' => 'site/error',
        // ],
        // 'urlManager' => [
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'rules' => [
        //         'v1/test/test123/' => 'v1/test/test'
        //     ],
        // ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                // 'PUT,PATCH v1/users/<id>' => 'v1/user/update',
                // 'DELETE v1/users/<id>' => 'v1/user/delete',
                // 'GET,HEAD v1/users/<id>' => 'v1/user/view',
                // 'POST v1/users' => 'v1/user/create',
                // 'GET,HEAD v1/users' => 'v1/user/index',
                // 'v1/users/<id>' => 'v1/user/options',
                // 'v1/users' => 'v1/user/options',
                'POST v1/users/login' => 'v1/users/login',
                'GET v1/tests/private' => 'v1/tests/private',
                'GET v1/tests/public' => 'v1/tests/public',
                // ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/user']],
                // ['class' => 'yii\rest\UrlRule', 'controller' => ['v2/user', 'v2/post']],
            ],
        ],
    ],
    'params' => $params,
];
