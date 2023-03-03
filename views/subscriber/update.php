<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subscriber $model */

$this->title = 'Изменить подписчика: ' . $model->email .' '. $model->event;
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email .' '. $model->event, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="subscriber-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
