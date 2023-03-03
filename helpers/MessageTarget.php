<?php

namespace app\helpers;

use app\models\Subscriber;
use yii\helpers\ArrayHelper;
use yii\log\Target;

class MessageTarget extends Target
{
    public $message = [];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }

    public function export()
    {
        if ($this->messages) {
            $message = ArrayHelper::getValue($this->messages, 0);
            $message = is_array($message) ? ArrayHelper::getValue($message, 0) : $message;
            $subscribers = Subscriber::find()->where(['is_blocked' => 0, 'event_id' => $message['event']])->all();
            foreach ($subscribers as $subscriber) {
              //  TODO:: Тут мы добавляем всех в очередь на отправку чтобы сразу не нагружать систему
            }
        }
    }

}
