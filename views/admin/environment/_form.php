<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\icons\Icon;
use app\models\Center;

/* @var $this yii\web\View */
/* @var $model app\models\Environment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="environment-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default" style="margin-top:15px; background-color:#fdfdfd;">
        <div style="padding:13px;">
            <?= $form->field($model, 'center_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Center::find()->select(['id', 'name'])->all(),'id','name'),
                    'options' => ['placeholder' => 'Seleccionar un Centro ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],  
                ])->label('Centro');
            ?>
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
