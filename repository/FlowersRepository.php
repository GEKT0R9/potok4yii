<?php

namespace app\repository;


use app\entity\Flowers;

class FlowersRepository
{
    public static function getFlower($id){
        return Flowers::find()->where(['id' => $id])->one();
    }

    public static function getFlowers(){
        return Flowers::find()->all();
    }

    public static function getFlowersAsArray(){
        return Flowers::find()
            ->select([
                'flowers.id',
                'flowers.name',
                'color_dir.name AS color',
                'type_dir.name AS type',
                'flowers.price'
            ])
            ->leftJoin('color_dir', 'flowers.color_id = color_dir.id')
            ->leftJoin('type_dir', 'flowers.type_id = type_dir.id')
            ->asArray()
            ->all();
    }

    public static function addFlower($name, $color_id, $type_id, $price)
    {
        $flower = new Flowers();
        $flower->name = $name;
        $flower->color_id = $color_id;
        $flower->type_id = $type_id;
        $flower->price = $price;
        $flower->save();
    }

    public static function deleteFlower($id)
    {
        Flowers::deleteAll(['id' => $id]);
    }

    public static function editFlower($id, $name, $color_id, $type_id, $price)
    {
        $flower = Flowers::find()->where(['id' => $id])->one();
        $flower->name = $name;
        $flower->color_id = $color_id;
        $flower->type_id = $type_id;
        $flower->price = $price;
        $flower->save();
    }
}