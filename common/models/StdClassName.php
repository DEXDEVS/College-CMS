<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_class_name".
 *
 * @property int $class_name_id
 * @property string $class_name
 * @property string $class_name_description
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property FeeTransactionHead[] $feeTransactionHeads
 * @property StdAcademicInfo[] $stdAcademicInfos
 * @property StdAttendance[] $stdAttendances
 * @property StdEnrollmentHead[] $stdEnrollmentHeads
 * @property StdFeePkg[] $stdFeePkgs
 * @property StdSubjects[] $stdSubjects
 */
class StdClassName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_class_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_name', 'class_name_description', 'status', 'created_by', 'updated_by'], 'required'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['class_name'], 'string', 'max' => 120],
            [['class_name_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'class_name_id' => 'Class Name ID',
            'class_name' => 'Class Name',
            'class_name_description' => 'Class Name Description',
            'status' => 'Status',
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
        return $this->hasMany(FeeTransactionHead::className(), ['class_name_id' => 'class_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAcademicInfos()
    {
        return $this->hasMany(StdAcademicInfo::className(), ['class_name_id' => 'class_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttendances()
    {
        return $this->hasMany(StdAttendance::className(), ['class_name_id' => 'class_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdEnrollmentHeads()
    {
        return $this->hasMany(StdEnrollmentHead::className(), ['class_name_id' => 'class_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdFeePkgs()
    {
        return $this->hasMany(StdFeePkg::className(), ['class_id' => 'class_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdSubjects()
    {
        return $this->hasMany(StdSubjects::className(), ['class_id' => 'class_name_id']);
    }
}
