<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sections".
 *
 * @property int $section_id
 * @property int $section_program_id
 * @property int $section_batch_id
 * @property string $section_name
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Programs $sectionProgram
 * @property Batches $sectionBatch
 * @property StdClass[] $stdClasses
 */
class Sections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_program_id', 'section_batch_id', 'section_name'], 'required'],
            [['section_program_id', 'section_batch_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['section_name'], 'string', 'max' => 64],
            [['section_program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programs::className(), 'targetAttribute' => ['section_program_id' => 'program_id']],
            [['section_batch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Batches::className(), 'targetAttribute' => ['section_batch_id' => 'batch_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'section_id' => Yii::t('app', 'Section ID'),
            'section_program_id' => Yii::t('app', 'Section Program ID'),
            'section_batch_id' => Yii::t('app', 'Section Batch ID'),
            'section_name' => Yii::t('app', 'Section Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSectionProgram()
    {
        return $this->hasOne(Programs::className(), ['program_id' => 'section_program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSectionBatch()
    {
        return $this->hasOne(Batches::className(), ['batch_id' => 'section_batch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdClasses()
    {
        return $this->hasMany(StdClass::className(), ['class_section_id' => 'section_id']);
    }
}
