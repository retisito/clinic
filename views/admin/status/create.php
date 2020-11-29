<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = 'Crear';
//$this->params['breadcrumbs'][] = ['label' => 'Statuses', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-create">
    <div class="panel panel-default" style="margin-top:25px;">
        <div class="panel-heading" style="color:#888;">
            <?= Html::a(Icon::show('thermometer', ['framework' => Icon::FAS]) . 'Estados', ['index']) ?> 
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