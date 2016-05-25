<?php
/**
 * Created by PhpStorm.
 * User: yesalam
 * Date: 5/15/16
 * Time: 6:15 PM
 */

namespace app\models;


use yii\base\Model;

class AddStudent_Form extends Model
{

    public $name ;
    public $enroll ;
    public $class_id ;

    public function rules()
    {
        return [
            ['name','required'],
            ['name','string'],
            ['enroll','string'],
            ['enroll','required'],
            ['class_id','required'],
            ['class_id','string'],
        ];

    }

    public function add(){
        if (!$this->validate()) {
            return null;
        }


        $names = explode("||", $this->name);
        $enrolls = explode("||",$this->enroll) ;
        $class_ids = explode("||" ,$this->class_id) ;

        for( $i=0 ;$i<count($names);$i++){
            $student = new Student();
            $student->name = $names[$i] ;
            $student->enroll = $enrolls[$i] ;
            $student->class_id = $class_ids[$i] ;
            $student->save() ;
        }


        return true;
    }



}