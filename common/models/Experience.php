<?php

namespace common\models;

use backend\models\Student;
use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property int $id
 * @property string $enterprise_name
 * @property string $namejob
 * @property int $created_at
 * @property int $end_at
 * @property int $user_id
 *
 * @property Student $user
 * @property Student[] $students
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experience';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enterprise_name', 'namejob', 'created_at', 'end_at', 'user_id'], 'required'],
            [['created_at', 'end_at', 'user_id'], 'integer'],
            [['enterprise_name', 'namejob'], 'string', 'max' => 255],
            [['enterprise_name'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enterprise_name' => 'Enterprise Name',
            'namejob' => 'Namejob',
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
        return $this->hasMany(Student::className(), ['experience_id' => 'id']);
    }
}
