<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "work".
 *
 * @property int $id
 * @property string $name
 *
 * @property WorkJob[] $workJobs
 */
class Work extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work';
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
            'name' => 'Hình Thức Làm việc',
        ];
    }

    /**
     * Gets query for [[WorkJobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkJobs()
    {
        return $this->hasMany(WorkJob::className(), ['work_id' => 'id']);
    }
    public function getWork($add)
    {

        return Work::findOne($add->work_id);
    }
}
