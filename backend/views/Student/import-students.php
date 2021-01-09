
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Import Data</h1>
<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
    'action' => ['import'],
]);?>

<?=$form->field($model, 'fileImport')->fileInput()?>

<?=Html::submitButton('Import', ['class' => 'btn btn-primary']);?>

<?php ActiveForm::end();?>