<?php
use backend\models\Enterprises;
use backend\models\OrganizationRequest;
use backend\models\Student;
use common\models\CapacityDictionary;
use yii\helpers\Url;
//$this->registerCssFile("@web/css/css/styleDetail.css");

?>
</div>

<!-- start body -->
<div class="hidden-xs" id="scrolltop" style="display: none;">
<div class="top-arrow"></div>
</div>

<div class="company-content">
<div class="company-page">
<!-- Headline Photo -->

<!-- Header Information -->
<div class="headers hidden-xs">
<div class="logo-container">
<div class="has-overtime logo">
<img alt="Home Credit Vietnam  Vietnam Big Logo" class=" ls-is-cached lazyloaded" data-src="https://cdn.itviec.com/employers/home-credit-vietnam/logo/w170/dFAsZ8oiQpLPyUr8Yi5jUWdj/home-credit-vietnam-ppf-logo.png" src="<?=Enterprises::getImageEnterpriseView($enterprise->id)?>">
</div>
</div>
<div class="name-and-info">
<h1 class="title">
<?=$organization_requests->subject?>
</h1>
<span>
<i class="fa fa-map-marker"></i>
Trạng Thái: <?=OrganizationRequest::checkStatus($organization_requests->status)?>
</span>
<!-- Last updated: "2020-10-14 21:37:42 +0700"-->

<div class="working-date">
<i class="fa fa-calendar"></i>
<span>
Hạn Đăng ki: <?=$organization_requests->date_submitted?>
</span>
</div>

<div class="working-date">
<i class="fa fa-calendar"></i>
<span>
Cần Tuyển: <?=$organization_requests->amount?> Sinh Viên
</span>
</div>
<div class="overtime">
<i class="fa fa-clock-o"></i>
<?php if (OrganizationRequest::checkConfirm($organization_requests->status) == 10): ?>
<span>
 Sinh Viên Đã Đăng ki:<?=$count?>
</span>
<?php endif;?>
</div>

</div>

<div class="headers__actions text-right">
<?php if (OrganizationRequest::checkS($organization_requests->status) == 9): ?>
<a href="<?=Url::home() . 'organization-request/confirm?id=' . $organization_requests->id?>  "><button class="btn btn-success  mb-4"> Chấp Nhận</button></a>
<a href="<?=Url::home() . 'organization-request/create?id=' . $organization_requests->id?>  "><button class="btn btn-danger "> Hủy</button></a>
<?php elseif (OrganizationRequest::checkConfirm($organization_requests->status) == 10): ?>
    <a href="<?=Url::home() . 'student-registration/index?id=' . $organization_requests->id?>"> <button class="btn btn-success mb-4 "> Danh Sách Đăng ki </button></a>
<a href="<?=Url::home() . 'assigned-table/index?id=' . $organization_requests->id?>  "><button class="btn btn-danger ">  Danh Sách Phân Công</button></a>


<?php endif;?>

</div>
</div>

<div class="row company-container">
<div class="col-md-8 col-left">
<!-- Navigation -->
<ul class="navigation">
<li class="active navigation__item">
<a data-controller="utm-tracking" href="#">Chi Tiết Phiếu</a>
<div class="corner-bottom-right-overlay"></div>
<div class="corner-bottom-right-curve"></div>
</li>
<li class="text social-icon navigation__item navigation__item--right hidden-sm hidden-xs">
<a target="_blank" title="" rel="nofollow" data-controller="utils--tooltip" href="https://www.facebook.com/homecreditvn" data-original-title="Đến Facebook"><i class="fa fa-facebook"></i>
</a></li>
<li class="text social-icon navigation__item navigation__item--right hidden-sm hidden-xs">
<a target="_blank" title="" rel="nofollow" data-controller="utils--tooltip" href="https://www.facebook.com/homecreditvn" data-original-title="Đến Facebook"><i class="fa fa-instagram"></i>
</a></li>

</ul>

<!-- Description - Tech stack -->
<!-- Last updated: "2020-10-14 21:37:42 +0700"-->

<div class="panel panel-default">
<div class="panel-body">
<div class="paragraph">
<h3 style="color:red;margin-bottom:10px">
</h3>
<p><?=$organization_requests->short_description?></p>
</div>
<h3 class="panel-title"> Skills we need</h3>
<br>
<ul class="employer-skills">
<?php foreach ($lisSkill as $skill): ?>

<li class="employer-skills__item"><a  data-controller="utm-tracking" href="#"><?=CapacityDictionary::getCapacity($skill)?></a></li>
<?php endforeach;?>
</ul>
<div class="paragraph">
<p></p>
</div>
</div>
</div>

<?php if (OrganizationRequest::checkCancel($organization_requests->status) === 0): ?>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Lí do  bị hủy</h3>
</div>
<div class="panel-body">
<span class="content paragraph">==> <?=$organization_requests->cancel?></span>

</div>
</div>
<?php endif;?>
<!-- Our People -->
<!-- Location -->


</div>
<div class="col-md-4 col-right">

<!-- Have you worked? -->
<div class="panel panel-default company-ratings">
<?php if (OrganizationRequest::checkConfirm($organization_requests->status) == 10): ?>

<div class="panel-body disable-user-select">

<!-- Last updated: "2020-10-23 19:49:55 +0700"-->
<?php foreach ($listComment as $comment): ?>
<div class="review featured">
<h3><?=$comment->content?></h3>
<!-- tạo avatar -->
<div class="sign-in-user-avatar"><img class="user-avatar" src="<?=Student::getImageStudent($comment->student->id)?>"></div>
<!-- kết thúc avatar -->
<a class="title a123" href="#"><?=$comment->student->username?><br></a>
<br>
<div class="paragraph">
<?=$comment->content?>
</div>
</div>
<hr>
<?php endforeach;?>
</div>
<?php endif;?>
</div>
</div>

</div>

</div>

</div>
</div>

</div>

</div>
</div>


</div>
</div>

</body>

