<?php

/* @var $this \yii\web\View */
/* @var $content string */
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="vi-VN" xml:lang="vi-VN" xmlns="http://www.w3.org/1999/xhtml">
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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


    <style>
      .preload_image { display: none; }
    </style>
    <?php $this->registerCsrfMetaTags()?>
    <?=Html::csrfMetaTags();

$this->registerCssFile('css/custom.css');
$this->registerCssFile('css/jquery-ui.css');

?>
    <title><?=Html::encode($this->title)?></title>

    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>
    <body class="jobs_index" data-controller="" data-env="production" >
    <div id="container">
    <div class="pageHeader shrink">
    <div class="page-header__inner">
    <nav class="pageMenu default-navbar">
      <div class="container-fluid">
        <div class="pageMenu__header">

          <a class="pageMenu__logo" data-controller="utm-tracking" href="#">
              <img class="logo-itviec" alt="itviec" src="<?=yii\helpers\Url::base(true) . '/../img/itviec.png'?>"width="108" height="42">
          </a>

        </div>
    <div class="pageMenu__body collapse" id="pageMenuToggle">

    <ul class="pageMenu__itemList pageMenu__itemList--right pageMenu__not_signed_in">


    <li class="pageMenu__item">
<a href="<?php echo Url::home() . "home/" ?>">Home</a>
</li>
        <li class="dropdown hidden-xs" id="user-dropdown">
<a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="" role="button">
<span class="dropdown-toggle__text"><?php echo Yii::$app->user->identity->username ?></span>
<span class="caret"></span>
<div class="sign-in-user-avatar"><img class="user-avatar" src="https://lh5.googleusercontent.com/-NEqiGPoAAVM/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnEZAkLbXKAlBavRoKCwMzncgmfAg/s96-c/photo.jpg"></div>
</a>
<ul class="dropdown-menu" role="menu" style="display: none;">
<li class="dropdown-menu__item--desktop">
<a class="dropdown-menu__link--desktop" data-controller="utm-tracking" href="<?php echo Url::home() . "profile-student" ?>"><span class="dropdown-menu__icon">
<div class="dropdown-menu__icon-user"></div>
</span>
<span>My Account</span>
</a></li>
<li class="dropdown-menu__item--desktop">
<a class="dropdown-menu__link--desktop" data-controller="utm-tracking" href="<?php echo Url::home() . "assigned-table/index?student_id=" . Yii::$app->user->identity->id ?>"><span class="dropdown-menu__icon">
<div class="dropdown-menu__icon-my-jr"></div>
</span>
<span>My Job </span>
</a></li>
<li class="dropdown-menu__item--desktop">
<a class="dropdown-menu__link--desktop" data-controller="utm-tracking" href="/saved_jobs"><span class="dropdown-menu__icon">
<div class="dropdown-menu__icon-saved"></div>
</span>
<span>Saved Jobs</span>
</a></li>
<li class="dropdown-menu__item--desktop">
<a class="dropdown-menu__link--desktop" data-controller="utm-tracking" href="<?php echo Url::home() . "cv-student" ?>"><span class="dropdown-menu__icon">
<div class="dropdown-menu__icon-tick"></div>
</span>
<span>CV</span>
</a></li>
<li class="dropdown-menu__item--desktop">
<a class="dropdown-menu__link--desktop" href="<?=Url::toRoute('site/logout')?>"rel="nofollow" data-method="delete" href="/sign_out"><span class="dropdown-menu__icon">
<div class="dropdown-menu__icon-sign-out"></div>
</span>
<span>Sign Out</span>
</a></li>

</ul>
</li>
    </ul>
    </div>
    </div>
    </nav>
    </div>
    <?=Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])?>
                    <?=Alert::widget()?>
                    <?=$content?>
<div id="footer">
<div class="content thembackground">
<div class="bottom" style="margin-top:20px">
<div class="footer-contact hidden-xs">
<div class="footer-link">
<h4>Want to post a job? Contact us at Ha Noi: (+84) 977 460 519 - Ha Noi: (+84) 981 448 474 - Email: love@hus.com<h4>
</div>
</div>
<div class="footer-links hidden-xs">
<div class="col-md-3 footer-links__col">
<a class="footer-link" data-controller="utm-tracking" href="/">Home</a>
<a class="footer-link" data-controller="utm-tracking" href="/it-jobs">All Jobs</a>
<a target="_blank" class="footer-link" rel="canonical" data-controller="utm-tracking" href="/about-us">About Us</a>
<a target="_blank" class="footer-link" rel="canonical" data-controller="utm-tracking" href="/contact-us">Contact Us</a>
<a target="_blank" class="footer-link" rel="canonical" href="https://itviec.com/blog/press/">Press</a>
</div>
<div class="col-md-3 footer-links__col">
<a target="_blank" class="footer-link" href="https://itviec.com/blog/chinh-sach-bao-mat/">Privacy Policy</a>
<a target="_blank" class="footer-link" href="https://itviec.com/blog/terms-and-conditions/">Term &amp; Conditions</a>
<a target="_blank" class="footer-link" href="https://itviec.com/blog/chinh-sach-giai-quyet-khieu-nai/">Complaint Handling Policy</a>
<a target="_blank" class="footer-link" href="https://itviec.com/blog/quy-che-hoat-dong-cua-itviec/">Operating Regulation</a>
<a target="_blank" class="footer-link" rel="canonical" href="https://itviec.com/blog/faq-cac-cau-hoi-thuong-gap/">FAQ</a>
</div>
<div class="col-md-6 footer-links__col">
<span class="footer-link">Founded by Team K62 MT&KHTT HUS</span>
<span class="footer-link">Tax code: 0312192258</span>
<span class="footer-link">Phone: 028.66811397</span>
<span class="footer-link">Address: 334 Nguyen Trai- Thanh Xuan- Ha Noi</span>
</div>


</div>
<div class="footer-links visible-xs">
<a class="footer-link" data-controller="utm-tracking" href="/">Home</a>
<a class="footer-link" data-controller="utm-tracking" href="/it-jobs">All Jobs</a>
<a target="_blank" class="footer-link" rel="canonical" data-controller="utm-tracking" href="/about-us">About Us</a>
<a target="_blank" class="footer-link" rel="canonical" data-controller="utm-tracking" href="/contact-us">Contact Us</a>
<a target="_blank" class="footer-link" href="https://itviec.com/blog/chinh-sach-bao-mat/">Privacy Policy</a>
<a target="_blank" class="footer-link" href="https://itviec.com/blog/terms-and-conditions/">Term &amp; Conditions</a>
<a target="_blank" class="footer-link" href="https://itviec.com/blog/quy-che-hoat-dong-cua-itviec/">Operating Regulation</a>
<a target="_blank" class="footer-link" href="https://itviec.com/blog/chinh-sach-giai-quyet-khieu-nai/">Complaint Handling Policy</a>
<span class="footer-link">Founded by Team K62 MT&KHTT HUS</span>
<span class="footer-link">Tax code: 0312192258</span>
<span class="footer-link">Phone: 028.66811397</span>
<span class="footer-link">Address: 334 Nguyen Trai- Thanh Xuan- Ha Noi</span>

</div>
</div>
</div>
</div>
    <?php $this->endBody()?>
</body>

</html>
<?php $this->endPage()?>
