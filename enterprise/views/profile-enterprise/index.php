<?php
use enterprise\models\Enterprises;
use marqu3s\summernote\Summernote;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<hr>
<hr>

<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1>Hồ sơ Doanh nghiệp</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <?php $form = ActiveForm::begin([
    'id' => 'registrationForm',
    'options' => ['class' => 'form'],
    'options' => ['enctype' => 'multipart/form-data'],
])?>
            <div class="text-center">
                <img  src="<?=Enterprises::getImageEnterprises($model->id)?>" class="avatar img-circle img-thumbnail" alt="avatar">
                <h5></h5>

    <?=$form->field($model, 'imageFile')->fileInput()?>
            </div>
            </hr><br>




<!--             <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
            </ul>
 -->


        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Trang chủ</a></li>

            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>

                        <div class="form-group">

                            <div class="col-xs-6">
                            <?=$form->field($model, 'name')->textInput(['maxlength' => true])?>
                            </div>
                        </div>
                        <div class="form-group">

<div class="col-xs-6">
<?=$form->field($model, 'president')->textInput(['maxlength' => true])?>
</div>
</div>
                        <div class="form-group">

                            <div class="col-xs-6">
                            <?=$form->field($model, 'email')->textInput(['maxlength' => true])?>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                            <?=$form->field($model, 'employee_count')->textInput(['maxlength' => true])?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                            <?=$form->field($model, 'address')->textInput(['maxlength' => true])?>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-12">

    <?=$form->field($model, 'description')->widget(Summernote::class, [
    'options' => ['placeholder' => 'Mô tả công ty ở đây...'],
]);?>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>

                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>Reset</button>
                            </div>
                        </div>
                        <?php ActiveForm::end();?>

                    <hr>

                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->