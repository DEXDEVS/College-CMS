<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_disease".
 *
 * @property int $std_disease_id
 * @property int $std_disease_std_id
 * @property string $std_disease_level
 * @property string $std_blood_group
 * @property string $std_dr_name
 * @property string $std_dr_contact_no
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdInfo $stdDiseaseStd
 */
class StdDisease extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_disease';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_disease_std_id', 'std_disease_level', 'std_blood_group', 'std_dr_name', 'std_dr_contact_no'], 'required'],
            [['std_disease_std_id', 'created_by', 'updated_by'], 'integer'],
            [['std_blood_group'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['std_disease_level', 'std_dr_name'], 'string', 'max' => 64],
            [['std_dr_contact_no'], 'string', 'max' => 15],
            [['std_disease_std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdInfo::className(), 'targetAttribute' => ['std_disease_std_id' => 'std_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_disease_id' => Yii::t('app', 'Std Disease ID'),
            'std_disease_std_id' => Yii::t('app', 'Std Disease Std ID'),
            'std_disease_level' => Yii::t('app', 'Std Disease Level'),
            'std_blood_group' => Yii::t('app', 'Std Blood Group'),
            'std_dr_name' => Yii::t('app', 'Std Dr Name'),
            'std_dr_contact_no' => Yii::t('app', 'Std Dr Contact No'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdDiseaseStd()
    {
        return $this->hasOne(StdInfo::className(), ['std_id' => 'std_disease_std_id']);
    }
}
