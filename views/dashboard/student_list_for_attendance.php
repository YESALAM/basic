<?php
/**
 * Created by PhpStorm.
 * User: yesalam
 * Date: 5/28/16
 * Time: 10:38 PM
 */


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $students app\models\Student[]*/
/* @var $model app\models\AddClass_Form */


use yii\helpers\Html;
use yii\widgets\ActiveForm ;
use app\models\FacultyAllotment;
use app\models\Classes;
use app\models\Subject;
use app\models\Student ;


$this->title = 'Attendance Register';
$this->registerJsFile('../basic/web/js/saveattendance.js',['depends' => [\yii\web\JqueryAsset::className()]]) ;

?>
<div id="class_container container" >
    <?php $form = ActiveForm::begin(['id' => 'form-attendance']); ?>


    <?= $form->field($model, 'enroll')->textInput([
        'type' => 'hidden'
    ])->label(null,['style'=>'display:none']) ?>

    <?= $form->field($model, 'status')->textInput([
        'type' => 'hidden'
    ])->label(null,['style'=>'display:none']) ?>

    <?= $form->field($model,'remark')->textInput([
        'type' => 'hidden'
    ])->label(null,['style'=>'display:none']) ?>
<?php
    try{

        $nos = count($students) ;
        $base = 0 ;
        do{
            echo "<div class='row'>" ;
            for($i=0;$i<4 && $i<($nos+$i) ;$i++,$base++){
                echo "<div class='col-md-3'  >" ;
                echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'><p class='text-center text-uppercase ' style='margin:0px 0px 0px' >";
                echo $students[$base]->name ;
                echo "<br>" ;
                echo $students[$base]->enroll;
                echo "</p></div>";

                echo "<div class='panel-footer' >";
                echo "<div id='footer-conternt' >";
                echo "<div class='btn-group col-md-6' >";
                echo "<button type='button' class='btn btn-default' style='disply:inline;' id='".$students[$base]->enroll."_P_'".$base.">P</button>";
                echo "</div>";

                echo "<div class='btn-group' >";
                echo "<button type='button' class='btn btn-default' style='disply:inline;' id='".$students[$base]->enroll."_A_'".$base.">A</button>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $nos-- ;
            }
            echo "</div>" ;

        }while($nos>0);

    }catch(Exception $e){
        echo "</p></div>";
        echo "</div>" ;
        echo "</div>";
        echo "</div>";
    }



?>


    </div>
