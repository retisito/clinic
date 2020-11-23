<?php

namespace app\common\traits;

use Yii;
use app\models\User;

trait ChangeFirstPassword 
{
    public function beforeAction($event)
	{   
        if (Yii::$app->user->isGuest)
            return  $this->redirect(['site/login']);
        if (Yii::$app->user->identity->password_change_count == 0)
            return  $this->redirect(['admin/profile']);
        else
            return true;
    }
}