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
            ['repeatPassword', 'compare', 'compareAttribute' => 'oldPassword', 'message' => 'Пароли должны совпадать'],
            ['oldPassword', 'compare', 'compareAttribute' => 'newPassword', 'operator' => '!='],
            ['oldPassword', 'validatePassword'],
            ['newPassword', 'string', 'length' => [8, 32]]
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
