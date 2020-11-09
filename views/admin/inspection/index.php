<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InspectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspection-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Inspection', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'center_id',
            'environment_id',
            'equipment_id',
            'status_id',
            //'name',
            //'code',
            //'description:ntext',
            //'planned_at',
            //'executed_at',
            //'data_sent_at',
            //'report_sent_at',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
