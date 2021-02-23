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
                <h4 class="card-title">IJRO NAZORATI</h4>
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
                                <th>Tashkilotlar</th>
                                <!-- <th>Ma`sul</th>
                                <th>Statusi</th> -->
                                <th>Foizda</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($company as $key => $value) :?>

                            <tr>
                                <td class="text-truncate">

                                  <?=$value->company_name?></td>
                                
                                <td class="valign-middle">
                                    <div class="progress m-0" style="height: 50px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
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
                <h4 class="card-title"><?=$com->company_name?></h4>
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
                        <tbody><?php foreach ($tadbirlar as $key => $tadbir) : ?>
                            <tr>
                              <td>
                                  <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Тадбир номи</h4>
                    <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <p class="card-text"><?=$tadbir->tadbir_name ?></p>
                        <div class="chart-container">
                            <div id="bar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </td>
                              <td> <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Амалга ошириш механизми</h4>
                    <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <p class="card-text"><?=$tadbir->tadbir_content ?></p>
                        <div class="chart-container">
                            <div id="bar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </td>
                              <td>
                                <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Эришиладиган натижа ва кўрсаткичлар</h4>
                    <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <p class="card-text"><?=$tadbir->tadbir_description ?></p>
                        <div class="chart-container">
                            <div id="bar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </td>
  <td class="width-200"><?=$tadbir->tadbir_date ?></td>
                                <td class="width-200">x<?=$tadbir->tadbir_result ?></td>
                                
                                <td class="width-350">
                                    <button type="button" class="btn btn-success mr-1 mb-1"><?=$tadbir->tadbir_status ?></button>
                                </td>
                                
                            </tr>
                          <?php endforeach; ?>
                            <!-- <tr>
                                <td>Round Buttons</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-round mr-1 mb-1">Default Buttons</button>
                                </td>
                                <td>Use <code>.btn-round</code> class to button for Round Buttons.</td>
                            </tr>
                            <tr>
                                <td>Button dropdowns</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle mr-1 mb-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </td>
                                <td>Turn a button into a dropdown toggle with some basic markup changes.</td>
                            </tr>
                            <tr>
                                <td>Basic Button group</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary">Primary</button>
                                        <button type="button" class="btn btn-success">Success</button>
                                        <button type="button" class="btn btn-warning">Warning</button>
                                    </div>
                                </td>
                                <td>Group a series of buttons together on a single line with the button group. Wrap a series of buttons with <code>.btn</code> in <code>.btn-group.</code></td>
                            </tr>
                            <tr>
                                <td>Buttons with Icon</td>
                                <td>
                                    <button type="button" class="btn btn-info mr-1 mb-1"><i class="ft-info"></i> Info</button>
                                </td>
                                <td>Bootstrap includes six predefined button styles, each serving its own semantic purpose.</td>
                            </tr>
                            <tr>
                                <td>Icon Button</td>
                                <td>
                                    <button type="button" class="btn btn-icon btn-success mr-1"><i class="ft-camera"></i></button>
                                </td>
                                <td>Simple Icon Button</td>
                            </tr>
                            <tr>
                                <td>Floating Buttons</td>
                                <td>
                                    <button type="button" class="btn btn-float btn-info"><i class="ft-search"></i><span>search</span></button>
                                </td>
                                <td>Floating action buttons are used for a special type of promoted action. They are distinguished by a circled icon floating above the UI and have special motion behaviors related to morphing, launching, and the transferring anchor point.
                                    <p>
                                        Use the class <code>.btn</code> along with class <code>.btn-floating</code></p> .</td>
                            </tr>
                            <tr>
                                <td>Loading Buttons</td>
                                <td>
                                    <button class="btn btn-primary mr-1 mb-1 ladda-button" data-style="expand-up"><span class="ladda-label">Expand UP</span></button>
                                </td>
                                <td>Expand Animation Buttons</td>
                            </tr> -->
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

