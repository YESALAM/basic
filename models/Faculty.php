<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property string $email
 * @property string $name
 * @property string $department
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'name'], 'required'],
            [['email', 'name'], 'string', 'max' => 255],
            [['department'], 'string', 'max' => 5],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'name' => 'Name',
            'department' => 'Department',
        ];
    }
}
