<?php
/**
 * Created by PhpStorm.
 * User: yesalam
 * Date: 5/14/16
 * Time: 11:45 AM
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\AddClass_Form */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Add Classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Provide following detail for Adding class </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-class']); ?>


            <?= $form->field($model, 'course')->dropDownList([
                'CSE' => 'CSE',
                'ME' => 'ME',
                'CE' => 'CE',
                'EX' => 'EX' ,
                'EC' => 'EC' ,
            ]) ?>

            <?= $form->field($model, 'semester')->dropDownList([
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6' ,
                '7' => '7' ,
                '8' => '8' ,
            ]) ?>

            <?= $form->field($model,'section')->dropDownList([
                'A' => 'A',
                'B' => 'B',
                'C' => 'C' ,
                'D' => 'D' ,
            ]) ?>

           <?= $form->field($model,'subject_id')->textInput();?>

            <?= $form->field($model,'subject_name')->textInput();?>

            <div class="form-group">
                <?= Html::submitButton('Add', ['class' => 'btn btn-primary', 'name' => 'addclass-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
