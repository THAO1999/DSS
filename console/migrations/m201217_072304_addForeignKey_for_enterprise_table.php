<?php

use yii\db\Migration;

/**
 * Class m201217_072304_addForeignKey_for_enterprise_table
 */
class m201217_072304_addForeignKey_for_enterprise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-experience-user_id',
            'experience',
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
            'fk-experience-user_id',
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
echo "m201217_072304_addForeignKey_for_enterprise_table cannot be reverted.\n";

return false;
}
 */
}
