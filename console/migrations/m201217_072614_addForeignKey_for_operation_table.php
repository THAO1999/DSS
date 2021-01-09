<?php

use yii\db\Migration;

/**
 * Class m201217_072614_addForeignKey_for_operation_table
 */
class m201217_072614_addForeignKey_for_operation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-operation-user_id',
            'operation',
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
            'fk-operation-user_id',
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
echo "m201217_072614_addForeignKey_for_operation_table cannot be reverted.\n";

return false;
}
 */
}
