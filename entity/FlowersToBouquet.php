<?php

namespace app\entity;

use yii\db\ActiveRecord;
/**
 * @property int $id
 * @property int $flower_id
 * @property int $bouquet_id
 */
class FlowersToBouquet extends ActiveRecord
{
    public static function tableName()
    {
        return 'flowers-to-bouquet';
    }
}