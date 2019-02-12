<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_enrollment_head".
 *
 * @property integer $std_enroll_head_id
 * @property integer $class_name_id
 * @property integer $session_id
 * @property integer $section_id
 * @property string $std_enroll_head_name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property StdEnrollmentDetail[] $stdEnrollmentDetails
 * @property StdClassName $className
 * @property StdSessions $session
 * @property StdSections $section
 */
class StdEnrollmentHead extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'std_enrollment_head';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name_id', 'session_id', 'section_id', 'std_enroll_head_name', 'created_by', 'updated_by'], 'required'],
            [['class_name_id', 'session_id', 'section_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['std_enroll_head_name'], 'string', 'max' => 255],
            [['class_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClassName::className(), 'targetAttribute' => ['class_name_id' => 'class_name_id']],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSessions::className(), 'targetAttribute' => ['session_id' => 'session_id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSections::className(), 'targetAttribute' => ['section_id' => 'section_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_enroll_head_id' => 'Std Enroll Head ID',
            'class_name_id' => 'Class Name',
            'session_id' => 'Session',
            'section_id' => 'Section',
            'std_enroll_head_name' => 'Std Enroll Head Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdEnrollmentDetails()
    {
        return $this->hasMany(StdEnrollmentDetail::className(), ['std_enroll_detail_head_id' => 'std_enroll_head_id']);
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
    public function getSession()
    {
        return $this->hasOne(StdSessions::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(StdSections::className(), ['section_id' => 'section_id']);
    }
}
