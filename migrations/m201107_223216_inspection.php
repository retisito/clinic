<?php

use yii\db\Migration;

/**
 * Class m201107_223216_inspection
 */
class m201107_223216_inspection extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        echo "Create table Inspection.\n";
        $this->createTable('inspection', [
            'id' => $this->primaryKey(),
            #'center_id' => $this->integer()->notNull(),
            #'environment_id' => $this->integer()->notNull(),
            'equipment_id' => $this->integer()->notNull(),
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
        /*
        $this->createIndex(
            'idx-inspection-center_id',
            'inspection',
            'center_id',
        );

        $this->addForeignKey(
            'fk-inspection-center_id',
            'inspection',
            'center_id',
            'center',
            'id',
            'CASCADE',
        );

        $this->createIndex(
            'idx-inspection-environment_id',
            'inspection',
            'environment_id',
        );

        $this->addForeignKey(
            'fk-inspection-environment_id',
            'inspection',
            'environment_id',
            'environment',
            'id',
            'CASCADE',
        );
        */
        $this->createIndex(
            'idx-inspection-equipment_id',
            'inspection',
            'equipment_id',
        );

        $this->addForeignKey(
            'fk-inspection-equipment_id',
            'inspection',
            'equipment_id',
            'equipment',
            'id',
            'CASCADE',
        );

        $this->createIndex(
            'idx-inspection-status_id',
            'inspection',
            'status_id',
        );

        $this->addForeignKey(
            'fk-inspection-status_id',
            'inspection',
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
        #echo "m201107_223216_inspection cannot be reverted.\n";
        #return false;

        echo "Drop table Inspection.\n";
        $this->dropTable('inspection');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201107_223216_inspection cannot be reverted.\n";

        return false;
    }
    */
}
