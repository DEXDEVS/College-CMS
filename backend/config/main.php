<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'ur',
    'sourceLanguage' => 'en',
     'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ], 
    ],
    'components' => [
        'request' => [
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/admin',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            //'class' => 'app\components\User', // extend User component
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
                'admin' => 'admin',
                'login' => 'site/login',
                'logout' => 'site/login',
                'home' => 'site/index',

                'branches-view' => 'branches/view',
                'departments-view' => 'departments/view',
                'std-enrollment-head-view' => 'std-enrollment-head/view',
                //'std-enrollment-head-view' => 'std-enrollment-head/view',
                'std-promote' => 'std-enrollment-head/std-promote',
                'teacher-subject-assign-head-view' => 'teacher-subject-assign-head/view',

                'std-personal-info-view' => 'std-personal-info/view',
                'std-registration' => 'std-registration/create',
                'std-personal-info-update' => 'std-personal-info/update',
                'std-personal-info-std-photo' => 'std-personal-info/std-photo',

                'std-guardian-info-update' => 'std-guardian-info/update',
                'std-ice-info-update' => 'std-ice-info/update',
                'std-academic-info-update' => 'std-academic-info/update',
                'std-fee-details-update' => 'std-fee-details/update',
                'inquiry-report' => 'std-inquiry/inquiry-report',
                'inquiry-report-detail' => 'std-inquiry/inquiry-report-detail',

                'emp-info-view' => 'emp-info/view',
                'emp-info-update' => 'emp-info/update',

                'emp-reference-update' => 'emp-reference/update',
                'emp-documents-create' => 'emp-documents/create',

                'class-account' => 'fee-transaction-detail/class-account',
                'fee-transaction-detail-fee-voucher' => 'fee-transaction-detail/fee-voucher',
                'fee-transaction-detail-collect-voucher' => 'fee-transaction-detail/collect-voucher',
                'fee-transaction-detail-class-account-fee-report' => 'fee-transaction-detail/class-account-fee-report',
                'class-fee-report-detail' => 'fee-transaction-detail/class-fee-report-detail',
                'fee-transaction-detail-class-account-info' => 'fee-transaction-detail/class-account-info',
                'voucher' => 'fee-transaction-detail/voucher',
                'partial-voucher-detail' => 'fee-transaction-detail/partial-voucher-detail',
                'partial-voucher-head' => 'fee-transaction-detail/partial-voucher-head',


                'emails-create' => 'emails/create',

                'sms' => 'sms/index',
                'absent-sms' => 'sms/absent-sms',
                'custom-sms' => 'custom-sms/index',


            ],
        ],
        
    ],
    'params' => $params,
];
