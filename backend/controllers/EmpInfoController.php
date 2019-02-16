<?php

namespace backend\controllers;

use Yii;
use common\models\EmpInfo;
use common\models\EmpReference;
use common\models\EmpInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * EmpInfoController implements the CRUD actions for EmpInfo model.
 */
class EmpInfoController extends Controller
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
                        'actions' => ['logout', 'index', 'create', 'view', 'update', 'delete', 'bulk-delete','emp-details'],
                        'allow' => true,
                        'roles' => ['@','view'],
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
     * Lists all EmpInfo models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new EmpInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single EmpInfo model.
     * @param integer $id
     * @return mixed
     */
    // public function actionView($id)
    // {   
    //     $request = Yii::$app->request;
    //     if($request->isAjax){
    //         Yii::$app->response->format = Response::FORMAT_JSON;
    //         return [
    //                 'title'=> "EmpInfo #".$id,
    //                 'content'=>$this->renderAjax('view', [
    //                     'model' => $this->findModel($id),
    //                 ]),
    //                 'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
    //                         Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
    //             ];    
    //     }else{
    //         return $this->render('view', [
    //             'model' => $this->findModel($id),
    //         ]);
    //     }
    // }

    public function actionView($id)
    {
       return $this->render('emp-details'); 
    }

   
    /**
     * Creates a new EmpInfo model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new EmpInfo();  
        $empRefModel = new EmpReference();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new EmpInfo",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'empRefModel' => $empRefModel,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $empRefModel->load($request->post())){
                        $model->emp_photo = UploadedFile::getInstance($model,'emp_photo');
                        if(!empty($model->emp_photo)){
                            $imageName = $model->emp_name.'_emp_photo'; 
                            $model->emp_photo->saveAs('uploads/'.$imageName.'.'.$model->emp_photo->extension);
                            //save the path in the db column
                            $model->emp_photo = 'uploads/'.$imageName.'.'.$model->emp_photo->extension;
                        } else {
                           $model->emp_photo = '0'; 
                        }
                        $model->degree_scan_copy = UploadedFile::getInstance($model,'degree_scan_copy');
                        if(!empty($model->degree_scan_copy)){
                            $imageName = $model->emp_name.'_degree_scan_copy'; 
                            $model->degree_scan_copy->saveAs('uploads/'.$imageName.'.'.$model->degree_scan_copy->extension);
                            //save the path in the db column
                            $model->degree_scan_copy = 'uploads/'.$imageName.'.'.$model->degree_scan_copy->extension;
                        } else {
                           $model->degree_scan_copy = '0'; 
                        }
                        $model->created_by = Yii::$app->user->identity->id; 
                        $model->created_at = new \yii\db\Expression('NOW()');
                        $model->updated_by = '0';
                        $model->updated_at = '0';
                        $model->save();

                        $empRefModel->emp_id = $model->emp_id;
                        $empRefModel->created_by = Yii::$app->user->identity->id; 
                        $empRefModel->created_at = new \yii\db\Expression('NOW()');
                        $empRefModel->updated_by = '0'; 
                        $empRefModel->updated_at = '0';
                        $empRefModel->save();

                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new EmpInfo",
                    'content'=>'<span class="text-success">Create EmpInfo success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new EmpInfo",
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
                return $this->redirect(['view', 'id' => $model->emp_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing EmpInfo model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id); 
        $emp_info = Yii::$app->db->createCommand("SELECT emp_photo, degree_scan_copy FROM emp_info where emp_id = $id")->queryAll();      

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update EmpInfo #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post())){
                        $model->emp_photo = UploadedFile::getInstance($model,'emp_photo');
                        if(!empty($model->emp_photo)){
                            $imageName = $model->emp_name.'_emp_photo'; 
                            $model->emp_photo->saveAs('uploads/'.$imageName.'.'.$model->emp_photo->extension);
                            //save the path in the db column
                            $model->emp_photo = 'uploads/'.$imageName.'.'.$model->emp_photo->extension;
                        } else {
                           $model->emp_photo = $emp_info[0]['emp_photo'];  
                        }
                        $model->degree_scan_copy = UploadedFile::getInstance($model,'degree_scan_copy');
                        if(!empty($model->degree_scan_copy)){
                            $imageName = $model->emp_name.'_degree_scan_copy'; 
                            $model->degree_scan_copy->saveAs('uploads/'.$imageName.'.'.$model->degree_scan_copy->extension);
                            //save the path in the db column
                            $model->degree_scan_copy = 'uploads/'.$imageName.'.'.$model->degree_scan_copy->extension;
                        } else {
                           $model->degree_scan_copy = $emp_info[0]['degree_scan_copy'];  
                        }
                        $model->updated_by = Yii::$app->user->identity->id;
                        $model->updated_at = new \yii\db\Expression('NOW()');
                        $model->created_by = $model->created_by;
                        $model->created_at = $model->created_at;
                        $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "EmpInfo #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update EmpInfo #".$id,
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
            if ($model->load($request->post())) {
                $model->emp_photo = UploadedFile::getInstance($model,'emp_photo');
                        if(!empty($model->emp_photo)){
                            $imageName = $model->emp_name.'_emp_photo'; 
                            $model->emp_photo->saveAs('uploads/'.$imageName.'.'.$model->emp_photo->extension);
                            //save the path in the db column
                            $model->emp_photo = 'uploads/'.$imageName.'.'.$model->emp_photo->extension;
                        } else {
                           $model->emp_photo = $emp_info[0]['emp_photo'];  
                        }
                        $model->degree_scan_copy = UploadedFile::getInstance($model,'degree_scan_copy');
                        if(!empty($model->degree_scan_copy)){
                            $imageName = $model->emp_name.'_degree_scan_copy'; 
                            $model->degree_scan_copy->saveAs('uploads/'.$imageName.'.'.$model->degree_scan_copy->extension);
                            //save the path in the db column
                            $model->degree_scan_copy = 'uploads/'.$imageName.'.'.$model->degree_scan_copy->extension;
                        } else {
                           $model->degree_scan_copy = $emp_info[0]['degree_scan_copy'];  
                        }
                        $model->updated_by = Yii::$app->user->identity->id;
                        $model->updated_at = new \yii\db\Expression('NOW()');
                        $model->created_by = $model->created_by;
                        $model->created_at = $model->created_at;
                        $model->save();
                return $this->redirect(['view', 'id' => $model->emp_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing EmpInfo model.
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
     * Delete multiple existing EmpInfo model.
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

    public function actionUpload()
    {
    $fileName = 'file';
    $uploadPath = 'uploads';

    if (isset($_FILES[$fileName])) {
        $file = \yii\web\UploadedFile::getInstanceByName($fileName);

        //Print file data
        //print_r($file);

        if ($file->saveAs($uploadPath . '/' . $file->name)) {
            //Now save file data to database

            echo \yii\helpers\Json::encode($file);
        }
    } else {
        return $this->render('upload');
    }

    return false;

    }

    /**
     * Finds the EmpInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmpInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmpInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
