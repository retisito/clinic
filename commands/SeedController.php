<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use app\models\User;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SeedController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'App\'s Data Seed:')
    {
        echo $message . "\n";
        $this->seedUsers(); 
        return ExitCode::OK;
    }

    private function seedUsers() 
    {
        echo " -> User Model: \n";
        
        echo "  . Clear all users \n";
        User::deleteAll();
        
        echo "  . Create user root \n";
        $pwd = 'p4r4l3l3p1p3d0';
        $hash = Yii::$app->getSecurity()->generatePasswordHash($pwd);
        $root = [   
            'name' => 'root',
            'email' => 'root@serofca.com',
            'password' => $hash,
            'role' => 'root',
            'status' => 'activo'
        ]; 

        $user = new User();
        $user->attributes = $root;
        $user->save();

        #------------------------------------------#

        echo "  . Create user admin \n";
        $pwd = 'qwerty';
        $hash = Yii::$app->getSecurity()->generatePasswordHash($pwd);
        $admin = [   
            'name' => 'admin',
            'email' => 'admin@serofca.com',
            'password' => $hash,
            'role' => 'admin',
            'status' => 'activo'
        ]; 

        $user = new User();
        $user->attributes = $admin;
        $user->save();
    }
}
