
<?php
use frontend\models\Enterprises;
use frontend\models\Students;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<body class="reviews_new" data-controller="" data-env="production" data-jr-landing-new-url="https://itviec.com/jobrobot/new?locale=vi">
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->



</div>
<div class="hidden-xs" id="scrolltop" style="display: none;">
<div class="top-arrow"></div>
</div>

<div class="main-content container-fluid review-form new-review">
<div class="row row-add-review">

<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title review-title hidden-xs hidden-sm">
<div class="title">
<div class="text">Đánh giá</div>
<div class="company-name">  <?=$enterprises->username?>   </div>
</div>
<div class="logo">
<img src="<?=Enterprises::getImageEnterprise($enterprises->id)?>">
</div>
</h2>
<h2 class="panel-title text-center visible-xs visible-sm">
Đánh giá Home Credit Vietnam
</h2>
</div>
<div class="panel-body">
<p class="tip">
Bạn chỉ mất 1 phút để hoàn thành bảng đánh giá này.
<br>
Ý kiến của bạn sẽ giúp ích rất nhiều cho cộng đồng Developer đang tìm việc.
</p>

<div class="input hidden review_user_id"><input value="347739" class="hidden" type="hidden" name="review[user_id]" id="review_user_id"></div>
<div class="form-group">

<div class="br-wrapper br-theme-css-stars">
<span id="jrate1-text" class="jrate-label"></span>
</div>
<div class="validate"></div>
</div>

<div class="form-group">
<?php $form = ActiveForm::begin(['action' => ['create', 'request_id' => $id]]);?>
<?=$form->field($model, 'content')->textarea(['rows' => '6'])?>
<?=Html::submitButton('Submit', ['class' => 'btn btn-primary'])?>
<?php ActiveForm::end();?>


</div>

</div>
</div>
</div>
<!-- vế phải -->
<div class="col-md-4 hidden-xs hidden-sm">
<div class="panel panel-default review-policies">

<div class="panel panel-default company-ratings">
<div class="panel-heading">
<h3 class="panel-title"> Review </h3>
</div>
<div class="panel-body disable-user-select">
<!-- Last updated: "2020-10-23 19:49:55 +0700"-->

<?php foreach ($listComment as $comment): ?>
<div class="review featured">
<!-- tạo avatar -->
<div class="sign-in-user-avatar"><img class="user-avatar" src="<?=Students::getImageStudent($comment->student->id)?>"></div>
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

<!-- hết vế phải -->
</div>
</div>
<!-- <div data-controller="tracking" data-tracking-city="" data-tracking-content="" data-tracking-ip-address="113.160.10.38" data-tracking-session-id="9a99b54b9434e9ab5d4b0e835217859f" data-tracking-skill-tags="" data-tracking-source-ids="[1668]" data-tracking-sources="[&quot;EmployerReviewForm&quot;]" data-tracking-user-agent="Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36" data-tracking-user-id="347739" data-tracking-utm-medium="new_review" data-tracking-utm-source="emp_page"></div> -->

<div class="modal fade" id="form-errors-modal" role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body">
<button class="close modal-body__close" data-dismiss="modal" type="button">
<span>×</span>
</button>
<div class="sa-icon sa-error animateErrorIcon">
<span class="sa-x-mark animateXMark"></span>
<span class="sa-line sa-left"></span>
<span class="sa-line sa-right"></span>
</div>
<div class="modal-body__message">
<p>Ôi! Có gì đó chưa đúng.</p>
</div>
<div class="text-center go-back-message">
<p>
Quay lại và kiểm tra những mục được đánh dấu <i class="fa red fa-times"></i>.
</p>
</div>
<div class="text-center">
<button class="btn btn-default" data-dismiss="modal" type="button">Quay lại</button>
</div>
</div>
</div>
</div>
</div>


<div class="clearfix"></div>
<div id="logo">
<div class="logo-image"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="signed-in-already"></div>
<div class="modal fade" id="upload-cv-modal" role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body text-center">
<button class="modal-body__close" data-dismiss="modal" type="button">
<span>×</span>
</button>
<i class="fa fa-file-text-o fa-4x"></i>
<br>
<br>
<div class="modal-body__message">
Your CV is missing
</div>
<div class="text-center" style="font-size: 22px;">
<p>
Upload a CV now
<br>
and make it easier to apply on mobile.
</p>
</div>
<br>
<div class="text-center">
<a class="ibutton ibutton-red" href="/profile">Upload my CV now</a>
</div>
</div>
</div>
</div>
</div>



</div>
</div>


</body></html>
