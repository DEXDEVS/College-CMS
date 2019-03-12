<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exams_category".
 *
 * @property int $exam_category_id
 * @property string $category_name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property ExamsCriteria[] $examsCriterias
 */
class ExamsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exams_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name', 'description'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['category_name'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'exam_category_id' => 'Exam Category ID',
            'category_name' => 'Category Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamsCriterias()
    {
        return $this->hasMany(ExamsCriteria::className(), ['exam_category_id' => 'exam_category_id']);
    }
}
