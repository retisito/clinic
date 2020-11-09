<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Center;

/* @var $this yii\web\View */
/* @var $model app\models\Environment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="environment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'center_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Center::find()->select(['id', 'name'])->all(),'id','name'),
            'options' => ['placeholder' => 'Select a center ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],  
        ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
