<?php

namespace app\entity;

use yii\db\ActiveRecord;

class TypeDir extends ActiveRecord
{
    public static function tableName()
    {
        return 'type_dir';
    }
}