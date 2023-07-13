<?php

namespace app\repository;


use app\entity\Bouquet;
use app\entity\Flowers;
use app\entity\FlowersToBouquet;

class BouquetRepository
{
    public static function addBouquet($name, $flowers_id)
    {
        $bouquet = new Bouquet();
        $bouquet->name = $name;
        $bouquet->save();
        foreach ($flowers_id as $id) {
            $ftb = new FlowersToBouquet();
            $ftb->bouquet_id = $bouquet->id;
            $ftb->flower_id = $id;
            $ftb->save();
        }
    }

    public static function deleteBouquet($id){
        Bouquet::deleteAll(['id' => $id]);
    }

    public static function getFlowersId($id){
        $ids = [];
        $flowers_id = FlowersToBouquet::find()->where(['bouquet_id' => $id])->all();
        foreach ($flowers_id as $id) {
            $ids[] = $id->flower_id;
        }
        return $ids;
    }
}