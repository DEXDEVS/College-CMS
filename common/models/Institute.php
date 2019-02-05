<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "institute".
 *
 * @property integer $institute_id
 * @property string $institute_name
 * @property string $institute_logo
 * @property integer $institute_account_no
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Branches[] $branches
 */
class Institute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'institute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institute_name', 'institute_logo', 'institute_account_no', 'created_by', 'updated_by'], 'required'],
            [['institute_account_no', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['institute_name'], 'string', 'max' => 65],
            [['institute_logo'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'institute_id' => 'Institute ID',
            'institute_name' => 'Institute Name',
            'institute_logo' => 'Institute Logo',
            'institute_account_no' => 'Institute Account No',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['institute_id' => 'institute_id']);
    }

    public function getPhotoInfo(){
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = $this->institute_name.'_photo'.'.jpg';
        $alt = $this->institute_name."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }

}
