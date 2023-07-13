<?php

use app\assets\BouquetAsset;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/** @var $model */
/** @var $flowers */
BouquetAsset::register($this);
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <div class="form-group">
        <label for="count">Кол-во цветов</label>
        <input class="form-control" type="number" id="count" min="1" max="10" value="3">
    </div>
    <div class="form-group">
        <label>Цветы</label>
        <div id="flowers">
            <?= $form->field($model, 'flowers[]')->label(false)->dropdownList($flowers) ?>
            <?= $form->field($model, 'flowers[]')->label(false)->dropdownList($flowers) ?>
            <?= $form->field($model, 'flowers[]')->label(false)->dropdownList($flowers) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Добавить') ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
