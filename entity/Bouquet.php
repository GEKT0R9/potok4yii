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
}