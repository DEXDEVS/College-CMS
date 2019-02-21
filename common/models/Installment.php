<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "installment".
 *
 * @property int $installment_id
 * @property string $installment_name
 *
 * @property StdFeeInstallments[] $stdFeeInstallments
 */
class Installment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'installment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['installment_name'], 'required'],
            [['installment_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'installment_id' => 'Installment ID',
            'installment_name' => 'Installment Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdFeeInstallments()
    {
        return $this->hasMany(StdFeeInstallments::className(), ['installment_no' => 'installment_id']);
    }
}
