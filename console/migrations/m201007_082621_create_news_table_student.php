<?php

use yii\db\Migration;

/**
 * Class m201007_082621_create_news_table_enterprise
 */
class m201007_082621_create_news_table_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'date_of_birth' => $this->date(),
            'class_name' => $this->string(),
            'img' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
        ], );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');

        return false;
    }

}
