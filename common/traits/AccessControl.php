<?php

namespace app\common\traits;

use Yii;
use app\models\User;

trait AccessControl 
{
    var $layout;
    var $ACL = [
        'root' => [
            'controllers' => '*',
            'layout' => 'admin/one'
        ],
        'admin' => [
            'controllers' => '*',
            'layout' => 'admin/one'
        ],
        'employee' => [
            'controllers' => [
                'admin/dashboard' => '*',
                'admin/environment' => ['list'],
                'admin/equipment' => ['list'],
                'admin/inspection' => '*',
                'admin/profile' => '*',
            ],
            'layout' => 'admin/two'
        ],
    ];

    public function beforeAction($event)
	{   
        // Se verifica si el usuario este logueado
        if (Yii::$app->user->isGuest)
            return $this->redirect(['site/login']);
        
        // Set layout by user's role    
        $this->layout = $this->ACL[Yii::$app->user->identity->role]['layout'];

        // Se invita al usuario a cambiar su 
        // primera clave antes de continuar.
        if (Yii::$app->user->identity->password_change_count == 0 && 
            Yii::$app->controller->id != 'admin/profile')
            return $this->redirect(['admin/profile']);
        
        // Se revisa el ACL para saber si el usuario
        // tiene permiso de acceso al controlador
        $controllers = $this->ACL[Yii::$app->user->identity->role]['controllers']; 
        if (is_array($controllers)) {
            if (!in_array(Yii::$app->controller->id, array_keys($controllers)))
                throw new \yii\web\ForbiddenHttpException;
        
            // Se revisa el ACL para saber si el usuario
            // tiene permiso de acceso a la acción
            $actions = $controllers[Yii::$app->controller->id];
            if (is_array($actions))
                if (!in_array(Yii::$app->controller->action->id, $actions))
                    throw new \yii\web\ForbiddenHttpException;
        }

        return true;
    }
}