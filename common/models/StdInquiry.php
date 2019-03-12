<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_inquiry".
 *
 * @property int $std_inquiry_id
 * @property string $std_inquiry_no
 * @property string $inquiry_session
 * @property string $std_name
 * @property string $std_father_name
 * @property string $std_contact_no
 * @property string $std_father_contact_no
 * @property string $std_inquiry_date
 * @property string $std_intrested_class
 * @property string $std_previous_class
 * @property string $previous_institute
 * @property string $std_roll_no
 * @property int $std_obtained_marks
 * @property int $std_total_marks
 * @property string $std_percentage
 * @property string $refrence_name
 * @property string $refrence_contact_no
 * @property string $refrence_designation
 * @property string $std_address
 * @property string $inquiry_status
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
            [['std_inquiry_no', 'inquiry_session', 'std_name', 'std_father_name', 'std_contact_no', 'std_father_contact_no', 'std_inquiry_date', 'std_intrested_class', 'std_previous_class', 'previous_institute', 'std_roll_no', 'std_obtained_marks', 'std_total_marks', 'std_percentage', 'refrence_name', 'refrence_contact_no', 'refrence_designation', 'std_address'], 'required'],
            [['std_inquiry_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'inquiry_status','previous_institute','std_intrested_class'], 'safe'],
            [['std_obtained_marks', 'std_total_marks', 'created_by', 'updated_by'], 'integer'],
            [['inquiry_status'], 'string'],
            [['std_inquiry_no'], 'string', 'max' => 15],
            [['std_contact_no', 'std_father_contact_no', 'refrence_contact_no'],'string', 'max' => 12],
            [['inquiry_session'], 'string', 'max' => 20],
            [['std_name', 'std_father_name', 'std_previous_class', 'refrence_name'], 'string', 'max' => 32],
            //[['std_intrested_class'], 'string', 'max' => 50],
            //[['previous_institute'], 'string', 'max' => 120],
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
            'std_inquiry_id' => 'Std Inquiry ID',
            'std_inquiry_no' => 'Inquiry No',
            'inquiry_session' => 'Inquiry Session',
            'std_name' => 'Student Name',
            'std_father_name' => 'Father Name',
            'std_contact_no' => 'Student Contact No',
            'std_father_contact_no' => 'Father Contact No',
            'std_inquiry_date' => 'Inquiry Date',
            'std_intrested_class' => 'Interested Class',
            'std_previous_class' => 'Previous Class',
            'previous_institute' => 'Previous Institute',
            'std_roll_no' => 'Roll No',
            'std_obtained_marks' => 'Obtained Marks',
            'std_total_marks' => 'Total Marks',
            'std_percentage' => 'Percentage',
            'refrence_name' => 'Reference Name',
            'refrence_contact_no' => 'Reference Contact No',
            'refrence_designation' => 'Reference Designation',
            'std_address' => 'Student Address',
            'inquiry_status' => 'Inquiry Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
