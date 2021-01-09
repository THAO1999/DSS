<?php

use yii\db\Migration;

/**
 * Class m201217_072016_addForeignKey_for_colleges_table
 */
class m201217_072016_addForeignKey_for_colleges_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-student',
            'colleges',
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
            'fk-student',
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
echo "m201217_072016_addForeignKey_for_colleges_table cannot be reverted.\n";

return false;
}
 */
}
