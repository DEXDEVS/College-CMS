<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_class_name".
 *
 * @property integer $class_name_id
 * @property string $class_name
 * @property string $class_name_description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property StdAcademicInfo[] $stdAcademicInfos
 * @property StdClass[] $stdClasses
 */
class StdClassName extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'std_class_name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name', 'class_name_description'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['class_name'], 'string', 'max' => 32],
            [['class_name_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_name_id' => 'Class Name ID',
            'class_name' => 'Class Name',
            'class_name_description' => 'Class Name Description',
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
        return $this->hasMany(StdAcademicInfo::className(), ['class_name_id' => 'class_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdClasses()
    {
        return $this->hasMany(StdClass::className(), ['class_name_id' => 'class_name_id']);
    }
}
