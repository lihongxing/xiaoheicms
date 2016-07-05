<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        // 路由的配置
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'suffix' => '.html',
        ],
        'request' => [
            'cookieValidationKey' => 'lianqicms',
        ],
        
         // membercache缓存配置
        'membercache' => array(
            'class' => 'yii\caching\MemCache',
            'servers'=>array(
                array(
                    'host' => '127.0.0.1',
                    'port' => 11211,
                )
            ),
        ),
       
        //数据库缓存配置
        'dbcache' => [
            'class' => 'yii\caching\DbCache',
        ],
        
        // 前台用户组件  
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '__user_identity', 'httpOnly' => true],
            'idParam' => '__user',
            'loginUrl' => ['site/login'],
        ],
        
        //后台用户组件
        'admin' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\Admin',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '__Admin_identity', 'httpOnly' => true],
            'idParam' => '__Admin',
            'loginUrl' => ['admin/login/login'],
        ],

        //微信用户组件
        'wechat' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\Wechat',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '__Wechat_identity', 'httpOnly' => true],
            'idParam' => '__Wechat',
            'loginUrl' => ['wechat/login/login'],
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'logFile' => '@app/runtime/logs/'.date("Ymd", time()) . 'error.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'categories' => ['info'],
                    'logFile' => '@app/runtime/logs/'.date("Ymd", time()) . 'info.log',
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 20,
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logFile' => '@app/runtime/logs/'.date("Ymd", time()) . 'warning.log',
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    // 模块配置
    'modules' => [
        // 后台模块的配置
        'admin' => [
            'class' => 'app\modules\admin\AdminClass',
        ],
        // 微信模块配置
        'wechat' => [
            'class' => 'app\modules\wechat\WechatClass',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
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
