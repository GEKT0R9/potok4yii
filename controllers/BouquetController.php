<?php

namespace app\controllers;

use app\models\EditAddBouquetForm;
use app\repository\FlowersRepository;
use Yii;
use yii\web\Controller;

class BouquetController extends Controller
{
    public function actionCreate()
    {
        $flowers = FlowersRepository::getFlowers();
        $flowersArray = [];
        foreach ($flowers as $flower) {
            $flowersArray[$flower->id] = $flower->name;
        }
        $model = new EditAddBouquetForm();
        //&& $model->validate()
        if ($model->load(Yii::$app->request->post()) ) {
            var_dump($model);
        }
        return $this->render('create', [
            'model' => $model,
            'flowers' => $flowersArray
        ]);
    }
}