<?php

use yii\db\Migration;

/**
 * Class m201215_075446_create_news_hobby
 */
class m201215_075446_create_news_hobby extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
 $this->createTable('{{%hobby}}', [
            'id' => $this->primaryKey(),
            ' name' => $this->string()->notNull(),

            'user_id' => $this->integer()->notNull(),
        ] );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
             $this->dropTable('{{%hobby}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_075446_create_news_hobby cannot be reverted.\n";

        return false;
    }
    */
}
