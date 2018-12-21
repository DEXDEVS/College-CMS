<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_fee_details".
 *
 * @property integer $fee_id
 * @property integer $std_id
 * @property double $admission_fee
 * @property double $addmission_fee_discount
 * @property double $net_addmission_fee
 * @property double $monthly_fee
 * @property double $monthly_fee_discount
 * @property double $net_monthly_fee
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property StdPersonalInfo $std
 */
class StdFeeDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'std_fee_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_id', 'admission_fee', 'addmission_fee_discount', 'net_addmission_fee', 'monthly_fee', 'monthly_fee_discount', 'net_monthly_fee'], 'required'],
            [['std_id', 'created_by', 'updated_by'], 'integer'],
            [['admission_fee', 'addmission_fee_discount', 'net_addmission_fee', 'monthly_fee', 'monthly_fee_discount', 'net_monthly_fee'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdPersonalInfo::className(), 'targetAttribute' => ['std_id' => 'std_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fee_id' => 'Fee ID',
            'std_id' => 'Student Name',
            'admission_fee' => 'Admission Fee',
            'addmission_fee_discount' => 'Addmission Fee Discount',
            'net_addmission_fee' => 'Net Addmission Fee',
            'monthly_fee' => 'Monthly Fee',
            'monthly_fee_discount' => 'Monthly Fee Discount',
            'net_monthly_fee' => 'Net Monthly Fee',
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
}
