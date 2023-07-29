<?php

namespace app\controllers\api;

use app\entity\ColorDir;
use app\entity\TypeDir;
use app\models\EditAddSettingsForm;
use app\repository\DirRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\rest\Controller;

class SettingsController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => [
//                    'color-dir', 'type-dir',
//                    'edit-color', 'edit-type',
//                    'add-color', 'add-type',
//                    'delete-color', 'delete-type',
//                ],
//                'rules' => [
//                    [
//                        'actions' => [
//                            'color-dir', 'type-dir',
//                            'edit-color', 'edit-type',
//                            'add-color', 'add-type',
//                            'delete-color', 'delete-type',
//                        ],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ]
//                ],
//            ],
//        ];
//    }

    public function actionColorDir()
    {
        return DirRepository::getColors();
    }

    public function actionEditColor($id)
    {
        $model = new EditAddSettingsForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {
            DirRepository::editColorDir($id, $model->name);
            return true;
        }
        return $model;
    }

    public function actionAddColor()
    {
        $model = new EditAddSettingsForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {
            DirRepository::addColorDir($model->name);
            return true;
        }
        return $model;
    }

    public function actionDeleteColor($id)
    {
        DirRepository::deleteColorDir($id);
        return true;
    }

    public function actionTypeDir()
    {
        return DirRepository::getTypes();
    }

    public function actionEditType($id)
    {
        $model = new EditAddSettingsForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            DirRepository::editTypeDir($id, $model->name);
            return true;
        }
        return $model;
    }

    public function actionAddType()
    {
        $model = new EditAddSettingsForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            DirRepository::addTypeDir($model->name);
            return true;
        }
        return $model;
    }

    public function actionDeleteType($id)
    {
        DirRepository::deleteTypeDir($id);
        return true;
    }
}