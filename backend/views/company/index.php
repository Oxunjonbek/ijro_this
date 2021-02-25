<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Бошқармалар,Бўлимлар,Тизим ташкилотлари';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Бошқармалар,Бўлимлар,Тизим ташкилотлари қушиш', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'company_name:ntext',
            'parent:ntext',

            ['class' => 'yii\grid\ActionColumn',
          'template' => '{update}{view}{delete}',
        'buttons' => [
            'delete' => function ($url, $model) {
                return Html::a(
                    '<span class="fa fa-trash" style="font-size:14px; padding:10px;"></span>', ['delete', 'id' => $model->id],
                    [
                        'data' => [
                            'method' => 'POST',
                            'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                            'pjax' => false
                        ],
                        'title' => 'Удалить',
                        'aria-label' => 'Удалить',
                        'style' => 'display: contents'
                    ]);
            },
            'view' => function ($url, $model) {
                return Html::a('<span class="fa fa-eye" style="font-size:14px;"></span>', ['view', 'id' => $model->id], ['title' => 'Просмотр', 'aria-label' => 'Просмотр']);
            }
            // 'update' => function ($url, $model) {
            //     return Html::a(
            //         '<span class="fa fa-pencil-square-o" style="font-size:14px;"></span>', 'javascript:void(0)',
            //         ['update',
            //             'data' => [
            //                 'id' => $model->id,
            //             ],
            //             'title' => 'O\'zgaritirish',
            //             'aria-label' => 'O\'zgaritirish',
            //             'class' => 'update-tadbir',
            //             'style' => 'display: contents'
            //         ]);
            // }
        ],
        ],
        ],
    ]); ?>


</div>
