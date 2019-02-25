<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmpInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emp Infos';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>

<script src="https://code.highcharts.com/highcharts.js"></script>

<div class="row">
    <!-- Department Wise Employees Start -->
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-university"></i> Department Wise Employees</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive" id="div1"></div>
        </div>
    </div>
    </div>
    <!--- Department Wise Employees End --->
    <!-- ******************************* -->
    <!-- Designation Wise Employees Start -->
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-sitemap"></i> Designation Wise Employees</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
        <div class="box-body">
            <div class="table-responsive" id="div2">
                <?php
                $emp_designation = Yii::$app->db->createCommand("SELECT emp_designation_id,emp_designation FROM emp_designation")->queryAll();
                $countDesignation = count($emp_designation);                             
                for ($i=0; $i <$countDesignation ; $i++) { 
                    $ID = $emp_designation[3]['emp_designation_id'];
                    $empDepWise = Yii::$app->db->createCommand("SELECT COUNT(ed.emp_designation_id), ed.emp_designation FROM emp_designation as ed INNER JOIN emp_info as ei on ei.emp_designation_id = ed.emp_designation_id WHERE ei.emp_designation_id = '$ID'")->queryAll();
                // 
                    //     if(!empty($empDepWise)) {
                    //     echo Highcharts::widget([
                    //         'scripts' => [
                    //             'highcharts-3d',   
                    //         ],
                    //         'options' => [  
                    //             'exporting'=>[
                    //                 'enabled'=>false 
                    //             ],
                    //             'legend'=>[
                    //                 'align'=>'center',
                    //                 'verticalAlign'=>'bottom',
                    //                 'layout'=>'vertical',
                    //                 'x'=>0,
                    //                 'y'=>0,
                    //             ],
                    //             'credits'=>[
                    //                     'enabled'=>false
                    //              ],
                    //             'chart'=> [
                    //                 'type'=>'pie',
                    //                 'options3d'=>[
                    //                     'enabled'=>true,
                    //                     'alpha'=>45,
                    //                     'beta'=>0
                    //                 ],
                    //             ],
                    //             'title'=>[
                    //                 'text'=>'',
                    //                 'margin'=>0,
                    //             ],
                    //             'plotOptions'=>[
                    //                 'pie'=>[
                    //                     'allowPointSelect'=>true,
                    //                         'cursor'=>'pointer',
                    //                         'depth'=>35,
                    //                     'dataLabels'=>[
                    //                         'enabled'=>false
                    //                          ],
                    //                      'showInLegend'=>true,
                    //                 ],  
                    //                 'series'=>[
                    //                     'pointPadding'=>0,
                    //                     'groupPadding'=>0,      
                    //                  ],
                    //             ],
                    //             'series'=> [
                    //                 [
                    //                     'name'=>'Total Employee',
                    //                     'data'=>$empDepWise
                    //                 ]
                    //             ]
                    //         ],
                    //     ]);
                    // } else {
                    //     echo '<div class="alert alert-danger">No results found.</div>';
                    // }
                }  
                // ending of If....
                ?>
              </div>
            </div>
          </div>
    </div>
    <!-- Designation Wise Employees End -->
</div>

<div class="emp-info-index">
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
                    ['role'=>'modal-remote','title'=> 'Create new Emp Infos','class'=>'btn btn-default']).
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
                'heading' => '<i class="glyphicon glyphicon-list"></i> Emp Infos listing',
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
