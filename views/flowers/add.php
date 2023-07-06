<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/** @var $model */
/** @var $colors */
/** @var $types */
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'color_id')->dropdownList($colors) ?>
    <?= $form->field($model, 'type_id')->dropdownList($types) ?>
    <?= $form->field($model, 'price')->input('number') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить') ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
