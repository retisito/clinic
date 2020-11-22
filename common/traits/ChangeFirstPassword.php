<?php

namespace app\common\traits;

use Yii;
use app\models\User;

trait ChangeFirstPassword 
{
    public function beforeAction($event)
	{   
        if (User::findOne(Yii::$app->user->id)->login_count == 1)
            return  $this->redirect(['admin/profile']);
        else
            return true;
    }
}