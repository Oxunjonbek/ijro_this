<?php

use common\models\Town;
use common\models\School;
use common\models\SchoolTeacher;
use common\models\Teacher;
use kartik\date\DatePicker;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\daterange\DateRangePicker;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\teacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'O`qituvchilar';
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->formatter->nullDisplay = '&mdash;';

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'school_id',
        'format' => 'raw',
        'filter' => ArrayHelper::map(School::find()->all(), 'id', 'name'),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' =>
            [
                'size' => Select2::SIZE_SMALL,
                'options' => ['prompt' => 'Выберите'],
                'pluginOptions' => ['allowClear' => true],
            ],
        'value' => 'school.name'
    ],
    [
        'attribute' => 'full_name',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control  input-sm'],
    ],
    'birth_date',
    // [
    //     'attribute' => 'birth_date',
    //     'format' => 'text',
    //     'filterInputOptions' => ['class' => 'form-control  input-sm'],
    // ],
    // [
    //     'attribute' => 'birth_date',
    //     'format' => 'date',
    //     'filterInputOptions'=>['class' => 'form-control  input-sm'],
    //     'filterType' => GridView::FILTER_DATE_RANGE,
    //         'filterWidgetOptions' => [
    //             'options' => ['display:inline-block;','class' => 'form-control'],
    //             'model' => $searchModel,
    //             'convertFormat' => true,
    //             'useWithAddon' => false,
    //             'pluginOptions' => [
    //                 'locale' => ['format' => 'd.m.Y'],
    //                 'separator' => ' - ',
    //                 'opens' => 'right',
    //                 'language' => 'ru',
    //                 'pluginEvents'=>[
    //                     'cancel.daterangepicker'=>"function(ev, picker) {\$('#daterangeinput').val(''); // clear any inputs};"
    //                 ],
    //             ]
    //         ]                
    // ],
    [

        'class' => 'kartik\grid\ActionColumn',
        'template' => '{Sinf}',
        'buttons' => [
            'Sinf' => function ($url, $model) {

                return Html::a('<button class="btn btn-success">Sinf</button>', ['/grade/grade-from', 'teacher_id' => $model->id, 'school_id' => $model->school_id]);
            },

        ],
    ],

    [
        'class' => 'kartik\grid\ActionColumn',
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
            },
            'update' => function ($url, $model) {
                return Html::a(
                    '<span class="fa fa-pencil-square-o" style="font-size:14px;"></span>', 'javascript:void(0)',
                    [
                        'data' => [
                            'id' => $model->id,
                        ],
                        'title' => 'O\'zgaritirish',
                        'aria-label' => 'O\'zgaritirish',
                        'class' => 'update-teacher',
                        'style' => 'display: contents'
                    ]);
            }
        ],
    ],

];

?>

<div class="modal fade create-update-teacher" tabindex="-1" role="dialog"
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

<div class="teacher-index">


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
            Html::button('<i class="fa fa-lg fa-plus"></i>', ['class' => 'btn pl-2 pr-2 btn-success create-teacher']) .
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
    $('body').on('click', '.update-teacher', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["teacher/update"]) ?>',
            data: {id: id},
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-teacher').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('.create-teacher').click(function () {
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["teacher/create"]) ?>',
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-teacher').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('body').on('click', '#save-teacher-form', function (e) {
        e.preventDefault();
        var form = $('#save-teacher');
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (res) {
                if (res.success === 1) {
                    $('.create-update-teacher').modal('hide');
                    $('#create-update-form').html(res.view);

                    // $.pjax.reload({container: "#pjax-teacher"});
                    window.location.reload();

                } else {
                    // $('#create-update-form').html(res.view);
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