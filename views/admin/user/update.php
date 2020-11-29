<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">
    <div class="panel panel-default" style="margin-top:25px;">
        <div class="panel-heading" style="color:#888;">
            <?= Html::a(Icon::show('users', ['framework' => Icon::FAS]) . 'Usuarios', ['index']) ?> 
            <?= Icon::show('angle-right', ['framework' => Icon::FAS]) 
                . Icon::show('pencil-alt', ['framework' => Icon::FAS]) 
                . '(' . Html::encode($this->title) . ')' 
            ?>
        </div>
        <div style="padding:13px;">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
