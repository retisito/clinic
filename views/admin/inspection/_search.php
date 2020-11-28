<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\InspectionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1,
        'style' => 'height:34px !important;'
    ],
]); ?>

<span class="input-group">
    <?= $form->field($model, 'chunck', ['inputOptions' => ['style' => 'margin-top:-10px;', 'class' => 'form-control', 'placeholder' => 'Buscar...']])->label(false) ?>
    <span class="input-group-btn">
        <?= Html::submitButton(Icon::show('search', ['framework' => Icon::BSG]), ['class' => 'btn btn-primary']) ?>
    </span>
</span>
<?php ActiveForm::end(); ?>
