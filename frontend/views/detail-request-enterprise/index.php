<?php
use common\models\CapacityDictionary;
use common\models\OrganizationRequestAbilities;
use frontend\models\Enterprises;
use frontend\models\Students;
use yii\helpers\Url;
?>
</div>

<!-- start body -->
<div class="hidden-xs" id="scrolltop" style="display: none;">
<div class="top-arrow"></div>
</div>

<div class="company-content">
<div class="company-page">
<!-- Headline Photo -->
<div class="cover-images-desktop cover-images-cropped aspect-ratio-box">
<div class="aspect-ratio-box-inside">
<img width="100%" alt="Home Credit Vietnam  tuyển dụng việc làm IT"src="<?=Enterprises::getCoverImage($enterprise->id)?>">
</div>
</div>
<!-- Header Information -->
<div class="headers hidden-xs">
<div class="logo-container">
<div class="has-overtime logo">
<img alt="Home Credit Vietnam  Vietnam Big Logo" class=" ls-is-cached lazyloaded" data-src="https://cdn.itviec.com/employers/home-credit-vietnam/logo/w170/dFAsZ8oiQpLPyUr8Yi5jUWdj/home-credit-vietnam-ppf-logo.png" src="<?=Enterprises::getImageEnterprise($enterprise->id)?>">
</div>
</div>
<div class="name-and-info">
<h1 class="title">
<?=$organization_requests->subject?>
</h1>

<!-- Last updated: "2020-10-14 21:37:42 +0700"-->

<div class="working-date">
<i class="far fa-calendar-alt"></i>
<span>
Hạn Đăng ki: <?=$organization_requests->date_submitted?>
</span>
</div>

<div class="working-date">
<i class="fas fa-user-friends"></i>
<span>Cần Tuyển: <?=$organization_requests->amount?> Sinh Viên
</span>
</div>
<div class="overtime">
<i class="fas fa-clock"></i>
<span>
 Sinh Viên Đã Đăng ki:<?=$count?>
</span>
</div>

</div>

<div class="headers__actions text-right">

<?php if (!Students::checkStatus(Yii::$app->user->identity->id)): ?>
<button class="btn btn-success" onclick="studentRegister(<?=$organization_requests->id?>,<?=Yii::$app->user->identity->id?>)"> Đăng ki</button>
<?php endif;?>
</div>

</div>

<div class="row company-container">
<div class="col-md-8 col-left">

<ul class="nav nav-tabs navigation">
        <li class="active">
            <a href="#detail_request" data-toggle="tab"> <h3>Chi tiết phiếu yêu cầu</h3></a>
        </li>
        <li class="nav-item">
            <a href="#detail_profile"  data-toggle="tab"><h3>Giới Thiệu về công ty</h3></a>
        </li>
        <li class="nav-item">
            <a href="#information"  data-toggle="tab"><h3>Thông tin dự án</h3></a>
        </li>

    </ul>

<div class="tab-content">

    <div id="detail_request" class="panel panel-default tab-pane fade in active">
<div class="panel-heading " >
<h2 class="panel-title headline">
<?=$organization_requests->subject?>
</h2>
</div>
<div class="panel-body">
<div class="paragraph">


<p><?=$organization_requests->short_description?></p>
</div>
<h3 class="panel-title">
Kỹ Năng Cần Có:
</h3>
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

    <div id="information" class="panel panel-default tab-pane fade in active">
<div class="panel-heading " >
<h2 class="panel-title headline ">
Thông tin dự án
</h2>
</div>
<div class="panel-body ">
<div class="paragraph">
<div  style="margin-bottom:10px" class="can">
<h3 class="opac">ID dự án </h3>
<h3  style="margin-left:150px"> <?=$organization_requests->id?>
</div>
<div  style="margin-bottom:10px" class="can">
<h3 class="opac"> Ngày đăng</h3>
<h3 style="margin-left:130px"> <?=$organization_requests->create_at?>
</div>
<div  style="margin-bottom:10px" class="can">
<h3 class="opac"> Hình thức trả lương:</h3>
<h3  style="margin-left:50px"> <?=$payment->name?></h3>
</div>
<div  style="margin-bottom:10px" class="can">
<h3 class="opac"> Địa điểm: </h3>
<h3  style="margin-left:140px"> <?=$address->name?></h3>
</div>
<div  style="margin-bottom:10px" class="can">
<h3 class="opac"> Hình thức làm việc:</h3>
<h3  style="margin-left:60px"> <?=$work->name?></h3>
</div>
<div  style="margin-bottom:10px" class="can">
<h3 class="opac"> Lĩnh vực:</h3>
<h3  style="margin-left:144px"> <?=$field->name?></h3>
</div>
<div  style="margin-bottom:10px" class="can">
<h3 class="opac">Thị trường làm việc:</h3>
<h3  style="margin-left:55px"> <?=$market->name?></h3>
</div>
</div>
<br>

<div class="paragraph">
<p></p>

</div>
</div>
    </div>

    <div id="detail_profile" class=" panel panel-default tab-pane  ">
<div class="panel-heading " >
<h2 class="panel-title headline">
<?=$enterprise->name?>
</h2>
</div>
<div class="panel-body">
<div class="paragraph">
<h3 style="color:red;margin-bottom:10px">
Địa Chỉ: <?=$enterprise->address?>
</h3>
<p><?=$enterprise->description?></p>
</div>

<br>

<div class="paragraph">
<p></p>

</div>
</div>
    </div>


</div>
<!-- Jobs -->



<!-- Last Updated at: 2020-10-14 21:37:43 +0700 -->
<div class="panel panel-default ">
<div class="panel-heading">
<h3 class="panel-title">Tại Sao Bạn Sẽ Yêu Thích Làm Việc Tại Đây</h3>
</div>
<div class="panel-body">
<ul class="reasons numbered list">
<li class="item">
<span class="number">1</span>
<span class="content paragraph">Attractive salary, with 13th month and KPI Bonus</span>
</li>
<li class="item">
<span class="number">2</span>
<span class="content paragraph">Chances to work with Expats and train Oversea</span>
</li>
<li class="item">
<span class="number">3</span>
<span class="content paragraph">Latest financial technology applied</span>
</li>

</ul>
<!-- Slider Photos -->

<div class="paragraph">
<p></p><ul><li>Latest financial technology applied</li><li>Various bonuses and awards for employees</li><li>Professional and transparent working environment.</li><li>Health, social and accidental insurance</li><li>15 Annual Leaves</li><li>Team-building activities</li><li>Open sharing culture</li></ul><p></p>
</div>
</div>
</div>
<!-- Our People -->
<!-- Location -->


</div>
<div class="col-md-4 col-right">

<!-- Have you worked? -->
<div class="panel panel-default company-ratings">
<div class="panel-heading">
<h2 class="panel-title">Jobs</h2>
</div>
<div class="panel-body">
<!-- Last updated: "2020-10-22 14:42:31 +0700"-->
<div class="job-list">
<!-- Last updated: "2020-10-21 10:28:38 +0700"-->
<?php foreach ($listOrganization_requests as $rq): ?>

<div class="job">
<h2 class="name">
<a data-controller="utm-tracking"href="<?=Url::home() . "detail-request-enterprise?id=" . $rq->id?>  " ><?=$rq->subject?></a>
</h2>
<div class="salary">
<span class="salary-icon-stack">
<i class="ion-ios-circle-outline"></i>
<i class="ion-social-usd"></i>
</span>

<span class="salary-text">
You'll love it
</span>
</div>
<div class="address" style="margin-bottom:5px">
Deadline:<?=$rq->date_submitted?>

</div>
<div class="tag-list">
<?php $lisSkill = OrganizationRequestAbilities::getSkill($rq);?>

<?php foreach ($lisSkill as $skill): ?>
</a><a class=" ilabel mkt-track" data-controller="utm-tracking" href="#"><span>
<?=CapacityDictionary::getCapacity($skill)?>
</span>
</a>
<?php endforeach;?>
</div>
</div>
<hr>
<?php endforeach;?>
<a class="button ibutton full-width ibutton-red big add-review-when-not-sign-in" rel="nofollow" href="<?=Url::home() . "comment/index?id=" . $rq->id?>  ">Viết review</a>
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

