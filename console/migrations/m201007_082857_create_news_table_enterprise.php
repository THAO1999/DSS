<?php

use yii\db\Migration;

/**
 * Class m201007_082857_create_news_table_enterprise
 */
class m201007_082857_create_news_table_enterprise extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enterprise}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(), 
            'date_establish'=>$this->date(),
            'employee_count' => $this->integer(),
            'img' => $this->string(),
            'cover_img' => $this->string(),
            'description' => $this->string(),
           "gross_revenue"=>$this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
        ],);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%enterprise}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201007_082857_create_news_table_enterprise cannot be reverted.\n";

        return false;
    }
    */
}