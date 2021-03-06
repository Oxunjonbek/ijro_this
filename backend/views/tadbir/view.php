<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Company;

/* @var $this yii\web\View */
/* @var $model common\models\Tadbir */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tadbirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tadbir-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ўзгартириш', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Ўчириш', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Тадбир', ['index'],['class' => 'btn btn-success']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
    [
        'attribute' => 'tadbir_name',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
    [
        'attribute' => 'tadbir_content',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
    [
        'attribute' => 'tadbir_result',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
    [
        'attribute' => 'masullar',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],

    [
        'attribute' => 'tadbir_date',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
    [
        'attribute' => 'tadbir_description',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
     [
        'attribute' => 'tadbir_status',
        'format' => 'html',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],

            // 'tadbir_name:ntext',
            // 'tadbir_content:ntext',
            // 'tadbir_result:ntext',
            // 'tadbir_date',
            // 'tadbir_description:ntext',
            // 'tadbir_status',
            // 'company_id',
        ],
    ]) ?>

</div>
