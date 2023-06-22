<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ChangePasswordForm extends Model
{
    public $oldPassword;
    public $repeatPassword;
    public $newPassword;

    public function rules()
    {
        return [
            [['oldPassword', 'repeatPassword', 'newPassword'], 'required'],
            ['oldPassword', 'compare', 'compareAttribute' => 'repeatPassword'],
            ['oldPassword', 'compare', 'compareAttribute' => 'newPassword', 'operator' => '!='],
            ['oldPassword', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = Yii::$app->user->identity;
            if (!$user || !$user->validatePassword($this->oldPassword)) {
                $this->addError($attribute, 'Incorrect password.');
            }
        }
    }
}
