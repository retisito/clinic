<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Inspection */

$this->title = 'Crear';
//$this->params['breadcrumbs'][] = ['label' => 'Inspections', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspection-create">
    <div class="panel panel-default" style="margin-top:25px;">
        <div class="panel-heading" style="color:#888;">
            <?= Html::a(Icon::show('clipboard-list', ['framework' => Icon::FAS]) . 'Inspecciones', ['index']) ?> 
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
