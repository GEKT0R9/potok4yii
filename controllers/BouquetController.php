<?php

namespace app\controllers;

use app\entity\Bouquet;
use app\entity\Flowers;
use app\models\EditAddBouquetForm;
use app\repository\BouquetRepository;
use app\repository\FlowersRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class BouquetController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['list', 'edit', 'create', 'delete', 'flowers'],
                'rules' => [
                    [
                        'actions' => ['edit', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ], [
                        'actions' => ['list', 'flowers'],
                        'allow' => true,
                        'roles' => ['@', '?'],
                    ],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $flowers = FlowersRepository::getFlowers();
        $flowersArray = [];
        foreach ($flowers as $flower) {
            $flowersArray[$flower->id] = $flower->name;
        }
        $model = new EditAddBouquetForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
            BouquetRepository::addBouquet($model->name,$model->flowers);
            $this->redirect('list');
        }
        return $this->render('create', [
            'model' => $model,
            'flowers' => $flowersArray
        ]);
    }

    public function actionDelete($id){
        BouquetRepository::deleteBouquet($id);
        $this->redirect('list');
    }

    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => Bouquet::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionFlowers($id){
        $ids = BouquetRepository::getFlowersId($id);
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
                ->where(['flowers.id' => $ids])
                ->asArray(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('flowers', [
            'dataProvider' => $dataProvider
        ]);
    }
}