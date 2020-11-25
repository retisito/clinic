<?php

namespace app\controllers\admin;

use Yii;

class ProfileController extends \yii\web\Controller
{
    use \app\common\traits\AccessControl;
    use \app\common\traits\Authorization;
    
    public function actionIndex()
    {
        $model = Yii::$app->user->identity;
        
        if ($model->load(Yii::$app->request->post())) {
            $user = Yii::$app->request->post()['User'];
            $old_pwd = $user['current_password'];
            $new_pwd = $user['new_password'];
            $rep_pwd = $user['repeat_new_password'];

            // Se verifica si hay un cambio de password
            if (!empty($old_pwd) && !empty($new_pwd) && !empty($rep_pwd)) {
                if ($model->validateChangePassword($old_pwd, $new_pwd, $rep_pwd)) {
                    $model->password = Yii::$app->getSecurity()->generatePasswordHash($new_pwd);
                    $model->password_change_count++;
                    
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
