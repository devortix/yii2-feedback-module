<?php
namespace devortix\feedback\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

class ApiController extends ActiveController
{
    public $modelClass = 'devortix\feedback\models\Feedback';

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['delete'], $actions['update'], $actions['index']);

        return $actions;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }

    public function actionNewFeedback()
    {
        $data = \Yii::$app->request->post() ? \Yii::$app->request->post() : \Yii::$app->request->get();
        $model = new $this->modelClass;
        $info = '';
        if ($data) {
            foreach ($data as $key => $post) {
                if (is_string($post)) {
                    if (in_array($key, ['user_name', 'user_email', 'phone', 'push_emails', 'name', 'content'])) {
                        $model->$key = $post;
                    } else {
                        $info .= "$key: $post \n";
                    }
                }
            }
            $model->info = $info;
            if ($model->save()) {
                return ['status' => 'success'];
            } else {
                return [
                    'status' => 'success',
                    'message' => $model->errors,
                ];
            }
        }
    }
}