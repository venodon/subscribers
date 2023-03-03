<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Subscriber $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subscriber-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Заблокировать', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены, что хотите заблокировать подписчик?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'email:email',
            [
                'attribute' => 'event_id',
                'value' => function ($model) {
                    return $model->event;
                }
            ],
            [
                'attribute' => 'is_blocked',
                'value' => function ($model) {
                    return $model->is_blocked ? 'Да' : 'Нет';
                }
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
