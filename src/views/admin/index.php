<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin-feedback', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('admin-feedback', 'Create Feedback'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_name',
            'user_email:email',
            'phone',
            'push_emails:email',
            //'content:ntext',
            //'info:ntext',
            //'created_at',
            //'updated_at',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
