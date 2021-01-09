<?php

namespace common\models;

use backend\models\Student;
use Yii;

/**
 * This is the model class for table "target".
 *
 * @property int $id
 * @property string $short_time
 * @property string $long_time
 * @property int $created_at
 * @property int $end_at
 * @property int $user_id
 *
 * @property Student[] $students
 * @property Student $user
 */
class target extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'target';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['short_time', 'long_time', 'created_at', 'end_at', 'user_id'], 'required'],
            [['created_at', 'end_at', 'user_id'], 'integer'],
            [['short_time', 'long_time'], 'string', 'max' => 255],
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
            'short_time' => 'Short Time',
            'long_time' => 'Long Time',
            'created_at' => 'Created At',
            'end_at' => 'End At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['target_id' => 'id']);
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
    public function getTarget($student_id)
    {

        return Target::find()->where(['user_id' => $student_id])->one();

    }
}
