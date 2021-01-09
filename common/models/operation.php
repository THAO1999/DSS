<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "operation".
 *
 * @property int $id
 * @property string $name
 * @property string $detail
 * @property int $created_at
 * @property int $end_at
 * @property int $user_id
 *
 * @property Student $user
 * @property Student[] $students
 */
class operation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'detail', 'created_at', 'end_at', 'user_id'], 'required'],
            [['created_at', 'end_at', 'user_id'], 'integer'],
            [['name', 'detail'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'name' => 'Name',
            'detail' => 'Detail',
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
        return $this->hasMany(Student::className(), ['operation_id' => 'id']);
    }
}
