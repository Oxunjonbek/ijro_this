<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\blog */

$this->title = $model->title;
// $this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
$this->params['breadcrumbs'][] = ['label' => 'E\'lon', 'url' => ['index']];
$this->params['breadcrumbs']["<i class='fas fa-angle-right mx-2'
         aria-hidden='true'></i>"] = $this->title;
?>
<div class="blog-view">

        <p>
            <?= Html::a('Изменить', 'javascript:void(0)',[
                    'data' => [
                        'id' => $model->id,
                    ],
                    'title' => 'Tahrirlash',
                    'aria-label' => 'Tahrirlash',
                    'class' => 'btn btn-primary update-blog'
            ]) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Index', ['index'], [
                'class' => 'btn btn-success'
            ]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                // 'user_id',
                 [
                    'attribute'=>'user_id',
                    'value'=>function($model){
                        return $model->user->username;
                    }
                ],
                'title',
                // 'content:ntext',
                [
                    'attribute'=>'content',
                    'format'=>'raw'
                ],
                [
                    'attribute'=>'author',
                    'format'=>'raw'
                ],
                // 'author:ntext',
                'date',
                'seen',
            ],
        ]) ?>

</div>
<div class="modal fade create-update-blog" tabindex="-1" role="dialog"
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
    $('body').on('click', '.update-blog', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["blog/update"]) ?>',
            data: {id: id},
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-blog').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('.create-blog').click(function () {
        $.ajax({
            type: 'get',
            url: '<?= yii\helpers\Url::to(["blog/create"]) ?>',
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update-blog').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('body').on('click', '#save-blog-form', function (e) {
        e.preventDefault();
        var form = $('#save-blog');
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (res) {
                if (res.success === 1) {
                    $('.create-update-blog').modal('hide');
                    $('#create-update-form').html(res.view);

//                    $.pjax.reload({container: "#pjax-blog"});
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