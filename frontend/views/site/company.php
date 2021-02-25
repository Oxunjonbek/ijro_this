<?php

use yii\helpers\Html;
use backend\assets\robust\LoginAsset;
use  yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

// LoginAsset::register($this);
$tadbirlar = common\models\Tadbir::find()->all();
if (!empty($_GET)) {
    $company_id = $_GET['id'];
    // echo $company_id;
    // die();
    $tadbirlar = common\models\Tadbir::find()->where(['company_id'=>$company_id])->all();
    $companys = common\models\Company::find()->where(['id'=>$company_id])->all();
    // echo '<pre>';
    // print_r($tadbirlar);die();
}
// else{

//     $tadbirlar = common\models\Tadbir::find()->all();
// }

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
<?php foreach ($companys as $key => $company) : ?>

   <!-- UI components start -->
<div class="row" id="ui">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <!-- <h4 class="card-title"></h4> -->
                <h4 class="card-title text-center"><?=$company->company_name?>ни жорий қилиш ва ривожлантириш <br>бошқармасининг 2021 йил март-май ойлари учун ЙЎЛ ХАРИТАСИ</h4>
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
            //$tadbirlar = common\models\Tadbir::find()->where(['company_id'=>$company->id])->all(); ?>
            <div class="card-content collapse show">
                <div class="table-responsive">
                    <table class="table table-responsive table-bordered mb-10">
                       <thead>
                            <tr>
                                <th>Тадбир номи</th>
                                <th>Амалга ошириш механизми</th>
                                <th>Эришиладиган натижа ва кўрсаткичлар</th>
                                <th>Масуъллар</th>
                                <th>Муддати</th>
                                <th>Амалга оширилган ишлар</th>
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
                               <?=$tadbir->tadbir_result ?>
  </td>
  <td class="width-300 height-300 ">
                               <?=$tadbir->masullar ?>
  </td>
  <td class="width-50"><?=Yii::$app->formatter->format($tadbir->tadbir_date, 'date');  ?></td>
                                <td class="width-100"><?=$tadbir->tadbir_description ?></td>
                                
                                <td class="width-100">
                                   <?php if($tadbir->tadbir_status==="bajarildi"): ?>
                                    <button value="бажарилди" type="button" class="btn btn-success mr-1 mb-1">бажарилди</button>
                                    <?php elseif($tadbir->tadbir_status==="bajarilmadi"): ?>
                                    <button value="бажарилмади" type="button" class="btn btn-warning mr-1 mb-1">Муддати ўтиб ижро қилинган</button>
                                    <?php elseif($tadbir->tadbir_status==="ijroda"): ?>
                                    <button value="иш жараёнида" type="button" class="btn btn-secondary mr-1 mb-1">иш жараёнида</button>
                                  <?php elseif($tadbir->tadbir_status==="ijroda"): ?>
                                  <button value="ижрода" type="button" class="btn btn-warning mr-1 mb-1">ижрода</button>
                                  <?php elseif($tadbir->tadbir_status==="muddat"): ?>
                                  <button value="muddat" type="button" class="btn btn-danger mr-1 mb-1">Муддати ўтган</button>
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
<?php endforeach; ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

