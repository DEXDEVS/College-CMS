<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_fee_installments".
 *
 * @property int $fee_installment_id
 * @property int $std_fee_id
 * @property int $no_of_installment
 * @property double $installment_amount
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdFeeDetails $stdFee
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_fee_id', 'no_of_installment', 'installment_amount', 'created_by', 'updated_by'], 'required'],
            [['std_fee_id', 'no_of_installment', 'created_by', 'updated_by'], 'integer'],
            [['installment_amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['std_fee_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdFeeDetails::className(), 'targetAttribute' => ['std_fee_id' => 'fee_id']],
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
            'no_of_installment' => 'No Of Installment',
            'installment_amount' => 'Installment Amount',
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
}
