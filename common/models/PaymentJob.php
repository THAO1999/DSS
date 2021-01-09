<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_job".
 *
 * @property int $id
 * @property int $job_id
 * @property int $payment_id
 *
 * @property OrganizationRequests $job
 * @property Payment $payment
 */
class PaymentJob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_id', 'payment_id'], 'required'],
            [['job_id', 'payment_id'], 'integer'],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationRequests::className(), 'targetAttribute' => ['job_id' => 'id']],
            [['payment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Payment::className(), 'targetAttribute' => ['payment_id' => 'id']],
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
            'payment_id' => 'Payment ID',
        ];
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

    /**
     * Gets query for [[Payment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payment::className(), ['id' => 'payment_id']);
    }
    public function luu($organization_request_id)
    {
        $id = $_POST['Payment']['name']; // get addressy  (name="")
        $model = new PaymentJob();
        $model->job_id = $organization_request_id;
        $model->payment_id = $id;
        $model->save();
    }

}
