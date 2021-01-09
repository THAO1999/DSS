<?php

use yii\db\Migration;

/**
 * Class m201217_070942_addForeignKey_for_student_table
 */
class m201217_070942_addForeignKey_for_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-information',
            'student',
            'information_id',
            'information',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-colleges',
            'student',
            'college_id',
            'colleges',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-target',
            'student',
            'target_id',
            'target',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-hobby',
            'student',
            'hobby_id',
            'hobby',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-operation',
            'student',
            'operation_id',
            'operation',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-experience',
            'student',
            'experience_id',
            'experience',
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
            'fk-information',
            'student'
        );
        $this->dropForeignKey(
            'fk-colleges',
            'student'
        );
        $this->dropForeignKey(
            'fk-target',
            'student'
        );
        $this->dropForeignKey(
            'fk-hobby',
            'student'
        );
        $this->dropForeignKey(
            'fk-operation',
            'student'
        );
        $this->dropForeignKey(
            'fk-experience',
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
echo "m201217_070942_addForeignKey_for_student_table cannot be reverted.\n";

return false;
}
 */
}
