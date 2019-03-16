<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_personal_info".
 *
 * @property int $std_id
 * @property string $std_reg_no
 * @property string $std_name
 * @property string $std_father_name
 * @property string $std_contact_no
 * @property string $std_DOB
 * @property string $std_gender
 * @property string $std_permanent_address
 * @property string $std_temporary_address
 * @property string $std_email
 * @property string $std_photo
 * @property string $std_b_form
 * @property string $std_district
 * @property string $std_religion
 * @property string $std_nationality
 * @property string $std_tehseel
 * @property string $status
 * @property string $academic_status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property FeeTransactionHead[] $feeTransactionHeads
 * @property StdAcademicInfo[] $stdAcademicInfos
 * @property StdAttendance[] $stdAttendances
 * @property StdEnrollmentDetail[] $stdEnrollmentDetails
 * @property StdFeeDetails[] $stdFeeDetails
 * @property StdGuardianInfo[] $stdGuardianInfos
 * @property StdIceInfo[] $stdIceInfos
 */
class StdRegistration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_personal_info';
    }

    public $stdInquiryNo;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_reg_no', 'std_name', 'std_father_name', 'std_contact_no', 'std_DOB', 'std_gender', 'std_permanent_address', 'std_temporary_address', 'std_email', 'std_photo', 'std_b_form', 'std_district', 'std_religion', 'std_nationality', 'std_tehseel', 'status', 'academic_status', 'created_by', 'updated_by'], 'required'],
            [['std_DOB', 'created_at', 'updated_at'], 'safe'],
            [['std_gender', 'status', 'academic_status'], 'string'],
            [['created_by', 'updated_by'], 'integer'],
            [['std_reg_no', 'std_name', 'std_father_name', 'std_district', 'std_religion', 'std_nationality', 'std_tehseel'], 'string', 'max' => 50],
            [['std_contact_no'], 'string', 'max' => 12],
            [['std_permanent_address', 'std_temporary_address', 'std_b_form'], 'string', 'max' => 255],
            [['std_email'], 'string', 'max' => 84],
            [['std_photo'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_id' => 'Std ID',
            'std_reg_no' => 'Std Reg No',
            'std_name' => 'Std Name',
            'std_father_name' => 'Std Father Name',
            'std_contact_no' => 'Std Contact No',
            'std_DOB' => 'Std Dob',
            'std_gender' => 'Std Gender',
            'std_permanent_address' => 'Std Permanent Address',
            'std_temporary_address' => 'Std Temporary Address',
            'std_email' => 'Std Email',
            'std_photo' => 'Std Photo',
            'std_b_form' => 'Std B Form',
            'std_district' => 'Std District',
            'std_religion' => 'Std Religion',
            'std_nationality' => 'Std Nationality',
            'std_tehseel' => 'Std Tehseel',
            'status' => 'Status',
            'academic_status' => 'Academic Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeeTransactionHeads()
    {
        return $this->hasMany(FeeTransactionHead::className(), ['std_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAcademicInfos()
    {
        return $this->hasMany(StdAcademicInfo::className(), ['std_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttendances()
    {
        return $this->hasMany(StdAttendance::className(), ['student_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdEnrollmentDetails()
    {
        return $this->hasMany(StdEnrollmentDetail::className(), ['std_enroll_detail_std_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdFeeDetails()
    {
        return $this->hasMany(StdFeeDetails::className(), ['std_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdGuardianInfos()
    {
        return $this->hasMany(StdGuardianInfo::className(), ['std_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdIceInfos()
    {
        return $this->hasMany(StdIceInfo::className(), ['std_id' => 'std_id']);
    }
}
