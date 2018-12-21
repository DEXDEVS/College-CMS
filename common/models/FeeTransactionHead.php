<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fee_transaction_head".
 *
 * @property integer $fee_trans_id
 * @property integer $class_name_id
 * @property integer $session_id
 * @property integer $section_id
 * @property integer $std_id
 * @property integer $month
 * @property string $transaction_date
 * @property double $total_amount
 * @property double $total_discount
 * @property double $paid_amount
 * @property double $remaining
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property FeeTransactionDetail[] $feeTransactionDetails
 * @property Month $month0
 * @property StdClassName $className
 * @property StdSessions $session
 * @property StdSections $section
 * @property StdPersonalInfo $std
 */
class FeeTransactionHead extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fee_transaction_head';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name_id', 'session_id', 'section_id', 'std_id', 'month', 'transaction_date', 'total_amount', 'total_discount'], 'required'],
            [['class_name_id', 'session_id', 'section_id', 'std_id', 'month', 'created_by', 'updated_by'], 'integer'],
            [['transaction_date' , 'paid_amount', 'remaining', 'status', 'created_at', 'updated_at','created_by', 'updated_by','std_name'], 'safe'],
            [['total_amount', 'total_discount', 'paid_amount', 'remaining'], 'number'],
            [['status'], 'string'],
            [['month'], 'exist', 'skipOnError' => true, 'targetClass' => Month::className(), 'targetAttribute' => ['month' => 'month_id']],
            [['class_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClassName::className(), 'targetAttribute' => ['class_name_id' => 'class_name_id']],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSessions::className(), 'targetAttribute' => ['session_id' => 'session_id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSections::className(), 'targetAttribute' => ['section_id' => 'section_id']],
            [['std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdPersonalInfo::className(), 'targetAttribute' => ['std_id' => 'std_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fee_trans_id' => 'Fee Trans ID',
            'class_name_id' => 'Class Name ID',
            'session_id' => 'Session ID',
            'section_id' => 'Section ID',
            'std_id' => 'Std ID',
            'std_name' => 'Std Name',
            'month' => 'Month',
            'transaction_date' => 'Transaction Date',
            'total_amount' => 'Total Amount',
            'total_discount' => 'Total Discount',
            'paid_amount' => 'Paid Amount',
            'remaining' => 'Remaining',
            'status' => 'Status',
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
        return $this->hasMany(FeeTransactionDetail::className(), ['fee_trans_detail_head_id' => 'fee_trans_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonth0()
    {
        return $this->hasOne(Month::className(), ['month_id' => 'month']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassName()
    {
        return $this->hasOne(StdClassName::className(), ['class_name_id' => 'class_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(StdSessions::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(StdSections::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStd()
    {
        return $this->hasOne(StdPersonalInfo::className(), ['std_id' => 'std_id']);
    }
}
