<?php

namespace app\entity;

use yii\db\ActiveRecord;

class ColorDir extends ActiveRecord
{
    public static function tableName()
    {
        return 'color_dir';
    }
}