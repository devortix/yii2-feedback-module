<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\feedback\models\Feedback */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin-feedback', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="feedback-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a(Yii::t('admin-feedback', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a(Yii::t('admin-feedback', 'Delete'), ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => Yii::t('admin-feedback', 'Are you sure you want to delete this item?'),
        'method' => 'post',
    ],
])?>
    </p>

    <?=DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'user_name',
        'user_email:email',
        'phone',
        'push_emails:email',
        'content:ntext',
        'info:ntext',
        'created_at:datetime',
        'updated_at:datetime',
        [
            'attribute' => 'status',
            'format' => 'raw',
            'value' => function ($data) {
                $block = Html::tag('span', $data->statusLabel, ['style' => 'font-size: 12px']);
                return Html::tag('span', $block, ['class' => $data->statusClass, 'style' => 'font-size: 15px']);
            },
        ],
    ],
])?>

</div>