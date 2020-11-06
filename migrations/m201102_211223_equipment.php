<?php

use yii\db\Migration;

/**
 * Class m201102_211223_equipment
 */
class m201102_211223_equipment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        echo "Create table Equipment.\n";
        $this->createTable('equipment', [
            'id' => $this->primaryKey(),
            'environment_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'brand' => $this->string(),
            'model' => $this->string(),
            'serial' => $this->string(),
            'code' => $this->string(),
            'size' => $this->string(),
            'description' => $this->text(),
            'created_by' => $this->string(),
            'updated_by' => $this->string(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);

        $this->createIndex(
            'idx-equipment-environment_id',
            'equipment',
            'environment_id',
        );

        $this->addForeignKey(
            'fk-equipment-environment_id',
            'equipment',
            'environment_id',
            'environment',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        #echo "m201102_211223_equipment cannot be reverted.\n";
        #return false;

        echo "Drop table Equipment.\n";
        $this->dropTable('Equipment');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201102_211223_equipment cannot be reverted.\n";

        return false;
    }
    */
}
