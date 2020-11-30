<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
use kartik\icons\Icon;
use app\models\Center;
use app\models\Environment;
use app\models\Equipment;
use app\models\Status;

/* @var $this yii\web\View */
/* @var $model app\models\Inspection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspection-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="panel panel-default" style="margin-top:15px; padding:13px; background-color:#fdfdfd; ">
            <?= $form->field(isset($model->equipment) ? $model->equipment->environment->center : $model, 'id')->widget(Select2::classname(), [
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
            <?= $form->field(isset($model->equipment) ? $model->equipment->environment : $model, 'id')->widget(DepDrop::classname(), [
                    'data' => ArrayHelper::map(Environment::find()
                        ->where(['center_id' => isset($model->equipment) ? $model->equipment->environment->center_id : 0])
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
            <?= $form->field($model, 'equipment_id')->widget(DepDrop::classname(), [
                    'data' => ArrayHelper::map(Equipment::find()
                        ->where(['environment_id' => isset($model->equipment) ? $model->equipment->environment_id : 0])
                        ->select(['id', 'name'])
                        ->all(), 'id', 'name'
                    ),
                    'options' => ['id' => 'equipments', 'placeholder' => 'Seleccionar un Equipo ...'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                    'pluginOptions' => [
                        'depends' => ['centers', 'environments'],
                        'url' => Url::to(['/admin/equipment/list']),
                        'loadingText' => 'Loading child level 2 ...',
                    ]
                ])->label('Equipo');
            ?>
        </div>
        <div class="panel panel-default" style="margin-top:25px; padding:13px; background-color:#fdfdfd; ">
            <div class="row">
                <div class="col-sm-4">        
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Nombre') ?>
                </div>
                <div class="col-sm-4">        
                    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'status_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Status::find()
                                ->select(['id', 'name'])
                                ->all(), 'id', 'name'
                            ),
                            'options' => ['placeholder' => 'Seleccionar un Estado ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],  
                        ])->label('Estado');
                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default" style="margin-top:25px; padding:13px; background-color:#fdfdfd; ">
            <div class="row">
                <div class="col-sm-3">        
                    <?= $form->field($model, 'planned_at')->widget(DatePicker::classname(), [
                            'name' => 'operation_time', 
                            'value' => date('d-M-Y g:i A', strtotime('+2 days')),
                            'options' => ['placeholder' => 'Select operating time ...'],
                            'convertFormat' => true,
                            'readonly' => true,
                            'pluginOptions' => [
                                'format' => 'yyyy-M-dd 00:00:00',
                                'todayHighlight' => true
                            ],
                        ]); 
                    ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'executed_at')->widget(DatePicker::classname(), [
                            'value' => date('d-M-Y g:i A', strtotime('+2 days')),
                            'options' => ['placeholder' => 'Select operating time ...'],
                            'convertFormat' => true,
                            'readonly' => true,
                            'pluginOptions' => [
                                'format' => 'yyyy-M-dd 00:00:00',
                                'todayHighlight' => true
                            ],
                        ]); 
                    ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'data_sent_at')->widget(DatePicker::classname(), [
                            'value' => date('d-M-Y g:i A', strtotime('+2 days')),
                            'options' => ['placeholder' => 'Select operating time ...'],
                            'convertFormat' => true,
                            'readonly' => true,
                            'pluginOptions' => [
                                'format' => 'yyyy-M-dd 00:00:00',
                                'todayHighlight' => true
                            ],
                        ]); 
                    ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'report_sent_at')->widget(DatePicker::classname(), [
                            'value' => date('d-M-Y g:i A', strtotime('+2 days')),
                            'options' => ['placeholder' => 'Select operating time ...'],
                            'convertFormat' => true,
                            'readonly' => true,
                            'pluginOptions' => [
                                'format' => 'yyyy-M-dd 00:00:00',
                                'todayHighlight' => true
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
