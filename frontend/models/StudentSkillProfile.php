<?php

namespace frontend\models;

use common\models\CapacityDictionary;
use Yii;

/**
 * This is the model class for table "student_skill_profile".
 *
 * @property int $id
 * @property int $student_id
 * @property int $ability_id
 * @property int $ability_rate
 *
 * @property CapacityDictionary $ability
 * @property Student $student
 */
class StudentSkillProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_skill_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        
        return [
            [[  'ability_rate'], 'required'],
            [[  'ability_rate'], 'integer'],
         //  [['ability_id'], 'exist', 'skipOnError' => true, 'targetClass' => CapacityDictionary::className(), 'targetAttribute' => ['ability_id' => 'id']],
         //   [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'ability_id' => 'Ability ID',
            'ability_rate' => 'Ability Rate',
        ];
    }

    /**
     * Gets query for [[Ability]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAbility()// thuoc ve 1
    {
        return $this->hasOne(CapacityDictionary::className(), ['id' => 'ability_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
   public function beforeSave($insert){
 
      $this->student_id=Yii::$app->user->identity->id;
      $this->ability_id=$_POST['Capacity']['ability_name']; 
      return parent::beforeSave($insert);
   }

    public function getSkill($model){
    return  $skill=$model->studentSkillProfiles; // get student Skill Profiles
        }
    
  
}
