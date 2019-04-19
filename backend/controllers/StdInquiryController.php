<?php

namespace backend\controllers;

use Yii;
use common\models\StdInquiry;
use common\models\StdInquirySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * StdInquiryController implements the CRUD actions for StdInquiry model.
 */
class StdInquiryController extends Controller
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
                        'actions' => ['logout', 'index', 'create', 'view', 'update', 'delete', 'bulk-delete','inquiry-report','inquiry-report-detail', 'bulk-sms'],
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
                    'bulk-sms' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all StdInquiry models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new StdInquirySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single StdInquiry model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $model = $this->findModel($id);
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Student Inquiry: ".$model->std_inquiry_no,
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
     * Creates a new StdInquiry model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if( Yii::$app->user->can('add-inquiry')){
        $request = Yii::$app->request;
        $model = new StdInquiry();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create Student Inquiry",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->validate()){
                $preClass = $model->std_previous_class[0];
                $model->std_previous_class = $preClass;
                $institute = $model->previous_institute[0];
                $model->previous_institute = $institute;
                $intrestedClass = $model->std_intrested_class[0];
                $model->std_intrested_class = $intrestedClass;
                $model->created_by = Yii::$app->user->identity->id; 
                $model->created_at = new \yii\db\Expression('NOW()');
                $model->updated_by = '0';
                $model->updated_at = '0';
                $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new StdInquiry",
                    'content'=>'<span class="text-success">Create StdInquiry success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['std-enrollment-head/create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new StdInquiry",
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
                return $this->redirect(['view', 'id' => $model->std_inquiry_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        }else{
            throw new ForbiddenHttpException(403, 'You are not authorized to perform this action');
            //Yii::$app->session->setFlash('warning','Your are not allowed to perform this action');
        }
       
    }

    /**
     * Updates an existing StdInquiry model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if( Yii::$app->user->can('update-inquiry')){
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Student Inquiry: ".$model->std_inquiry_no,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post())){
                        $institute = $model->previous_institute[0];
                        $model->previous_institute = $institute;
                        $intrestedClass = $model->std_intrested_class[0];
                        $model->std_intrested_class = $intrestedClass;
                        $model->updated_by = Yii::$app->user->identity->id;
                        $model->updated_at = new \yii\db\Expression('NOW()');
                        $model->created_by = $model->created_by;
                        $model->created_at = $model->created_at;
                        $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "StdInquiry #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update StdInquiry #".$id,
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
                return $this->redirect(['view', 'id' => $model->std_inquiry_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        }else{
            throw new ForbiddenHttpException(403, 'You are not authorized to perform this action');
            //Yii::$app->session->setFlash('warning','Your are not allowed to perform this action');
        }
    }

    /**
     * Delete an existing StdInquiry model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if( Yii::$app->user->can('delete-inquiry')){
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
        } else {
            throw new ForbiddenHttpException(403, 'You are not authorized to perform this action');
        }


    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionInquiryReport()
    {   
        return $this->render('inquiry-report');
    }

    public function actionInquiryReportDetail()
    {   
        return $this->render('inquiry-report-detail');
    }

     /**
     * Delete multiple existing StdInquiry model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {    

        if( Yii::$app->user->can('delete-inquiry')){   
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
        } else {
            throw new ForbiddenHttpException(403, 'You are not authorized to perform this action');
        }
       
    }

    public function actionBulkSms()
    {      
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        $array = array();
        foreach ( $pks as $pk ) {
            $inquiryStdNo = Yii::$app->db->createCommand("SELECT std_contact_no FROM std_inquiry WHERE std_inquiry_id = '$pk'")->queryAll();
            $number = $inquiryStdNo[0]['std_contact_no'];
            $numb = str_replace('-', '', $number);
            $num = str_replace('+', '', $numb);
                    
            $array[] = $num;
        }

        $to = implode(',', $array);

        if (isset($_POST['message'])) {
            $message = $_POST['message'];
        
            $type = "xml";
            $id = "Brookfieldclg";
            $pass = "college42";
            $lang = "English";
            $mask = "Brookfield";
            // Data for text message
            // $to = "923317375027";
            // $message = "Testing sms from brookfield web application";
            $message = urlencode($message);
            // Prepare data for POST request
            $data = "id=".$id."&pass=".$pass."&msg=".$message."&to=".$to."&lang=".$lang."&mask=".$mask."&type=".$type;
            // Send the POST request with cURL
            $ch = curl_init('http://www.sms4connect.com/api/sendsms.php/sendsms/url');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch); //This is the result from SMS4CONNECT
            curl_close($ch);     

            Yii::$app->session->setFlash('success', $result);
        }
        return $this->redirect(['./std-inquiry']);
    }

    /**
     * Finds the StdInquiry model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StdInquiry the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StdInquiry::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}