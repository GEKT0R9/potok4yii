<?php

namespace app\models;

use yii\base\Model;

class EditAddFlowersForm extends Model
{
    public $name;
    public $color_id;
    public $type_id;
    public $price;

    public function rules()
    {
        return [
            [['name', 'color_id', 'type_id', 'price'], 'required', 'message' => 'Параметр обязателен'],
            [['color_id', 'type_id', 'price'], 'integer', 'message' => 'Параметр должен быть числом'],
        ];
    }
}
