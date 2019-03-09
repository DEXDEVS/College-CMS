<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account_nature".
 *
 * @property int $account_nature_id
 * @property string $account_nature_name
 * @property string $account_nature_status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property AccountRegister[] $accountRegisters
 */
class AccountNature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_nature';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_nature_name', 'account_nature_status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['account_nature_status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['account_nature_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'account_nature_id' => 'Account Nature ID',
            'account_nature_name' => 'Account Nature Name',
            'account_nature_status' => 'Account Nature Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountRegisters()
    {
        return $this->hasMany(AccountRegister::className(), ['account_nature_id' => 'account_nature_id']);
    }
}
