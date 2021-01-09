<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\StudentSkillProfile */

$this->title = 'Update Student Skill Profile: ' . $model->id;

?>
</div>
<div class="student-skill-profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'capacity'=>$capacity,
    ]) ?>

</div>
