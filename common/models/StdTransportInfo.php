<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_transport_info".
 *
 * @property int $std_transport_id
 * @property int $std_transport_std_id
 * @property string $std_transport_type
 * @property string $std_transport_driver_contact_no
 * @property string $std_transport_vehicel_no
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdInfo $stdTransportStd
 */
class StdTransportInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_transport_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_transport_std_id', 'std_transport_type', 'std_transport_driver_contact_no', 'std_transport_vehicel_no'], 'required'],
            [['std_transport_std_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['std_transport_type'], 'string', 'max' => 64],
            [['std_transport_driver_contact_no'], 'string', 'max' => 15],
            [['std_transport_vehicel_no'], 'string', 'max' => 10],
            [['std_transport_std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdInfo::className(), 'targetAttribute' => ['std_transport_std_id' => 'std_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_transport_id' => Yii::t('app', 'Std Transport ID'),
            'std_transport_std_id' => Yii::t('app', 'Std Transport Std ID'),
            'std_transport_type' => Yii::t('app', 'Std Transport Type'),
            'std_transport_driver_contact_no' => Yii::t('app', 'Std Transport Driver Contact No'),
            'std_transport_vehicel_no' => Yii::t('app', 'Std Transport Vehicel No'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdTransportStd()
    {
        return $this->hasOne(StdInfo::className(), ['std_id' => 'std_transport_std_id']);
    }
}
