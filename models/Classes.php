<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "class".
 *
 * @property integer $class_id
 * @property string $course
 * @property integer $semester
 * @property string $section
 */
class Classes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class';
    }

    /**~
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semester'], 'integer'],
            [['course'], 'string', 'max' => 255],
            [['section'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_id' => 'Class ID',
            'course' => 'Course',
            'semester' => 'Semester',
            'section' => 'Section',
        ];
    }
}
