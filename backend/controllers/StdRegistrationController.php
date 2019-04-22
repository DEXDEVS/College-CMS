<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Html;
use common\models\StdRegistration;
use common\models\StdRegistrationSearch;
use common\models\StdGuardianInfo;
use common\models\StdIceInfo;
use common\models\StdAcademicInfo;
use common\models\StdFeeDetails;
use common\models\StdFeeInstallments;
use common\models\User;
use backend\controllers\SmsController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\db\Connection;

/**
 * StdRegistrationController implements the CRUD actions for StdRegistration model.
 */
class StdRegistrationController extends Controller
{
    /**
     * {@inheritdoc}
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
                        'actions' => ['logout', 'index', 'create', 'view', 'update', 'delete', 'bulk-delete','fetch-fee','student-details','std-photo','form'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all StdRegistration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StdRegistrationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StdRegistration model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StdRegistration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new StdRegistration();
        $stdGuardianInfo = new StdGuardianInfo();
        $stdIceInfo = new StdIceInfo();
        $stdAcademicInfo = new StdAcademicInfo();
        $stdFeeDetails = new StdFeeDetails();
        $stdFeeInstallments = new StdFeeInstallments();
        $conn = \Yii::$app->db;

        if ($model->load($request->post()) && $stdGuardianInfo->load($request->post()) && $stdIceInfo->load($request->post()) && $stdAcademicInfo->load($request->post()) && $stdFeeDetails->load($request->post()) && $stdFeeInstallments->load($request->post())) {
                $transection = $conn->beginTransaction();
                try {
                    $model->std_photo = UploadedFile::getInstance($model,'std_photo');
                    if(!empty($model->std_photo)){
                        $imageName = $model->std_name.'_photo'; 
                        $model->std_photo->saveAs('uploads/'.$imageName.'.'.$model->std_photo->extension);
                        //save the path in the db column
                        $model->std_photo = 'uploads/'.$imageName.'.'.$model->std_photo->extension;
                    } else {
                       $model->std_photo = 'uploads/'.'std_default.jpg'; 
                    }
                    $model->status     = "Active";
                    $model->academic_status = "Active";
                    $stdPassword = rand(1000, 10000);
                    $model->std_password = $stdPassword;
                    $model->created_by = Yii::$app->user->identity->id; 
                    $model->created_at = new \yii\db\Expression('NOW()');
                    $model->updated_by = '0'; 
                    $model->updated_at = '0';
                    $model->save();

                    $user = new User();
                    $user->username = $model->std_b_form;
                    $user->email = $model->std_email;
                    $user->user_photo = $model->std_photo;
                    $user->user_type = 'Student';
                    $user->setPassword($stdPassword);
                    $user->generateAuthKey();
                    $user->save();

                    // stdGuardianInfo...
                    $prntPassword = rand(1000, 10000);
                    $stdGuardianInfo->guardian_password = $prntPassword;
                    $stdGuardianInfo->std_id = $model->std_id;
                    $stdGuardianInfo->created_by = Yii::$app->user->identity->id; 
                    $stdGuardianInfo->created_at = new \yii\db\Expression('NOW()');
                    $stdGuardianInfo->updated_by = '0'; 
                    $stdGuardianInfo->updated_at = '0';
                    $stdGuardianInfo->save();
                    
                    // userCNIC...
                    $userCNIC = Yii::$app->db->createCommand("SELECT id FROM user WHERE username = '$stdGuardianInfo->guardian_cnic'")->queryAll();
                    if(empty($userCNIC)){
                        $user = new User();
                        $user->username = $stdGuardianInfo->guardian_cnic;
                        $user->email = $stdGuardianInfo->guardian_email;
                        $user->user_photo = $model->std_photo;
                        $user->user_type = 'Parent';
                        $user->setPassword($prntPassword);
                        $user->generateAuthKey();
                        $user->save();
                    }

                    // stdIceInfo...
                    $stdIceInfo->std_id = $model->std_id;
                    $stdIceInfo->created_by = Yii::$app->user->identity->id; 
                    $stdIceInfo->created_at = new \yii\db\Expression('NOW()');
                    $stdIceInfo->updated_by = '0'; 
                    $stdIceInfo->updated_at = '0';
                    $stdIceInfo->save();
                    // stdAcademicInfo...
                    $stdAcademicInfo->std_id = $model->std_id;
                    $preClass = $stdAcademicInfo->previous_class[0];
                    $stdAcademicInfo->previous_class = $preClass;
                    $institute = $stdAcademicInfo->Institute[0];
                    $stdAcademicInfo->Institute = $institute;
                    $stdAcademicInfo->std_enroll_status = 'unsign'; 
                    $stdAcademicInfo->created_by = Yii::$app->user->identity->id; 
                    $stdAcademicInfo->created_at = new \yii\db\Expression('NOW()');
                    $stdAcademicInfo->updated_by = '0'; 
                    $stdAcademicInfo->updated_at = '0';
                    $stdAcademicInfo->save(); 
                    // stdFeeDetails...
                    $count = $stdFeeDetails->no_of_installment;
                    $stdFeeDetails->std_id = $model->std_id;
                    $stdFeeDetails->created_by = Yii::$app->user->identity->id; 
                    $stdFeeDetails->created_at = new \yii\db\Expression('NOW()');
                    $stdFeeDetails->updated_by = '0'; 
                    $stdFeeDetails->updated_at = '0';
                    $stdFeeDetails->save();
                    //stdFeeInstallments...
                    $amounts[1] = $stdFeeInstallments->amount1;
                    $amounts[2] = $stdFeeInstallments->amount2; 
                    $amounts[3] = $stdFeeInstallments->amount3;
                    $amounts[4] = $stdFeeInstallments->amount4;
                    $amounts[5] = $stdFeeInstallments->amount5;
                    $amounts[6] = $stdFeeInstallments->amount6;
                    for ($i=1; $i <= $count ; $i++) { 
                        $stdFeeInstallments = new StdFeeInstallments();
                        $stdFeeInstallments->std_fee_id = $stdFeeDetails->fee_id;
                        $stdFeeInstallments->installment_no = $i;
                        $stdFeeInstallments->installment_amount = $amounts[$i];
                        $stdFeeInstallments->created_by = Yii::$app->user->identity->id; 
                        $stdFeeInstallments->created_at = new \yii\db\Expression('NOW()');
                        $stdFeeInstallments->updated_by = '0'; 
                        $stdFeeInstallments->updated_at = '0';
                        $stdFeeInstallments->save();
                    }
                    $transection->commit();
                    // SMS....
                    if(empty($userCNIC)){
                        $contact = $stdGuardianInfo->guardian_contact_no_1;
                        $num = str_replace('-', '', $contact);
                        $to = str_replace('+', '', $num);
                        $message = "Aasalam-O-Aalikum! \nYour S/D has been successfully registered in Brookfield College. \n\nLogin credentials for Web Portals: \nParent: (Username :".$stdGuardianInfo->guardian_cnic.", Password: ".$prntPassword.") \nStudent: (Usename:".$model->std_b_form.", Password: ".$stdPassword.")";
                        $sms = SmsController::sendSMS($to, $message);
                    } else {
                        $contact = $stdGuardianInfo->guardian_contact_no_1;
                        $num = str_replace('-', '', $contact);
                        $to = str_replace('+', '', $num);
                        $message = "Aasalam-O-Aalikum! \nYour S/D has been successfully registered in Brookfield College. \n\nLogin credentials for Web Portals: \nParent: (Use your previous login credentials) \nStudent: (Usename:".$model->std_b_form.", Password: ".$stdPassword.")";
                        $sms = SmsController::sendSMS($to, $message);
                    }
                    
                    return $this->redirect(['./std-personal-info']);
                } catch (Exception $e) {
                    echo $e;
                    $transection->rollBack();
                    Yii::$app->session->setFlash('error', "Student registration failed, Try Again...!");
                }
        }

        return $this->render('create', [
            'model' => $model,
            'stdGuardianInfo' => $stdGuardianInfo,
            'stdIceInfo' => $stdIceInfo,
            'stdAcademicInfo' => $stdAcademicInfo,
            'stdFeeDetails' => $stdFeeDetails,
            'stdFeeInstallments' => $stdFeeInstallments,
        ]);
    }

    /**
     * Updates an existing StdRegistration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->std_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StdRegistration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionFetchFee()
    {   
        return $this->render('fetch-fee');
    }

    /**
     * Finds the StdRegistration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StdRegistration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StdRegistration::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
