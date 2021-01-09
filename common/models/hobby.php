<?php

namespace common\models;

use backend\models\Student;
use Yii;

/**
 * This is the model class for table "hobby".
 *
 * @property int $id
 * @property string $ hobby_name
 * @property int $user_id
 *
 * @property Student $user
 * @property Student[] $students
 */
class hobby extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hobby';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[' hobby_name', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [[' hobby_name'], 'string', 'max' => 255],
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
            ' hobby_name' => 'Name',
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
        return $this->hasMany(Student::className(), ['hobby_id' => 'id']);
    }
}
