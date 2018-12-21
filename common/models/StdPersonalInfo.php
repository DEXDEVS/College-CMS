<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "std_personal_info".
 *
 * @property integer $std_id
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
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property StdAcademicInfo[] $stdAcademicInfos
 * @property StdEnrollmentDetail[] $stdEnrollmentDetails
 * @property StdFeeDetails[] $stdFeeDetails
 * @property StdGuardianInfo[] $stdGuardianInfos
 */
class StdPersonalInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'std_personal_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_name', 'std_father_name','std_DOB', 'std_gender', 'std_permanent_address', 'std_district', 'std_religion', 'std_nationality', 'std_tehseel'], 'required'],
            [['std_DOB', 'std_contact_no', 'std_email', 'std_b_form',  'std_photo', 'std_temporary_address','created_at', 'updated_at','created_by', 'updated_by'], 'safe'],
            [['std_gender'], 'string'],
            [['created_by', 'updated_by'], 'integer'],
            [['std_name', 'std_father_name' , 'std_district', 'std_religion', 'std_nationality', 'std_tehseel'], 'string', 'max' => 50],
            [['std_contact_no'], 'string', 'max' => 15],
            [['std_permanent_address', 'std_temporary_address', 'std_b_form'], 'string', 'max' => 255],
            [['std_email'], 'string', 'max' => 84],
            [['std_email'],'email'],
            [['std_photo'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_id' => 'Stdudent ID',
            'std_name' => 'Stdudent Name',
            'std_father_name' => 'Stdudent Father Name',
            'std_contact_no' => 'Stdudent Contact No',
            'std_DOB' => 'Stdudent DOB',
            'std_gender' => 'Stdudent Gender',
            'std_permanent_address' => 'Stdudent Permanent Address',
            'std_temporary_address' => 'Stdudent Temporary Address',
            'std_email' => 'Stdudent Email',
            'std_photo' => 'Stdudent Photo',
            'std_b_form' => 'Stdudent B-Form',
            'std_district' => 'Stdudent District',
            'std_religion' => 'Stdudent Religion',
            'std_nationality' => 'Stdudent Nationality',
            'std_tehseel' => 'Stdudent Tehseel',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
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

    public function getPhotoInfo(){
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = $this->std_name.'_photo'.'.jpg';
        $alt = $this->std_name."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }

}
