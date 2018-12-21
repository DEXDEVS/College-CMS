<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "programs".
 *
 * @property int $program_id
 * @property int $program_type_id
 * @property int $program_dept_id
 * @property string $program_name
 * @property string $program_description
 * @property string $program_no_semester
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Batches[] $batches
 * @property Courses[] $courses
 * @property ProgramType $programType
 * @property Departments $programDept
 * @property Sections[] $sections
 * @property StdClass[] $stdClasses
 */
class Programs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_type_id', 'program_dept_id', 'program_name', 'program_description', 'program_no_semester'], 'required'],
            [['program_type_id', 'program_dept_id', 'created_by', 'updated_by'], 'integer'],
            [['program_no_semester'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['program_name'], 'string', 'max' => 64],
            [['program_description'], 'string', 'max' => 255],
            [['program_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramType::className(), 'targetAttribute' => ['program_type_id' => 'program_type_id']],
            [['program_dept_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['program_dept_id' => 'dept_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'program_id' => Yii::t('app', 'Program ID'),
            'program_type_id' => Yii::t('app', 'Program Type ID'),
            'program_dept_id' => Yii::t('app', 'Program Dept ID'),
            'program_name' => Yii::t('app', 'Program Name'),
            'program_description' => Yii::t('app', 'Program Description'),
            'program_no_semester' => Yii::t('app', 'Program No Semester'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatches()
    {
        return $this->hasMany(Batches::className(), ['batch_program_id' => 'program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['course_program_id' => 'program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramType()
    {
        return $this->hasOne(ProgramType::className(), ['program_type_id' => 'program_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramDept()
    {
        return $this->hasOne(Departments::className(), ['dept_id' => 'program_dept_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Sections::className(), ['section_program_id' => 'program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdClasses()
    {
        return $this->hasMany(StdClass::className(), ['class_program_id' => 'program_id']);
    }
}
