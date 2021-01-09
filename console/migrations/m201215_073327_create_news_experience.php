<?php

use yii\db\Migration;

/**
 * Class m201215_073327_create_news_experience
 */
class m201215_073327_create_news_experience extends Migration
{
    /**
     * {@inheritdoc}
     */
        public function safeUp()
    {
        $this->createTable('{{%experience}}', [
            'id' => $this->primaryKey(),
            'enterprise_name' => $this->string()->notNull()->unique(),
            'namejob' => $this->string()->notNull(),
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
         $this->dropTable('{{%experience}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_073327_create_news_experience cannot be reverted.\n";

        return false;
    }
    */
}
