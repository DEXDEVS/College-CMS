<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grades".
 *
 * @property int $grade_id
 * @property string $grade_name
 * @property int $grade_from
 * @property int $grade_to
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Grades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_name', 'grade_from', 'grade_to'], 'required'],
            [['grade_from', 'grade_to', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['grade_name'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grade_id' => 'Grade ID',
            'grade_name' => 'Grade',
            'grade_from' => '% From',
            'grade_to' => '% To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
