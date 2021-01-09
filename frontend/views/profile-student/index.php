<?php
use common\models\CapacityDictionary;
use frontend\models\Students;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
</div>
<hr>

<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1 class="profile">Profile-Student</h1>
        </div>

    </div>
    <div class="row bt-3">
        <div class="col-sm-3">
            <!--left col-->
            <?php $form = ActiveForm::begin([
    'id' => 'registrationForm',
    'options' => ['class' => 'form'],
    'options' => ['enctype' => 'multipart/form-data'],
])?>
            <div class="text-center">
                <img  src="<?=Students::getImageStudent($model->id)?>" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Upload a different photo...</h6>

    <?=$form->field($model, 'imageFile')->fileInput()?>
            </div>
            </hr><br>
            <?php foreach ($list_StudentSkill as $skill): ?>
                <p id="demo"><?=CapacityDictionary::getCapacity($skill)?></p>
                <div class="progress">
  <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style=" width:<?=$skill->ability_rate . '%'?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>

    <?php endforeach;?>


<?=Html::a('Update', ['student-skill-profile/index'], ['class' => 'profile-link'])?>
        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>

            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>

                        <div class="form-group">

                            <div class="col-xs-6">
                            <?=$form->field($model, 'username')->textInput(['maxlength' => true])?>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                            <?=$form->field($model, 'email')->textInput(['maxlength' => true])?>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                            <?=$form->field($model, 'class_name')->textInput(['maxlength' => true])?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                            <?=$form->field($model, 'address')->textInput(['maxlength' => true])?>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                            <?=$form->field($model, 'phone')->textInput(['maxlength' => true])?>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>

                                <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
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