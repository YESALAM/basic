<?php
/**
 * Created by PhpStorm.
 * User: yesalam
 * Date: 5/14/16
 * Time: 11:50 AM
 */

namespace app\models;

use yii\base\Model;
use app\models\Classes;
use app\models\Subject ;

class AddClass_Form extends Model
{
    /*public $username;*/
    public $course ;
    public $semester ;
    public  $section ;
    //field for subject model because we need here to make a single form of both class and subject .
    public $subject_id ;
    public $subject_name ;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [


            ['course', 'filter', 'filter' => 'trim'],
            ['course', 'required'],
            ['course', 'string'],

            ['semester', 'required'],
            ['semester', 'integer'],

            ['section','required'],
            ['section','string','max'=> 1 ],
            ['subject_id','required'],
            ['subject_id','string','max'=>5],
            ['subject_name','string'],
            ['subject_name','required'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function add()
    {
        if (!$this->validate()) {
            return null;
        }

        $class = new Classes();
        $class->course = $this->course;
        $class->semester= $this->semester ;
        $class->section = $this->section ;

        $subject = new Subject();
        $subject->subject_id = $this->subject_id ;
        $subject->subject_name = $this->subject_name ;
        $subject->save() ;

        $class->save() ;
        $classes = Classes::find()->where([
            'course'=> $this->course,
            'semester' => $this->semester ,
            'section' => $this->section ,
        ])->one() ;

        $allotment = new FacultyAllotment();
        $allotment->email = \Yii::$app->user->identity->email ;
        $allotment->class_id = $classes->class_id ;
        $allotment->subject_id = $this->subject_id ;

        return $allotment->save() ? $class : null;
    }
}