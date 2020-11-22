<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php if (User::findOne(Yii::$app->user->id)->role == 'root'): ?>
    <?= $form->field($model, 'role')->radioList(
            ['admin' => 'Admin', 'employee' => 'Employee'], 
            ['unselect' => null]
        ); 
    ?>
    <?php endif ?>

    <?= $form->field($model, 'status')->radioList(
            ['activo' => 'Activo', 'inactivo' => 'Inactivo'], 
            ['unselect' => null]
        ); 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
