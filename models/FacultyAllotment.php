<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facultyAllotment".
 *
 * @property integer $id
 * @property string $email
 * @property integer $class_id
 * @property string $subject_id
 */
class FacultyAllotment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facultyAllotment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['subject_id'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'class_id' => 'Class ID',
            'subject_id' => 'Subject ID',
        ];
    }
}
