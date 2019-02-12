<?php

namespace devortix\feedback\migrations;

use yii\db\Migration;

/**
 * Class M190212052753Add_file_name_column_to_feedback_table
 */
class M190212052753Add_file_name_column_to_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%feedback}}', 'file_name', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%feedback}}', 'file_name');
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "M190212052753Add_file_name_column_to_feedback_table cannot be reverted.\n";

return false;
}
 */
}