<?php use common\models\CapacityDictionary;
?>
</br>
</br>
</br>
</br>
</br>
<div class="container">
<div id="cv-layout-container">
<div id="cv-layout" >

<div id="cv-title" class="non-printable"></div>
<div id="cvo-document-root">
    <div id="cvo-document" class="cvo-document">
        <div class="cvo-page">
            <div class="cvo-subpage">
                <div id="cvo-body">
    <!--Header-->
    <div id="cvo-main">
        <div id="col-left">
            <!-- #group-top-left -->
            <div id="group-top-left" conf="" cvo-block-group="true"><div id="cvo-profile" class="cvo-block">
                <div id="profile-title-wrapper">
                <div id="cvo-profile-avatar-wraper">
            <img id="cvo-profile-avatar" src="https://images-na.ssl-images-amazon.com/images/I/61Jvm0rckSL.jpg" >
        </div>
                <div>
            <span id="cvo-profile-fullname" ><?=$student->username?></span><br>
                        <span id="cvo-profile-title">Thực tập DBA</span>
                    </div>
    </div>
    <div id="profile-contact-wraper">
                <div id="cvo-profile-dob-wraper">
            <i class="fas fa-calendar"></i><span id="cvo-profile-dob"><?=$student->date_of_birth?></span>
        </div>
                        <div id="cvo-profile-gender-wraper"><i class="fas fa-user"></i><span id="cvo-profile-gender">Nam</span></div>
                <div id="cvo-profile-phone-wraper"><i class="fas fa-phone"></i><span id="cvo-profile-phone"><?=$student->phone?></span>
                </div>
        <div id="cvo-profile-email-wraper"><i class="fas fa-envelope-square"></i><span id="cvo-profile-email"><?=$student->email?></span></div>
                <div id="cvo-profile-address-wraper"><i class="fas fa-map-marker"></i><span id="cvo-profile-address"><?=$student->address?></span></div>
                        <div id="cvo-profile-website-wraper"><i class="fas fa-info"></i><span id="cvo-profile-website" >http://fb.com/blackpink?jennie</span></div>
            </div>
</div>
                <!-- FIXED GROUP -->
                            </div>
            <!-- END #group-top-left -->
            <div id="group-bottom-left" conf="" cvo-block-group="true"><div id="cvo-objective" class="cvo-block">
    <div class="cvo-block-title no-horizontal-line"><span id="cvo-objective-blocktitle">Mục tiêu</span></div>
    <div id="cvo-objective-objective"><?=$target->long_time?></div>
</div><div id="cvo-skillrate" class="cvo-block">
    <div class="cvo-block-title"><span id="cvo-skillrate-blocktitle">Kỹ năng</span></div>


    <?php foreach ($list_StudentSkill as $skill): ?>
                <p  id="demo"><?=CapacityDictionary::getCapacity($skill)?></p>
                <div class="progress">
  <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style=" width:<?=$skill->ability_rate . '%'?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="90"></div>
</div>

    <?php endforeach;?>


                    </div>
</div><div id="cvo-interest" class="cvo-block" >
    <div class="cvo-block-title"><span id="cvo-interest-blocktitle">Sở thích</span></div>

                                <p class="row"><span class="cvo-interest-details default_min_width" ><?=$hobby->hobby_name?></span></p>


</div>


                        </div>
        </div>
        <!-- END #col-left -->
        <!-- #col-right -->
        <div id="col-right">
            <div id="group-col-right"><div id="cvo-education" class="cvo-block">
    <div class="cvo-block-title">
        <span><i class="fas fa-graduation-cap"></i></span>
        <span id="cvo-education-blocktitle">Học vấn</span>
    </div>
    <div id="education-table">
                        <div class="row ">
            <div class="row-title">
                <div class="cvo-education-school-wraper">
                    <span class="cvo-education-school default_min_width"><?=$colleges->name?></span>
                    <div class="cvo-education-title default_min_width"><?=$colleges->specialized?></div>
                </div>
                                <div class="cvo-education-time">
                    <span class="cvo-education-start default_min_width">07/2017 - </span><!--

                    --><span class="cvo-education-end default_min_width">10/2021</span><!--
                    -->         </div>

                                <div>

                </div>
                            </div>
                        <div class="row-detail">
                <div class="cvo-education-details default_min_width"></div>
            </div>

        </div>
                    </div>
</div><div id="cvo-experience" class="cvo-block">
    <div class="cvo-block-title"><span><i class="fas fa-briefcase"></i></span><span id="cvo-experience-blocktitle">Kinh nghiệm làm việc</span></div>
    <div id="experience-table">
                        <div class="row ">
            <div class="row-title">
                <div class="cvo-experience-company-wraper">
                    <span class="cvo-experience-company default_min_width">Công ty  <?=$experience->enterprise_name?></span>
                </div>
                                <div class="cvo-experience-time">
                    <!--
                    --><span class="cvo-experience-start default_min_width">06/2018 - </span><!--

                    --><span class="cvo-experience-end default_min_width">Hiện tại</span><!--
                    --><!--
                --></div><!--
                -->
                                <div>
                    <span class="cvo-experience-position default_min_width"></span>
                </div>
                            </div>
            <div class="row-details">
                <div class="cvo-experience-details default_min_width"><?=$experience->namejob?></div>
            </div>

        </div>
                <div class="row ">
            <div class="row-title">
                <div class="cvo-experience-company-wraper">
                    <span class="cvo-experience-company default_min_width">Công ty FPT</span>
                </div>
                                <div class="cvo-experience-time">
                    <!--
                    --><span class="cvo-experience-start default_min_width">10/2018 - </span><!--

                    --><span class="cvo-experience-end default_min_width">02/2019</span><!--
                    --><!--
                --></div><!--
                -->
                                <div>
                    <span class="cvo-experience-position default_min_width">Thực tập sinh DBA</span>
                </div>
                            </div>
            <div class="row-details">
                <div class="cvo-experience-details default_min_width">-Làm việc với khách hàng để nắm bắt các yêu cầu từ đó xây dựng hướng đi cho dự án.<br>- Phân tích và thiết kế hệ thống cho dự án đã đề ra...</div>
            </div>

        </div>
                    </div>

</div><div id="cvo-activity" class="cvo-block">
    <div class="cvo-block-title"><span><i class="fas fa-user-friends"></i></span><span id="cvo-activity-blocktitle">Hoạt động</span></div>
    <div id="activity-table">
                        <div class="row ">
            <div class="row-title">
                <div class="cvo-activity-organization-wraper">
                    <span class="cvo-activity-organization default_min_width"></span>
                </div>
                                <div class="cvo-activity-time">
                    <!--
                    --><span class="cvo-activity-start default_min_width">10/2017 - </span><!--

                    --><span class="cvo-activity-end default_min_width">11/2017</span><!--
                    --><!--
                --></div>

                                <div>
                    <span class="cvo-activity-position default_min_width"><?=$operator->name?></span>
                </div>
                            </div>
            <div class="row-details">
                <div class="cvo-activity-details default_min_width"><?=$operator->detail?></div>
            </div>

        </div>
                    </div>



</div><div class="cvo-block" id="cvo-additional-info">
    <div class="cvo-block-title"><span><i class="fas fa-pen-square"></i></span><span id="cvo-additional-info-blocktitle" >Thông tin thêm</span></div>
    <div id="cvo-additional-information-details" >Thông tin cá nhân

    <?=$info->personal_information?>
    </div>

    <div id="cvo-additional-information-details" >Chuyên môn
    <?=$info->specialize?>

    </div>



    </div>
    </div>
        </div>

    </div>

</div>

            </div>
        </div>
    </div>

<div >
   <br>
</div>

</div>

</div>
</div>
</br>
</br>