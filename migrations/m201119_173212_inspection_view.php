<?php

use yii\db\Migration;


/**
 * Class m201119_173212_inspection_view
 */
class m201119_173212_inspection_view extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(
            'CREATE OR REPLACE VIEW inspection_view AS
            SELECT inspection.id,
                   center.name as center_name,
                   environment.name as environment_name,
                   equipment.name as equipment_name,
                   inspection.name,
                   status.name as status_name,
                   inspection.created_by,
                   inspection.updated_by
            FROM inspection
            LEFT JOIN equipment
            ON inspection.equipment_id = equipment.id
            LEFT JOIN environment
            ON equipment.environment_id = environment.id
            LEFT JOIN center
            ON environment.center_id = center.id
            JOIN status
            ON inspection.status_id = status.id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        #echo "m201119_173212_inspection_view cannot be reverted.\n";
        #return false;

        echo "Drop view Inspection.\n";
        $this->execute('DROP VIEW inspection_view');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201119_173212_inspection_view cannot be reverted.\n";

        return false;
    }
    */
}
