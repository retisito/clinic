<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use kartik\icons\Icon;
use app\models\Center;
use app\models\Environment;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="panel panel-default" style="margin-top:15px; padding:13px; background-color:#fdfdfd; ">
            <?= $form->field(isset($model->environment) ? $model->environment->center : $model, 'id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Center::find()
                        ->select(['id', 'name'])
                        ->all(), 'id', 'name'
                    ),
                    'options' => ['id' => 'centers', 'placeholder' => 'Seleccionar un Centro ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ], 
                ])->label('Centro');
            ?>
            <?= $form->field($model, 'environment_id')->widget(DepDrop::classname(), [
                    'data' => ArrayHelper::map(Environment::find()
                        ->where(['center_id' => isset($model->environment) ? $model->environment->center_id : 0])
                        ->select(['id', 'name'])
                        ->all(), 'id', 'name'
                    ),
                    'options' => ['id' => 'environments', 'placeholder' => 'Seleccionar un Ambiente ...'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                    'pluginOptions' => [
                        'depends' => ['centers'],
                        'url' => Url::to(['/admin/environment/list']),
                        'loadingText' => 'Loading child level 1 ...',
                    ]
                ])->label('Ambiente');
            ?>
        </div>
        <div class="panel panel-default" style="margin-top:25px; padding:13px; background-color:#fdfdfd; ">
            <div class="row">
                <div class="col-sm-4">        
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Nombre') ?>
                </div>
                <div class="col-sm-4">       
                    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-4"> 
                    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-4">
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
                </div> 
            </div>
        </div>
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>  
        <div class="form-group">
            <?= Html::submitButton(Icon::show('save', ['framework' => Icon::FAS]) 
                . 'Guardar', ['class' => 'btn btn-success']) 
            ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
