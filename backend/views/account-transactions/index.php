<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AccountTransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Transactions';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>

<div class="account-transactions-index">
    <!-- Income and Expense Widgets start -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                          <h3>Rs</h3>
                          <h4>50,000</h4>
                        </div>
                        <div class="icon">
                          <i class="fa fa-calculator"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <i class="fa fa-money"></i><b> Current Income This Month</b>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                          <h3>Rs</h3>
                          <h4>5000</h4>
                        </div>
                        <div class="icon">
                          <i class="fa fa-calculator"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <i class="fa fa-money"></i><b> Current Expense This Month</b>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>Rs</h3>
                        <h4>45,000</h4>
                    </div>
                    <div class="icon">
                      <i class="fa fa-money"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <i class="fa fa-money"></i><b> Your Current Balance</b>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <div class="inner">
                      <h3>Rs</h3>
                      <h4>5000</h4>
                    </div>
                    </div>
                    <div class="icon">
                      <i class="fa fa-expand"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <i class="fa fa-arrow-circle-right"></i><b> Your Total Expense</b>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </div>
    <!-- Income and Expense Widgets close -->

    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Account Transactions','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Account Transactions listing',
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
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
