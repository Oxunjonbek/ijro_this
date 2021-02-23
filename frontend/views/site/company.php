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
<div class="content-body"><!-- project stats -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                        <div class="p-1 text-center">
                            <div>
                                <h3 class="font-large-1 grey darken-1 text-bold-400">$84,962</h3>
                                <span class="font-small-3 grey darken-1">Monthly Profit</span>
                            </div>
                            <div class="card-content overflow-hidden">
                                <div id="morris-comments" class="height-75"></div>
                                <ul class="list-inline clearfix mb-0">
                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                        <h3 class="success text-bold-400">$8,200</h3>
                                        <span class="font-small-3 grey darken-1"><i class="ft-chevron-up success"></i> Today</span>
                                    </li>
                                    <li class="pl-2">
                                        <h3 class="success text-bold-400">$5,400</h3>
                                        <span class="font-small-3 grey darken-1"><i class="ft-chevron-down success"></i> Yesterday</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                        <div class="p-1 text-center">
                            <div>
                                <h3 class="font-large-1 grey darken-1 text-bold-400">1,879</h3>
                                <span class="font-small-3 grey darken-1">Total Sales</span>
                            </div>
                            <div class="card-content overflow-hidden">
                                <div id="morris-likes" class="height-75"></div>
                                <ul class="list-inline clearfix mb-0">
                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                        <h3 class="primary text-bold-400">4789</h3>
                                        <span class="font-small-3 grey darken-1"><i class="ft-chevron-up primary"></i> Today</span>
                                    </li>
                                    <li class="pl-2">
                                        <h3 class="primary text-bold-400">389</h3>
                                        <span class="font-small-3 grey darken-1"><i class="ft-chevron-down primary"></i> Yesterday</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="p-1 text-center">
                            <div>
                                <h3 class="font-large-1 grey darken-1 text-bold-400">894</h3>
                                <span class="font-small-3 grey darken-1">Support Tickets</span>
                            </div>
                            <div class="card-content overflow-hidden">
                                <div id="morris-views" class="height-75"></div>
                                <ul class="list-inline clearfix mb-0">
                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                        <h3 class="danger text-bold-400">81</h3>
                                        <span class="font-small-3 grey darken-1"><i class="ft-chevron-up danger"></i> Critical</span>
                                    </li>
                                    <li class="pl-2">
                                        <h3 class="danger text-bold-400">498</h3>
                                        <span class="font-small-3 grey darken-1"><i class="ft-chevron-down danger"></i> Low</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ project charts -->
<div class="row match-height">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-content">
                <ul class="list-inline text-center pt-2 m-0">
                    <li class="mr-1">
                        <h6><i class="ft-circle warning"></i> <span class="grey darken-1">Remaining</span></h6>
                    </li>
                    <li class="mr-1">
                        <h6><i class="ft-circle success"></i> <span class="grey darken-1">Completed</span></h6>
                    </li>
                </ul>
                <div class="chartjs height-250">
                    <canvas id="line-stacked-area" height="250"></canvas>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-3 text-center">
                        <span class="text-muted">Total Projects</span>
                        <h2 class="block font-weight-normal">18</h2>
                        <div class="progress mt-2" style="height: 7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-3 text-center">
                        <span class="text-muted">Total Task</span>
                        <h2 class="block font-weight-normal">125</h2>
                        <div class="progress mt-2" style="height: 7px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-3 text-center">
                        <span class="text-muted">Completed Task</span>
                        <h2 class="block font-weight-normal">242</h2>
                        <div class="progress mt-2" style="height: 7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-3 text-center">
                        <span class="text-muted">Total Revenue</span>
                        <h2 class="block font-weight-normal">$11,582</h2>
                        <div class="progress mt-2" style="height: 7px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card  card-inverse bg-primary">
            <div class="card-content">
                <div class="card-body sales-growth-chart">
                    <div class="chart-title mb-1 text-center">
                        <span class="white">Total monthly Sales.</span>
                    </div>
                    <div id="monthly-sales" class="height-250"></div>
                </div>
            </div>
            <div class="card-footer text-center">
                <div class="chart-stats mt-1 white">
                    <a href="#" class="btn bg-primary bg-darken-3 mr-1 white">Statistics <i class="ft-bar-chart"></i></a> for the last year.
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ project charts -->

<!--project health, featured & chart-->
<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body text-center">
                    <div class="card-header mb-2">
                        <span class="success darken-1">Total Budget</span>
                        <h3 class="font-large-2 grey darken-1 text-bold-200">$24,879</h3>
                    </div>
                    <div class="card-content">
                        <input type="text" value="75" class="knob hide-value responsive angle-offset" data-angleOffset="0" data-thickness=".15" data-linecap="round" data-width="150" data-height="150" data-inputColor="#e1e1e1" data-readOnly="true" data-fgColor="#37BC9B" data-knob-icon="ft-trending-up">
                        <ul class="list-inline clearfix mt-2 mb-0">
                            <li class="border-right-grey border-right-lighten-2 pr-2">
                                <h2 class="grey darken-1 text-bold-400">75%</h2>
                                <span class="success">Completed</span>
                            </li>
                            <li class="pl-2">
                                <h2 class="grey darken-1 text-bold-400">25%</h2>
                                <span class="danger">Remaining</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="card white bg-warning text-center">
            <div class="card-content">
                <div class="card-body">
                    <img src="<?= bu('themes/robust/app-assets/images/elements/04.png')?>" alt="element 05" height="170" class="mb-1">
                    <h4 class="card-title white">Storage Device</h4>
                    <p class="card-text white">945 items</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 bg-warning text-white media-body text-left rounded-left">
                        <h5 class="text-white">New Orders</h5>
                        <h5 class="text-white text-bold-400 mb-0">4,65,879</h5>
                    </div>
                    <div class="p-2 text-center bg-warning bg-darken-2 rounded-right">
                        <i class="icon-camera font-large-2 text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="card">
            <div class="card-content">
                <div class="media">
                    <div class="p-2 bg-warning white media-body">
                        <h5 class="white">New Orders</h5>
                        <h5 class="text-bold-400 white">4,65,879</h5>
                    </div>
                    <div class="p-2 text-center bg-warning bg-darken-2 media-left media-middle">
                        <i class="ft-shopping-cart font-large-2 white"></i>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="card card-inverse bg-info">
            <div class="card-content">
                <div class="position-relative">
                    <div class="chart-title position-absolute mt-2 ml-2 white">
                        <h1 class="font-large-2 text-bold-200 white">84%</h1>
                        <span>Employees Satisfied</span>
                    </div>
                    <canvas id="emp-satisfaction" class="height-400 block"></canvas>
                    <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-3 mr-3 white">
                        <a href="#" class="btn bg-info bg-darken-3 mr-1 white">Statistics <i class="ft-bar-chart"></i></a> for the last year.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- projects table with monthly chart -->
<div class="row">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ongoing Projects</h4>
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
                    <p class="m-0">Total ongoing projects 6<span class="float-right"><a href="project-summary.html" target="_blank">Project Summary <i class="ft-arrow-right"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Owner</th>
                                <th>Priority</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-truncate">ReactJS App</td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs"><img src="<?= bu('themes/robust/app-assets/images/portrait/small/avatar-s-4.png')?>" alt="avatar"></span> <span>Sarah W.</span>
                                </td>
                                <td class="text-truncate"><span class="tag tag-success">Low</span></td>
                                <td class="valign-middle">
                                    <div class="progress m-0" style="height: 7px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-truncate">Fitness App</td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs"><img src="<?= bu('themes/robust/app-assets/images/portrait/small/avatar-s-5.png')?>" alt="avatar"></span> <span>Edward C.</span>
                                </td>
                                <td class="text-truncate"><span class="tag tag-warning">Medium</span></td>
                                <td class="valign-middle">
                                    <div class="progress m-0" style="height: 7px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-truncate">SOU plugin</td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs"><img src="<?= bu('themes/robust/app-assets/images/portrait/small/avatar-s-6.png')?>" alt="avatar"></span> <span>Carol E.</span>
                                </td>
                                <td class="text-truncate"><span class="tag tag-danger">Critical</span></td>
                                <td class="valign-middle">
                                    <div class="progress m-0" style="height: 7px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-truncate">Android App</td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs"><img src="<?= bu('themes/robust/app-assets/images/portrait/small/avatar-s-7.png')?>" alt="avatar"></span> <span>Gregory L.</span>
                                </td>
                                <td class="text-truncate"><span class="tag tag-success">Low</span></td>
                                <td class="valign-middle">
                                    <div class="progress m-0" style="height: 7px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-truncate">ABC Inc. UI/UX</td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs"><img src="<?= bu('themes/robust/app-assets/images/portrait/small/avatar-s-8.png')?>" alt="avatar"></span> <span>Susan S.</span>
                                </td>
                                <td class="text-truncate"><span class="tag tag-warning">Medium</span></td>
                                <td class="valign-middle">
                                    <div class="progress m-0" style="height: 7px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-truncate">Product UI</td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs"><img src="<?= bu('themes/robust/app-assets/images/portrait/small/avatar-s-9.png')?>" alt="avatar"></span> <span>Walter K.</span>
                                </td>
                                <td class="text-truncate"><span class="tag tag-danger">Critical</span></td>
                                <td class="valign-middle">
                                    <div class="progress m-0" style="height: 7px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-content bg-success">
                <div class="card-body sales-growth-chart">
                    <div id="completed-project" class="height-250"></div>
                </div>
            </div>
            <div class="card-footer">
                <div class="chart-title">
                    <span class="text-muted">Total completed project and earning.</span>
                </div>
                <ul class="list-inline text-center clearfix mt-2 mb-0">
                    <li class="border-right-grey border-right-lighten-2 pr-1"><span class="text-muted">Completed Projects</span>
                        <h3 class="block">250</h3></li>
                    <li class="pl-2"><span class="text-muted">Total Earnings</span>
                        <h3 class="block">64.54 M</h3></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--/ projects table with monthly chart -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

