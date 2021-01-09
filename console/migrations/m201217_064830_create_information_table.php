<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%information}}`.
 */
class m201217_064830_create_information_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%information}}', [
            'id' => $this->primaryKey(),
            'personal_information' => $this->string()->notNull(),
            'specialize' => $this->string()->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%information}}');
    }
}
