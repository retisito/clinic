<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Environment;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'environment_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Environment::find()->select(['id', 'name'])->all(),'id','name'),
            'options' => ['placeholder' => 'Select a environment ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],  
        ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'size')->widget(Select2::classname(), [
            'data' => ArrayHelper::map([
                ["id"=>"s", "name"=>"Small"], 
                ["id"=>"m", "name"=>"Medium"], 
                ["id"=>"l", "name"=>"Large"],
            ],'id','name'),
            'options' => ['placeholder' => 'Select a size ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],  
        ]);
    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
