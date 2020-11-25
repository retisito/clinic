<?php

namespace app\common\traits;

use Yii;
use app\models\User;

trait AccessControl 
{
    var $layout;
    var $ACL = [
        'root' => [
            'routes' => [
                'admin/dashboard',
                'admin/center',
                'admin/environment',
                'admin/equipment',
                'admin/status',
                'admin/inspection',
                'admin/user',
                'admin/profile',
            ],
            'layout' => 'admin/one'
        ],
        'admin' => [
            'routes' => [
                'admin/dashboard',
                'admin/center',
                'admin/environment',
                'admin/equipment',
                'admin/status',
                'admin/inspection',
                'admin/user',
                'admin/profile',
            ],
            'layout' => 'admin/one'
        ],
        'employee' => [
            'routes' => [
                'admin/dashboard',
                'admin/inspection',
                'admin/profile',
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
        if (!in_array(Yii::$app->controller->id, 
            $this->ACL[Yii::$app->user->identity->role]['routes']))
            return $this->redirect(['admin/dashboard']);
        
        return true;
    }
}