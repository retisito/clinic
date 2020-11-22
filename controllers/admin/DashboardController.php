<?php

namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\Security;

class DashboardController extends \yii\web\Controller
{
    public $layout = 'admin/main';
    use \app\common\traits\Authorization;
    use \app\common\traits\ChangeFirstPassword;

    public function actionIndex()
    {
        return $this->render('index');
    }

}
