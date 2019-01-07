<?php

namespace devortix\feedback\migrations;

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class M181217203148Create_feedback_table
 */
class M181217203148Create_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%feedback}}', [
            'id' => Schema::TYPE_PK,
            'user_name' => Schema::TYPE_STRING,
            'user_email' => Schema::TYPE_STRING,
            'phone' => Schema::TYPE_STRING,
            'push_emails' => Schema::TYPE_STRING,
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'info' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER . ' NOT NULL',

        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feedback}}');
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