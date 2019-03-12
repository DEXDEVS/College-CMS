<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "marks_weitage".
 *
 * @property int $marks_weitage_id
 * @property int $std_enroll_head_id
 * @property int $subject_id
 * @property int $presentation
 * @property int $assignment
 * @property int $attendance
 * @property int $dressing
 * @property int $theory
 * @property int $practical
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdEnrollmentHead $stdEnrollHead
 * @property Subjects $subject
 */
class MarksWeitage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marks_weitage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_enroll_head_id', 'subject_id', 'presentation', 'assignment', 'attendance', 'dressing', 'theory', 'practical'], 'required'],
            [['std_enroll_head_id', 'subject_id', 'presentation', 'assignment', 'attendance', 'dressing', 'theory', 'practical', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['std_enroll_head_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdEnrollmentHead::className(), 'targetAttribute' => ['std_enroll_head_id' => 'std_enroll_head_id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject_id' => 'subject_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'marks_weitage_id' => 'Marks Weitage ID',
            'std_enroll_head_id' => 'Std Enroll Head ID',
            'subject_id' => 'Subject ID',
            'presentation' => 'Presentation',
            'assignment' => 'Assignment',
            'attendance' => 'Attendance',
            'dressing' => 'Dressing',
            'theory' => 'Theory',
            'practical' => 'Practical',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdEnrollHead()
    {
        return $this->hasOne(StdEnrollmentHead::className(), ['std_enroll_head_id' => 'std_enroll_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['subject_id' => 'subject_id']);
    }
}
