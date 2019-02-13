<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $branch_id
 * @property int $institute_id
 * @property string $branch_code
 * @property string $branch_name
 * @property string $branch_type
 * @property string $branch_location
 * @property string $branch_contact_no
 * @property string $branch_email
 * @property string $status
 * @property string $branch_head_name
 * @property string $branch_head_contact_no
 * @property string $branch_head_email
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Institute $institute
 * @property EmpInfo[] $empInfos
 * @property StdSessions[] $stdSessions
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institute_id', 'branch_code', 'branch_name', 'branch_type', 'branch_location', 'branch_contact_no', 'branch_email', 'status', 'branch_head_name', 'branch_head_contact_no', 'branch_head_email', 'created_by', 'updated_by'], 'required'],
            [['institute_id','created_by', 'updated_by'], 'integer'],
            [['branch_type', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['branch_code', 'branch_name', 'branch_contact_no'], 'string', 'max' => 32],
            [['branch_location', 'branch_head_name'], 'string', 'max' => 50],
            [['branch_email'], 'string', 'max' => 100],
            [['branch_head_contact_no'], 'string', 'max' => 15],
            [['branch_head_email'], 'string', 'max' => 120],
            [['institute_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institute::className(), 'targetAttribute' => ['institute_id' => 'institute_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'institute_id' => 'Institute Name',
            'branch_code' => 'Branch Code',
            'branch_name' => 'Branch Name',
            'branch_type' => 'Branch Type',
            'branch_location' => 'Branch Location',
            'branch_contact_no' => 'Branch Contact No',
            'branch_email' => 'Branch Email',
            'status' => 'Status',
            'branch_head_name' => 'Branch Head Name',
            'branch_head_contact_no' => 'Branch Head Contact No',
            'branch_head_email' => 'Branch Head Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitute()
    {
        return $this->hasOne(Institute::className(), ['institute_id' => 'institute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpInfos()
    {
        return $this->hasMany(EmpInfo::className(), ['emp_branch_id' => 'branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdSessions()
    {
        return $this->hasMany(StdSessions::className(), ['session_branch_id' => 'branch_id']);
    }
}
