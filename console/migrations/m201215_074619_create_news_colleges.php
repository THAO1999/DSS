<?php

use yii\db\Migration;

/**
 * Class m201215_074619_create_news_colleges
 */
class m201215_074619_create_news_colleges extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
 $this->createTable('{{%colleges}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'specialized' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'end_at' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ] );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%colleges}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_074619_create_news_colleges cannot be reverted.\n";

        return false;
    }
    */
}
