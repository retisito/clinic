<?php

use yii\db\Migration;

/**
 * Class m201119_185400_equipment_view
 */
class m201119_185400_equipment_view extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(
            'CREATE OR REPLACE VIEW equipment_view AS
            SELECT equipment.id,
                   center.name as center_name,
                   environment.name as environment_name,
                   equipment.name,
                   equipment.created_by,
                   equipment.updated_by
            FROM equipment
            LEFT JOIN environment
            ON equipment.environment_id = environment.id
            LEFT JOIN center
            ON environment.center_id = center.id'
            
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        #/echo "m201119_185400_equipment_view cannot be reverted.\n";
        #return false;

        echo "Drop view Equipment.\n";
        $this->execute('DROP VIEW equipment_view');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201119_185400_equipment_view cannot be reverted.\n";

        return false;
    }
    */
}
