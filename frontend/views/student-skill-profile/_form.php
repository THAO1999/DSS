<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\CapacityDictionary;
use yii\helpers\ArrayHelper ;
/* @var $this yii\web\View */
/* @var $model frontend\models\StudentSkillProfile */
/* @var $form yii\widgets\ActiveForm */
?>
</div>
<div class="student-skill-profile-form">

    <?php $form = ActiveForm::begin(); ?>

   
    <?= $form->field($capacity, 'ability_name')->dropDownList(ArrayHelper::map(CapacityDictionary::find()->all(), 'id', 'ability_name'))
?>

    <?= $form->field($model, 'ability_rate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
