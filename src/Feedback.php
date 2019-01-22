<?php

namespace devortix\feedback;

use devortix\feedback\models\Feedback as FeedbackModel;

/**
 * feedback module definition class
 */
class Feedback extends \yii\base\Component
{
    protected $_newMessagesCount = false;

    public function newMessagesCount()
    {
        if (!is_integer($this->_newMessagesCount)) {
            return $this->_newMessagesCount = FeedbackModel::find()->where(['status' => 1])->count();
        } else {
            return $this->_newMessagesCount;
        }

    }

    public function lastMessages()
    {
        return FeedbackModel::find()->where(['status' => 1])
            ->limit(6)
            ->orderBy(['id' => SORT_DESC])
            ->asArray()
            ->all();
    }
}