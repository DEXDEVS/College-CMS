<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_attendance_detail".
 *
 * @property int $std_atten_detail_id
 * @property int $std_atten_detail_head_id
 * @property int $std_atten_detail_std_id
 * @property int $std_roll_no
 * @property int $std_present
 * @property int $std_absent
 * @property int $std_leave
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdAttendanceHead $stdAttenDetailHead
 * @property StdInfo $stdAttenDetailStd
 */
class StdAttendanceDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_attendance_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_atten_detail_head_id', 'std_atten_detail_std_id', 'std_roll_no', 'std_present', 'std_absent', 'std_leave'], 'required'],
            [['std_atten_detail_head_id', 'std_atten_detail_std_id', 'std_roll_no', 'std_present', 'std_absent', 'std_leave', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['std_atten_detail_head_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdAttendanceHead::className(), 'targetAttribute' => ['std_atten_detail_head_id' => 'std_atten_head_id']],
            [['std_atten_detail_std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdInfo::className(), 'targetAttribute' => ['std_atten_detail_std_id' => 'std_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_atten_detail_id' => 'Std Atten Detail ID',
            'std_atten_detail_head_id' => 'Std Atten Detail Head ID',
            'std_atten_detail_std_id' => 'Std Atten Detail Std ID',
            'std_roll_no' => 'Std Roll No',
            'std_present' => 'Std Present',
            'std_absent' => 'Std Absent',
            'std_leave' => 'Std Leave',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttenDetailHead()
    {
        return $this->hasOne(StdAttendanceHead::className(), ['std_atten_head_id' => 'std_atten_detail_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttenDetailStd()
    {
        return $this->hasOne(StdInfo::className(), ['std_id' => 'std_atten_detail_std_id']);
    }
}
