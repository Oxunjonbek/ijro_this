<?php

use yii\helpers\Html;
use backend\assets\robust\LoginAsset;
use  yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

// LoginAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loaded">
<!-- BEGIN: Head-->
<head>
  <meta charset="<?= Yii::$app->charset ?>"/>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Muhammad Samadov">
  <?= Html::csrfMetaTags() ?>

  <link rel="apple-touch-icon" href="<?= bu('themes/robust/app-assets/images/ico/favicon.ico') ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?= bu('themes/robust/app-assets/images/ico/favicon.ico') ?>">

  <title><?= Html::encode($this->title) ?></title>

</head>


<body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page  pace-done"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<?php $this->beginBody() ?>
<!-- projects table with monthly chart -->
<div class="row">

    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ИЖРО НАЗОРАТИ</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <!-- <p class="m-0">Total ongoing projects 6<span class="float-right"><a href="project-summary.html" target="_blank">Project Summary <i class="ft-arrow-right"></i></a></span></p> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-10">
                        <thead>
                            <tr>
                                <th class="width-300">Бошқармалар,Бўлимлар,Тизим ташкилотлари</th>
                                
                                <!-- <th>Statusi</th> -->
                                <th class="width-350 text-center">Фоизда</th>
                                <th class="width-350 text-center">Тадбир сони</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($company as $key => $value) :?>

                            <tr>
                                <td class="width-350">

                                  <?=$value->company_name?></td>
                                  <?php $count = count(common\models\Tadbir::find()->where(['company_id'=>$value->id])->all());

                                  $calculate = count(common\models\Tadbir::find()->where(['company_id'=>$value->id,'tadbir_status'=>'bajarildi'])->all());
// echo $calculate;die();
                                  // $result = ($calculate/$count)*100;
                                  ?>
                                  <td class="valign-middle">
                                    <div class="progress m-0" style="height: 50px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="text-center"> 
                                    <?= $count; ?>
                                </td>
                            </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Project Overview -->
    <?php foreach ($company as $key => $com) : ?>
     <!-- UI components start -->
     <div class="row" id="ui">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
<h4 class="card-title text-center">Ахборот коммуникация технологияларини жорий қилиш ва ривожлантириш <br>бошқармасининг 2021 йил март-май ойлари учун ЙЎЛ ХАРИТАСИ</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <?php
                $tadbirlar = common\models\Tadbir::find()->where(['company_id'=>$com->id])->all(); ?>
                <div class="card-content collapse show">
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered mb-10">
                         <thead>
                            <tr>
                                <th>Тадбир номи</th>
                                <th>Амалга ошириш механизми</th>
                                <th>Эришиладиган натижа ва кўрсаткичлар</th>
                                <th>Муддати</th>
                                <th>Изох</th>
                                <th>Ижро ҳолати</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tadbirlar as $key => $tadbir) : ?>
                                <tr>

                                    <td class="width-300 height-300 ">

                                      <?=$tadbir->tadbir_name ?>
                                  </td>
                                  <td class="width-300 height-300 "> 
                                     <?=$tadbir->tadbir_content ?>
                                 </td>
                                 <td class="width-300 height-300 ">
                                     <?=$tadbir->tadbir_description ?>
                                 </td>
                                 <td class="width-300 height-300 ">
                                     <?=$tadbir->masullar ?>
                                 </td>
                                 <td class="width-50"><?=$tadbir->tadbir_date ?></td>
                                 <td class="width-100"><?=$tadbir->tadbir_result ?></td>

                                 <td class="width-100">
                                  <?php if($tadbir->tadbir_status==="bajarildi"): ?>
                                    <button value="бажарилди" type="button" class="btn btn-success mr-1 mb-1">бажарилди</button>
                                    <?php elseif($tadbir->tadbir_status==="bajarilmadi"): ?>
                                    <button value="бажарилмади" type="button" class="btn btn-danger mr-1 mb-1">Муддати ўтиб ижро қилинган</button>
                                    <?php elseif($tadbir->tadbir_status==="ijroda"): ?>
                                    <button value="иш жараёнида" type="button" class="btn btn-primary mr-1 mb-1">иш жараёнида</button>
                                  <?php elseif($tadbir->tadbir_status==="ijroda"): ?>
                                  <button value="ижрода" type="button" class="btn btn-warning mr-1 mb-1">ижрода</button>
                                  <?php endif; ?>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- UI components end -->
<?php endforeach;?>
<!--/ Project Overview -->
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

