<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "custom_sms".
 *
 * @property int $id
 * @property string $send_to
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CustomSms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'custom_sms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['send_to', 'message', 'created_by', 'updated_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['send_to'], 'string', 'max' => 1000],
            [['message'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'send_to' => 'Send To',
            'message' => 'Message',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
