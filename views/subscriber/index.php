<?php

use app\models\Subscriber;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\SubscriberSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Подписчики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriber-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            [
                'attribute' => 'event_id',
                'value' => function ($model) {
                    return $model->event;
                },
                'filter' => Subscriber::EVENT_LIST
            ],
            [
                'attribute' => 'is_blocked',
                'value' => function ($model) {
                    return $model->blocked;
                },
                'filter' => Subscriber::BLOCKED_STATUSES
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Subscriber $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
