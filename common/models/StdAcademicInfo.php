<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_academic_info".
 *
 * @property integer $academic_id
 * @property integer $std_id
 * @property integer $class_name_id
 * @property string $previous_class
 * @property string $passing_year
 * @property integer $total_marks
 * @property integer $obtained_marks
 * @property string $grades
 * @property double $percentage
 * @property string $Institute
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property StdPersonalInfo $std
 * @property StdClassName $className
 */
class StdAcademicInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'std_academic_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_id', 'class_name_id', 'previous_class', 'passing_year', 'Institute'], 'required'],
            [['std_id', 'class_name_id', 'total_marks', 'obtained_marks', 'created_by', 'updated_by'], 'integer'],
            [['grades'], 'string'],
            [['percentage'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'total_marks', 'obtained_marks', 'grades', 'percentage'], 'safe'],
            [['previous_class', 'Institute'], 'string', 'max' => 50],
            [['passing_year'], 'string', 'max' => 32],
            [['std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdPersonalInfo::className(), 'targetAttribute' => ['std_id' => 'std_id']],
            [['class_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClassName::className(), 'targetAttribute' => ['class_name_id' => 'class_name_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'academic_id' => 'Academic ID',
            'std_id' => 'Std Name',
            'class_name_id' => 'Admission Class Name',
            'previous_class' => 'Previous Class',
            'passing_year' => 'Passing Year',
            'total_marks' => 'Total Marks',
            'obtained_marks' => 'Obtained Marks',
            'grades' => 'Grades',
            'percentage' => 'Percentage',
            'Institute' => 'Institute',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStd()
    {
        return $this->hasOne(StdPersonalInfo::className(), ['std_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassName()
    {
        return $this->hasOne(StdClassName::className(), ['class_name_id' => 'class_name_id']);
    }
}
