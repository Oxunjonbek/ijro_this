<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model common\models\school */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="school-view">

        <p>
            <?= Html::a('Изменить', 'javascript:void(0)',[
                    'data' => [
                        'id' => $model->id,
                    ],
                    'title' => 'Tahrirlash',
                    'aria-label' => 'Tahrirlash',
                    'class' => 'btn btn-primary update-school'
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
                'id',
                [
                    'attribute'=>'town_id',
                    'value'=>function($model){
                        return $model->town->name;
                    }
                ],
            'name',
            'address',
            'phone',
            'location'
            ],
        ]) ?>

</div>
<div class="modal fade create-update-school" tabindex="-1" role="dialog"
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

//                    $.pjax.reload({container: "#pjax-school"});
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