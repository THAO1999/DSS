<?php

namespace common\models;

use backend\models\Student;
use Yii;

/**
 * This is the model class for table "colleges".
 *
 * @property int $id
 * @property string $name
 * @property string $specialized
 * @property int $created_at
 * @property int $end_at
 * @property int $user_id
 *
 * @property Student $user
 * @property Student[] $students
 */
class Colleges extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'colleges';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'specialized', 'created_at', 'end_at', 'user_id'], 'required'],
            [['created_at', 'end_at', 'user_id'], 'integer'],
            [['name', 'specialized'], 'string', 'max' => 255],
            [['name'], 'unique'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'specialized' => 'Specialized',
            'created_at' => 'Created At',
            'end_at' => 'End At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Student::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['college_id' => 'id']);
    }
}
