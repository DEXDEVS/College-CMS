<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $event_id
 * @property string $event_title
 * @property string $event_detail
 * @property string $event_start_datetime
 * @property string $event_end_datetime
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $is_status
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_title', 'event_detail', 'event_start_datetime', 'event_end_datetime', 'created_at', 'created_by'], 'required'],
            [['event_detail'], 'string'],
            [['event_start_datetime', 'event_end_datetime', 'created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'is_status'], 'integer'],
            [['event_title'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'event_title' => 'Event Title',
            'event_detail' => 'Event Detail',
            'event_start_datetime' => 'Event Start Datetime',
            'event_end_datetime' => 'Event End Datetime',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Is Status',
        ];
    }
}
