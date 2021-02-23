<?php

use common\models\Region;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DistrictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Districtи';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->formatter->nullDisplay = '&mdash;';

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'region_id',
        'format' => 'raw',
        'filter' => ArrayHelper::map(Region::find()->all(), 'id', 'name'),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' =>
            [
                'size' => Select2::SIZE_SMALL,
                'options' => ['prompt' => 'Выберите'],
                'pluginOptions' => ['allowClear' => true],
            ],
        'value' => function($model){
            return $model->region->name;
        }
    ],
    [
        'attribute' => 'name',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control  input-sm'],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{update}{view}{delete}',
        'buttons' => [
            'delete' => function ($url, $model) {
                return Html::a(
                    '<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id],
                    [
                        'data' => [
                            'method' => 'POST',
                            'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                            'pjax' => false
                        ],
                        'title' => 'Удалить',
                        'aria-label' => 'Удалить'
                    ]);
            },
            'view' => function ($url, $model) {
                return Html::a('<span class="fa fa-eye"></span>', ['view', 'id' => $model->id], ['title' => 'Просмотр', 'aria-label' => 'Просмотр']);
            },
            'update' => function ($url, $model) {
                return Html::a(
                    '<span class="fa fa-pencil-square-o"></span>', 'javascript:void(0)',
                    [
                        'data' => [
                            'id' => $model->id,
                        ],
                        'title' => 'Редактировать',
                        'aria-label' => 'Редактировать',
                        'class' => 'update-district'
                    ]);
            }
        ],
    ],

];

?>

<div class="modal fade create-update-district" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKomplektModalLabel">
                    <b>Добавить набор</b>
                </h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal" data-original-title=""
                        title="">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="create-update-form">
                <?= $this->render('_form', ['model' => $model]) ?>
            </div>
        </div>
    </div>
</div>

<div class="district-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'condensed' => true,
        'hover' => true,
        'panel' => [
            'type' => GridView::TYPE_ACTIVE,
            'before' => '{summary}',
            'after' => false,
            'summaryOptions' => [
                'class' => 'float-left',
                'style' => 'display: table; height: 38px;'
            ]
        ],
        'toolbar' => [
            '<div style="align-self: center;">&nbsp;' .
            Html::button('<i class="fa fa-lg fa-plus"></i>', ['class' => 'btn pl-2 pr-2 btn-success create-district']) .
            '&nbsp; &nbsp; {toggleData} &nbsp; {export}</div>'
        ],
        'panelTemplate' => '{panelBefore}{items}{panelAfter}{panelFooter}',
        'exportConfig' => [
            GridView::EXCEL => [
                'label' => '&nbsp;&nbsp;Excel',
            ],
        ],
        'export' => [
            'icon' => 'fas fa-external-link-alt',
            'fontAwesome' => true,
        ],
        'showPageSummary' => true,
        'summaryOptions' => [
            'class' => 'summary',
            'style' => 'display: table-cell; vertical-align:middle;'
        ],
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager'
        ],
        'columns' => $columns,
    ]); ?>

</div>

<script type="text/javascript">
    <?php ob_start() ?>
    $('body').on('click', '.update-district', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["district/update"]) ?>',
            data: {id: id},
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-district').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('.create-district').click(function () {
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["district/create"]) ?>',
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-district').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('body').on('click', '#save-district-form', function (e) {
        e.preventDefault();
        var form = $('#save-district');
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (res) {
                if (res.success === 1) {
                    $('.create-update-district').modal('hide');
                    $('#create-update-form').html(res.view);

//                    $.pjax.reload({container: "#pjax-district"});
                    window.location.reload();

                } else {
//                    $('#create-update-form').html(res.view);
                    window.location.reload();
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    <?php $this->registerJs(ob_get_clean()) ?>
</script>