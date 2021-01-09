<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "capacity_dictionary".
 *
 * @property int $id
 * @property string $ability_name
 * @property string $aibility_type
 * @property string $ability_note
 *
 * @property StudentSkillProfile[] $studentSkillProfiles
 *
 *
 * @property OrganizationRequestAbilities[] $OrganizationRequestAbilities
 */
class CapacityDictionary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'capacity_dictionary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ability_name'], 'required'],
            // [['id'], 'integer'],
            // [['ability_name', 'aibility_type', 'ability_note'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ability_name' => 'Tên năng lực',
            'aibility_type' => 'Aibility Type',
            'ability_note' => 'Ability Note',
        ];
    }

    /**
     * Gets query for [[StudentSkillProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSkillProfiles()
    {
        return $this->hasMany(StudentSkillProfile::className(), ['ability_id' => 'id']);
    }
    public function getOrganizationRequestAbilities()
    {
        return $this->hasMany(OrganizationRequestAbilities::className(), ['ability_id' => 'id']);
    }
    public function getCapacity($skill)
    {
        $cap = $skill->ability; // lay nang luc theo ability (relation) hasOne()
        return $cap->ability_name;

    }
}
