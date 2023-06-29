<?php

namespace app\controllers;

use app\models\ChangePasswordForm;
use app\repository\UserRepository;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{
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
}