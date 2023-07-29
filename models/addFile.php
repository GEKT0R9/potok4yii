<?php

namespace app\models;

use yii\base\Model;

class addFile extends Model
{
    public $file;

    public function attributeLabels()
    {
        return [
            'file' => 'Документ',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['file', 'required', 'message' => 'Укажите документ'],
        ];
    }
}