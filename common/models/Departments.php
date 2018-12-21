<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $dept_id
 * @property int $dept_branch_id
 * @property string $dept_name
 * @property string $dept_description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Branches $deptBranch
 * @property Programs[] $programs
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dept_branch_id', 'dept_name', 'dept_description'], 'required'],
            [['dept_branch_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['dept_name'], 'string', 'max' => 64],
            [['dept_description'], 'string', 'max' => 255],
            [['dept_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['dept_branch_id' => 'branch_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => Yii::t('app', 'Dept ID'),
            'dept_branch_id' => Yii::t('app', 'Dept Branch ID'),
            'dept_name' => Yii::t('app', 'Dept Name'),
            'dept_description' => Yii::t('app', 'Dept Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeptBranch()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'dept_branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Programs::className(), ['program_dept_id' => 'dept_id']);
    }
}
