<?php

namespace app\controllers\admin;

use Yii;
use app\models\User;

class ProfileController extends \yii\web\Controller
{
    public $layout = 'admin/main';
    use \app\common\traits\Authorization;

    public function actionIndex()
    {
        $model = User::findOne(Yii::$app->user->id);
            
        if ($model->load(Yii::$app->request->post())) {
            $user = Yii::$app->request->post()['User'];
            $old_pwd = $user['current_password'];
            $new_pwd = $user['new_password'];
            $rep_pwd = $user['repeat_new_password'];

            // Se verifica si hay un cambio de password
            if (!empty($old_pwd) && !empty($new_pwd) && !empty($rep_pwd)) {
                if ($model->validateChangePassword($old_pwd, $new_pwd, $rep_pwd)) {
                    $model->password = Yii::$app->getSecurity()->generatePasswordHash($new_pwd);
                    
                    if ($model->save()) {
                        Yii::$app->user->logout();
                        return $this->redirect(['site/login']);
                    }
                }
            }
            // Solo se salva cambio del nombre
            $model->save();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
