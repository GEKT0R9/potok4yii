<?php

namespace app\models;

use yii\base\Model;

class EditAddBouquetForm extends Model
{
    public $name;
    public $flowers;

    public function rules()
    {
        return [
            [['name', 'flowers'], 'required', 'message' => 'Параметр обязателен'],
        ];
    }
}
