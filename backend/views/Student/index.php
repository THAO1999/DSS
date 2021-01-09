<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Student', ['create'], ['class' => 'btn btn-success'])?>
    </p>
    <p>
        <?=Html::a('Import file Excel', ['import'], ['class' => 'btn btn-success'])?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'username',
        //  'auth_key',
        // 'password_hash',
        //'password_reset_token',
        'email:email',
        //'date_of_birth',
        'class_name',
        //'img',
        'status',
        //'created_at',
        //'updated_at',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>


</div>
