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

    public function actionIndex()
    {
        #return $this->render('index');
        $security = new Security();
        $string = Yii::$app->request->post('string');
        $stringHash = '';
        if (!is_null($string)) {
            $stringHash = $security->generatePasswordHash($string);
        }
        return $this->render('index', [
            'stringHash' => $stringHash,
        ]);
    }

}
