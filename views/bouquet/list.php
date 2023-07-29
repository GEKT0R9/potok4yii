<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var ActiveDataProvider $dataProvider */
/** @var $bouquets */

echo Html::a('Добавить', ['create']);
?>
<?php //=
//GridView::widget([
//    'dataProvider' => $dataProvider,
//    'columns' => [
//        'id',
//        'name',
//        [
//            'class' => 'yii\grid\ActionColumn',
//            'template' => '{flowers} {delete}',
//            'buttons' => [
//                'delete' => function ($url, $model, $key) {
//                    return Html::a('Удалить', [
//                        'delete',
//                        'id' => $key
//                    ]);
//                },
//                'flowers' => function ($url, $model, $key) {
//                    return Html::a('Просмотр', [
//                        'flowers',
//                        'id' => $key
//                    ]);
//                },
//            ],
//        ],
//    ],
//
//]);
//var_dump($bouquets);
?>

<div class="wrapper">
    <?php foreach ($bouquets as $bouquet): ?>
        <div class="bouquet">
            <img class="bouquet-img" src="/settings/file?id=1" alt="bouquet">
            <div class="title"><?= $bouquet['name'] ?></div>
            <div class="btns">
                <a href="/bouquet/flowers?id=<?=$bouquet['id']?>" class="bouquet-btn">Просмотр</a>
                <a href="/bouquet/delete?id=<?=$bouquet['id']?>" class="bouquet-btn btn-del">Удалить</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
