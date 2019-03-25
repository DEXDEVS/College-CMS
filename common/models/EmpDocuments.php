<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "emp_documents".
 *
 * @property int $emp_document_id
 * @property int $emp_info_id
 * @property string $emp_document_name
 * @property string $emp_document
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property EmpInfo $empInfo
 */
class EmpDocuments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emp_documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_info_id', 'emp_document','emp_document_name'], 'required'],
            [['emp_info_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['emp_document'], 'string', 'max' => 120],
            ['emp_document', 'file', 
                'extensions' => 'png, jpg, jpeg, pdf, docx',
                'minSize' => 100,
                'maxSize' => 512000,
            ],
            [['emp_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmpInfo::className(), 'targetAttribute' => ['emp_info_id' => 'emp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_document_id' => 'Emp Document ID',
            'emp_info_id' => 'Emp Info ID',
            'emp_document_name' => 'Employee Document Name',
            'emp_document' => 'Employee Document',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpInfo()
    {
        return $this->hasOne(EmpInfo::className(), ['emp_id' => 'emp_info_id']);
    }

    public function getDocumentInfo(){
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = $this->emp_document_name.'.jpg';
        $alt = $this->emp_document_name."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }

}