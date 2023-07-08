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

    public function getColor()
    {
        return $this->hasOne(ColorDir::class, ['id' => 'color_id'])->one()->name;
    }

    public function getType()
    {
        return $this->hasOne(TypeDir::class, ['id' => 'type_id'])->one()->name;
    }
}