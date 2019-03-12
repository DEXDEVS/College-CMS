<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institute_name".
 *
 * @property int $Institute_name_id
 * @property string $Institute_name
 * @property string $Institutte_address
 * @property string $Institute_contact_no
 * @property string $head_name
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class InstituteName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institute_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Institute_name', 'Institutte_address', 'Institute_contact_no', 'head_name'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['Institute_name'], 'string', 'max' => 100],
            [['Institutte_address'], 'string', 'max' => 120],
            [['Institute_contact_no'], 'number'],
            [['head_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Institute_name_id' => 'Institute Name ID',
            'Institute_name' => 'Institute Name',
            'Institutte_address' => 'Institutte Address',
            'Institute_contact_no' => 'Institute Contact No',
            'head_name' => 'Head Name',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
