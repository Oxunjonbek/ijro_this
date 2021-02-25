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
                                <th class="width-350 text-center">Тизим ташкилотлари</th>
                                <th class="width-350 text-center">Фоизда</th>
                                <th class="width-150 text-center">Тадбир сони</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($company as $key => $value) :?>

                            <tr>
                                <td class="width-350 text-left">
                      <?php $id = $value->id; ?>
                                  <a href="<?=Url::to(['site/company','id' =>$id]) ?>" title=""><?=$value->company_name?></a></td>
<?php 
   $count = count(common\models\Tadbir::find()->where(['company_id'=>$value->id])->all());
                                  $calculate = count(common\models\Tadbir::find()->where(['company_id'=>$value->id,'tadbir_status'=>'bajarildi'])->all());
                        //           if ($calculate===0) {
                        //   $calculate = 1;
                        // }
                        if ($count===0) {
                          $count = 1;
                          $result = '0';
                        }else{
                          $result = round(($calculate/$count)*100 , 2);
                        }

// echo $calculate;
                                    // $result = round(($calculate/$count)*100 , 2);
                                    // echo $result;?>
                                <td class="width-350 text-center">
                                    <a href="<?=Url::to(['site/company','id' =>$id]) ?>" title=""><div class="progress m-0" style="height: 50px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:<?=$result ?>%" aria-valuenow="<?=$result ?>" aria-valuemin="0" aria-valuemax="100"><h3><?=$result ?>%</h3></div>
                                    </div></a>
                                </td>
                                <td class="width-350 text-center"> <a href="<?=Url::to(['site/company','id' =>$id]) ?>" title="">
<?php $count = count(common\models\Tadbir::find()->where(['company_id'=>$value->id])->all());
echo $count; ?></a>
                                  </td>
                            </tr>
                          <?php endforeach;?>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
          <!-- Project Overview -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

