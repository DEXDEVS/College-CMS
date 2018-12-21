<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher_subject_assign_detail".
 *
 * @property integer $teacher_subject_assign_detail_id
 * @property integer $teacher_subject_assign_detail_head_id
 * @property integer $class_id
 * @property integer $subject_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Subjects $subject
 * @property TeacherSubjectAssignHead $teacherSubjectAssignDetailHead
 * @property StdClass $class
 */
class TeacherSubjectAssignDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher_subject_assign_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_subject_assign_detail_head_id', 'class_id', 'subject_id'], 'required'],
            [['teacher_subject_assign_detail_head_id', 'class_id', 'subject_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at','created_by', 'updated_by'], 'safe'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject_id' => 'subject_id']],
            [['teacher_subject_assign_detail_head_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeacherSubjectAssignHead::className(), 'targetAttribute' => ['teacher_subject_assign_detail_head_id' => 'teacher_subject_assign_head_id']],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClass::className(), 'targetAttribute' => ['class_id' => 'class_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teacher_subject_assign_detail_id' => 'Teacher Subject Assign Detail ID',
            'teacher_subject_assign_detail_head_id' => 'Teacher Name',
            'class_id' => 'Class Name',
            'subject_id' => 'Subject Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherSubjectAssignDetailHead()
    {
        return $this->hasOne(TeacherSubjectAssignHead::className(), ['teacher_subject_assign_head_id' => 'teacher_subject_assign_detail_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(StdClass::className(), ['class_id' => 'class_id']);
    }
}
