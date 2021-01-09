<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address_enterprise".
 *
 * @property int $id
 * @property int $job_id
 * @property int $address_id
 *
 * @property Address $address
 * @property OrganizationRequests $job
 */
class AddressJob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address_enterprise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_id', 'address_id'], 'required'],
            [['job_id', 'address_id'], 'integer'],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'id']],
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
            'address_id' => 'Address ID',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
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
        $id = $_POST['Address']['name']; // get addressy  (name="")
        $model = new AddressJob();
        $model->job_id = $organization_request_id;
        $model->address_id = $id;
        $model->save();
    }

    public function address($id)
    {

        $addressJob = AddressJob::find()->where(['job_id' => $id])->one();
        $address = Address::findOne($addressJob->address_id);
        return $address->name;

        // return $id;
    }
}
