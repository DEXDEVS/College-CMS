<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sms".
 *
 * @property int $sms_id
 * @property string $sms_name
 * @property string $sms_template
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updted_at
 */
class Sms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sms_name', 'sms_template', 'created_by', 'updted_at'], 'required'],
            [['sms_template'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updted_at'], 'integer'],
            [['sms_name'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sms_id' => 'Sms ID',
            'sms_name' => 'Sms Name',
            'sms_template' => 'Sms Template',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updted_at' => 'Updted At',
        ];
    }
}
