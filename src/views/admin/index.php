<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin-feedback', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1>
        <?=Html::encode($this->title)?>
    </h1>

    <p>
        <?=Html::a(Yii::t('admin-feedback', 'Create Feedback'), ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        [
            'attribute' => 'created_at',
            'content' => function ($data) {
                return \Yii::$app->formatter->asDate($data->created_at, 'php:Y-m-d H:i');;
            },
        ],
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
]);?>
</div>