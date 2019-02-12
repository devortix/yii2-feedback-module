<?php

use devortix\feedback\models\Feedback;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\feedback\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin();?>
    <div class="row">
        <div class="col-md-6">
            <?=$form->field($model, 'name')->textInput(['maxlength' => true])?>
        </div>
        <div class="col-md-6">
            <?=$form->field($model, 'user_name')->textInput(['maxlength' => true])?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?=$form->field($model, 'user_email')->textInput(['maxlength' => true])?>
        </div>
        <div class="col-md-6">
            <?=$form->field($model, 'phone')->textInput(['maxlength' => true])?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?=$form->field($model, 'push_emails')->textInput(['maxlength' => true])?>
        </div>
        <div class="col-md-6">
            <?=$form->field($model, 'status')->dropdownList(Feedback::getStatuses())?>
        </div>
    </div>

    <?=$form->field($model, 'content')->textarea(['rows' => 4])?>

    <?=$form->field($model, 'info')->textarea(['rows' => 4])?>

    <div class="form-group">
        <?=Html::submitButton(Yii::t('admin-feedback', 'Save'), ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>