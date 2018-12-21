<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_sections".
 *
 * @property integer $section_id
 * @property integer $session_id
 * @property string $section_name
 * @property integer $section_intake
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property StdClass[] $stdClasses
 * @property StdSessions $session
 */
class StdSections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'std_sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['session_id', 'section_name', 'section_intake'], 'required'],
            [['session_id', 'section_intake', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['section_name'], 'string', 'max' => 50],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSessions::className(), 'targetAttribute' => ['session_id' => 'session_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'section_id' => 'Section ID',
            'session_id' => 'Session Name',
            'section_name' => 'Section Name',
            'section_intake' => 'Section Intake',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdClasses()
    {
        return $this->hasMany(StdClass::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(StdSessions::className(), ['session_id' => 'session_id']);
    }
}
