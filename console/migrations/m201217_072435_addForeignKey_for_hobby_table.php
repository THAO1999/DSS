<?php

use yii\db\Migration;

/**
 * Class m201217_072435_addForeignKey_for_hobby_table
 */
class m201217_072435_addForeignKey_for_hobby_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-hobby-user_id',
            'hobby',
            'user_id',
            'student',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-hobby-user_id',
            'student'
        );
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m201217_072435_addForeignKey_for_hobby_table cannot be reverted.\n";

return false;
}
 */
}
