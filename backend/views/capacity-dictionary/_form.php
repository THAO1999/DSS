<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CapacityDictionary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacity-dictionary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ability_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aibility_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ability_note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
