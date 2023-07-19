<?php

namespace app\controllers;

use app\models\ChangePasswordForm;
use app\models\LoginForm;
use app\repository\UserRepository;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class UserController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login', 'profile', 'change-password'],
                'rules' => [
                    [
                        'actions' => ['logout','profile', 'change-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ], [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionProfile()
    {
        $user = \Yii::$app->user->identity;
        return $this->render('profile',[
            'user' => $user
        ]);
    }

    public function actionChangePassword(){
        $model = new ChangePasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            UserRepository::changePassword(Yii::$app->user->id, $model->newPassword);
            $this->redirect('profile');
        }
        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
}