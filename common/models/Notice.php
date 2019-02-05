<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property int $notice_id
 * @property string $notice_title
 * @property string $notice_description
 * @property string $notice_start
 * @property string $notice_end
 * @property string $notice_user_type
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property string $is_status
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notice_title', 'notice_start', 'notice_end', 'notice_user_type', 'is_status'], 'required'],
            [['notice_description', 'notice_user_type', 'is_status'], 'string'],
            [['notice_start', 'notice_end', 'created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['notice_title'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'notice_id' => 'Notice ID',
            'notice_title' => 'Notice Title',
            'notice_description' => 'Notice Description',
            'notice_start' => 'Notice Start',
            'notice_end' => 'Notice End',
            'notice_user_type' => 'Notice User Type',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Is Status',
        ];
    }
}
