<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnvironmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Environments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="environment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Environment', ['create'], ['class' => 'btn btn-success']) ?>
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
            'name',
            //'description:ntext',
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

    <?php Pjax::end(); ?>

</div>
