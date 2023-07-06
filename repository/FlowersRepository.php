<?php

namespace app\repository;


use app\entity\Flowers;

class FlowersRepository
{
    public static function addFlower($name, $color_id, $type_id, $price){
        $flower = new Flowers();
        $flower->name = $name;
        $flower->color_id = $color_id;
        $flower->type_id = $type_id;
        $flower->price = $price;
        $flower->save();
    }
}