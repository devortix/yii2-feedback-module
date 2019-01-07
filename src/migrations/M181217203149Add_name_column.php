<?php

namespace devortix\feedback\migrations;

use yii\db\Migration;

/**
 * Class M181217203148Create_feedback_table
 */
class M181217203149Add_name_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%feedback}}', 'name', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%feedback}}', 'name');
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "M181217203148Create_feedback_table cannot be reverted.\n";

return false;
}
 */
}