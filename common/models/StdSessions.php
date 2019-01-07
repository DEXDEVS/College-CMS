<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_sessions".
 *
 * @property integer $session_id
 * @property integer $session_branch_id
 * @property string $session_name
 * @property string $session_start_date
 * @property string $session_end_date
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property StdClass[] $stdClasses
 * @property StdSections[] $stdSections
 * @property Branches $sessionBranch
 */
class StdSessions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'std_sessions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['session_branch_id', 'session_name', 'session_start_date', 'session_end_date', 'status'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['session_branch_id', 'session_start_date', 'session_end_date', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['status'], 'string'],
            [['session_name'], 'string', 'max' => 32],
            [['session_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['session_branch_id' => 'branch_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'session_id' => 'Session ID',
            'session_branch_id' => 'Session Branch Name',
            'session_name' => 'Session Name',
            'session_start_date' => 'Session Start Date',
            'session_end_date' => 'Session End Date',
            'status' => 'Status',
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
        return $this->hasMany(StdClass::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdSections()
    {
        return $this->hasMany(StdSections::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessionBranch()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'session_branch_id']);
    }
}
