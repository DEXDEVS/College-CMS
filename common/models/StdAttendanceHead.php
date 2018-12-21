<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_attendance_head".
 *
 * @property int $std_atten_head_id
 * @property int $std_atten_head_class_id
 * @property int $std_atten_head_course_id
 * @property string $datetime
 * @property int $total_students
 * @property int $total_present_students
 * @property int $total_absent_students
 * @property int $Total_leave_students
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdAttendanceDetail[] $stdAttendanceDetails
 * @property StdClass $stdAttenHeadClass
 * @property Courses $stdAttenHeadCourse
 */
class StdAttendanceHead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_attendance_head';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_atten_head_class_id', 'std_atten_head_course_id', 'datetime', 'total_students', 'total_present_students', 'total_absent_students', 'Total_leave_students'], 'required'],
            [['std_atten_head_class_id', 'std_atten_head_course_id', 'total_students', 'total_present_students', 'total_absent_students', 'Total_leave_students', 'created_by', 'updated_by'], 'integer'],
            [['datetime', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['std_atten_head_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClass::className(), 'targetAttribute' => ['std_atten_head_class_id' => 'class_id']],
            [['std_atten_head_course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['std_atten_head_course_id' => 'course_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_atten_head_id' => 'Std Atten Head ID',
            'std_atten_head_class_id' => 'Std Atten Head Class ID',
            'std_atten_head_course_id' => 'Std Atten Head Course ID',
            'datetime' => 'Datetime',
            'total_students' => 'Total Students',
            'total_present_students' => 'Total Present Students',
            'total_absent_students' => 'Total Absent Students',
            'Total_leave_students' => 'Total Leave Students',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttendanceDetails()
    {
        return $this->hasMany(StdAttendanceDetail::className(), ['std_atten_detail_head_id' => 'std_atten_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttenHeadClass()
    {
        return $this->hasOne(StdClass::className(), ['class_id' => 'std_atten_head_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttenHeadCourse()
    {
        return $this->hasOne(Courses::className(), ['course_id' => 'std_atten_head_course_id']);
    }
}
