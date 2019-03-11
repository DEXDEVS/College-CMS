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
    //     'attribute'=>'exam_criteria_id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'exam_category_id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'std_enroll_head_id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'exam_start_date',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'exam_end_date',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'exam_start_time',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'exam_end_time',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'exam_room',
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