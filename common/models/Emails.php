<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $emial_id
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $email_subject
 * @property string $email_content
 * @property string $email_attachment
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receiver_name', 'receiver_email', 'email_subject', 'email_content'], 'required'],
            [['email_content'], 'string'],
            [['created_at', 'updated_at', 'email_attachment', 'created_by', 'updated_by'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['receiver_name'], 'string', 'max' => 60],
            [['receiver_email'], 'string', 'max' => 120],
            ['receiver_email', 'email'],
            [['email_subject', 'email_attachment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emial_id' => 'Emial ID',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'email_subject' => 'Subject',
            'email_content' => 'Content',
            'email_attachment' => 'Attachment',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
