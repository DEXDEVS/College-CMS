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
    //     'attribute'=>'academic_id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'std_id',
        'value'=>'std.std_name'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'class_name_id',
        'value'=>'className.class_name'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'subject_combination',
        'value'=>'subject_combination'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'previous_class',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'passing_year',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'total_marks',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'obtained_marks',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'grades',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'percentage',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'Institute',
    // ],
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