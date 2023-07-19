<?php

namespace app\controllers;

use app\entity\ColorDir;
use app\entity\TypeDir;
use app\models\EditAddSettingsForm;
use app\repository\DirRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SettingsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [
                    'color-dir', 'type-dir',
                    'edit-color', 'edit-type',
                    'add-color', 'add-type',
                    'delete-color', 'delete-type',
                ],
                'rules' => [
                    [
                        'actions' =>  [
                            'color-dir', 'type-dir',
                            'edit-color', 'edit-type',
                            'add-color', 'add-type',
                            'delete-color', 'delete-type',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    public function actionColorDir()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ColorDir::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('color_dir', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionEditColor($id)
    {
        $color = DirRepository::getColorDirById($id);
        $model = new EditAddSettingsForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            DirRepository::editColorDir($id, $model->name);
            $this->redirect('color-dir');
        }
        $model->name = $color->name;
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionAddColor()
    {
        $model = new EditAddSettingsForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            DirRepository::addColorDir($model->name);
            $this->redirect('color-dir');
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionDeleteColor($id)
    {
        DirRepository::deleteColorDir($id);
        return $this->redirect('color-dir');
    }

    public function actionTypeDir()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TypeDir::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('type_dir', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionEditType($id)
    {
        $type = DirRepository::getTypeDirById($id);
        $model = new EditAddSettingsForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            DirRepository::editTypeDir($id, $model->name);
            $this->redirect('type-dir');
        }
        $model->name = $type->name;
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionAddType()
    {
        $model = new EditAddSettingsForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            DirRepository::addTypeDir($model->name);
            $this->redirect('type-dir');
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionDeleteType($id)
    {
        DirRepository::deleteTypeDir($id);
        return $this->redirect('type-dir');
    }
}