<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fee_type".
 *
 * @property int $fee_type_id
 * @property string $fee_type_name
 * @property string $fee_type_description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $delete_status
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class FeeType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fee_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fee_type_name', 'fee_type_description'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['created_by', 'updated_by', 'delete_status'], 'integer'],
            [['fee_type_name'], 'string', 'max' => 64],
            [['fee_type_description'], 'string', 'max' => 120],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fee_type_id' => 'Fee Type ID',
            'fee_type_name' => 'Fee Type Name',
            'fee_type_description' => 'Fee Type Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'delete_status' => 'Delete Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
