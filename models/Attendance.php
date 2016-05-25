<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attendance".
 *
 * @property string $date
 * @property string $email
 * @property string $enroll
 * @property string $status
 * @property string $remark
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['email', 'enroll', 'remark'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'date' => 'Date',
            'email' => 'Email',
            'enroll' => 'Enroll',
            'status' => 'Status',
            'remark' => 'Remark',
        ];
    }
}
