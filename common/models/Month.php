<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "month".
 *
 * @property integer $month_id
 * @property string $month_name
 *
 * @property FeeTransactionHead[] $feeTransactionHeads
 */
class Month extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['month_name'], 'required'],
            [['month_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'month_id' => 'Month ID',
            'month_name' => 'Month Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeeTransactionHeads()
    {
        return $this->hasMany(FeeTransactionHead::className(), ['month' => 'month_id']);
    }
}
