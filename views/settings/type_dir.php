<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var ActiveDataProvider $dataProvider */

echo Html::a('Добавить', ['add-type']);
?>

<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('Редактировать', [
                        'edit-type',
                        'id' => $key
                    ]);
                },
                'delete' => function ($url, $model, $key) {
                    return Html::a('Удалить', [
                        'delete-type',
                        'id' => $key
                    ]);
                },
            ],
        ],
    ],
]); ?>