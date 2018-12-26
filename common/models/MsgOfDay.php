<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "msg_of_day".
 *
 * @property int $msg_of_day_id
 * @property string $msg_details
 * @property string $msg_user_type
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property string $is_status
 */
class MsgOfDay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'msg_of_day';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['msg_details', 'msg_user_type', 'created_at', 'created_by', 'is_status'], 'required'],
            [['msg_user_type', 'is_status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['msg_details'], 'string', 'max' => 100],
            [['msg_details'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'msg_of_day_id' => 'Msg Of Day ID',
            'msg_details' => 'Msg Details',
            'msg_user_type' => 'Msg User Type',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Is Status',
        ];
    }
}
