<?php

use app\entity\ColorDir;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

$dataProvider = new ActiveDataProvider([
    'query' => ColorDir::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
?>
<?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name'
    ],
]);?>