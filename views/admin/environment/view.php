<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Environment */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Environments', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="environment-view">
    <div class="panel panel-default" style="margin-top:25px;">
        <div class="panel-heading" style="color:#888;">
            <?= Html::a(Icon::show('sign', ['framework' => Icon::FAS]) . 'Ambientes', ['index']) ?> 
            <?= Icon::show('angle-right', ['framework' => Icon::FAS]) 
                . Icon::show('eye', ['framework' => Icon::FAS]) 
                . '(' . Html::encode($this->title) . ')' 
            ?>
        </div>
        <div style="padding:13px;">
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-striped table-bordered table-hover'],
                'attributes' => [
                    'id',
                    'center.name',
                    'name',
                    'description:ntext',
                    'created_by',
                    'updated_by',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
            <p>
                <?= Html::a(Icon::show('pencil-alt', ['framework' => Icon::FAS]) . 'Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Icon::show('trash-alt', ['framework' => Icon::FAS]) . 'Borrar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
    </div>
</div>
