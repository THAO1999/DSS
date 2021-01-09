<?php

use yii\db\Migration;

/**
 * Class m201217_072650_addForeignKey_for_target_table
 */
class m201217_072650_addForeignKey_for_target_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-target-user_id',
            'target',
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
            'fk-target-user_id',
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
echo "m201217_072650_addForeignKey_for_target_table cannot be reverted.\n";

return false;
}
 */
}
