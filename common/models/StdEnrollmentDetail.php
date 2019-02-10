<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_enrollment_detail".
 *
 * @property int $std_enroll_detail_id
 * @property int $std_enroll_detail_head_id
 * @property string $std_reg_no
 * @property string $std_roll_no
 * @property int $std_enroll_detail_std_id
 * @property string $std_enroll_detail_std_name
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $delete_status
 *
 * @property StdEnrollmentHead $stdEnrollDetailHead
 * @property StdPersonalInfo $stdEnrollDetailStd
 */
class StdEnrollmentDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_enrollment_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_enroll_detail_head_id', 'std_reg_no', 'std_roll_no', 'std_enroll_detail_std_id', 'std_enroll_detail_std_name', 'created_by', 'updated_by'], 'required'],
            [['std_enroll_detail_head_id', 'std_enroll_detail_std_id', 'created_by', 'updated_by', 'delete_status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['std_reg_no'], 'string', 'max' => 15],
            [['std_roll_no'], 'string', 'max' => 32],
            [['std_enroll_detail_std_name'], 'string', 'max' => 100],
            [['std_enroll_detail_head_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdEnrollmentHead::className(), 'targetAttribute' => ['std_enroll_detail_head_id' => 'std_enroll_head_id']],
            [['std_enroll_detail_std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdPersonalInfo::className(), 'targetAttribute' => ['std_enroll_detail_std_id' => 'std_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_enroll_detail_id' => 'Std Enroll Detail ID',
            'std_enroll_detail_head_id' => 'Std Enroll Detail Head ID',
            'std_reg_no' => 'Std Reg No',
            'std_roll_no' => 'Std Roll No',
            'std_enroll_detail_std_id' => 'Std Enroll Detail Std ID',
            'std_enroll_detail_std_name' => 'Std Enroll Detail Std Name',
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
    public function getStdEnrollDetailHead()
    {
        return $this->hasOne(StdEnrollmentHead::className(), ['std_enroll_head_id' => 'std_enroll_detail_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdEnrollDetailStd()
    {
        return $this->hasOne(StdPersonalInfo::className(), ['std_id' => 'std_enroll_detail_std_id']);
    }
}
