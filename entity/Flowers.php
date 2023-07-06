<?php

namespace app\entity;

use yii\db\ActiveRecord;
/**
 * @property int $id
 * @property string $name
 * @property int $color_id
 * @property int $type_id
 * @property int $price
 */
class Flowers extends ActiveRecord
{
    public static function tableName()
    {
        return 'flowers';
    }
}