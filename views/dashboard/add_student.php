<?php
/**
 * Created by PhpStorm.
 * User: yesalam
 * Date: 5/15/16
 * Time: 5:59 PM
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Addstudent_Form */
/* @var $classarray app\models\Classes[]*/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Add Student';
//$baseUrl = Yii::$app->baseUrl;
$this->registerJsFile('../basic/web/js/addstudent.js',['depends' => [\yii\web\JqueryAsset::className()]]) ;
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Provide following detail for Adding Student </p>

    <div class="row">

            <?php $form = ActiveForm::begin(
                
            );
                $form->options = [
                    'class'=>'form form-inline',
                    'id' => 'form-student-mute'
                ];
            ?>

            <div >

            </div>

            <div class="form-group" id="enroll-div">
            <?= $form->field($model,'enroll')->textInput()->inline();?>
            </div>

            <div class="form-group" id="name-div" >
            <?= $form->field($model,'name')->textInput()->inline() ; ?>
            </div>

        <div class="form-group" id="class-div">
            <?= $form->field($model, 'class_id')->dropDownList($classarray) ?>
        </div>

        <div class="form-group">
            <?= Html::buttonInput('Add another',[
                'class' => 'btn btn-primary',
                'id' => 'addanother'
            ]) ?>
        </div>

        <div class="row"  >
            <div class="col-md-4"></div>
            <div id="student-pending-list" class="col-md-4">

            </div>
        </div>

        <!--<div class="row ">
            <div class="col-md-4" ></div>
            <div class="col-md-4 form-group">
            <?/*= Html::submitButton('Add', [
                'class' => 'btn btn-primary',
                'name' => 'addstudent-button',
                'id' => 'submit'

            ]) */?>
                </div>-->
        </div>
        <?php ActiveForm::end(); ?>



        <?php $form = ActiveForm::begin([
            'id' => 'form-student',
            'class' => 'form'
        ]) ?>

        <?=  Html::input('hidden','AddStudent_Form[enroll]',null,[
            'id' => 'enroll' ,


        ]) ?>
                <?= Html::input('hidden','AddStudent_Form[name]',null,[
            'id' => 'name' ,
        ]) ?>
                <?= Html::input('hidden','AddStudent_Form[class_id]',null,[
            'id' => 'class' ,
        ]) ?>

        <div class="row  ">
            <div class="col-md-4" ></div>
            <div class="col-md-4 form-group">

                <?= Html::submitButton('Add', [
                    'class' => 'btn btn-primary',
                    'name' => 'addstudent-button',
                    'id' => 'submit'
                ]) ?>
            </div>
            <div class="col-md-4"></div>
        </div>
        <?php ActiveForm::end();?>
    </div>
</div>
