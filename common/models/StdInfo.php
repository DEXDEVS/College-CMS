<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_info".
 *
 * @property int $std_id
 * @property string $std_reg_no
 * @property string $std_first_name
 * @property string $std_last_name
 * @property string $std_father_name
 * @property string $std_photo
 * @property string $std_cnic
 * @property string $std_contact_no
 * @property string $std_email
 * @property string $std_p_address
 * @property string $std_t_address
 * @property string $std_emergency_person_name
 * @property string $std_emergency_contact_person_no
 * @property string $std_dob
 * @property string $std_nationality
 * @property string $std_country
 * @property string $std_district
 * @property string $std_province
 * @property string $std_religion
 * @property string $std_gender
 * @property string $std_serious_disease
 * @property string $std_transport_required
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdDisease[] $stdDiseases
 * @property StdGuardianInfo[] $stdGuardianInfos
 * @property StdTransportInfo[] $stdTransportInfos
 */
class StdInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_reg_no', 'std_first_name', 'std_last_name', 'std_father_name', 'std_photo', 'std_cnic', 'std_contact_no', 'std_email', 'std_p_address', 'std_t_address', 'std_emergency_person_name', 'std_emergency_contact_person_no', 'std_dob', 'std_nationality', 'std_country', 'std_district', 'std_province', 'std_religion', 'std_gender', 'std_serious_disease', 'std_transport_required'], 'required'],
            [['std_dob', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['std_gender', 'std_serious_disease', 'std_transport_required'], 'string'],
            [['created_by', 'updated_by'], 'integer'],
            [['std_reg_no', 'std_father_name', 'std_emergency_person_name', 'std_district', 'std_province'], 'string', 'max' => 64],
            [['std_first_name', 'std_last_name', 'std_country', 'std_religion'], 'string', 'max' => 32],
            [['std_photo'], 'string', 'max' => 200],
            [['std_cnic', 'std_contact_no', 'std_emergency_contact_person_no'], 'string', 'max' => 15],
            [['std_email'], 'string', 'max' => 84],
            [['std_p_address', 'std_t_address'], 'string', 'max' => 255],
            [['std_nationality'], 'string', 'max' => 22],
            [['std_cnic'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_id' => Yii::t('app', 'Std ID'),
            'std_reg_no' => Yii::t('app', 'Std Reg No'),
            'std_first_name' => Yii::t('app', 'Std First Name'),
            'std_last_name' => Yii::t('app', 'Std Last Name'),
            'std_father_name' => Yii::t('app', 'Std Father Name'),
            'std_photo' => Yii::t('app', 'Std Photo'),
            'std_cnic' => Yii::t('app', 'Std Cnic'),
            'std_contact_no' => Yii::t('app', 'Std Contact No'),
            'std_email' => Yii::t('app', 'Std Email'),
            'std_p_address' => Yii::t('app', 'Std P Address'),
            'std_t_address' => Yii::t('app', 'Std T Address'),
            'std_emergency_person_name' => Yii::t('app', 'Std Emergency Person Name'),
            'std_emergency_contact_person_no' => Yii::t('app', 'Std Emergency Contact Person No'),
            'std_dob' => Yii::t('app', 'Std Dob'),
            'std_nationality' => Yii::t('app', 'Std Nationality'),
            'std_country' => Yii::t('app', 'Std Country'),
            'std_district' => Yii::t('app', 'Std District'),
            'std_province' => Yii::t('app', 'Std Province'),
            'std_religion' => Yii::t('app', 'Std Religion'),
            'std_gender' => Yii::t('app', 'Std Gender'),
            'std_serious_disease' => Yii::t('app', 'Std Serious Disease'),
            'std_transport_required' => Yii::t('app', 'Std Transport Required'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdDiseases()
    {
        return $this->hasMany(StdDisease::className(), ['std_disease_std_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdGuardianInfos()
    {
        return $this->hasMany(StdGuardianInfo::className(), ['std_guardian_info_std_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdTransportInfos()
    {
        return $this->hasMany(StdTransportInfo::className(), ['std_transport_std_id' => 'std_id']);
    }
}
