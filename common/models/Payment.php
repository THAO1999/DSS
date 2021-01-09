<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property string $name
 *
 * @property PaymentJob[] $paymentJobs
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Hình thức trả lương',
        ];
    }

    /**
     * Gets query for [[PaymentJobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentJobs()
    {
        return $this->hasMany(PaymentJob::className(), ['payment_id' => 'id']);
    }
    public function getPayment($payment)
    {

        return Payment::findOne($payment->payment_id);
    }
}
