<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property string $subject_id
 * @property string $subject_name
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id'], 'string', 'max' => 5],
            [['subject_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name' => 'Subject Name',
        ];
    }
}
