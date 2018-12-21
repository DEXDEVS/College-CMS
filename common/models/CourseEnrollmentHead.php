<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_enrollment_head".
 *
 * @property int $course_enroll_head_id
 * @property int $course_enroll_head_class_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property CourseEnrollmentDetail[] $courseEnrollmentDetails
 * @property StdClass $courseEnrollHeadClass
 */
class CourseEnrollmentHead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_enrollment_head';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_enroll_head_class_id'], 'required'],
            [['course_enroll_head_class_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['course_enroll_head_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClass::className(), 'targetAttribute' => ['course_enroll_head_class_id' => 'class_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_enroll_head_id' => 'Course Enroll Head ID',
            'course_enroll_head_class_id' => 'Course Enroll Head Class Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseEnrollmentDetails()
    {
        return $this->hasMany(CourseEnrollmentDetail::className(), ['course_enroll_detail_head_id' => 'course_enroll_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseEnrollHeadClass()
    {
        return $this->hasOne(StdClass::className(), ['class_id' => 'course_enroll_head_class_id']);
    }
}
