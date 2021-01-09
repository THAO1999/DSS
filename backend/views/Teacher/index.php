<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Teachers', ['create'], ['class' => 'btn btn-success'])?>
    </p>


    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'username',
        //'auth_key',
        // 'password_hash',
        // 'password_reset_token',
        'email:email',
        //'img',
        'sex',
        'status',
        'created_at',
        //'updated_at',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>


</div>