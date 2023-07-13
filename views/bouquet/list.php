<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var ActiveDataProvider $dataProvider */

echo Html::a('Добавить', ['create']);
?>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{flowers} {delete}',
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    return Html::a('Удалить', [
                        'delete',
                        'id' => $key
                    ]);
                },
                'flowers' => function ($url, $model, $key) {
                    return Html::a('Просмотр', [
                        'flowers',
                        'id' => $key
                    ]);
                },
            ],
        ],
    ],

]); ?>