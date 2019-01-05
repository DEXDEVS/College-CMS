<?php

namespace backend\controllers;

use Yii;
use common\models\FeeTransactionDetail;
use common\models\FeeTransactionHead;
use common\models\FeeTransactionDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * FeeTransactionDetailController implements the CRUD actions for FeeTransactionDetail model.
 */
class FeeTransactionDetailController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index',  'create', 'view', 'update', 'delete', 'bulk-delete', 'fee-voucher', 'fetch-students', 'collect-voucher', 'update-voucher', 'generate-voucher', 'class-account','voucher'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all FeeTransactionDetail models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new FeeTransactionDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
    }


    /**
     * Displays a single FeeTransactionDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "FeeTransactionDetail #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new FeeTransactionDetail model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new FeeTransactionDetail(); 
        $feeTransactionHead = new FeeTransactionHead();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new FeeTransactionDetail",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'feeTransactionHead' => $feeTransactionHead,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($feeTransactionHead->load($request->post()) && $model->load($request->post())){
                        $stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info where std_id = $feeTransactionHead->std_id")->queryAll();
                        $feeTransactionHead->std_name = $stdName[0]['std_name'];
                        $feeTransactionHead->status = "Unpaid";
                        $feeTransactionHead->created_by = Yii::$app->user->identity->id; 
                        $feeTransactionHead->created_at = new \yii\db\Expression('NOW()');
                        $feeTransactionHead->updated_by = '0'; 
                        $feeTransactionHead->updated_at = '0';
                        $feeTransactionHead->save();
                        
                        $str = $model->net_total;
                        $feeId = explode(",",$str);

                        $str1 = $model->fee_amount;
                        $feeAmount = explode(",",$str1);
                    
                        $str2= $model->fee_discount;
                        $feeDiscount = explode(",",$str2);

                        $str3= $model->discounted_value;
                        $discontValue = explode(",",$str3);
                        
                        foreach ($feeAmount as $index => $value) {
                            $model = new FeeTransactionDetail();
                            $model->fee_trans_detail_head_id = $feeTransactionHead->fee_trans_id;
                            $model->fee_type_id = $feeId[$index];
                            $model->fee_amount = $value;
                            $model->fee_discount = $feeDiscount[$index];
                            $model->discounted_value = $discontValue[$index];


                            // created and updated values...
                            $model->created_by = Yii::$app->user->identity->id;
                            $model->created_at = new \yii\db\Expression('NOW()');
                            $model->updated_at = 0;
                            $model->updated_by = 0;
                            $model->save();
                        }
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new FeeTransactionDetail",
                    'content'=>'<span class="text-success">Create FeeTransactionDetail success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new FeeTransactionDetail",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->fee_trans_detail_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing FeeTransactionDetail model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update FeeTransactionDetail #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "FeeTransactionDetail #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update FeeTransactionDetail #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->fee_trans_detail_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionFetchStudents()
    {   
        return $this->render('fetch-students');
    }
    
    public function actionFeeVoucher()
    {
        return $this->render('fee-voucher');
    }

    public function actionCollectVoucher()
    {
        return $this->render('collect-voucher');
    }

    public function actionUpdateVoucher()
    {
        return $this->render('update-voucher');
    }

    public function actionGenerateVoucher()
    {
        return $this->render('generate-voucher');
    }

    public function actionClassAccount()
    {
        return $this->render('class-account');
    }

    public function actionVoucher()
    {
        return $this->render('voucher');
    }

    /**
     * Delete an existing FeeTransactionDetail model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing FeeTransactionDetail model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the FeeTransactionDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FeeTransactionDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FeeTransactionDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
