<?php

/* @var $model */

use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

$this->title = 'Добавить файл';
?>
<div class="form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model, ['class' => 'error']); ?>

    <?=
    $form->field($model, 'file')
        ->fileInput([
            'accept' => '.png,.jpg,.jpeg,.bmp',
            'value' => UploadedFile::getInstance($model, 'file')
        ])
        ->label(false)
        ->error(false)
    ?>

    <?= Html::submitButton('Добавить') ?>
    <?php ActiveForm::end(); ?>
</div>