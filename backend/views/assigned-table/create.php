<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssignedTable */

$this->title = 'Create Assigned Table';
$this->params['breadcrumbs'][] = ['label' => 'Assigned Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assigned-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
