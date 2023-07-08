<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var ActiveDataProvider $dataProvider */

echo Html::a('Добавить', ['add']);
?>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'color',
        'type',
        'price',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('Редактировать', [
                        'edit',
                        'id' => $key
                    ]);
                },
                'delete' => function ($url, $model, $key) {
                    return Html::a('Удалить', [
                        'delete',
                        'id' => $key
                    ]);
                },
            ],
        ],
    ],

]); ?>