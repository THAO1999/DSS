<?php

namespace common\models;

use backend\models\Student;
use Yii;

/**
 * This is the model class for table "information".
 *
 * @property int $id
 * @property string $personal_information
 * @property string $specialize
 * @property int|null $user_id
 *
 * @property Student $user
 * @property Student[] $students
 */
class information extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['personal_information', 'specialize'], 'required'],
            [['user_id'], 'integer'],
            [['personal_information', 'specialize'], 'string', 'max' => 255],
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
            'personal_information' => 'Personal Information',
            'specialize' => 'Specialize',
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
        return $this->hasMany(Student::className(), ['information_id' => 'id']);
    }
}
