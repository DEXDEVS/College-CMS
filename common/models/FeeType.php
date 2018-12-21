<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fee_type".
 *
 * @property integer $fee_type_id
 * @property string $fee_type_name
 * @property string $fee_type_description
 * @property double $fee_amount
 * @property string $starting_date
 * @property string $ending_date
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property FeeTransactionDetail[] $feeTransactionDetails
 */
class FeeType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fee_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fee_type_name', 'fee_type_description'], 'required'],
            [['fee_amount'], 'number'],
            [['starting_date', 'ending_date', 'created_at', 'updated_at','created_by', 'updated_by','fee_amount'], 'safe'],
            [['created_by', 'updated_by',], 'integer'],
            [['fee_type_name'], 'string', 'max' => 64],
            [['fee_type_description'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fee_type_id' => 'Fee Type ID',
            'fee_type_name' => 'Fee Type Name',
            'fee_type_description' => 'Fee Type Description',
            'fee_amount' => 'Fee Amount',
            'starting_date' => 'Starting Date',
            'ending_date' => 'Ending Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeeTransactionDetails()
    {
        return $this->hasMany(FeeTransactionDetail::className(), ['fee_type_id' => 'fee_type_id']);
    }
}
