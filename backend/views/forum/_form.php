<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Forum;
use common\models\ForumCategory;
use common\models\User;
use common\models\Reply;
/* @var $this yii\web\View */
/* @var $model common\models\Forum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forum-form">
    <?php $form = ActiveForm::begin(['id' => 'save-forum', 'action' => yii\helpers\Url::to(['forum/save', 'id' => $model->id]), 'method' => 'post']); ?>

    <?= $form->field($model, 'forum_category_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(ForumCategory::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Выберите', 'multiple' => false],
        'theme' => \kartik\select2\Select2::THEME_KRAJEE,
        'size' => 'xs',
    ]); ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Выберите', 'multiple' => false],
        'theme' => \kartik\select2\Select2::THEME_KRAJEE,
        'size' => 'xs',
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-forum-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'onclick' => 'optionSection()']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>

<script defer>
    <?php ob_start() ?>
    $(document).ready(function() {
        $("#save-forum_category_id").select2({
            tags: true
        });
    })
    var option = document.querySelector("#forum-forum_category_id");
    var selection = document.querySelector(".select2-selection");
    var btn = document.querySelector("#save-forum-form");

    selection.onfocus = (e) => {
        var inputField = document.querySelector(".select2-search__field");

        inputField.onkeydown = (event) => {
            if (event.key == "Enter") {
                console.log(inputField.value);

                const optionCreate = new Option(inputField.value, inputField.value);

                option.add(optionCreate, undefined);

                $.post("createCategory", inputField.value);

                $.post("index", inputField.value);

                inputField.value = "";
                inputField.focus();
            }
        };
    }

    btn.addEventListener("click", (event) => {
        event.preventDefault();
        var form = $("#save-forum");
        var url = form.attr('action');
        var data = form.serialize();
        console.log(data);
        $.ajax({
            type: 'post',
            url: url,
            data: {
                [data.forum_category_id]: option.index,
            },
            success: function(res) {
                if (res.success === 1) {
                    $('.create-update-forum').modal('hide');
                    $('#create-update-form').html(res.view);

                    //                    $.pjax.reload({container: "#pjax-forum"});
                    window.location.reload();

                } else {
                    //                    $('#create-update-form').html(res.view);
                    window.location.reload();
                }
            },
            error: function(e) {
                console.log(e);
            }
        });
    });



    // inputField.value = option.selectedIndex;
    // console.log(inputField.value);
    <?php $this->registerJs(ob_get_clean()) ?>
    // <?php $forumCategory = new ForumCategory();
        // $forumCategory->name = "<script>writeln(inputField.value);</script>";
        // echo ($forumCategory->name);
        // $forumCategory->save();
        // 
        ?>
</script>