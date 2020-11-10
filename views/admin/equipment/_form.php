<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use app\models\Center;
use app\models\Environment;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field(isset($model->environment) ? $model->environment->center : $model, 'id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Center::find()
                ->select(['id', 'name'])
                ->all(), 'id', 'name'
            ),
            'options' => ['id' => 'centers', 'placeholder' => 'Select a Center ...'],
            'pluginOptions' => [
                'allowClear' => true
            ], 
        ]);
    ?>

    <?= $form->field($model, 'environment_id')->widget(DepDrop::classname(), [
            'data' => ArrayHelper::map(Environment::find()
                ->where(['center_id' => isset($model->environment) ? $model->environment->center_id : 0])
                ->select(['id', 'name'])
                ->all(), 'id', 'name'
            ),
            'options' => ['id' => 'environments', 'placeholder' => 'Select a Environment ...'],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => ['centers'],
                'url' => Url::to(['/admin/environment/list']),
                'loadingText' => 'Loading child level 1 ...',
            ]
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
