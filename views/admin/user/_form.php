<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default" style="margin-top:15px; padding:13px; background-color:#fdfdfd;">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="panel panel-default" style="margin-top:15px; padding:13px; background-color:#fdfdfd;">        
        <?= $form->field($model, 'status')->radioList(
            ['activo' => 'Activo', 'inactivo' => 'Inactivo'], 
            ['unselect' => null]
        ); 
        ?>
    </div>
    <?php if (User::findOne(Yii::$app->user->id)->role == 'root'): ?>
    <div class="panel panel-default" style="margin-top:15px; padding:13px; background-color:#fdfdfd;">        
        <?= $form->field($model, 'role')->radioList(
                ['admin' => 'Admin', 'employee' => 'Employee'], 
                ['unselect' => null]
            ); 
        ?>
    </div>
    <?php endif ?>
    <div class="form-group">
        <?= Html::submitButton(Icon::show('save', ['framework' => Icon::FAS]) 
            . 'Guardar', ['class' => 'btn btn-success']) 
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
