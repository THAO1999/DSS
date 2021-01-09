<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CapacityDictionary */

$this->title = 'Update Capacity Dictionary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Capacity Dictionaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="capacity-dictionary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
