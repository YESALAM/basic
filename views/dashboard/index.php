<?php
/**
 * Created by PhpStorm.
 * User: yesalam
 * Date: 5/13/16
 * Time: 3:55 AM
 */

/* @var $this yii\web\View
 * @var $student_count int
 */

$this->title = 'e-Haziri Dashboard' ;

?>
<div class="row text-center">
    <h1 class="h1">
        Welcome  <strong><?=$faculty->name ?></strong>
    </h1>
</div>

<div class="row text-center">
    <div class="cl-xs-6 col-sm-6">
        <h2 ><?=count($facultyAllotment)?></h2>
        <br>
        <small >class</small>
    </div>
    <div class="cl-xs-4 col-sm-6">
        <h2 ><?=  $student_count ?></h2>
        <br>
        <small >students</small>
    </div>
</div>

