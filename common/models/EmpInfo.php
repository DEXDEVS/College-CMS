<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emp_info".
 *
<<<<<<< HEAD
 * @property integer $emp_id
=======
 * @property int $emp_id
>>>>>>> df114bf8d42beefc65b30a9620316e0387770686
 * @property string $emp_reg_no
 * @property string $emp_name
 * @property string $emp_father_name
 * @property string $emp_cnic
 * @property string $emp_contact_no
 * @property string $emp_perm_address
 * @property string $emp_temp_address
 * @property string $emp_marital_status
 * @property string $emp_gender
 * @property string $emp_photo
 * @property int $emp_designation_id
 * @property int $emp_type_id
 * @property string $group_by
 * @property int $emp_branch_id
 * @property string $emp_email
 * @property string $emp_qualification
 * @property int $emp_passing_year
 * @property string $emp_institute_name
 * @property string $degree_scan_copy
 * @property double $emp_salary
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property EmpDesignation $empDesignation
 * @property Branches $empBranch
 * @property EmpType $empType
 * @property EmpReference[] $empReferences
 * @property StdAttendance[] $stdAttendances
 * @property TeacherSubjectAssignHead[] $teacherSubjectAssignHeads
 */
class EmpInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emp_info';
    }

    public $reference;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [['emp_reg_no','emp_name', 'emp_father_name', 'emp_cnic', 'emp_contact_no', 'emp_perm_address', 'emp_temp_address', 'emp_marital_status', 'emp_gender', 'emp_photo', 'emp_designation_id', 'emp_type_id', 'group_by', 'emp_branch_id', 'emp_email', 'emp_qualification', 'emp_passing_year', 'emp_institute_name', 'degree_scan_copy', 'emp_salary'], 'safe'],
            [['emp_marital_status', 'emp_gender', 'group_by'], 'string'],
            [['emp_designation_id', 'emp_type_id', 'emp_branch_id', 'emp_passing_year', 'created_by', 'updated_by'], 'integer'],
            [['emp_salary'], 'number'],
            [['created_at', 'updated_at','created_by', 'updated_by'], 'safe'],
=======
            [['emp_reg_no', 'emp_name', 'emp_father_name', 'emp_cnic', 'emp_contact_no', 'emp_perm_address', 'emp_temp_address', 'emp_marital_status', 'emp_gender', 'emp_photo', 'emp_designation_id', 'emp_type_id', 'group_by', 'emp_branch_id', 'emp_email', 'emp_qualification', 'emp_passing_year', 'emp_institute_name', 'degree_scan_copy', 'emp_salary'], 'required'],
            [['emp_marital_status', 'emp_gender', 'group_by'], 'string'],
            [['emp_designation_id', 'emp_type_id', 'emp_branch_id', 'emp_passing_year', 'created_by', 'updated_by'], 'integer'],
            [['emp_salary'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
>>>>>>> df114bf8d42beefc65b30a9620316e0387770686
            [['emp_reg_no', 'emp_name', 'emp_father_name', 'emp_qualification', 'emp_institute_name'], 'string', 'max' => 50],
            [['emp_cnic', 'emp_contact_no'], 'string', 'max' => 15],
            [['emp_perm_address', 'emp_temp_address', 'emp_photo', 'degree_scan_copy'], 'string', 'max' => 200],
            [['emp_email'], 'string', 'max' => 84],
            [['emp_designation_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmpDesignation::className(), 'targetAttribute' => ['emp_designation_id' => 'emp_designation_id']],
            [['emp_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['emp_branch_id' => 'branch_id']],
            [['emp_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmpType::className(), 'targetAttribute' => ['emp_type_id' => 'emp_type_id']],
            [['emp_photo', 'degree_scan_copy'], 'image', 'extensions' => 'jpg'],
            [['emp_email'],'email'],
            ['emp_email', 'unique', 'targetClass' => '\common\models\EmpInfo', 'message' => 'This email address has already been taken.'],
            [['reference'],'string', 'max' => 84],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'Emp ID',
            'emp_reg_no' => 'Emp Reg No',
<<<<<<< HEAD
            'emp_name' => 'Employee Name',
            'emp_father_name' => 'Father Name',
            'emp_cnic' => 'Employee CNIC#',
            'emp_contact_no' => 'Employee Contact No',
            'emp_perm_address' => 'Permenent Address',
            'emp_temp_address' => 'Temporary Address',
            'emp_marital_status' => 'Marital Status',
            'emp_gender' => 'Gender',
            'emp_photo' => 'Photo',
            'emp_designation_id' => 'Designation',
            'emp_type_id' => 'Type',
=======
            'emp_name' => 'Emp Name',
            'emp_father_name' => 'Emp Father Name',
            'emp_cnic' => 'Emp Cnic',
            'emp_contact_no' => 'Emp Contact No',
            'emp_perm_address' => 'Emp Perm Address',
            'emp_temp_address' => 'Emp Temp Address',
            'emp_marital_status' => 'Emp Marital Status',
            'emp_gender' => 'Emp Gender',
            'emp_photo' => 'Emp Photo',
            'emp_designation_id' => 'Emp Designation ID',
            'emp_type_id' => 'Emp Type ID',
>>>>>>> df114bf8d42beefc65b30a9620316e0387770686
            'group_by' => 'Group By',
            'emp_branch_id' => 'Emp Branch ID',
            'emp_email' => 'Emp Email',
            'emp_qualification' => 'Emp Qualification',
            'emp_passing_year' => 'Emp Passing Year',
            'emp_institute_name' => 'Emp Institute Name',
            'degree_scan_copy' => 'Degree Scan Copy',
            'emp_salary' => 'Emp Salary',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpDesignation()
    {
        return $this->hasOne(EmpDesignation::className(), ['emp_designation_id' => 'emp_designation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpBranch()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'emp_branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpType()
    {
        return $this->hasOne(EmpType::className(), ['emp_type_id' => 'emp_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpReferences()
    {
        return $this->hasMany(EmpReference::className(), ['emp_id' => 'emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttendances()
    {
        return $this->hasMany(StdAttendance::className(), ['teacher_id' => 'emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherSubjectAssignHeads()
    {
        return $this->hasMany(TeacherSubjectAssignHead::className(), ['teacher_id' => 'emp_id']);
    }

    public function getPhotoInfo(){
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = $this->emp_name.'_emp_photo'.'.jpg';
        $alt = $this->emp_name."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }

    public function getDegreeInfo(){
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = $this->emp_name.'_degree_scan_copy'.'.jpg';
        $alt = $this->emp_name."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }
}
