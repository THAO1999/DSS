<?php
use common\models\Address;
use common\models\AddressJob;
use common\models\Enterprise;
use common\models\Field;
use common\models\Market;
use common\models\Payment;
use common\models\Work;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
    <h1 class="slogan">
        Uy tín - Trách nhiệm - Năng động
    </h1>
    <div class="search-form-wrapper clearfix">

<!-- ---------------- -->
    <?php $form = ActiveForm::begin([
    'id' => 'search_form',
    'options' => ['class' => 'search-form'],
    'action' => ['search-by-name-enterprise'],
]);?>

    <div class="search_section_wrapper no_header">


    <?=$form->field($model, 'username', [

])->textInput(['class' => "custom", 'placeholder' => "Tìm kiếm thông tin theo Công ty"])->label(false)?>

    </div>
    <div class="search_button_wrapper">
    <?=Html::submitButton('Tìm Kiếm', ['class' => 'search_button button-red left'])?>
    <!-- <input type="submit" value="Tìm Kiếm" class="search_button button-red left" data-disable-with="Tìm Kiếm"> -->
    </div>

    <?php ActiveForm::end();?>

    </div>


    <div class="visible-xs">


    </div>
    <div class="page-header__tag-list hidden-xs">
    <?php foreach ($capacity as $value): ?>
    <a class="head no-border ilabel popular-keyword" data-controller="utm-tracking" href="search-by-capacity?id=<?=$value->id?>"><?=$value->ability_name?></a>
    <?php endforeach;?>
    </div>

    </div>
    <div class="hidden-xs" id="scrolltop" style="display: block;">
    <div class="top-arrow"></div>
    </div>

    <div class="top-companies">

    <div class="title" id="btn_id">Tìm kiếm hơn nữa </div>
    <div class="row">
    <!-- Last updated: "2020-10-05 15:09:37 +0700"-->

    <?php foreach ($organization_requests as $value): ?>
    <div class="col-md-4 col-xs-12">
    <!-- Last updated: "2020-10-05 14:41:51 +0700"-->

    <a class="top-company"href="<?=Url::home() . "detail-request-enterprise?id=" . $value->id?>  " data-controller="utm-tracking" rel="nofollow" data-method="put" href="#">
      <div class="top-company__logo text-center">
      <img alt="" class=" ls-is-cached lazyloaded" data-src="" src="<?=Enterprise::getImageEnterprise($value->id)?>">
    </div>
    <div class="top-company__name text-center"><?=$value->subject?> </div>

    <footer class="top-company__footer text-center">
    <span class="top-company__footer-jobs">
    <span class="red link">
        <?=$value->amount?> Slots
    </span>
    <span>&nbsp;-&nbsp;</span>
    </span>
    <span class="top-company__footer-city"><?=AddressJob::address($value->id)?></span>
    </footer>
    </a></div>
    <?php endforeach;?>
    <?php
if ($pagination) {

    echo LinkPager::widget([
        'pagination' => $pagination,
    ]);

}

?>
    </div>
    </div>

    <div class="clearfix"></div>
    <div class="blog-list">
    <div class="blog-list__header">
    <h3 class="blog-list__title">Bài viết mới</h3>
    <div class="blog-list__header-right">
    <a target="_blank" class="more-link more-link--dotted" href="#">Xem tất cả
    <i class="fa fa-caret-right"></i>
    </a></div>
    </div>
    <div class="blog-list__content">
    <!-- Last updated: "2020-09-16 08:38:32 +0700"-->
    <div class="blog">
    <a class="blog__image-link" href="#"><img class=" ls-is-cached lazyloaded" data-src="uploads/react.png" width="100%" src="<?=yii\helpers\Url::base(true) . '/../../uploads/react.jpg'?>"
    ><div class="blog__description">
    <h4 class="blog__description-title">
    <a target="_blank" href="#">React Native là gì? 20+ Tài liệu học React Native từ cơ bản đến nâng cao</a>
    </h4>
    <div class="blog__description-content">
    React Native là một framework được tạo bởi Facebook, cho phép developer xây dựng các ứng dụng di động trên cả Android và iOS chỉ với một ngôn ngữ lập trình duy nhất: JavaScript.&nbsp; Học React Native vừa nhanh chóng, vừa mang lại cho bạn nhiều cơ hội chuyển đổi nghề nghiệp cũng như một […]
    </div>
    <div class="blog__read-more">
    <a target="_blank" class="more-link more-link--dotted" href="#">Read more
    <i class="fa fa-caret-right"></i>
    </a></div>
    </div>
    </div>
    <!-- Last updated: "2020-08-20 18:28:32 +0700"-->
    <div class="blog">
    <a class="blog__image-link" href="#"><img class=" ls-is-cached lazyloaded" data-src="img/user.png" width="100%" src="<?=yii\helpers\Url::base(true) . '/../../uploads/user.png'?>">
    <div class="blog__description">
    <h4 class="blog__description-title">
    <a target="_blank" href="#">Docker là gì? Vì sao DevOps Engineer nên biết?</a>
    </h4>
    <div class="blog__description-content">
    Docker là platform đứng thứ #1 trong danh sách bảng xếp hạng các platform mà Developer muốn sử dụng nhiều nhất khi phát triển ứng dụng, theo khảo sát của Stack Overflow 2019. Nó cũng đồng thời là cái tên sở hữu vị trí thứ #2 về mức độ yêu thích. Docker thực chất là […]
    </div>
    <div class="blog__read-more">
    <a target="_blank" class="more-link more-link--dotted" href="#">Read more
    <i class="fa fa-caret-right"></i>
    </a></div>
    </div>
    </div>

    </div>
    </div>

    <div id="footer">
    <div class="content show-extras">
    <div class="tags hidden-xs">
    <div class="col-sm-3">
    <h3 class="no-margin job-list-title">Việc làm IT theo kỹ năng</h3>
    <ul>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Java</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">PHP</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">.NET</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Tester</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Android</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">iOS</a></li>
    </ul>
    <a class="link-primary link-primary--underlined" data-controller="utm-tracking" href="#">Xem tất cả
    </a></div>
    <div class="col-sm-3">
    <h3 class="no-margin job-list-title">Việc làm IT theo cấp bậc</h3>
    <ul>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Lập trình viên Back End</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Lập trình viên PHP</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Lập trình viên NodeJS</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Lập trình viên iOS</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Lập trình viên Android</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Lập trình viên Ruby on rails</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Lập trình viên Java</a></li>
    </ul>
    <a class="link-primary link-primary--underlined" data-controller="utm-tracking" href="#">Xem tất cả
    </a></div>
    <div class="col-sm-3">
    <h3 class="no-margin job-list-title">Việc làm IT theo công ty</h3>
    <ul>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Techcombank</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">FPT Software</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">DatVietVAC</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">NFQ Asia (8bit Rockstars)</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Robert Bosch Engineering And Business Solutions</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Dirox</a></li>
    </ul>
    <a class="link-primary link-primary--underlined" data-controller="utm-tracking" href="#">Xem tất cả
    </a></div>
    <div class="col-sm-3">
    <h3 class="no-margin job-list-title">Việc làm IT theo thành phố</h3>
    <ul>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Ho Chi Minh</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Ha Noi</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Da Nang</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="#">Others</a></li>
    </ul>
    </div>
    <div class="clearfix"></div>

    </div>
    <div class="mobile-tags visible-xs">
    <div class="mobile-tags__skill less">
    <div class="mobile-tags__skill--title">
    <h3 class="no-margin job-list-title">Việc làm IT theo kỹ năng</h3>
    <span>+</span>
    </div>
    <ul class="mobile-tags__skill--list">
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/java">Java</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/php">PHP</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/.net">.NET</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/tester">Tester</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/android">Android</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/ios">iOS</a></li>
    <a class="link-primary link-primary--underlined" data-controller="utm-tracking" href="/tim-viec-lam-it">Xem tất cả
    </a></ul>
    </div>
    <div class="mobile-tags__title less">
    <div class="mobile-tags__title--title">
    <h3 class="no-margin job-list-title">Việc làm IT theo cấp bậc</h3>
    <span>+</span>
    </div>
    <ul class="mobile-tags__title--list">
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/lap-trinh-vien-back-end">Lập trình viên Back End</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/lap-trinh-vien-php">Lập trình viên PHP</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/lap-trinh-vien-nodejs">Lập trình viên NodeJS</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/lap-trinh-vien-ios">Lập trình viên iOS</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/lap-trinh-vien-android">Lập trình viên Android</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/lap-trinh-vien-ruby-on-rails">Lập trình viên Ruby on rails</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/lap-trinh-vien-java">Lập trình viên Java</a></li>
    <a class="link-primary link-primary--underlined" data-controller="utm-tracking" href="/viec-lam-it-theo-cap-bac">Xem tất cả
    </a></ul>
    </div>
    <div class="mobile-tags__company less">
    <div class="mobile-tags__company--title">
    <h3 class="no-margin job-list-title">Việc làm IT theo công ty</h3>
    <span>+</span>
    </div>
    <ul class="mobile-tags__company--list">
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/nha-tuyen-dung/techcombank">Techcombank</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/nha-tuyen-dung/fpt-software">FPT Software</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/nha-tuyen-dung/datvietvac">DatVietVAC</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/nha-tuyen-dung/nfq-asia-8bit-rockstars">NFQ Asia (8bit Rockstars)</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/nha-tuyen-dung/robert-bosch-engineering-and-business-solutions">Robert Bosch Engineering And Business Solutions</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/nha-tuyen-dung/dirox">Dirox</a></li>
    <a class="link-primary link-primary--underlined" data-controller="utm-tracking" href="/viec-lam-it-theo-ten-cong-ty">Xem tất cả
    </a></ul>
    </div>
    <div class="mobile-tags__city less">
    <div class="mobile-tags__city--title">
    <h3 class="no-margin job-list-title">Việc làm IT theo thành phố</h3>
    <span>+</span>
    </div>
    <ul class="mobile-tags__city--list">
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/ho-chi-minh-hcm">Ho Chi Minh</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/ha-noi">Ha Noi</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/da-nang">Da Nang</a></li>
    <li class="tag"><a class="mkt-track skill-tag__link" data-controller="utm-tracking" href="/viec-lam-it/others">Others</a></li>
    </ul>
    </div>

    <div class="mobile-tags__footer less">
    <div class="mobile-tags__footer--title">
    <h3 class="no-margin job-list-title">Về ITviec</h3>
    <span>+</span>
    </div>
    <ul class="mobile-tags__footer--list">
    <li class="tag"><a target="_blank" data-controller="utm-tracking" href="/ve-itviec">Về ITviec.com</a></li>
    <li class="tag"><a target="_blank" data-controller="utm-tracking" href="/lien-he">Liên Hệ</a></li>
    <li class="tag"><a target="_blank" href="https://itviec.com/blog/chinh-sach-bao-mat/">Quy định bảo mật</a></li>
    <li class="tag"><a target="_blank" href="https://itviec.com/blog/terms-and-conditions/">Thoả thuận sử dụng</a></li>
    <li class="tag"><a target="_blank" href="https://itviec.com/blog/quy-che-hoat-dong-cua-itviec/">Quy chế hoạt động</a></li>
    <li class="tag"><a target="_blank" href="https://itviec.com/blog/chinh-sach-giai-quyet-khieu-nai/">Chính sách giải quyết khiếu nại</a></li>
    <li class="tag"><a target="_blank" href="https://itviec.com/blog/press/">Thông cáo báo chí</a></li>
    <li class="tag"><a target="_blank" href="https://itviec.com/blog/faq-cac-cau-hoi-thuong-gap/">Câu hỏi thường gặp</a></li>
    </ul>
    </div>

    </div>
    </div>


    <div class="contain">
    <div id="add" title="Chúc Bạn May Mắn">


<?php $form = ActiveForm::begin([
    'action' => ['search-advance']])?>

<?=$form->field($address, 'name')
->dropDownList(
    ArrayHelper::map(Address::find()->asArray()->all(), 'id', 'name')
)
?>

<?=$form->field($field, 'name')
->dropDownList(
    ArrayHelper::map(Field::find()->asArray()->all(), 'id', 'name')
)
?>
<?=$form->field($work, 'name')
->dropDownList(
    ArrayHelper::map(Work::find()->asArray()->all(), 'id', 'name')
)
?>

<?=$form->field($payment, 'name')
->dropDownList(
    ArrayHelper::map(Payment::find()->asArray()->all(), 'id', 'name')
)
?>
<?=$form->field($market, 'name')
->dropDownList(
    ArrayHelper::map(Market::find()->asArray()->all(), 'id', 'name')
)
?>

<div class="form-group">
    <?=Html::submitButton('Tìm kiếm', ['class' => 'btn btn-success '])?>
</div  >

<?php ActiveForm::end();?>

</div>
</div>

<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>


 // xuli add
 jQuery( document ).ready(function( $ ) {

// xu li button add
$("#add").dialog({ autoOpen: false }); // ẩn add
$("#btn_id").click(function() {
    $("#add").dialog("open"); // mở

});
$("#btn_cancel").click(function() {
    $("#add").dialog("close"); // ẩn
});
});


setTimeout(popup, 3000); // Setting time 3s to popup login form
function popup() {
    $("#add").css("display", "block");
}
</script>