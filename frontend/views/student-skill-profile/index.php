<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Skill Profiles';
?>
</div>
<div class="student-skill-profile-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Student Skill Profile', ['create'], ['class' => 'btn btn-success'])?>
    </p>


    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'ability.ability_name',
        'ability_rate',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>


</div>
