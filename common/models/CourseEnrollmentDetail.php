<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_enrollment_detail".
 *
 * @property int $course_enroll_detail_id
 * @property int $course_enroll_detail_head_id
 * @property int $course_enroll_detail_course_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property CourseEnrollmentHead $courseEnrollDetailHead
 * @property Courses $courseEnrollDetailCourse
 */
class CourseEnrollmentDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_enrollment_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_enroll_detail_head_id', 'course_enroll_detail_course_id'], 'required'],
            [['course_enroll_detail_head_id', 'course_enroll_detail_course_id', 'created_by', 'updated_by'], 'integer'],
            [[ 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['course_enroll_detail_head_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseEnrollmentHead::className(), 'targetAttribute' => ['course_enroll_detail_head_id' => 'course_enroll_head_id']],
            [['course_enroll_detail_course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['course_enroll_detail_course_id' => 'course_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_enroll_detail_id' => 'Course Enroll Detail ID',
            'course_enroll_detail_head_id' => 'Course Enroll Detail Head ID',
            'course_enroll_detail_course_id' => 'Course Enroll Detail Course ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseEnrollDetailHead()
    {
        return $this->hasOne(CourseEnrollmentHead::className(), ['course_enroll_head_id' => 'course_enroll_detail_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseEnrollDetailCourse()
    {
        return $this->hasOne(Courses::className(), ['course_id' => 'course_enroll_detail_course_id']);
    }
}
