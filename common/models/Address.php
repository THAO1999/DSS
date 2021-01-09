<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $name
 *
 * @property AddressEnterprise[] $addressEnterprises
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Nơi Làm việc',
            'name' => 'Nơi làm việc',

        ];
    }

    /**
     * Gets query for [[AddressEnterprises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddressEnterprises()
    {
        return $this->hasMany(AddressJob::className(), ['address_id' => 'id']);
    }

    public function getAddress($add)
    {

        return Address::findOne($add->address_id);
    }
}
