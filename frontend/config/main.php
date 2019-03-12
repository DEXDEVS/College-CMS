<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
        ],
    ],
    'components' => [
        'request' => [
            'class' => 'common\components\Request',
            'web'=> '/frontend/web',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'login' => 'site/login',
                'logout' => 'site/login',
                //'signup' => 'site/signup',
                'home' => 'site/index',
                
                'attendance' => 'std-attendance',
                'student-attendance' => 'std-attendance/attendance',
                'class-attendance' => 'std-attendance/view-class-attendance',
                'view-attendance' => 'std-attendance/view-attendance',
                'test-attendance' => 'std-attendance/test-attendance',
                'take-attendance' => 'std-attendance/take-attendance',
                'datewise-class-attendance' => 'std-attendance/datewise-class-attendance',
                'datewise-student-attendance' => 'std-attendance/datewise-student-attendance',
                'daterangewise-class-attendance' => 'std-attendance/daterangewise-class-attendance',
                'daterangewise-student-attendance' => 'std-attendance/daterangewise-student-attendance',
                'activity-view' => 'std-attendance/activity-view',
            ],
        ],
        
    ],
    'params' => $params,
];
