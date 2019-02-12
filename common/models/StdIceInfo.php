<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_ice_info".
 *
 * @property int $std_ice_id
 * @property int $std_id
 * @property string $std_ice_name
 * @property string $std_ice_relation
 * @property string $std_ice_contact_no
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property StdPersonalInfo $std
 */
class StdIceInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_ice_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_id', 'std_ice_name', 'std_ice_relation', 'std_ice_contact_no'], 'required'],
            [['std_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['std_ice_name', 'std_ice_relation'], 'string', 'max' => 64],
            [['std_ice_contact_no'], 'string', 'max' => 15],
            [['std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdPersonalInfo::className(), 'targetAttribute' => ['std_id' => 'std_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_ice_id' => 'Std Ice ID',
            'std_id' => 'Std Name',
            'std_ice_name' => 'Std Ice Name',
            'std_ice_relation' => 'Std Ice Relation',
            'std_ice_contact_no' => 'Std Ice Contact No',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStd()
    {
        return $this->hasOne(StdPersonalInfo::className(), ['std_id' => 'std_id']);
    }
}
