<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Environment */

$this->title = 'Crear';
//$this->params['breadcrumbs'][] = ['label' => 'Environments', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="environment-create">
    <div class="panel panel-default" style="margin-top:25px;">
        <div class="panel-heading" style="color:#888;">
            <?= Html::a(Icon::show('sign', ['framework' => Icon::FAS]) . 'Ambientes', ['index']) ?> 
            <?= Icon::show('angle-right', ['framework' => Icon::FAS]) 
                . Icon::show('plus', ['framework' => Icon::FAS]) 
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
