<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnvironmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ambientes';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="environment-index">
    <div class="panel panel-default" style="margin-top:25px;">
        <div class="panel-heading">
            <?= Icon::show('sign', ['framework' => Icon::FAS]) 
                . Html::encode($this->title) 
            ?>
        </div>
        <div style="padding:13px;">
            <?php Pjax::begin(); ?>
                <div class="row">
                    <div class="col-sm-6" style="margin-bottom:13px;"> 
                        <?= Html::a(Icon::show('plus', ['framework' => Icon::FAS]) . 
                            'Crear', ['create'], ['class' => 'btn btn-success']) 
                        ?>
                    </div>
                    <div class="col-sm-6" style="margin-bottom:13px;">
                        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                    </div>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'layout' => '{items}{summary}<span style="float:right; margin-top:-50px;">{pager}</span>',
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
    </div>
</div>
