<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Foydalanuvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a(
            'Tahrirlash',
            'javascript:void(0)',
            [
                'class' => 'btn btn-primary',
                'data' => [
                    'id' => $model->id
                ],
                'title' => 'Tahrirlash',
                'aria-label' => 'Tahrirlash',
                'class' => 'btn btn-primary update-user'
            ]
        ) ?>
        <?= Html::a(
            'O\'chirish',
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'role_id',
                'value' => $model->username
            ],
            'username',
            'full_name',
            'phone',
            [
                'label' => "O'qituvchi Nomi",
                'value' => $model->teacher->full_name,
            ],
            'email:email',
        ],
    ]) ?>

</div>

<div class="modal fade create-update-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKomplektModalLabel">
                    <b>Изменить</b>
                </h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal" data-original-title="" title="">
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
    $('body').on('click', '.update-user', function() {
        var id = $(this).data('id');
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["user/update"]) ?>',
            data: {
                id: id
            },
            success: function(res) {
                $('#create-update-form').html(res);
                $('.create-update-user').modal('show');
            },
            error: function(e) {
                console.log(e);
            }
        });
    });

    $('.create-forum').click(function() {
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["user/create"]) ?>',
            success: function(res) {
                $('#create-update-form').html(res);
                $('.create-update-user').modal('show');
            },
            error: function(e) {
                console.log(e);
            }
        });
    });

    $('body').on('click', '#save-user-form', function(e) {
        e.preventDefault();
        var form = $('#save-user');
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(res) {
                if (res.success === 1) {
                    $('.create-update-forum').modal('hide');
                    $('#create-update-user').html(res.view);

                    //                    $.pjax.reload({container: "#pjax-pupil"});
                    window.location.reload();

                } else {
                    $('#create-update-form').html(res.view);
                    // window.location.reload();
                }
            },
            error: function(e) {
                console.log(e);
            }
        });
    });

    <?php $this->registerJs(ob_get_clean()) ?>
</script>