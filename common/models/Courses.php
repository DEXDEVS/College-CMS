<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $course_id
 * @property string $course_name
 *
 * @property AssignCourse[] $assignCourses
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_name'], 'required'],
            [['course_name'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'course_name' => 'Course Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignCourses()
    {
        return $this->hasMany(AssignCourse::className(), ['course_id' => 'course_id']);
    }
}
