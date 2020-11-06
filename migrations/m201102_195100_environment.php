<?php

use yii\db\Migration;

/**
 * Class m201102_195100_environment
 */
class m201102_195100_environment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        echo "Create table Environment.\n";
        $this->createTable('environment', [
            'id' => $this->primaryKey(),
            'center_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_by' => $this->string(),
            'updated_by' => $this->string(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);

        $this->createIndex(
            'idx-environment-center_id',
            'environment',
            'center_id',
        );

        $this->addForeignKey(
            'fk-environment-center_id',
            'environment',
            'center_id',
            'center',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        #echo "m201102_195100_environment cannot be reverted.\n";
        #return false;

        echo "Drop table Environment.\n";
        $this->dropTable('environment');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201102_195100_environment cannot be reverted.\n";

        return false;
    }
    */
}
