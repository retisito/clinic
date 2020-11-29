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
    <div class="panel panel-default" style="margin-top:15px; background-color:#fdfdfd;">
        <div style="padding:13px;">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>
    <div class="form-group">
        <?= Html::submitButton(Icon::show('save', ['framework' => Icon::FAS]) 
            . 'Guardar', ['class' => 'btn btn-success']) 
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
