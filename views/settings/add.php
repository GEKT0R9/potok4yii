<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/** @var $model */
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить') ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
