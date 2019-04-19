<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
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

<?php  
    // total inquiries...
    $query = (new \yii\db\Query())->from('std_inquiry');
    $countTotal = $query->count('std_inquiry_id');
    // total male inquiries...
    $query = (new \yii\db\Query())->from('std_inquiry')->where(['gender'=>'Male']);
    $countMale = $query->count('std_inquiry_id'); 
    // total female inquires...
    $query = (new \yii\db\Query())->from('std_inquiry')->where(['gender'=>'Female']);
    $countFemale = $query->count('std_inquiry_id');
    // total registered inquiries...
    $query = (new \yii\db\Query())->from('std_inquiry')->where(['inquiry_status'=>'Registered']);
    $countRegistered = $query->count('std_inquiry_id'); 

    $query90 = Yii::$app->db->createCommand("SELECT std_inquiry_id FROM `std_inquiry` WHERE `std_percentage` >= '90%' OR `std_percentage` <= '100%'")->queryAll();
    $count90 = count($query90);
    $query80 = Yii::$app->db->createCommand("SELECT std_inquiry_id FROM `std_inquiry` WHERE `std_percentage` >= '80%' AND `std_percentage` <= '89%'")->queryAll();
    $count80 = count($query80);
    $query70 = Yii::$app->db->createCommand("SELECT std_inquiry_id FROM `std_inquiry` WHERE `std_percentage` >= '70%' AND `std_percentage` <= '79%'")->queryAll();
    $count70 = count($query70);
    $query60 = Yii::$app->db->createCommand("SELECT std_inquiry_id FROM `std_inquiry` WHERE `std_percentage` >= '60%' AND `std_percentage` <= '69%'")->queryAll();
    $count60 = count($query60);
    $query50 = Yii::$app->db->createCommand("SELECT std_inquiry_id FROM `std_inquiry` WHERE `std_percentage` >= '50%' AND `std_percentage` <= '59%'")->queryAll();
    $count50 = count($query50);

?>

<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title" style="color: #3C8DBC;">
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                Graphical Statistics of Student's Inquiry
            </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- DONUT CHART -->
          <div class="col-md-6">
              <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #DD4B39;"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                        Inquiry - Class Wise <small style="color: #DD4B39;"> Session 2019 - 2021</small>
                    </h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" style="color: #04e27b;"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" style="color: #DD4B39;"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="col-md-12 col-sm-12" id="container1"></div>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
          <!-- /.box -->
          <!-- DONUT CHART -->
          <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #00C0EF;"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                        Inquiry - Percentage Wise <small style="color: #00C0EF;"> Session 2019 - 2021</small>
                    </h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" style="color: #04e27b;"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" style="color: #DD4B39;"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="col-md-12 col-sm-12" id="container2"></div>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
          <!-- /.box -->
          <!-- DONUT CHART -->
          <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #F39C12;"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                        Inquiry - Institute Wise <small style="color: #F39C12;"> Session 2019 - 2021</small>
                    </h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" style="color: #04e27b;"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" style="color: #DD4B39;"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="col-md-12 col-sm-12" id="container3"></div>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
</div>

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
                            'buttons'=>Html::a('<i class="fa fa-comments-o"></i>&nbsp; Send SMS',
                                ["bulk-sms"] ,
                                [
                                    "class"=>"btn btn-success btn-xs",
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

<script type="text/javascript">
    Highcharts.chart('container1', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: '<b></b>'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            pie: {
                innerSize: 60,
                depth: 100,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: ({point.y:1f})',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Number of Students',
            data: [
            <?php  
            // SELECT all Institutes....
            $queryClasses = Yii::$app->db->createCommand("SELECT DISTINCT(std_intrested_class) FROM std_inquiry")->queryAll();
        //    $count = count($queryInstitutes); 
            foreach ($queryClasses as $key => $value) {
                $intrestedClasses = $value['std_intrested_class'];
                $queryInquiries = Yii::$app->db->createCommand("SELECT std_intrested_class FROM std_inquiry WHERE std_intrested_class = '$intrestedClasses'")->queryAll();
                $count = count($queryInquiries);
                    echo "['<b>".$queryInquiries[0]['std_intrested_class']."</b>', ".$count."],";
                }
            ?>
            ]
        }]
        
    });
    // Inquiry - Percentage Wise
    Highcharts.chart('container2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '<b></b>'
        },
        subtitle: {
                text: ''
            },
        // tooltip: {
        //     pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
        // },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: ({point.y:1f})',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Students',
            colorByPoint: true,
            data: [
                {
                 "name": "<b>90% to 100%</b>",
                    "y": <?php echo $count90; ?>,              
                    sliced: true,
                    selected: true
                },
                {
                    "name": "<b>80% to 89%</b>",
                    "y": <?php echo $count80; ?>,
                    "drilldown": "Firefox"
                },
                {
                    "name": "<b>70% to 79%</b>",
                    "y": <?php echo $count70; ?>,
                    "drilldown": "Internet Explorer"
                },
                {
                    "name": "<b>60% to 69%</b>",
                    "y": <?php echo $count60; ?>,
                    "drilldown": null
                },
                {
                    "name": "<b>50% to 59%</b>",
                    "y": <?php echo $count50; ?>,
                    "drilldown": null
                }
            ]
        }]
    });
    Highcharts.chart('container3', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: '<b></b>'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            pie: {
                innerSize: 60,
                depth: 100,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: ({point.y:1f})',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Number of Students',
            data: [
            <?php  
            // SELECT all Institutes....
            $queryInstitutes = Yii::$app->db->createCommand("SELECT DISTINCT(previous_institute) FROM std_inquiry")->queryAll();
            $count = count($queryInstitutes); 
            foreach ($queryInstitutes as $key => $value) {
                $previousInstitute = $value['previous_institute'];
                $queryInquiries = Yii::$app->db->createCommand("SELECT std_inquiry_id,previous_institute FROM std_inquiry WHERE previous_institute = '$previousInstitute'")->queryAll();
                $count = count($queryInquiries);
                    echo "['<b>".$queryInquiries[0]['previous_institute']."</b>', ".$count."],";
                }
            ?>
            ]
        }]
        
    });
</script>