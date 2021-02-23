<?php

use yii\helpers\Html;
use common\models\Company;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TadbirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tadbirs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tadbir-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tadbir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'company_id',
    [
        'attribute' => 'company_id',
        'format' => 'raw',
        'filter' => ArrayHelper::map(Company::find()->all(), 'id', 'company_name'),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' =>
        [
            'size' => Select2::SIZE_SMALL,
            'options' => ['prompt' => 'Выберите'],
            'pluginOptions' => ['allowClear' => true],
        ],
        'value'=>'company.company_name'
    ],
            // 'tadbir_name:ntext',
    [
        'attribute' => 'tadbir_name',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
            // 'tadbir_content:ntext',
            [
        'attribute' => 'tadbir_content',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
            // 'tadbir_result:ntext',
            [
        'attribute' => 'tadbir_result',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
            // 'tadbir_status',
            [
        'attribute' => 'tadbir_status',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
            // 'tadbir_date',
            [
        'attribute' => 'tadbir_date',
        'format' => 'text',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
            // 'tadbir_description:ntext',
    [
        'attribute' => 'tadbir_description',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],

            
            

            ['class' => 'yii\grid\ActionColumn',
          'template' => '{update}{view}{delete}',
        'buttons' => [
            'delete' => function ($url, $model) {
                return Html::a(
                    '<span class="fa fa-trash" style="font-size:14px;"></span>', ['delete', 'id' => $model->id],
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
