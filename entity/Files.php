<?php

namespace app\entity;

use yii\db\ActiveRecord;
/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $size
 * @property $content
 */
class Files extends ActiveRecord
{
    public static function tableName()
    {
        return 'files';
    }

}