<?php
use kartik\export\ExportMenu;
use yii\grid\GridView;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assigned Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assigned-table-index">

    <h1><?=Html::encode($this->title)?></h1>

    <?php $gridColumns = [
    'student.username',
    'start_date',
    'end_date',
];
?>

    <?=ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
]);?>
    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'student.username',
        'start_date',
        'end_date',
        //'status',
        //'create_date',

        //['class' => 'yii\grid\ActionColumn'],
    ],
]);?>


</div>
