<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_fee_pkg".
 *
 * @property int $std_fee_id
 * @property int $session_id
 * @property int $class_id
 * @property double $admission_fee
 * @property double $tutuion_fee
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property StdSessions $session
 * @property StdClassName $class
 */
class StdFeePkg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_fee_pkg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_id', 'class_id', 'tutuion_fee'], 'required'],
            [['session_id', 'class_id', 'created_by', 'updated_by'], 'integer'],
            [['admission_fee', 'tutuion_fee'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'admission_fee'], 'safe'],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSessions::className(), 'targetAttribute' => ['session_id' => 'session_id']],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClassName::className(), 'targetAttribute' => ['class_id' => 'class_name_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_fee_id' => 'Std Fee ID',
            'session_id' => 'Session ID',
            'class_id' => 'Class ID',
            'admission_fee' => 'Admission Fee',
            'tutuion_fee' => 'Tutuion Fee',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(StdSessions::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(StdClassName::className(), ['class_name_id' => 'class_id']);
    }
}
