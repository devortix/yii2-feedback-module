<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\feedback\models\Feedback */

$this->title = Yii::t('admin-feedback', 'Create Feedback');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin-feedback', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
