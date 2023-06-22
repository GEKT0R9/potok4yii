<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/** @var $model */
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'oldPassword')->passwordInput() ?>
    <?= $form->field($model, 'repeatPassword')->passwordInput() ?>
    <?= $form->field($model, 'newPassword')->passwordInput() ?>


    <div class="form-group">
            <?= Html::submitButton('Сменить пароль') ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
