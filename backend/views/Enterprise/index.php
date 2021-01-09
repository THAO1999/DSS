<?php

use backend\assets\AppAsset;
use yii\grid\GridView;
use yii\helpers\Html;
AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnterpriseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enterprises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Enterprise', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'username',
        // 'auth_key',
        // 'password_hash',
        // 'password_reset_token',
        'email:email',
        //'date_establish',
        //'employee_count',
        //'img',
        //'cover_img',
        //'description',
        //'gross_revenue',
        'status',
        'created_at',
        //'updated_at',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>


</div>
