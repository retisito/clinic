<?php

use yii\db\Migration;

/**
 * Class m201102_220852_environment_status
 */
class m201102_220852_environment_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        echo "Create table Environment Status.\n";
        $this->createTable('environment_status', [
            'id' => $this->primaryKey(),
            'environment_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'code' => $this->string(),
            'description' => $this->text(),
            'planned_at' => $this->datetime(),
            'executed_at' => $this->datetime(),
            'data_sent_at' => $this->datetime(),
            'report_sent_at' => $this->datetime(),
            'created_by' => $this->string(),
            'updated_by' => $this->string(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);

        $this->createIndex(
            'idx-environment_status-environment_id',
            'environment_status',
            'environment_id',
        );

        $this->addForeignKey(
            'fk-environment_status-environment_id',
            'environment_status',
            'environment_id',
            'environment',
            'id',
            'CASCADE',
        );

        $this->createIndex(
            'idx-environment_status-status_id',
            'environment_status',
            'status_id',
        );

        $this->addForeignKey(
            'fk-environment_status-status_id',
            'environment_status',
            'status_id',
            'status',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        #echo "m201102_220852_environment_status cannot be reverted.\n";
        #return false;

        echo "Drop table Environment Status.\n";
        $this->dropTable('environment_status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201102_220852_environment_status cannot be reverted.\n";

        return false;
    }
    */
}
