<?php

use yii\helpers\Html;
use yii\helpers\Url;
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
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'center_name',
            'environment_name',
            'equipment_name',
            'name',
            'status_name',
            //'code',
            //'description:ntext',
            //'planned_at',
            //'executed_at',
            //'data_sent_at',
            //'report_sent_at',
            'created_by',
            'updated_by',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function($action, $model, $key, $index) { 
                    return Url::to([$action, 'id' => $model->id]); 
                }
            ],
        ],
    ]); ?>


</div>
