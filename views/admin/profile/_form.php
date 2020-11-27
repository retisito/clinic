<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default" style="margin-top:15px; background-color:#fdfdfd;">
        <div class="panel-heading">
            <?= Icon::show('user', ['framework' => Icon::FAS]) 
                . 'Datos Personales' 
            ?>
        </div>
        <div style="padding:13px;">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'readOnly' => true]) ?>
        </div>
    </div>
    <div class="panel panel-default" style="margin-top:25px; background-color:#fdfdfd;">
        <div class="panel-heading">
            <?= Icon::show('lock', ['framework' => Icon::FAS]) 
                . 'Cambio de Clave' 
            ?>
        </div>
        <div style="padding:13px;">
            <?= $form->field($model, 'current_password')->passwordInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'repeat_new_password')->passwordInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Icon::show('save', ['framework' => Icon::FAS]) 
            .'Guardar', ['class' => 'btn btn-success']) 
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
