<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_guardian_info".
 *
 * @property int $std_guardian_info_id
 * @property int $std_id
 * @property string $guardian_name
 * @property string $guardian_relation
 * @property string $guardian_cnic
 * @property string $guardian_email
 * @property string $guardian_contact_no_1
 * @property string $guardian_contact_no_2
 * @property int $guardian_monthly_income
 * @property string $guardian_occupation
 * @property string $guardian_designation
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $delete_status
 *
 * @property StdPersonalInfo $std
 */
class StdGuardianInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_guardian_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_id', 'guardian_name', 'guardian_relation', 'guardian_cnic', 'guardian_email', 'guardian_contact_no_1', 'guardian_contact_no_2', 'guardian_monthly_income', 'guardian_occupation', 'guardian_designation'], 'required'],
            [['std_id', 'guardian_monthly_income', 'created_by', 'updated_by', 'delete_status'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['guardian_name', 'guardian_relation', 'guardian_occupation'], 'string', 'max' => 50],
            [['guardian_cnic', 'guardian_contact_no_1', 'guardian_contact_no_2'], 'string', 'max' => 15],
            [['guardian_email'], 'string', 'max' => 84],
            [['guardian_designation'], 'string', 'max' => 100],
            [['std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdPersonalInfo::className(), 'targetAttribute' => ['std_id' => 'std_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_guardian_info_id' => 'Std Guardian Info ID',
            'std_id' => 'Std ID',
            'guardian_name' => 'Guardian Name',
            'guardian_relation' => 'Guardian Relation',
            'guardian_cnic' => 'Guardian Cnic',
            'guardian_email' => 'Guardian Email',
            'guardian_contact_no_1' => 'Guardian Contact No 1',
            'guardian_contact_no_2' => 'Guardian Contact No 2',
            'guardian_monthly_income' => 'Guardian Monthly Income',
            'guardian_occupation' => 'Guardian Occupation',
            'guardian_designation' => 'Guardian Designation',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'delete_status' => 'Delete Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStd()
    {
        return $this->hasOne(StdPersonalInfo::className(), ['std_id' => 'std_id']);
    }
}
