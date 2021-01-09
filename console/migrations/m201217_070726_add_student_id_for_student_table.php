<?php

use yii\db\Migration;

/**
 * Class m201217_070726_add_student_id_for_student_table
 */
class m201217_070726_add_student_id_for_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%information}}', 'user_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201217_070726_add_student_id_for_student_table cannot be reverted.\n";

        return false;
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m201217_070726_add_student_id_for_student_table cannot be reverted.\n";

return false;
}
 */
}
