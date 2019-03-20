<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_sections".
 *
 * @property int $section_id
 * @property int $session_id
 * @property string $section_name
 * @property string $section_description
 * @property int $section_intake
 * @property int $section_subjects
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $delete_status
 *
 * @property FeeTransactionHead[] $feeTransactionHeads
 * @property StdAttendance[] $stdAttendances
 * @property StdClass[] $stdClasses
 * @property StdEnrollmentHead[] $stdEnrollmentHeads
 * @property StdSessions $session
 * @property StdSubjects $sectionSubjects
 */
class StdSections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_sections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_id', 'section_name', 'section_description', 'section_subjects'], 'required'],
            [['session_id', 'section_intake', 'section_subjects', 'created_by', 'updated_by', 'delete_status'], 'integer'],
            [['created_at', 'updated_at', 'section_intake', 'created_by', 'updated_by'], 'safe'],
            [['section_name'], 'string', 'max' => 4],
            [['section_description'], 'string', 'max' => 100],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSessions::className(), 'targetAttribute' => ['session_id' => 'session_id']],
            [['section_subjects'], 'exist', 'skipOnError' => true, 'targetClass' => StdSubjects::className(), 'targetAttribute' => ['section_subjects' => 'std_subject_id']],
            ['section_name','unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'section_id' => 'Section ID',
            'session_id' => 'Session',
            'section_name' => 'Section Code',
            'section_description' => 'Section Group',
            'section_intake' => 'Section Intake',
            'section_subjects' => 'Section Subjects',
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
    public function getFeeTransactionHeads()
    {
        return $this->hasMany(FeeTransactionHead::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttendances()
    {
        return $this->hasMany(StdAttendance::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdClasses()
    {
        return $this->hasMany(StdClass::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdEnrollmentHeads()
    {
        return $this->hasMany(StdEnrollmentHead::className(), ['section_id' => 'section_id']);
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
    public function getSectionSubjects()
    {
        return $this->hasOne(StdSubjects::className(), ['std_subject_id' => 'section_subjects']);
    }
}
