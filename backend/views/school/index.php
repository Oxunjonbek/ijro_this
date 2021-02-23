<?php

use common\models\Town;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
// var_dump(Yii::$app->controller->action);exit();
// echo '<pre>';
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->formatter->nullDisplay = '&mdash;';

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'town_id',
        'format' => 'raw',
        'filter' => ArrayHelper::map(Town::find()->all(), 'id', 'name'),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' =>
        [
            'size' => Select2::SIZE_SMALL,
            'options' => ['prompt' => 'Выберите'],
            'pluginOptions' => ['allowClear' => true],
        ],
        'value'=>'town.name'
    ],


    [
        'attribute' => 'name',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control  input-sm'],
    ],
    [
        'attribute' => 'address',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control  input-sm'],
    ],
    
    [

        'class' => 'kartik\grid\ActionColumn',
        'template' => '{Teacher}',
        'buttons' => [
            'Teacher'=> function ($url, $model) {

                return Html::a('<button class="btn btn-success">O`qituvchi</button>',['/teacher/school-from', 'school_id' => $model->id]
    //                 [
    //                 'data' => [
    //                     'method' => 'post',
    //         'params' => ['School[id]' => $model->id], // <- extra level
    //     ],
    // ]
            );
            },
            
        ],
    ],
    [

        'class' => 'kartik\grid\ActionColumn',
        'template' => '{Smena}',
        'buttons' => [
            'Smena'=> function ($url, $model) {

                return Html::a('<button class="btn btn-success">Smena</button>', ['/shift/shift-from','school_id' => $model->id]
        //             [
        //                 'data' => [
        //                     'method' => 'post',
        //     'params' => ['School[id]' => $model->id], // <- extra level
        // ]]
            );
            },
            
        ],
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
                        'title' => 'O\'zgaritirish',
                        'aria-label' => 'O\'zgaritirish',
                        'class' => 'update-school'
                    ]);
            }
        ],
    ],

];

?>

<div class="modal fade create-update-school" tabindex="-1" role="dialog"
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

<div class="school-index">


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
            Html::button('<i class="fa fa-lg fa-plus"></i>', ['class' => 'btn pl-2 pr-2 btn-success create-school']) .
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
    $('body').on('click', '.update-school', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["school/update"]) ?>',
            data: {id: id},
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-school').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('.create-school').click(function () {
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["school/create"]) ?>',
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-school').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('body').on('click', '#save-school-form', function (e) {
        e.preventDefault();
        var form = $('#save-school');
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (res) {
                if (res.success === 1) {
                    $('.create-update-school').modal('hide');
                    $('#create-update-form').html(res.view);

                   // $.pjax.reload({container: "#pjax-school"});
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