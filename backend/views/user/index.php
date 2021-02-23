<?php

use common\models\Parents;
use common\models\Role;
use common\models\Teacher;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->formatter->nullDisplay = '&mdash;';

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'role_id',
        'format' => 'raw',
        'value' => 'role.name',
        'filter' => ArrayHelper::map(Role::find()->all(), 'id', 'name'),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'size' => Select2::SIZE_SMALL,
            'options' => ['prompt' => 'Выберите'],
            'pluginOptions' => ['allowClear' => true],
        ],
        'contentOptions' => ['style' => 'width: 10em'],
    ],
    [
        'attribute' => 'username',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control input-sm'],
    ],
    [
        'attribute' => 'full_name',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control input-sm'],
    ],
    [
        'attribute' => 'phone',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control input-sm'],
    ],
    [
        'attribute' => 'teacher_id',
        'format' => 'raw',
        'filter' => ArrayHelper::map(Teacher::find()->all(), 'id', 'full_name'),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'size' => Select2::SIZE_SMALL,
            'options' => ['prompt' => 'Выберите'],
            'pluginOptions' => ['allowClear' => true],
        ],
        'contentOptions' => ['style' => 'width: 10em'],
    ],
    [
        'attribute' => 'parent_id',
        'format' => 'raw',
        'filter' => ArrayHelper::map(Parents::find()->all(), 'id', 'full_name'),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'size' => Select2::SIZE_SMALL,
            'options' => ['prompt' => 'Выберите'],
            'pluginOptions' => ['allowClear' => true],
        ],
        'contentOptions' => ['style' => 'width: 10em'],
    ],
    [
        'attribute' => 'email',
        'format' => 'email',
        'filterInputOptions' => ['class' => 'form-control  input-sm'],
    ],
    [
        'attribute' => 'status',
        'value' => function ($model) {
            return ($model->status == 10) ? 'Aktiv' : 'Passiv';
        },
        'filter' => ['10' => 'Aktiv', '0' => 'Passiv'],
        'filterInputOptions' => ['class' => 'form-control input-sm'],
    ],
    [
        'attribute' => 'created_at',
        'format' => 'datetime',
        'filterInputOptions' => ['class' => 'form-control input-sm'],
    ],
    [
        'attribute' => 'updated_at',
        'format' => 'datetime',
        'filterInputOptions' => ['class' => 'form-control input-sm'],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view} {update} {delete}',
        'buttons' => [
//                    'delete' => function ($url, $model) {
//                        return Html::a(
//                            '<span class="la la-trash"></span>', 'javascript:void(0)',
//                            [
//                                'data' => [
//                                    'method' => 'POST',
//                                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
//                                    'pjax' => false
//                                ],
//                                'title' => 'Удалить',
//                                'aria-label' => 'Удалить'
//                            ]);
//                    },
//                    'view' => function ($url, $model) {
//                        return Html::a(
//                            '<span class="la la-eye"></span>', 'javascript:void(0)', ['title' => 'Просмотр', 'aria-label' => 'Просмотр']);
//                    },
            'update' => function ($url, $model) {
                return Html::a(
                    '<span class="fas fa-pencil-alt"></span>', 'javascript:void(0)',
                    [
                        'data' => [
                            'id' => $model->id,
                        ],
                        'title' => 'O\'zgaritirish',
                        'aria-label' => 'O\'zgaritirish',
                        'class' => 'update-user'
                    ]);
            }
        ],
        'contentOptions' => [
            'nowrap' => 'nowrap',
        ],
    ],
];
?>

<div class="modal fade create-update-user" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKomplektModalLabel">
                    <b>Yangi foydalanuvchi qo'shish</b>
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

<div class="user-index">

    <?php Pjax::begin(['id' => 'pjax-user']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'condensed' => true,
        'hover' => true,
        'columns' => $columns,
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
            Html::button('<i class="fa fa-lg fa-plus"></i>', ['class' => 'btn pl-2 pr-2 btn-success create-user']).
            '&nbsp; &nbsp; {toggleData} &nbsp; {export}</div>'
        ],
        'panelTemplate' => '
            {panelBefore}
            {items}
            {panelAfter}
            {panelFooter}
        ',
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
        ]
    ]); ?>
    <?php Pjax::end(); ?>

</div>

<script type="text/javascript">
    <?php ob_start() ?>

    $('body').on('click', '.update-user', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["user/update"]) ?>',
            data: {id: id},
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-user').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('.create-user').click(function () {
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["user/create"]) ?>',
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-user').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });


    $('body').on('click', '#save-user-form', function (e) {
        e.preventDefault();
        var form = $('#save-user');
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (res) {
                if (res.success === 1) {
                    $('.create-update-user').modal('hide');
                    $('#create-update-form').html(res.view);

                    $.pjax.reload({container: "#pjax-user"});

                } else {
                    $('#create-update-form').html(res.view);
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    <?php $this->registerJs(ob_get_clean()) ?>
</script>
