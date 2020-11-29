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
    <div class="panel panel-default" style="margin-top:15px; background-color:#fdfdfd;">
        <div style="padding:13px;">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <br/>
            <?= $form->field($model, 'status')->radioList(
                ['activo' => 'Activo', 'inactivo' => 'Inactivo'], 
                ['unselect' => null]
            ); 
            ?>
            <?php if (User::findOne(Yii::$app->user->id)->role == 'root'): ?>
            <hr/>
            <?= $form->field($model, 'role')->radioList(
                    ['admin' => 'Admin', 'employee' => 'Employee'], 
                    ['unselect' => null]
                ); 
            ?>
            <?php endif ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Icon::show('save', ['framework' => Icon::FAS]) 
            . 'Guardar', ['class' => 'btn btn-success']) 
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
