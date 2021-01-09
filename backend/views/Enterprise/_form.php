<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Enterprise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enterprise-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

    <?=$form->field($model, 'username')->textInput(['maxlength' => true])?>
    <?=$form->field($model, 'password_hash')->textInput(['maxlength' => true, 'type' => 'password', 'autocomplete' => 'new-password'])?>
    <?=$form->field($model, 'email')->textInput(['maxlength' => true])?>
    <?=$form->field($model, 'cover_img')->fileInput()?>


    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
