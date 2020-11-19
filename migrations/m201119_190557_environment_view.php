<?php

use yii\db\Migration;

/**
 * Class m201119_190557_environment_view
 */
class m201119_190557_environment_view extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(
            'CREATE OR REPLACE VIEW environment_view AS
            SELECT environment.id,
                   center.name as center_name,
                   environment.name,
                   environment.created_by,
                   environment.updated_by
            FROM environment
            LEFT JOIN center
            ON environment.center_id = center.id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        #echo "m201119_190557_environment_view cannot be reverted.\n";
        #return false;
        
        echo "Drop view Environment.\n";
        $this->execute('DROP VIEW environment_view');
    }
    
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201119_190557_environment_view cannot be reverted.\n";

        return false;
    }
    */
}
