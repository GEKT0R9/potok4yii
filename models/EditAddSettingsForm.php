<?php

namespace app\models;

use yii\base\Model;

class EditAddSettingsForm extends Model
{
    public $name;

    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'Параметр name обязателен'],
        ];
    }
}
