<?php

namespace backend\controllers;

use Yii;
use common\models\StdEnrollmentDetail;
use common\models\StdEnrollmentDetailSearch;
use common\models\StdEnrollmentHead;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * StdEnrollmentDetailController implements the CRUD actions for StdEnrollmentDetail model.
 */
class StdEnrollmentDetailController extends Controller
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
                        'actions' => ['logout', 'index'],
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
     * Lists all StdEnrollmentDetail models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new StdEnrollmentDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single StdEnrollmentDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "<b>Stdudent Enrollment Detail: </b>".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-danger pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-success','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new StdEnrollmentDetail model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new StdEnrollmentDetail(); 
        $stdEnrollmentHead = new StdEnrollmentHead(); 

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "<b>Create new Stdudent Enrollment Detail</b>",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'stdEnrollmentHead' => $stdEnrollmentHead,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-success pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-danger','type'=>"submit"])
        
                ];         
            }else if($stdEnrollmentHead->load($request->post()) && $model->load($request->post())){

                $className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name where class_name_id = $stdEnrollmentHead->class_name_id")->queryAll();
                $session = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions where session_id = $stdEnrollmentHead->session_id")->queryAll();
                $section = Yii::$app->db->createCommand("SELECT section_name FROM std_sections where section_id = $stdEnrollmentHead->section_id")->queryAll();
                                    
                $stdEnrollmentHead->std_enroll_head_name = $className[0]['class_name'].'-'.$session[0]['session_name'].'-'.$section[0]['section_name'];
                $stdEnrollmentHead->created_by = Yii::$app->user->identity->id; 
                $stdEnrollmentHead->created_at = new \yii\db\Expression('NOW()');
                $stdEnrollmentHead->updated_by = '0';
                $stdEnrollmentHead->updated_at = '0'; 
                $stdEnrollmentHead->save();

                // select2 add multiple students start...!
                $array = $model->std_enroll_detail_std_id;
                foreach ($array as  $value) {
                    $model = new StdEnrollmentDetail();
                    $model->std_enroll_detail_head_id = $stdEnrollmentHead->std_enroll_head_id;
                    $model->std_enroll_detail_std_id = $value;
                    $stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info WHERE std_id = '$value'")->queryAll();
                    $model->std_enroll_detail_std_name = $stdName[0]['std_name'];

                // select2 add multiple students end...!    

                    // created and updated values...
                    $model->created_by = Yii::$app->user->identity->id; 
                    $model->created_at = new \yii\db\Expression('NOW()');
                    $model->updated_by = '0';
                    $model->updated_at = '0'; 
                    $model->save();
                }
                
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Stdudent Enrollment Detail",
                    'content'=>'<span class="text-success">Create StdEnrollmentDetail success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-danger pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-success','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Stdudent Enrollment Detail",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-danger pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-success','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->std_enroll_detail_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing StdEnrollmentDetail model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);   
        $stdEnrollmentHead = new StdEnrollmentHead(); 
    

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "<b>Update Student Enrollment Detail: </b>".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'stdEnrollmentHead' => $stdEnrollmentHead,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-danger pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-success','type'=>"submit"])
                ];         
            }else if($stdEnrollmentHead->load($request->post()) && $model->load($request->post())){

                $course_class = Yii::$app->db->createCommand("SELECT class_name FROM std_class where class_id = $stdEnrollmentHead->class_id")->queryAll();

                $stdEnrollmentHead->std_enroll_head_name = $course_class[0]['class_name'];
                $stdEnrollmentHead->updated_by = Yii::$app->user->identity->id; 
                $stdEnrollmentHead->updated_at = new \yii\db\Expression('NOW()');
                $stdEnrollmentHead->created_by = $model->created_by;
                $stdEnrollmentHead->created_at = $model->created_at; 
                $stdEnrollmentHead->save();

                // select2 add multiple students start...!
                $array = $model->std_enroll_detail_std_id;
                foreach ($array as  $value) {
                    $model = new StdEnrollmentDetail();
                    $model->std_enroll_detail_head_id = $stdEnrollmentHead->std_enroll_head_id;
                    $model->std_enroll_detail_std_id = $value;
                    $stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info WHERE std_id = '$value'")->queryAll();
                    $model->std_enroll_detail_std_name = $stdName[0]['std_name'];

                    // created and updated values...
                    $model->updated_by = Yii::$app->user->identity->id;
                    $model->updated_at = new \yii\db\Expression('NOW()');
                   // $model->created_by = $model->created_by;
                    //$model->created_at = $model->created_at;
                    $model->save();
                }
                // select2 add multiple students end...!                
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "StdEnrollmentDetail #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update StdEnrollmentDetail #".$id,
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
                return $this->redirect(['view', 'id' => $model->std_enroll_detail_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }


    /**
     * Delete an existing StdEnrollmentDetail model.
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
     * Delete multiple existing StdEnrollmentDetail model.
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
     * Finds the StdEnrollmentDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StdEnrollmentDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StdEnrollmentDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
