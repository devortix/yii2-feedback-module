<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\feedback\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'name')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'user_name')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'user_email')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'phone')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'push_emails')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'content')->textarea(['rows' => 6])?>

    <?=$form->field($model, 'info')->textarea(['rows' => 6])?>



    <?=$form->field($model, 'status')->textInput()?>

    <div class="form-group">
        <?=Html::submitButton(Yii::t('admin-feedback', 'Save'), ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>