<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field_job".
 *
 * @property int $id
 * @property int $field_id
 * @property int $job_id
 *
 * @property Field $field
 * @property OrganizationRequests $job
 */
class FieldJob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'field_job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field_id', 'job_id'], 'required'],
            [['field_id', 'job_id'], 'integer'],
            [['field_id'], 'exist', 'skipOnError' => true, 'targetClass' => Field::className(), 'targetAttribute' => ['field_id' => 'id']],
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
            'field_id' => 'Field ID',
            'job_id' => 'Job ID',
        ];
    }

    /**
     * Gets query for [[Field]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne(Field::className(), ['id' => 'field_id']);
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
        $id = $_POST['Field']['name']; // get addressy  (name="")
        $model = new FieldJob();
        $model->job_id = $organization_request_id;
        $model->field_id = $id;
        $model->save();
    }
}
