<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%student}}`.
 */
class m201217_065652_add_target_id_column_to_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%student}}', 'college_id', $this->integer());
        $this->addColumn('{{%student}}', 'target_id', $this->integer());
        $this->addColumn('{{%student}}', 'hobby_id', $this->integer());
        $this->addColumn('{{%student}}', 'operation_id', $this->integer());
        $this->addColumn('{{%student}}', 'experience_id', $this->integer());
        $this->addColumn('{{%student}}', 'information_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->dropColumn('{{%student}}', '');
    }
}
