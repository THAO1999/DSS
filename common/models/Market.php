<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "market".
 *
 * @property int $id
 * @property string $ name
 *
 * @property MarketsJob[] $marketsJobs
 */
class Market extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'market';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[' name'], 'required'],
            [[' name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Thị trường làm việc',
        ];
    }

    /**
     * Gets query for [[MarketsJobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarketsJobs()
    {
        return $this->hasMany(MarketJob::className(), ['market_id' => 'id']);
    }
    public function getMarket($add)
    {

        return Market::findOne($add->market_id);
    }
}
