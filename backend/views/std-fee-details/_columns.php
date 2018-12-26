<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    //     [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'fee_id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'std_id',
        'value'=>'std.std_name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'admission_fee',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'addmission_fee_discount',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'net_addmission_fee',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fee_category',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'concession_id',
        'value'=>'concession.concession_name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tuition_fee',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'no_of_installment',
    ],
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'net_tuition_fee',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_by',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_by',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   