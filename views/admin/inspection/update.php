<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Inspection */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Inspections', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inspection-update">
    <div class="panel panel-default" style="margin-top:25px;">
        <div class="panel-heading" style="color:#888;">
        <?= Html::a(Icon::show('clipboard-list', ['framework' => Icon::FAS]) . 'Inspecciones', ['index']) ?> 
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
