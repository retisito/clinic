<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = 'Crear';
//$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-create">
    <div class="panel panel-default" style="margin-top:25px;">
        <div class="panel-heading" style="color:#888;">
            <?= Html::a(Icon::show('laptop-medical', ['framework' => Icon::FAS]) . 'Equipos', ['index']) ?> 
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
