<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account_register".
 *
 * @property int $account_register_id
 * @property int $account_nature_id
 * @property string $account_name
 * @property string $account_description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property AccountNature $accountNature
 */
class AccountRegister extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_nature_id', 'account_name', 'account_description', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['account_nature_id', 'created_by', 'updated_by'], 'integer'],
            [['account_description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['account_name'], 'string', 'max' => 64],
            [['account_nature_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountNature::className(), 'targetAttribute' => ['account_nature_id' => 'account_nature_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'account_register_id' => 'Account Register ID',
            'account_nature_id' => 'Account Nature ID',
            'account_name' => 'Account Name',
            'account_description' => 'Account Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountNature()
    {
        return $this->hasOne(AccountNature::className(), ['account_nature_id' => 'account_nature_id']);
    }
}
