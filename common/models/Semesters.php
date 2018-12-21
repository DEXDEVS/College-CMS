<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "semesters".
 *
 * @property int $semester_id
 * @property string $semester_name
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdClass[] $stdClasses
 */
class Semesters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semesters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['semester_name'], 'required'],
            [['semester_name'], 'string'],
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
            'semester_id' => Yii::t('app', 'Semester ID'),
            'semester_name' => Yii::t('app', 'Semester Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdClasses()
    {
        return $this->hasMany(StdClass::className(), ['class_semester_id' => 'semester_id']);
    }
}
