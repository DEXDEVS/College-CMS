<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assign_course".
 *
 * @property int $assign_cousre_id
 * @property int $program_id
 * @property int $course_id
 *
 * @property Courses $course
 * @property Programs $program
 */
class AssignCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_course';
    }
    public $tag;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_id', 'course_id'], 'required'],
            [['program_id', 'course_id'], 'integer'],
            [['tag'],'safe'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['course_id' => 'course_id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programs::className(), 'targetAttribute' => ['program_id' => 'program_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'assign_cousre_id' => 'Assign Cousre ID',
            'program_id' => 'Program ID',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Programs::className(), ['program_id' => 'program_id']);
    }
}
