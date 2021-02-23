<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\grade */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
// $this->params['breadcrumbs'][] = ['label' => 'O`qtuvchi', 'url' => ['teacher/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-view">

        <p>
            <?= Html::a('Изменить', 'javascript:void(0)',[
                    'data' => [
                        'id' => $model->id,
                    ],
                    'title' => 'Tahrirlash',
                    'aria-label' => 'Tahrirlash',
                    'class' => 'btn btn-primary update-grade'
            ]) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
            //     'id',
            // 'school_id',
            //     [
            //         'attribute'=>'shift_id',
            //         'value'=>function($model){
            //             return $model->shift->name;
            //         }
            //     ],
                // [
                //     'attribute'=>'teacher_id',
                //     'value'=>function($model){
                //         return $model->teacher->full_name;
                //     }
                // ],
            //     'id',
                    [
                    'attribute'=>'school_id',
                    'value'=>function($model){
                        return $model->school->name;
                    }
                ],
                 [
                    'attribute'=>'shift_id',
                    'value'=>function($model){
                        return $model->shift->name;
                    }
                ],
                [
                    'attribute'=>'teacher_id',
                    'value'=>function($model){
                        return $model->teacher->full_name;
                    }
                ],
                // 'teacher_id', 
                'name',
                'began_year',
                'end_year',
                'camera_url:url',
            ],
        ]) ?>

</div>
<div class="modal fade create-update-grade" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKomplektModalLabel">
                    <b>Изменить</b>
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
                   $('#create-update-form').html(res.view);
                    // window.location.reload();
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

<?php $this->registerJs(ob_get_clean()) ?> 
</script>