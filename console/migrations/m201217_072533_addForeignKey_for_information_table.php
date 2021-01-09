<?php

use yii\db\Migration;

/**
 * Class m201217_072533_addForeignKey_for_information_table
 */
class m201217_072533_addForeignKey_for_information_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-information-user_id',
            'information',
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
            'fk-information-user_id',
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
echo "m201217_072533_addForeignKey_for_information_table cannot be reverted.\n";

return false;
}
 */
}
