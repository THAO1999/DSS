<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "markets_job".
 *
 * @property int $id
 * @property int $job_id
 * @property int $market_id
 *
 * @property Market $market
 * @property OrganizationRequests $job
 */
class MarketJob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'markets_job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_id', 'market_id'], 'required'],
            [['job_id', 'market_id'], 'integer'],
            [['market_id'], 'exist', 'skipOnError' => true, 'targetClass' => Market::className(), 'targetAttribute' => ['market_id' => 'id']],
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
            'market_id' => 'Market ID',
        ];
    }

    /**
     * Gets query for [[Market]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarket()
    {
        return $this->hasOne(Market::className(), ['id' => 'market_id']);
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
        $id = $_POST['Market']['name']; // get addressy  (name="")
        $model = new MarketJob();
        $model->job_id = $organization_request_id;
        $model->market_id = $id;
        $model->save();
    }
}
