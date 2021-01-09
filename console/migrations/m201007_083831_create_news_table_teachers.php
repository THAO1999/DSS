<?php

use yii\db\Migration;

/**
 * Class m201007_083831_create_news_table_teachers
 */
class m201007_083831_create_news_table_teachers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teachers}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'img' => $this->string(),
            "sex"=>$this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
      
        ], );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
     
        $this->dropTable('{{%teachers}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201007_083831_create_news_table_teachers cannot be reverted.\n";

        return false;
    }
    */
}