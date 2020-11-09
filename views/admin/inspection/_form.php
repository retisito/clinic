<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
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

    <?= $form->field($model, 'center_id')->widget(Select2::classname(), [
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
                ->where(['center_id' => $model->center_id])
                ->select(['id', 'name'])
                ->all(), 'id', 'name'
            ),
            'options' => ['id' => 'environments', 'placeholder' => 'Select a Environment ...'],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => ['centers'],
                'url' => Url::to(['/admin/inspection/environments']),
                'loadingText' => 'Loading child level 1 ...',
            ]
        ]);
    ?>
    
    <?= $form->field($model, 'equipment_id')->widget(DepDrop::classname(), [
            'data' => ArrayHelper::map(Equipment::find()
                ->where(['environment_id' => $model->environment_id])
                ->select(['id', 'name'])
                ->all(), 'id', 'name'
            ),
            'options' => ['id' => 'equipments', 'placeholder' => 'Select a Equipment ...'],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => ['centers', 'environments'],
                'url' => Url::to(['/admin/inspection/equipments']),
                'loadingText' => 'Loading child level 2 ...',
            ]
        ]);
    ?>

    <?= $form->field($model, 'status_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Status::find()
                ->select(['id', 'name'])
                ->all(), 'id', 'name'
            ),
            'options' => ['placeholder' => 'Select a status ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],  
        ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

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

    <?= $form->field($model, 'executed_at')->widget(DatePicker::classname(), [
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

    <?= $form->field($model, 'data_sent_at')->widget(DatePicker::classname(), [
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

    <?= $form->field($model, 'report_sent_at')->widget(DatePicker::classname(), [
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
