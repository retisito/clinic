<?php

use yii\db\Migration;

/**
 * Class m201031_205745_centro
 */
class m201031_205745_center extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {   
        echo "Create table Center.\n";
        $this->createTable('center', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->text(),
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
        #echo "m201031_205745_center cannot be reverted.\n";
        #return false;

        echo "Drop table Center.\n";
        $this->dropTable('center');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201031_205745_center cannot be reverted.\n";

        return false;
    }
    */
}
