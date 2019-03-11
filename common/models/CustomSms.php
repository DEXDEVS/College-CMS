<?php

namespace common\models;

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
            [['send_to', 'message'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['send_to'], 'integer'],
            [['created_by', 'updated_by'], 'integer'],
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
