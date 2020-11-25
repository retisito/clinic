<?php

namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\Security;

class DashboardController extends \yii\web\Controller
{
    use \app\common\traits\AccessControl;
    use \app\common\traits\Authorization;
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}
