<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property string $enroll
 * @property integer $class_id
 * @property string $name
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enroll'], 'required'],
            [['class_id'], 'integer'],
            [['enroll', 'name'], 'string', 'max' => 255],
            [['enroll'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enroll' => 'Enroll',
            'class_id' => 'Class ID',
            'name' => 'Name',
        ];
    }
}
