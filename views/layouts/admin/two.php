<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\icons\Icon;

Icon::map($this, Icon::FAS);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="/img/serofca-logo-1.png" style="max-width:100%;">',
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-inverse navbar-fixed-top'],        
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            '<li class="' . (Yii::$app->controller->id == 'admin/dashboard' ? 'active' : '') . '">'
            . Html::a(Icon::show('tachometer-alt', ['framework' => Icon::FAS]) 
            . 'Dashboard', ['/admin/dashboard'])
            . '</li>',
            '<li class="' . (Yii::$app->controller->id == 'admin/inspection' ? 'active' : '') . '">'
            . Html::a(Icon::show('clipboard-list', ['framework' => Icon::FAS]) 
            . 'Inspecciones', ['/admin/inspection'])
            . '</li>',
            '<li class="dropdown">'
                . '<a href="#" data-toggle="dropdown" class="dropdown-toggle">'
                . Icon::show('user-circle', ['class' => 'fa-lg', 'framework' => Icon::FAS])
                . '(' . explode(' ', Yii::$app->user->identity->name)[0] . ')'
                . '<b class="caret"></b></a>'
                . Dropdown::widget([
                        'items' => [
                            '<li>'
                            . Html::a(Icon::show('id-card', ['framework' => Icon::FAS]) 
                            . 'Perfil', ['/admin/profile'])
                            . '</li>',
                            '<li>' 
                            . Html::a(Icon::show('sign-out-alt', ['framework' => Icon::FAS]) 
                            . 'Logout', ['#'], ['onclick' => '$("#logout").submit(); return false;'])
                            . '</li>'    
                            . Html::beginForm(['/site/logout'], 'post', ['id' => 'logout']) 
                            . Html::endForm()
                        ],
                    ])
            . '</li>'
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<!--
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div> 
</footer>
-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
