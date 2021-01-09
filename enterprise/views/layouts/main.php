<?php
use common\widgets\Alert;
use frontend\assets\AppAsset;
/* @var $this \yii\web\View */
/* @var $content string */
use kartik\icons\FontAwesomeAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
AppAsset::register($this);

use \yii\web\View;

FontAwesomeAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/
4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3
+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<link rel="stylesheet" type="text/css" href="https://www.topcv.vn/packages/cvo/base/reset.css?v=2.0">
<link rel="stylesheet" type="text/css" href="https://www.topcv.vn/packages/cvo/base/style.css?v=2.5">

<link rel="stylesheet" type="text/css" href="https://www.topcv.vn/packages/cvo/cropper/style.css?v=2.1">
<link rel="stylesheet" type="text/css" href="https://www.topcv.vn/packages/cvo/cvoPrompt/cvoPrompt.css?v=2.0">

<link rel="stylesheet" type="text/css" href="https://www.topcv.vn/packages/cvo/templates//onepage_impressive_2/cv.css">


<link rel="stylesheet" type="text/css" href="Test.css">

    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head()?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>

<body>
    <?php $this->beginBody()?>

    <div class="wrap">

        <?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['organization-request/index?status=10']],
    ['label' => 'Create', 'url' => ['/home/create']],
    ['label' => 'Recruitment',
        'items' => [
            ['label' => 'Confirm', 'url' => ['organization-request/index?status=10']],
            ['label' => 'UnConfirm', 'url' => ['organization-request/index?status=9']],
            ['label' => 'Cancel', 'url' => ['organization-request/index?status=0']],
            ['label' => 'Expire', 'url' => ['organization-request/index?status=1']],
        ]],

];
$menuItems[] = ['label' => Yii::$app->user->identity->username,
    'items' => [
        ['label' => 'My Profile', 'url' => ['/profile-enterprise/index']],
        ['label' => 'Logout', 'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']]]];

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>

   <div class="container">
            <?=Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])?>
            <?=Alert::widget()?>
            <?=$content?>
        </div>
    </div>


    <?php $this->endBody()?>
</body>

</html>
<?php $this->endPage()?>