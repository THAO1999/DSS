<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assigned Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assigned-table-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'organizationRequest.subject',
        'student.username',
        'start_date',
        'end_date',
        //'status',
        //'create_date',

        // ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>


</div>
