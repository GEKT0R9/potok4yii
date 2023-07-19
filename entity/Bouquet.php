<?php

namespace app\entity;

use yii\db\ActiveRecord;
/**
 * @property int $id
 * @property string $name
 */
class Bouquet extends ActiveRecord
{
    public static function tableName()
    {
        return 'bouquet';
    }
//
//    public function getFlowers()
//    {
//        return $this->hasMany(FlowersToBouquet::class, ['bouquet_id' => 'id'])
//            ->leftJoin('flowers', '"flowers-to-bouquet".flower_id = flowers.id');
//    }

}