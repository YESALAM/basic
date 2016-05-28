<?php
/**
 * Created by PhpStorm.
 * User: yesalam
 * Date: 5/12/16
 * Time: 4:14 AM
 */

namespace app\controllers;

use app\models\Attendance;
use app\models\Subject;
use Yii;
use app\models\AddStudent_Form;
use app\models\AddClass_Form;
use app\models\Faculty;
use app\models\FacultyAllotment;
use app\models\Student;
use app\models\Classes ;
use yii\web\Controller;

class DashboardController extends Controller
{
    public $layout = 'dashboard' ;

    public function actionInitialize(){

        $email = \Yii::$app->user->identity->email ;
        $faculty = Faculty::find()->where(['email'=>$email])->one();
        $facultyAllotments = FacultyAllotment::find()->where(['email'=>$email])->all() ;
        $student_count = 0 ;
        foreach($facultyAllotments as $facultyAllotment){
            $class_id = $facultyAllotment->class_id ;
            $students = Student::find()->where(['class_id' => $class_id])->all();
            $student_count += count($students);
        }
        return $this->render('index.php',[
            'faculty' => $faculty,
            'facultyAllotment' => $facultyAllotments ,
            'student_count' => $student_count ,
        ]);
    }

    public function actionAddclass(){
        $model = new AddClass_Form();

        if ($model->load(Yii::$app->request->post())) {
            if ($class = $model->add()) {
                return $this->redirect('index.php?r=dashboard/initialize');
                /*if (Yii::$app->getUser()->login($class)) {
                    //return $this->goBack();
                    return $this->redirect('index.php?r=dashboard/initialize');
                }*/
            }
        }


        return $this->render('add_class', [
            'model' => $model,
        ]);
    }

    public function actionListclass(){
        return $this->render('view_class', [

        ]);
    }

    public function actionSelectclass(){
        return $this->render('select_class',[]);
    }

    public function actionMarkattendance($class_id){
        $email = \Yii::$app->user->identity->email ;
        $students = Student::find()->where([
            'class_id' => $class_id ,
        ])->all();

        $model = new Attendance();
        if($model->load(Yii::$app->request->post())){
            if($success = $model->add()){
                return $this->redirect('index.php?r=dashboard/initialize');
            }
        }

        return $this->render('student_list_for_attendance',[
            'model' => $model ,
            'students' => $students
        ]);
    }

    public function actionAddstudent(){

        $model = new AddStudent_Form();
        if($model->load(Yii::$app->request->post())){
           /* $post = Yii::$app->request->post('form-student-mute') ;
            var_dump($post);
            $model->enroll = $post['AddStudent_Form[enroll_hidden]'] ;
            $model->name = $post['AddStudent_Form[name_hidden]'] ;
            $model->class_id = $post['AddStudent_Form[class_id_hidden]'] ;*/
            if($model->add()){
                return $this->redirect('index.php?r=dashboard/initialize');
            }
        }


        $classes = Classes::find()->all() ;
        $classarray = array();
        foreach($classes as $class){
            $classarray[$class->class_id] = $class->course."-".$class->semester."-".$class->section ;
        }
        return $this->render('add_student',[
            'model' => $model ,
            'classarray' => $classarray
        ]);
    }

    public function actionListStudent(){}

    public function actionAddSubject(){}

    public function actionListSubject(){}

}