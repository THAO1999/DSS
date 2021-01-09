<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "work_job".
 *
 * @property int $id
 * @property int $job_id
 * @property int $work_id
 *
 * @property Work $work
 * @property OrganizationRequests $job
 */
class WorkJob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_id', 'work_id'], 'required'],
            [['job_id', 'work_id'], 'integer'],
            [['work_id'], 'exist', 'skipOnError' => true, 'targetClass' => Work::className(), 'targetAttribute' => ['work_id' => 'id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationRequests::className(), 'targetAttribute' => ['job_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'work_id' => 'Work ID',
        ];
    }

    /**
     * Gets query for [[Work]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
    }

    /**
     * Gets query for [[Job]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(OrganizationRequests::className(), ['id' => 'job_id']);
    }
    public function luu($organization_request_id)
    {
        $id = $_POST['Work']['name']; // get addressy  (name="")
        $model = new WorkJob();
        $model->job_id = $organization_request_id;
        $model->work_id = $id;
        $model->save();
    }
}
