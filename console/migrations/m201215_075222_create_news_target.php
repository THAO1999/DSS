<?php

use yii\db\Migration;

/**
 * Class m201215_075222_create_news_target
 */
class m201215_075222_create_news_target extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
 $this->createTable('{{%target}}', [
            'id' => $this->primaryKey(),
            'short_time' => $this->string()->notNull(),
            'long_time' => $this->string()->notNull(),
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
        $this->dropTable('{{%target}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_075222_create_news_target cannot be reverted.\n";

        return false;
    }
    */
}
