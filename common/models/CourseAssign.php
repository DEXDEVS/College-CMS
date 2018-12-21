<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_assign".
 *
 * @property int $course_assign_id
 *
 * @property StdAttendanceHead[] $stdAttendanceHeads
 */
class CourseAssign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_assign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_assign_id' => 'Course Assign ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttendanceHeads()
    {
        return $this->hasMany(StdAttendanceHead::className(), ['std_atten_head_course_id' => 'course_assign_id']);
    }
}
