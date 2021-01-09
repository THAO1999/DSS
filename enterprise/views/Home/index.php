<?php
use common\models\Enterprise;
use yii\helpers\Url;
?>



    <div class="top-companies">
    <div class="title">Nhà Tuyển Dụng</div>
    <div class="row">
    <!-- Last updated: "2020-10-05 15:09:37 +0700"-->

    <?php foreach ($listOrganization_requests as $value): ?>
    <div class="col-md-4 col-xs-12">
    <!-- Last updated: "2020-10-05 14:41:51 +0700"-->

    <a class="top-company"href="<?=Url::home() . "organization-request/view?id=" . $value->id?>  " data-controller="utm-tracking" rel="nofollow" data-method="put" href="#">
      <div class="top-company__logo text-center">
      <img alt="Toshiba Software Development (Viet Nam) Co, Ltd Vietnam Small Logo" class=" ls-is-cached lazyloaded" data-src="" src="<?=Enterprise::getImageEnterprise($value->id)?>">
    </div>
    <div class="top-company__name text-center"><?=$value->subject?> </div>

    <footer class="top-company__footer text-center">
    <span class="top-company__footer-jobs">
    <span class="red link">
        <?=$value->amount?> Slots
    </span>
    <span>&nbsp;-&nbsp;</span>
    </span>
    <span class="top-company__footer-city">Ha Noi</span>
    </footer>
    </a></div>
    <?php endforeach;?>

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
    <a class="blog__image-link" href="#"><img class=" ls-is-cached lazyloaded" data-src="img/react-native.png" width="100%" src="<?=yii\helpers\Url::base(true) . '/../../uploads/react-native.png'?>"
    </a><div class="blog__description">
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
    <a class="blog__image-link" href="#"><img class=" ls-is-cached lazyloaded" data-src="img/user.png" width="100%" src="<?=yii\helpers\Url::base(true) . '/../../uploads/user.png'?>"
    </a><div class="blog__description">
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
