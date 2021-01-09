<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "student_registration".
 *
 * @property int $id
 * @property int $student_id
 * @property int $request_id
 * @property string $submit_date
 *

 * @property Student $student
 * @property OrganizationRequest $organizationRequest
 */
class StudentRegistration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_registration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'request_id'], 'integer'],
            [['submit_date'], 'safe'],
            [['student_id', 'request_id'], 'unique', 'targetAttribute' => ['student_id', 'request_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'student_id' => 'Student ID',
            'request_id' => 'Request ID',
            'submit_date' => 'Submit Date',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
    public function getOrganizationRequest()
    {
        return $this->hasOne(OrganizationRequest::className(), ['id' => 'request_id']);
    }

    public function getCount($id)
    {
        return StudentRegistration::find()
            ->where(['request_id' => $id])
            ->count();
    }
}
