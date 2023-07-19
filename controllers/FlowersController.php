<?php

namespace app\controllers;

use app\entity\Flowers;
use app\entity\TypeDir;
use app\models\EditAddFlowersForm;
use app\repository\DirRepository;
use app\repository\FlowersRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class FlowersController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['list', 'edit', 'add', 'delete'],
                'rules' => [
                    [
                        'actions' => ['edit', 'add', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ], [
                        'actions' => ['list'],
                        'allow' => true,
                        'roles' => ['@', '?'],
                    ],
                ],
            ],
        ];
    }


    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Flowers::find()
                ->select([
                    'flowers.id',
                    'flowers.name',
                    'color_dir.name AS color',
                    'type_dir.name AS type',
                    'flowers.price'
                ])
                ->leftJoin('color_dir', 'flowers.color_id = color_dir.id')
                ->leftJoin('type_dir', 'flowers.type_id = type_dir.id')
                ->asArray(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
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

    public function actionDelete($id)
    {
        FlowersRepository::deleteFlower($id);
        $this->redirect('list');
    }

    public function actionEdit($id)
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
            FlowersRepository::editFlower($id, $model->name, $model->color_id, $model->type_id, $model->price);
            $this->redirect('list');
        }

        $flower = FlowersRepository::getFlower($id);
        $model->name = $flower->name;
        $model->type_id = $flower->type_id;
        $model->color_id = $flower->color_id;
        $model->price = $flower->price;

        return $this->render('edit', [
            'model' => $model,
            'colors' => $colorsArray,
            'types' => $typesArray,
        ]);
    }
}