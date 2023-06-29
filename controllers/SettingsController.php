<?php

namespace app\controllers;

use yii\web\Controller;

class SettingsController extends Controller
{
    public function actionColorDir(){
        return $this->render('color_dir');
    }
}