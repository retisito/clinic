<?php

use yii\db\Migration;

/**
 * Class m201029_144438_user
 */
class m201029_144438_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {        
        echo "Create table User.\n";
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'role' => $this->string()->notNull()->defaultValue('employee'),
            'status' => $this->string()->notNull()->defaultValue('inactivo'),
            'auth_key' => $this->string(),
            'access_token' => $this->string(),
            'password_change_count' => $this->integer()->defaultValue(0),
            'login_count' => $this->integer()->defaultValue(0),
            'last_login' => $this->datetime(),
            'created_by' => $this->string(),
            'updated_by' => $this->string(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        #echo "m201029_144438_user cannot be reverted.\n";
        #return false;

        echo "Drop table User.\n";
        $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201029_144438_user cannot be reverted.\n";

        return false;
    }
    */
}
