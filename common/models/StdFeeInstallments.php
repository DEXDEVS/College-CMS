<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_fee_installments".
 *
 * @property int $fee_installment_id
 * @property int $std_fee_id
 * @property int $installment_no
 * @property double $installment_amount
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdFeeDetails $stdFee
 * @property Installment $installmentNo
 */
class StdFeeInstallments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_fee_installments';
    }

    public $amount1;
    public $amount2;
    public $amount3;
    public $amount4;
    public $amount5;
    public $amount6;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_fee_id', 'installment_no', 'installment_amount', 'created_by', 'updated_by'], 'required'],
            [['std_fee_id', 'installment_no', 'created_by', 'updated_by'], 'integer'],
            [['installment_amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['std_fee_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdFeeDetails::className(), 'targetAttribute' => ['std_fee_id' => 'fee_id']],
            [['installment_no'], 'exist', 'skipOnError' => true, 'targetClass' => Installment::className(), 'targetAttribute' => ['installment_no' => 'installment_id']],
            [['amount1','amount2','amount3','amount4','amount5','amount6'],'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fee_installment_id' => 'Fee Installment ID',
            'std_fee_id' => 'Std Fee ID',
            'installment_no' => 'Installment No',
            'installment_amount' => 'Installment Amount',
            'amount1' => '1st Installment',
            'amount2' => '2nd Installment',
            'amount3' => '3rd Installment',
            'amount4' => '4th Installment',
            'amount5' => '5th Installment',
            'amount6' => '6th Installment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdFee()
    {
        return $this->hasOne(StdFeeDetails::className(), ['fee_id' => 'std_fee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstallmentNo()
    {
        return $this->hasOne(Installment::className(), ['installment_id' => 'installment_no']);
    }
}
