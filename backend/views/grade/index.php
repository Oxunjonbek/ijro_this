<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\models\School;
use common\models\Shift;
use common\models\Teacher;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sinflar';
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
// $this->params['breadcrumbs'][] = ['label' => 'O`qtuvchi', 'url' => ['teacher/index']];
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->formatter->nullDisplay = '&mdash;';

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute'=>'school_id',
        'format'=>'raw',
        'filter'=>\yii\helpers\ArrayHelper::map(School::find()->all(), 'id', 'name'),
        'filterType'=>GridView::FILTER_SELECT2,
        'filterWidgetOptions' => 
        [
            'size' => \kartik\select2\Select2::SIZE_SMALL,
            'options' => ['prompt' => 'Выберите'],
            'pluginOptions' => ['allowClear' => true],
        ],
        'value'=>'school.name'
    ],    
    [
        'attribute'=>'shift_id',
        'format'=>'raw',
        'filter'=>\yii\helpers\ArrayHelper::map(Shift::find()->all(), 'id', 'name'),
        'filterType'=>GridView::FILTER_SELECT2,
        'filterWidgetOptions' => 
        [
            'size' => \kartik\select2\Select2::SIZE_SMALL,
            'options' => ['prompt' => 'Выберите'],
            'pluginOptions' => ['allowClear' => true],
        ],
        'value'=>'shift.name'
    ],      [
        'attribute'=>'teacher_id',
        'format'=>'raw',
        'filter'=>\yii\helpers\ArrayHelper::map(Teacher::find()->all(), 'id', 'full_name'),
        'filterType'=>GridView::FILTER_SELECT2,
        'filterWidgetOptions' => 
        [
            'size' => \kartik\select2\Select2::SIZE_SMALL,
            'options' => ['prompt' => 'Выберите'],
            'pluginOptions' => ['allowClear' => true],
        ],
        'value'=>'teacher.full_name'
    ],   
    [
        'attribute' => 'name',
        'format' => 'text',
        'filterInputOptions'=>['class' => 'form-control  input-sm'],
    ],
   [
        
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{Pupil}',
        'buttons' => [
            'Pupil'=> function ($url, $model) {

                return Html::a('<button class="btn btn-success">O`quvchi</button>',['/pupil/pupil-from','grade_id'=>$model->id]
    //                 [
    //                 'data' => [
    //                     'method' => 'post',
    //         'params' => ['Grade[id]' => $model->id], // <- extra level
    //     ],
    // ]
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
                    '<span class="fa fa-trash"></span>',['delete', 'id' => $model->id],
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
                return Html::a('<span class="fa fa-eye"></span>',['view', 'id' => $model->id], ['title' => 'Просмотр', 'aria-label' => 'Просмотр']);
            },
            'update' => function ($url, $model) {
                return Html::a(
                    '<span class="fa fa-pencil-square-o"></span>','javascript:void(0)',
                    [
                        'data' => [
                            'id' => $model->id,
                        ],
                        'title' => 'Редактировать',
                        'aria-label' => 'Редактировать',
                        'class' => 'update-grade'
                    ]);
            }
        ],
    ],

];

?>

<div class="modal fade create-update-grade" tabindex="-1" role="dialog"
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

<div class="grade-index">


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
            Html::button('<i class="fa fa-lg fa-plus"></i>', ['class' => 'btn pl-2 pr-2 btn-success create-grade']).
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
   $('body').on('click', '.update-grade', function () {
    var id = $(this).data('id');
    $.ajax({
        type: 'get',
        url: '<?= yii\helpers\Url::to(["grade/update"]) ?>',
        data: {id: id},
        success: function (res) {
            $('#create-update-form').html(res);
            $('.create-update-grade').modal('show');
        },
        error: function (e) {
            console.log(e);
        }
    });
});

   $('.create-grade').click(function () {
    $.ajax({
        type: 'get',
        url: '<?= yii\helpers\Url::to(["grade/create"]) ?>',
        success: function (res) {
            $('#create-update-form').html(res);
            $('.create-update-grade').modal('show');
        },
        error: function (e) {
            console.log(e);
        }
    });
});

   $('body').on('click', '#save-grade-form', function (e) {
    e.preventDefault();
    var form = $('#save-grade');
    var url = form.attr('action');
    var data = form.serialize();

    $.ajax({
        type: 'post',
        url: url,
        data: data,
        success: function (res) {
            if (res.success === 1) {
                $('.create-update-grade').modal('hide');
                $('#create-update-form').html(res.view);

//                    $.pjax.reload({container: "#pjax-grade"});
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