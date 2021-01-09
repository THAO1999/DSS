<?php
//AppAsset::register($this);
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CapacityDictionary */

$this->title = 'Create Capacity Dictionary';
$this->params['breadcrumbs'][] = ['label' => 'Capacity Dictionaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacity-dictionary-create">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>
