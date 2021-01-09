<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assigned_table".
 *
 * @property int $organization_request_id
 * @property int $student_id
 * @property string $start_date
 * @property string $end_date
 * @property int $status
 * @property string $create_date
 *
 * @property Student $student
 * @property OrganizationRequests $organizationRequest
 */
class AssignedTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assigned_table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_request_id', 'student_id', 'status'], 'integer'],
            [['start_date', 'end_date', 'create_date'], 'safe'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            // [['organization_request_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationRequests::className(), 'targetAttribute' => ['organization_request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'organization_request_id' => 'Organization Request ID',
            'student_id' => 'Student ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'status' => 'Status',
            'create_date' => 'Create Date',
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
     * Gets query for [[OrganizationRequest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationRequest()
    {
        return $this->hasOne(OrganizationRequest::className(), ['id' => 'organization_request_id']);
    }
}
