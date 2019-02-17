<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_fee_details".
 *
 * @property int $fee_id
 * @property int $std_id
 * @property double $admission_fee
 * @property double $addmission_fee_discount
 * @property double $net_addmission_fee
 * @property string $fee_category
 * @property int $concession_id
 * @property int $no_of_installment
 * @property double $tuition_fee
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdPersonalInfo $std
 * @property Concession $concession
 */
class StdFeeDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $feeSession;
    public $totalTuitionFee;

    public static function tableName()
    {
        return 'std_fee_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_id', 'admission_fee', 'addmission_fee_discount', 'net_addmission_fee', 'fee_category', 'concession_id', 'no_of_installment', 'tuition_fee'], 'required'],
            [['std_id', 'concession_id', 'no_of_installment', 'created_by', 'updated_by'], 'integer'],
            [['admission_fee', 'addmission_fee_discount', 'net_addmission_fee', 'tuition_fee'], 'number'],
            [['fee_category'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdPersonalInfo::className(), 'targetAttribute' => ['std_id' => 'std_id']],
            [['concession_id'], 'exist', 'skipOnError' => true, 'targetClass' => Concession::className(), 'targetAttribute' => ['concession_id' => 'concession_id']],
            [['feeSession','totalTuitionFee'],'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fee_id' => 'Fee ID',
            'std_id' => 'Std Name',
            'admission_fee' => 'Admission Fee',
            'addmission_fee_discount' => 'Admission Fee Discount',
            'net_addmission_fee' => 'Net Admission Fee',
            'fee_category' => 'Fee Category',
            'concession_id' => 'Fee Concession',
            'no_of_installment' => 'No of Installment',
            'tuition_fee' => 'Tuition Fee',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStd()
    {
        return $this->hasOne(StdPersonalInfo::className(), ['std_id' => 'std_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcession()
    {
        return $this->hasOne(Concession::className(), ['concession_id' => 'concession_id']);
    }
}
