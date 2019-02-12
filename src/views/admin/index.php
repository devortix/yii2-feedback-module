<?php

use devortix\feedback\models\Feedback;
use yii\helpers\Html;
use \yiister\gentelella\widgets\grid\GridView;
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
    'hover' => true,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        [
            'attribute' => 'created_at',
            'content' => function ($data) {
                $val = \Yii::$app->formatter->asDate($data->created_at, 'php:Y-m-d H:i');
                return Html::tag('code', $val);
            },
        ],
        'user_name',
        'user_email:email',
        'phone',
        //'content:ntext',
        //'info:ntext',
        //'created_at',
        //'updated_at',
        [
            'attribute' => 'status',
            'filter' => Feedback::getStatuses(),
            'content' => function ($data) {
                $block = Html::tag('span', $data->statusLabel, ['style' => 'font-size: 12px']);
                return Html::tag('span', $block, ['class' => $data->statusClass, 'style' => 'font-size: 15px']);
            },
        ],
        [
            'attribute' => 'file',
            'content' => function ($data) {
                if (is_file($data->filePath)) {
                    return Html::a('<i class="fa fa-download" ></i>', $data->fileUrl, ['target' => '_blank']);
                }

            },
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'options' => [
                'width' => '80px',
            ],

        ],
    ],
]);?>
</div>