<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "std_sessions".
 *
 * @property int $session_id
 * @property int $session_branch_id
 * @property string $session_name
 * @property string $session_start_date
 * @property string $session_end_date
 * @property int $installment_cycle
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $delete_status
 *
 * @property FeeTransactionHead[] $feeTransactionHeads
 * @property StdAttendance[] $stdAttendances
 * @property StdEnrollmentHead[] $stdEnrollmentHeads
 * @property StdFeePkg[] $stdFeePkgs
 * @property StdSections[] $stdSections
 * @property Branches $sessionBranch
 */
class StdSessions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_sessions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_branch_id', 'session_name', 'session_start_date', 'session_end_date', 'installment_cycle', 'status', 'created_by', 'updated_by'], 'required'],
            [['session_branch_id', 'installment_cycle', 'created_by', 'updated_by', 'delete_status'], 'integer'],
            [['session_start_date', 'session_end_date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string'],
            [['session_name'], 'string', 'max' => 32],
            [['session_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['session_branch_id' => 'branch_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'session_id' => 'Session ID',
            'session_branch_id' => 'Session Branch ID',
            'session_name' => 'Session Name',
            'session_start_date' => 'Session Start Date',
            'session_end_date' => 'Session End Date',
            'installment_cycle' => 'Installment Cycle',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'delete_status' => 'Delete Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeeTransactionHeads()
    {
        return $this->hasMany(FeeTransactionHead::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttendances()
    {
        return $this->hasMany(StdAttendance::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdEnrollmentHeads()
    {
        return $this->hasMany(StdEnrollmentHead::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdFeePkgs()
    {
        return $this->hasMany(StdFeePkg::className(), ['session_id' => 'session_id']);
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
