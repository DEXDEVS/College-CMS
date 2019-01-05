<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_subjects".
 *
 * @property int $std_subject_id
 * @property string $std_subject_name
 */
class StdSubjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_subject_name'], 'required'],
            [['std_subject_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_subject_id' => 'Std Subject ID',
            'std_subject_name' => 'Std Subject Name',
        ];
    }
}
