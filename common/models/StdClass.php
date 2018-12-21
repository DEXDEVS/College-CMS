<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_class".
 *
 * @property integer $class_id
 * @property integer $class_name_id
 * @property integer $session_id
 * @property integer $section_id
 * @property string $class_name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property StdClassName $className
 * @property StdSections $section
 * @property StdSessions $session
 * @property StdEnrollmentHead[] $stdEnrollmentHeads
 * @property TeacherSubjectAssignDetail[] $teacherSubjectAssignDetails
 */
class StdClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'std_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name_id', 'session_id', 'section_id', 'class_name'], 'required'],
            [[ 'created_by', 'updated_by'], 'integer'],
            [['class_name_id', 'session_id', 'section_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['class_name'], 'string', 'max' => 100],
            [['class_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClassName::className(), 'targetAttribute' => ['class_name_id' => 'class_name_id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSections::className(), 'targetAttribute' => ['section_id' => 'section_id']],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSessions::className(), 'targetAttribute' => ['session_id' => 'session_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_id' => 'Class ID',
            'class_name_id' => 'Class Name',
            'session_id' => 'Session Name',
            'section_id' => 'Section Name',
            'class_name' => 'Class Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassName()
    {
        return $this->hasOne(StdClassName::className(), ['class_name_id' => 'class_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(StdSections::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(StdSessions::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdEnrollmentHeads()
    {
        return $this->hasMany(StdEnrollmentHead::className(), ['class_id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherSubjectAssignDetails()
    {
        return $this->hasMany(TeacherSubjectAssignDetail::className(), ['class_id' => 'class_id']);
    }
}
