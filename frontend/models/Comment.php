<?php

namespace frontend\models;

use backend\models\Student;
use common\models\OrganizationRequests;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $student_id
 * @property int $request_id
 * @property string $content
 * @property string|null $submission_date
 *
 * @property Student $student
 * @property OrganizationRequests $request
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'request_id', 'content'], 'required'],
            [['student_id', 'request_id'], 'integer'],
            [['submission_date'], 'safe'],
            [['content'], 'string', 'max' => 1000],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationRequests::className(), 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'request_id' => 'Request ID',
            'content' => 'Suy nghĩ của bạn:',
            'submission_date' => 'Submission Date',
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

    /**
     * Gets query for [[Request]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(OrganizationRequests::className(), ['id' => 'request_id']);
    }
}
