<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "batches".
 *
 * @property int $batch_id
 * @property int $batch_program_id
 * @property string $batch_name
 * @property string $batch_start_date
 * @property string $batch_end_date
 * @property string $batch_status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Programs $batchProgram
 * @property Sections[] $sections
 * @property StdClass[] $stdClasses
 */
class Batches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'batches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['batch_program_id', 'batch_name', 'batch_start_date', 'batch_end_date', 'batch_status'], 'required'],
            [['batch_program_id', 'created_by', 'updated_by'], 'integer'],
            [['batch_start_date', 'batch_end_date', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['batch_status'], 'string'],
            [['batch_name'], 'string', 'max' => 32],
            [['batch_program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programs::className(), 'targetAttribute' => ['batch_program_id' => 'program_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'batch_id' => Yii::t('app', 'Batch ID'),
            'batch_program_id' => Yii::t('app', 'Batch Program ID'),
            'batch_name' => Yii::t('app', 'Batch Name'),
            'batch_start_date' => Yii::t('app', 'Batch Start Date'),
            'batch_end_date' => Yii::t('app', 'Batch End Date'),
            'batch_status' => Yii::t('app', 'Batch Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatchProgram()
    {
        return $this->hasOne(Programs::className(), ['program_id' => 'batch_program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Sections::className(), ['section_batch_id' => 'batch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdClasses()
    {
        return $this->hasMany(StdClass::className(), ['class_batch_id' => 'batch_id']);
    }
}
