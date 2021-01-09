<?php

use yii\db\Migration;

/**
 * Class m201215_074916_create_news_operation
 */
class m201215_074916_create_news_operation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
 $this->createTable('{{%operation}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'detail' => $this->string()->notNull(),
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
         $this->dropTable('{{%operation}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_074916_create_news_operation cannot be reverted.\n";

        return false;
    }
    */
}
