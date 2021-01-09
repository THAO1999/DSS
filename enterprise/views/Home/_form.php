<?php

use common\models\Address;
use common\models\Field;
use common\models\Market;
use common\models\Payment;
use common\models\Work;
use enterprise\models\Capacity;
use marqu3s\summernote\Summernote;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CapacityDictionary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacity-dictionary-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>


    <?=$form->field($model, 'subject')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'amount')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'short_description')->widget(Summernote::class, [
    'options' => ['placeholder' => 'Mô tả công việc ở đây...'],
]);?>

    <?=$form->field($model, 'date_submitted')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
])?>

<?=$form->field($address, 'name')
->dropDownList(
    ArrayHelper::map(Address::find()->asArray()->all(), 'id', 'name')
)
?>

<?=$form->field($field, 'name')
->dropDownList(
    ArrayHelper::map(Field::find()->asArray()->all(), 'id', 'name')
)
?>
<?=$form->field($work, 'name')
->dropDownList(
    ArrayHelper::map(Work::find()->asArray()->all(), 'id', 'name')
)
?>

<?=$form->field($payment, 'name')
->dropDownList(
    ArrayHelper::map(Payment::find()->asArray()->all(), 'id', 'name')
)
?>
<?=$form->field($market, 'name')
->dropDownList(
    ArrayHelper::map(Market::find()->asArray()->all(), 'id', 'name')
)
?>
    <?=$form->field($model, 'imageFile')->fileInput()?>

  <?=$form->field($capacity, 'ability_name')->checkboxList(ArrayHelper::map(Capacity::find()->all(), 'id', 'ability_name'))
?>
 <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success '])?>
    </div  >

    <?php ActiveForm::end();?>

</div>
