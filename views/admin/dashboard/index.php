<?php
/* @var $this yii\web\View */
?>

<h1>admin/dashboard/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

    <?php
        use yii\widgets\Pjax;
        use yii\helpers\Html;
    ?>


    <?php Pjax::begin(['id'=>'id-pjax']); ?>
    <?= Html::beginForm(['admin/dashboard/index'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
        <?= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']) ?>
        <?= Html::submitButton('Hash String', ['class' => 'btn btn-lg btn-primary', 'name' => 'hash-button']) ?>
    <?= Html::endForm() ?>
    <h3><?= $stringHash ?></h3>
    <?php Pjax::end(); ?>