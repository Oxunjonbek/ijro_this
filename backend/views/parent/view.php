<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\parent */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['grade/index']];
$this->params['breadcrumbs'][] = ['label' => 'O`quvchi', 'url' => ['pupil/index']];
$this->params['breadcrumbs'][] = ['label' => 'Ota-Onalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parent-view">

        <p>
            <?= Html::a('Изменить', 'javascript:void(0)',[
                    'data' => [
                        'id' => $model->id,
                    ],
                    'title' => 'Tahrirlash',
                    'aria-label' => 'Tahrirlash',
                    'class' => 'btn btn-primary update-parent'
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
            // 'id',
                [
                    'attribute'=>'pupil_id',
                    'value'=>function($model){
                        return $model->pupil->full_name;
                    }
                ],
                // 'pupil_id',
                'full_name',
                // 'gender_id',
                    [
                    'attribute'=>'gender_id',
                    'value'=>function($model){
                        return $model->gender->name;
                    }
                ],
                'birth_date',
            ],
        ]) ?>

</div>
<div class="modal fade create-update-parent" tabindex="-1" role="dialog"
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
    $('body').on('click', '.update-parent', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["parent/update"]) ?>',
            data: {id: id},
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-parent').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('.create-parent').click(function () {
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["parent/create"]) ?>',
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-parent').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('body').on('click', '#save-parent-form', function (e) {
        e.preventDefault();
        var form = $('#save-parent');
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (res) {
                if (res.success === 1) {
                    $('.create-update-parent').modal('hide');
                    $('#create-update-form').html(res.view);

//                    $.pjax.reload({container: "#pjax-parent"});
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