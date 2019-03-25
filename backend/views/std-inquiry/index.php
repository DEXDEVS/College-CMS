<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StdInquirySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Inquiries';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>

<div class="std-inquiry-index">
    
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                $gridColumns = [
                    'std_inquiry_no',
                    //'inquiry_session',
                    'std_name',
                    'std_father_name',
                    'gender',
                    'std_contact_no',
                    'std_father_contact_no',
                    //'std_inquiry_date',
                    //'previous_institute',
                    'std_intrested_class',
                    //'std_previous_class',
                    //'std_roll_no',
                    //'std_obtained_marks',
                    //'std_total_marks',
                    'std_percentage',
                    'refrence_name',
                    //'refrence_contact_no',
                    //'refrence_designation',
                    //'std_address',
                    //'inquiry_status',
                ],
                //Reader a export dropdown menu
                ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $gridColumns
                ]),
                ['content'=>
                    Html::a('<i class="fa fa-registered"></i>', ['./inquiry-report'],
                    ['role'=>'','title'=> 'Date Range Report','class'=>'btn btn-info']).
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Std Inquiries','class'=>'btn btn-success']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-warning', 'title'=>'Reset Grid']).
                    '{toggleData}'
                    //'{export}'
                ],    
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Student Inquiries',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "size"=>"modal-lg",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>