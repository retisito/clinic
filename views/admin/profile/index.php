<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Perfil ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-update">
    <div class="panel panel-default" style="margin-top:25px;">
        <div class="panel-heading">
            <?= Icon::show('id-card', ['framework' => Icon::FAS]) 
                . Html::encode($this->title) 
            ?>
        </div>
        <div style="padding:13px;">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
