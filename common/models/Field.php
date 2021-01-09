<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field".
 *
 * @property int $id
 * @property string $name
 * @property int $job_id
 *
 * @property FieldJob[] $fieldJobs
 */
class Field extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'field';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'job_id'], 'required'],
            [['job_id'], 'integer'],
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
            'id' => 'ID',
            'name' => 'Lĩnh vực',
            'job_id' => 'Job ID',
        ];
    }

    /**
     * Gets query for [[FieldJobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFieldJobs()
    {
        return $this->hasMany(FieldJob::className(), ['field_id' => 'id']);
    }

    public function getField($add)
    {

        return Field::findOne($add->field_id);
    }
}
