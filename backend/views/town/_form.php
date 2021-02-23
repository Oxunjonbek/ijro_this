<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\District;
use common\models\Grade;
use common\models\Gender;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\TimePicker;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use common\models\Town;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Town */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="town-form">


        <label>Viloyatni tanlang:</label>
    <?=Html::dropDownList('', NULL, [NULL => NULL] + \common\models\Region::all(), [
        'class' => 'form-control',
        'id' => 'region_id',
        'name' => ''
    ])
    ?>

    <label>Tumanni tanlang:</label>
    <?=DepDrop::widget([
        'name' => '',
        'id' => 'district_id',
        'options' => [
            'class' => 'form-control'
        ],
        'type' => DepDrop::TYPE_SELECT2,
        'select2Options' => ['pluginOptions' => ['allowClear' => false], 'theme' => Select2::THEME_BOOTSTRAP],
        'pluginOptions' => [
            'depends' => ['region_id'],
            'placeholder' => ' ',
            'initialize' => false,
                                    // ['allowClear'=>true],
            'url' => Url::to(['school/get-district-list'])
        ]
    ])
    ?>
     <label>Mavzeni tanlang:</label>
    <?=DepDrop::widget([
        'name' => 'town_id',
        'id' => 'town_id',
        'options' => [
            'class' => 'form-control'
        ],
        'type' => DepDrop::TYPE_SELECT2,
        'select2Options' => ['pluginOptions' => ['allowClear' => false], 'theme' => Select2::THEME_BOOTSTRAP],
        'pluginOptions' => [
            'depends' => ['district_id'],
            'placeholder' => ' ',
            'initialize' => false,
                                    // ['allowClear'=>true],
            'url' => Url::to(['school/town'])
        ]
    ])

    ?>
</div>

<label>Maktab</label>
    <div class="form-control">
<a href="<?=Url::to(['/school'])?>">Maktab</a>
</div>
<div class="form-control">

 <a href="<?=Url::to(['/school'])?>">Ota-Onalar</a>
</div>
<div class="form-control">

<a href="<?=Url::to(['/school'])?>">Ota-Onalar</a>
</div>
<div class="form-control">

<a href="<?=Url::to(['/school'])?>">Sinf</a>
</div>
</div>

