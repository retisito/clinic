<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Center */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="center-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default" style="margin-top:15px; padding:13px; background-color:#fdfdfd;">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Nombre') ?>
    </div>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton(Icon::show('save', ['framework' => Icon::FAS]) 
            . 'Guardar', ['class' => 'btn btn-success']) 
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
