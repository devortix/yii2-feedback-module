<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\feedback\models\Feedback */

$this->title = Yii::t('admin-feedback', 'Update Feedback: {name}', [
    'name' => $model->uid,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin-feedback', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('admin-feedback', 'Update');
?>
<div class="feedback-update">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>