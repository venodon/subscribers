<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subscriber $model */

$this->title = 'Добавить подписчика';
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriber-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
