<?php
/**
 * Created by PhpStorm.
 * User: yesalam
 * Date: 5/13/16
 * Time: 3:30 AM
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title)  ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'e-Haziri',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            /*['label' => 'Contact', 'url' => ['/site/contact']],*/
        ];
        if (Yii::$app->user->isGuest) {
            //Only Student is allowed to signup directly .
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup-student']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->email . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>

         <div class="container">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
             <div class="row">

                 <div class="col-md-2">
                     <div id="dashboard_navigation " class="list-group">
                         <a class="list-group-item " href="">Mark Attendance</a>
                         <a class="list-group-item collapsed" href="#navigation-300" data-toggle="collapse" data-parent="#dashboard_navigation" aria-expanded="false">
                             Class
                             <b class="caret"></b>
                         </a>
                         <div id="navigation-300" class="submenu panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                              <a class="list-group-item" href="" >Classes list</a>
                                <a class="list-group-item" href="index.php?r=dashboard/addclass" >Add Class</a>
                         </div>
                         <a class="list-group-item collapsed " href="#navigation-301" data-toggle="collapse" data-parent="#dashboard_navigation" aria-expanded="false">
                             Students
                            <b class="caret"></b>
                         </a>
                         <div id="navigation-301" class="submenu panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                             <a class="list-group-item" href="" >Students list</a>
                             <a class="list-group-item" href="index.php?r=dashboard/addstudent" >Add Student</a>
                         </div>
                        <!-- <a class="list-group-item collapsed " href="#navigation-302" data-toggle="collapse" data-parent="#dashboard_navigation" aria-expanded="false">
                             Subjects
                             <b class="caret"></b>
                         </a>
                         <div id="navigation-302" class="submenu panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                             <a class="list-group-item" href="" >Subject list</a>
                             <a class="list-group-item" href="" >Add Subject</a>
                         </div>-->
                     </div>
                 </div>

                 <div class="col-md-9 ">
                     <?= $content ?>
                 </div>



             </div>
                <?/*= $content */?>
            </div>

    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Rupesh , Sadar , Sagarika , Saiyam <?/*= date('Y') */?></p>

            <!--<p class="pull-right"><?/*= Yii::powered() */?></p>-->
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>