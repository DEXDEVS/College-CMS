<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "program_type".
 *
 * @property int $program_type_id
 * @property string $program_type_name
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Programs[] $programs
 */
class ProgramType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_type_name', 'created_at'], 'required'],
            [['program_type_name'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'program_type_id' => Yii::t('app', 'Program Type ID'),
            'program_type_name' => Yii::t('app', 'Program Type Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Programs::className(), ['program_type_id' => 'program_type_id']);
    }
}
