<?php

namespace backend\controllers;

use Yii;
use common\models\TeacherSubjectAssignDetail;
use common\models\TeacherSubjectAssignDetailSearch;
use common\models\TeacherSubjectAssignHead;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * TeacherSubjectAssignDetailController implements the CRUD actions for TeacherSubjectAssignDetail model.
 */
class TeacherSubjectAssignDetailController extends Controller
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
                        'actions' => ['logout', 'index', 'create', 'view', 'update', 'delete', 'bulk-delete'],
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
     * Lists all TeacherSubjectAssignDetail models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new TeacherSubjectAssignDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single TeacherSubjectAssignDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "<b>Teacher Subject Assign Detail: </b>".$id,
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
     * Creates a new TeacherSubjectAssignDetail model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new TeacherSubjectAssignDetail();  
        $teacherSubjectAssignHead = new TeacherSubjectAssignHead();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "<b>Create new Teacher Subject Assign Detail</b>",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'teacherSubjectAssignHead' => $teacherSubjectAssignHead,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-danger pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-success','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->validate()
                && $teacherSubjectAssignHead->load($request->post()) && $teacherSubjectAssignHead->validate()){

                $techer_enrollment_head = Yii::$app->db->createCommand("SELECT * FROM teacher_subject_assign_head where teacher_id = $teacherSubjectAssignHead->teacher_id")->queryAll();
                if(!empty($techer_enrollment_head)){
                    $teacherAssignHead = $techer_enrollment_head[0]['teacher_subject_assign_head_id'];
                    // select2 add multiple students start...!
                    $array = $model->class_id;
                    $sub = $model->subject_id;
                    $lec = $model->no_of_lecture;

                    foreach ($sub as  $valu) {
                        foreach ($array as  $value) {
                            $model = new TeacherSubjectAssignDetail();
                            $model->teacher_subject_assign_detail_head_id = $teacherAssignHead;
                            $model->class_id = $value;
                            $model->subject_id = $valu;
                            $model->no_of_lecture = $lec;

                            // created and updated values...
                            $model->created_by = Yii::$app->user->identity->id; 
                            $model->created_at = new \yii\db\Expression('NOW()');
                            $model->updated_by = '0';
                            $model->updated_at = '0';
                            $model->save(false);
                        }
                    }
                    // select2 add multiple students end...! 

                } else {
                    $teacher_name = Yii::$app->db->createCommand("SELECT emp_name FROM emp_info where emp_id = $teacherSubjectAssignHead->teacher_id")->queryAll();

                    $teacherSubjectAssignHead->teacher_subject_assign_head_name = $teacher_name[0]['emp_name'];
                    $teacherSubjectAssignHead->created_by = Yii::$app->user->identity->id; 
                    $teacherSubjectAssignHead->created_at = new \yii\db\Expression('NOW()');
                    $teacherSubjectAssignHead->updated_by = '0';
                    $teacherSubjectAssignHead->updated_at = '0'; 
                    $teacherSubjectAssignHead->save();

                    // select2 add multiple students start...!
                    $array = $model->class_id;
                    $sub = $model->subject_id;
                    $lec = $model->no_of_lecture;

                    foreach ($sub as  $valu) {
                        foreach ($array as  $value) {
                            $model = new TeacherSubjectAssignDetail();
                            $model->teacher_subject_assign_detail_head_id = $teacherSubjectAssignHead->teacher_subject_assign_head_id;
                            $model->class_id = $value;
                            $model->subject_id = $valu;
                            $model->no_of_lecture = $lec;

                            // created and updated values...
                            $model->created_by = Yii::$app->user->identity->id; 
                            $model->created_at = new \yii\db\Expression('NOW()');
                            $model->updated_by = '0';
                            $model->updated_at = '0';
                            $model->save(false);
                        }
                    }
                    // select2 add multiple students end...! 
                    // end of else     
                    }          
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "<b>Create new Teacher Subject Assign Detail</b>",
                    'content'=>'<span class="text-success">Create TeacherSubjectAssignDetail success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-danger pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-success','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "<b>Create new Teacher Subject Assign Detail</b>",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                         'teacherSubjectAssignHead' => $teacherSubjectAssignHead,
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
                return $this->redirect(['view', 'id' => $model->teacher_subject_assign_detail_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing TeacherSubjectAssignDetail model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id); 
        $teacherSubjectAssignHead = new TeacherSubjectAssignHead();      

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "<b>Update Teacher Subject Assign Detail: </b>".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'teacherSubjectAssignHead' => $teacherSubjectAssignHead,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-danger pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-success','type'=>"submit"])
                ];         
            }else if($teacherSubjectAssignHead->load($request->post()) && $model->load($request->post())){
                        $teacher_name = Yii::$app->db->createCommand("SELECT emp_name FROM emp_info where emp_id = $teacherSubjectAssignHead->teacher_id")->queryAll();

                        $teacherSubjectAssignHead->teacher_subject_assign_head_name = $teacher_name[0]['emp_name'];
                        $teacherSubjectAssignHead->updated_by = Yii::$app->user->identity->id;
                        $teacherSubjectAssignHead->updated_at = date('Y-m-d h:m:s');
                        $teacherSubjectAssignHead->created_by = $model->created_by;
                        $teacherSubjectAssignHead->created_at = $model->created_at; 
                        $teacherSubjectAssignHead->save();

                        // select2 add multiple students start...!
                        $array = $model->class_id;
                        $sub = $model->subject_id;
                        foreach ($sub as  $valu) {
                            foreach ($array as  $value) {
                                $model = new TeacherSubjectAssignDetail();
                                $model->teacher_subject_assign_detail_head_id = $teacherSubjectAssignHead->teacher_subject_assign_head_id;
                                $model->class_id = $value;
                                $model->subject_id = $valu;

                                // created and updated values...
                                $model->updated_by = Yii::$app->user->identity->id;
                                $model->updated_at = date('Y-m-d h:m:s');
                                $model->created_by = $model->created_by;
                                $model->created_at = $model->created_at;
                                $model->save(false);
                            }
                        }
                        // select2 add multiple students end...! 
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "<b>Teacher Subject Assign Detail: </b>".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-danger pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-success','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "<b>Update Teacher Subject Assign Detail: </b>".$id,
                    'content'=>$this->renderAjax('update', [
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
                return $this->redirect(['view', 'id' => $model->teacher_subject_assign_detail_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing TeacherSubjectAssignDetail model.
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
     * Delete multiple existing TeacherSubjectAssignDetail model.
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
     * Finds the TeacherSubjectAssignDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TeacherSubjectAssignDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TeacherSubjectAssignDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
