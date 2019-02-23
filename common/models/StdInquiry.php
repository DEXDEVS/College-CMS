<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_inquiry".
 *
 * @property int $std_inquiry_id
 * @property string $std_inquiry_no
 * @property string $std_name
 * @property string $std_father_name
 * @property string $std_contact_no
 * @property string $std_father_contact_no
 * @property string $std_inquiry_date
 * @property string $std_intrested_class
 * @property string $std_previous_class
 * @property string $std_roll_no
 * @property int $std_obtained_marks
 * @property int $std_total_marks
 * @property string $std_percentage
 * @property string $refrence_name
 * @property string $refrence_contact_no
 * @property string $refrence_designation
 * @property string $std_address
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class StdInquiry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_inquiry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_inquiry_no', 'std_name', 'std_father_name', 'std_contact_no', 'std_father_contact_no', 'std_inquiry_date', 'std_intrested_class', 'std_previous_class', 'std_roll_no', 'std_obtained_marks', 'std_total_marks','std_address', 'created_by', 'updated_by'], 'required'],
            [['std_inquiry_date', 'created_at', 'updated_at','refrence_name', 'refrence_contact_no', 'refrence_designation', 'std_percentage'], 'safe'],
            [['std_obtained_marks', 'std_total_marks', 'created_by', 'updated_by'], 'integer'],
            [['std_inquiry_no', 'std_contact_no', 'std_father_contact_no', 'refrence_contact_no'], 'string', 'max' => 15],
            [['std_name', 'std_father_name', 'std_intrested_class', 'std_previous_class', 'refrence_name'], 'string', 'max' => 32],
            [['std_roll_no'], 'string', 'max' => 10],
            [['std_percentage'], 'string', 'max' => 6],
            [['refrence_designation'], 'string', 'max' => 30],
            [['std_address'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_inquiry_id' => 'Student Inquiry ID',
            'std_inquiry_no' => 'Student Inquiry No',
            'std_name' => 'Student Name',
            'std_father_name' => 'Father Name',
            'std_contact_no' => 'Student Contact No',
            'std_father_contact_no' => 'Father Contact No',
            'std_inquiry_date' => 'Inquiry Date',
            'std_intrested_class' => 'Intrested Class',
            'std_previous_class' => 'Previous Class',
            'std_roll_no' => 'Previous Class Roll No',
            'std_obtained_marks' => 'Previous Class Obtained Marks',
            'std_total_marks' => 'Previous Class Total Marks',
            'std_percentage' => 'Percentage',
            'refrence_name' => 'Refrence Name',
            'refrence_contact_no' => 'Refrence Contact No',
            'refrence_designation' => 'Refrence Designation',
            'std_address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
