<?php

use yii\db\Migration;

/**
 * Class m201102_220858_equipment_status
 */
class m201102_220858_equipment_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        echo "Create table Equipment Status.\n";
        $this->createTable('equipment_status', [
            'id' => $this->primaryKey(),
            'environment_status_id' => $this->integer()->notNull(),
            'equipment_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'created_by' => $this->string(),
            'updated_by' => $this->string(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);

        $this->createIndex(
            'idx-equipment_status-environment_status_id',
            'equipment_status',
            'environment_status_id',
        );

        $this->addForeignKey(
            'fk-equipment_status-environment_status_id',
            'equipment_status',
            'environment_status_id',
            'environment_status',
            'id',
            'CASCADE',
        );

        $this->createIndex(
            'idx-equipment_status-equipment_id',
            'equipment_status',
            'equipment_id',
        );

        $this->addForeignKey(
            'fk-equipment_status-equipment_id',
            'equipment_status',
            'equipment_id',
            'equipment',
            'id',
            'CASCADE',
        );

        $this->createIndex(
            'idx-equipment_status-status_id',
            'equipment_status',
            'status_id',
        );

        $this->addForeignKey(
            'fk-equipment_status-status_id',
            'equipment_status',
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
        #echo "m201102_220858_equipment_status cannot be reverted.\n";
        #return false;

        echo "Drop table Equipment Status.\n";
        $this->dropTable('equipment_status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201102_220858_equipment_status cannot be reverted.\n";

        return false;
    }
    */
}
