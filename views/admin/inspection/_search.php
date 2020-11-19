<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\InspectionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspection-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="input-group col-md-12">
        <?= $form->field($model, 'chunck', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Search']])->label(false) ?>
        <span class="input-group-btn button-fix">
            <?= Html::submitButton(Icon::show('search', ['framework' => Icon::BSG]), ['class' => 'btn btn-primary']) ?>
        </span>
    </div>
    <br/>

    <?php ActiveForm::end(); ?>

</div>
