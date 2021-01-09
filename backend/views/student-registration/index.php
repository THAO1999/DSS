<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Registrations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-registration-index">

    <h1><?=Html::encode($this->title)?></h1>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'student.username',
        'organizationRequest.subject',
        'submit_date',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>


</div>
