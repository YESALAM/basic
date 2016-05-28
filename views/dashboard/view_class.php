<?php
/**
 * Created by PhpStorm.
 * User: yesalam
 * Date: 5/26/16
 * Time: 6:33 PM
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */



use yii\helpers\Html;
use app\models\FacultyAllotment;
use app\models\Classes;
use app\models\Subject;
use app\models\Student ;

$this->title = 'Add Student';
$email = \Yii::$app->user->identity->email ;
$class_alloted = FacultyAllotment::find()->where([
    'email' => $email
])->all()
?>
<div id="class_container container" >
    <?php
        $noc = count($class_alloted);


        do{
            echo "<div class='row'>" ;
            for($i=0;$i<3 && $i<=$noc;$i++){
                $class = Classes::find()->where([
                    'class_id' => $class_alloted[$i]->class_id
                ])->one();
                $subject = Subject::find()->where([
                    'subject_id' => $class_alloted[$i]->subject_id
                ])->one();
                $students = Student::find()->where(['class_id' => $class_alloted[$i]->class_id])->all();
                $student_count = count($students);
                echo "<div class='col-md-4'  >" ;
                    echo "<div class='panel panel-primary'>";
                        echo "<div class='panel-heading'><p class='text-center text-uppercase'>";
                            echo $class->course."-".$class->semester."-".$class->section ;
                        echo "</p></div>";
                        echo "<div class='panel-body'>";
                        echo "<dl class='dl-horizontal'>";
                            echo "<dt style='width: 100px;'>Subject Code</dt>" ;
                            echo "<dd class='text-uppercase' style='margin-left: 120px'>";
                                echo    $subject->subject_id ;
                            echo "</dd>";
                            echo "<dt style='width: 100px;'>Subject Name</dt>" ;
                            echo "<dd style='margin-left: 120px'>";
                                echo    $subject->subject_name ;
                            echo "</dd>";
                            echo "<dt style='width: 100px;'>No of Student</dt>" ;
                            echo "<dd style='margin-left: 120px'>";
                                echo    $student_count ;
                            echo "</dd>" ;
                        echo "</div>";
                        echo "<div class='panel-footer' >";

                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                $noc-- ;
            }
            echo "</div>" ;
        }while($noc>0);



    ?>

</div>
