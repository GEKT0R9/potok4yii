<?php

namespace app\controllers;

use app\entity\Flowers;
use app\entity\TypeDir;
use app\models\EditAddFlowersForm;
use app\repository\DirRepository;
use app\repository\FlowersRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class FlowersController extends Controller
{
    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => Flowers::find()
                ->leftJoin('color_dir', 'flowers.color_id = color_dir.id')
                ->leftJoin('type_dir', 'flowers.type_id = type_dir.id')
                ->select(['flowers.id','flowers.name', 'color_dir.name AS color', 'type_dir.name AS type', 'flowers.price']),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        var_dump(Flowers::find()
            ->leftJoin('color_dir', 'flowers.color_id = color_dir.id')
            ->leftJoin('type_dir', 'flowers.type_id = type_dir.id')
            ->select(['flowers.id','flowers.name', 'color' => 'color_dir.name', 'type' => 'type_dir.name', 'flowers.price'])->all(),);
        return $this->render('list', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionAdd()
    {
        $colors = DirRepository::getColors();
        $colorsArray = [];
        foreach ($colors as $color) {
            $colorsArray[$color->id] = $color->name;
        }

        $types = DirRepository::getTypes();
        $typesArray = [];
        foreach ($types as $type) {
            $typesArray[$type->id] = $type->name;
        }

        $model = new EditAddFlowersForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            FlowersRepository::addFlower($model->name, $model->color_id, $model->type_id, $model->price);
            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
            'colors' => $colorsArray,
            'types' => $typesArray,
        ]);
    }

}