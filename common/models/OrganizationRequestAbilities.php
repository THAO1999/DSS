<?php

namespace common\models;

use common\models\CapacityDictionary;
use common\models\OrganizationRequests;
use Yii;

/**
 * This is the model class for table "organization_request_abilities".
 *
 * @property int $id
 * @property int $organization_request_id
 * @property int $ability_id
 * @property int|null $ability_required
 * @property string|null $note
 *
 * @property OrganizationRequests $organizationRequest
 * @property CapacityDictionary $ability
 * @property StudentSkillProfile[] $studentSkillProfiles
 */
class OrganizationRequestAbilities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization_request_abilities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_request_id', 'ability_id'], 'required'],
            [['organization_request_id', 'ability_id'], 'integer'],
            [['note'], 'string', 'max' => 20],
            //     [['organization_request_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationRequests::className(), 'targetAttribute' => ['organization_request_id' => 'id']],
            //  [['ability_id'], 'exist', 'skipOnError' => true, 'targetClass' => CapacityDictionary::className(), 'targetAttribute' => ['ability_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organization_request_id' => 'Organization Request ID',
            'ability_id' => 'Ability ID',
            'ability_required' => 'Ability Required',
            'note' => 'Note',
        ];
    }

    /**
     * Gets query for [[OrganizationRequest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationRequest()
    {
        return $this->hasOne(OrganizationRequests::className(), ['id' => 'organization_request_id']);
    }

    /**
     * Gets query for [[Ability]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAbility()
    {
        return $this->hasOne(CapacityDictionary::className(), ['id' => 'ability_id']);
    }

    /**
     * Gets query for [[StudentSkillProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function luu($organization_request_id)
    {

        $listCapacity = $_POST['Capacity']['ability_name']; // get all Capacity  (name="")

        foreach ($listCapacity as $capacity) {
            $model = new OrganizationRequestAbilities();
            $model->organization_request_id = $organization_request_id;
            $model->ability_id = $capacity;
            $model->save();
        }

    }

    public function getSkill($model)
    {
        return $skill = $model->organizationRequestAbilities; // get  OrganizationRequestAbilities
    }

}
