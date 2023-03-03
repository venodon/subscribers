<?php

use app\models\Subscriber;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Subscriber $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subscriber-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_id')->dropDownList(Subscriber::EVENT_LIST) ?>

    <?= $form->field($model, 'is_blocked')->dropDownList([0 => 'Нет', 1 => 'Да']) ?>

    <?php if (!$model->isNewRecord): ?>
        <?= $form->field($model, 'id')->textInput(['disabled' => 1]) ?>

        <?= $form->field($model, 'created_at')->textInput(['disabled' => 1]) ?>

        <?= $form->field($model, 'updated_at')->textInput(['disabled' => 1]) ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
