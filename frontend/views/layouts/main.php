<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

RobustAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">
<?php $this->beginBody() ?>
    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-primary navbar-shadow navbar-brand-center">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="../../../html/ltr/vertical-compact-menu-template/index.html"><img class="brand-logo" alt="robust admin logo" src="../../../app-assets/images/logo/logo-light-sm.png">
                <h3 class="brand-text">Robust Admin</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
              <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a>
                <ul class="mega-dropdown-menu dropdown-menu row">
                  <li class="col-md-2">
                    <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-newspaper-o"></i> News</h6>
                    <div id="mega-menu-carousel-example">
                      <div><img class="rounded img-fluid mb-1" src="../../../app-assets/images/slider/slider-2.png" alt="First slide"><a class="news-title mb-0" href="#">Poster Frame PSD</a>
                        <p class="news-content"><span class="font-small-2">January 26, 2018</span></p>
                      </div>
                    </div>
                  </li>
                  <li class="col-md-3">
                    <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-random"></i> Drill down menu</h6>
                    <ul class="drilldown-menu">
                      <li class="menu-list">
                        <ul>
                          <li><a class="dropdown-item" href="layout-2-columns.html"><i class="ft-file"></i> Page layouts & Templates</a></li>
                          <li><a href="#"><i class="ft-align-left"></i> Multi level menu</a>
                            <ul>
                              <li><a class="dropdown-item" href="#"><i class="fa fa-file-o"></i>  Second level</a></li>
                              <li><a href="#"><i class="fa fa-star-o"></i> Second level menu</a>
                                <ul>
                                  <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i>  Third level</a></li>
                                  <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Third level</a></li>
                                  <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Third level</a></li>
                                  <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Third level</a></li>
                                </ul>
                              </li>
                              <li><a class="dropdown-item" href="#"><i class="fa fa-film"></i> Second level, third link</a></li>
                              <li><a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Second level, fourth link</a></li>
                            </ul>
                          </li>
                          <li><a class="dropdown-item" href="color-palette-primary.html"><i class="ft-camera"></i> Color palette system</a></li>
                          <li><a class="dropdown-item" href="../../../starter-kit/ltr/vertical-menu-template/layout-2-columns.html"><i class="ft-edit"></i> Page starter kit</a></li>
                          <li><a class="dropdown-item" href="changelog.html"><i class="ft-minimize-2"></i> Change log</a></li>
                          <li><a class="dropdown-item" href="https://pixinvent.ticksy.com/"><i class="fa fa-life-ring"></i> Customer support center</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="col-md-3">
                    <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-list"></i> Accordion</h6>
                    <div id="accordionWrap" role="tablist" aria-multiselectable="true">
                      <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">
                        <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionOne" aria-expanded="true" aria-controls="accordionOne">Accordion Item #1</a></div>
                        <div class="card-collapse collapse show" id="accordionOne" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
                          <div class="card-content">
                            <p class="accordion-text text-small-3">Caramels dessert chocolate cake pastry jujubes bonbon. Jelly wafer jelly beans. Caramels chocolate cake liquorice cake wafer jelly beans croissant apple pie.</p>
                          </div>
                        </div>
                        <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap" href="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">Accordion Item #2</a></div>
                        <div class="card-collapse collapse" id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                          <div class="card-content">
                            <p class="accordion-text">Sugar plum bear claw oat cake chocolate jelly tiramisu dessert pie. Tiramisu macaroon muffin jelly marshmallow cake. Pastry oat cake chupa chups.</p>
                          </div>
                        </div>
                        <div class="card-header p-0 pb-2 border-0" id="headingThree" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap" href="#accordionThree" aria-expanded="false" aria-controls="accordionThree">Accordion Item #3</a></div>
                        <div class="card-collapse collapse" id="accordionThree" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                          <div class="card-content">
                            <p class="accordion-text">Candy cupcake sugar plum oat cake wafer marzipan jujubes lollipop macaroon. Cake dragée jujubes donut chocolate bar chocolate cake cupcake chocolate topping.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="col-md-4">
                    <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-envelope"></i> Contact Us</h6>
                    <form class="form form-horizontal">
                      <div class="form-body">
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label" for="inputName1">Name</label>
                          <div class="col-sm-9">
                            <div class="position-relative has-icon-left">
                              <input class="form-control" type="text" id="inputName1" placeholder="John Doe">
                              <div class="form-control-position pl-1"><i class="fa fa-user"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label" for="inputEmail1">Email</label>
                          <div class="col-sm-9">
                            <div class="position-relative has-icon-left">
                              <input class="form-control" type="email" id="inputEmail1" placeholder="john@example.com">
                              <div class="form-control-position pl-1"><i class="fa fa-envelope"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label" for="inputMessage1">Message</label>
                          <div class="col-sm-9">
                            <div class="position-relative has-icon-left">
                              <textarea class="form-control" id="inputMessage1" rows="2" placeholder="Simple Textarea"></textarea>
                              <div class="form-control-position pl-1"><i class="fa fa-comments"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 mb-1">
                            <button class="btn btn-info float-right" type="button"><i class="fa fa-paper-plane"></i> Send          </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>
              </li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                <div class="search-input">
                  <input class="input" type="text" placeholder="Explore Robust...">
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span>English</span><span class="selected-language"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a></div>
              </li>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                  </li>
                  <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">You have new order!</h6>
                          <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading red darken-1">99% Server load</h6>
                          <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                          <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Complete the task</h6><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Generate monthly report</h6><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail"></i><span class="badge badge-pill badge-default badge-info badge-default badge-up">5              </span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6><span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                  </li>
                  <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="../../../app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Margaret Govan</h6>
                          <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="../../../app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Bret Lezama</h6>
                          <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="../../../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Carie Berra</h6>
                          <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Eric Alsobrook</h6>
                          <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">John Doe</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="login-with-bg-image.html"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="index.html"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
            <ul class="menu-content">
              <li class="active"><a class="menu-item" href="dashboard-fitness.html" data-i18n="nav.dash.fitness">Fitness</a>
              </li>
              <li><a class="menu-item" href="dashboard-project.html" data-i18n="nav.dash.project">Project</a>
              </li>
              <li><a class="menu-item" href="dashboard-ecommerce.html" data-i18n="nav.dash.ecommerce">eCommerce</a>
              </li>
              <li><a class="menu-item" href="dashboard-analytics.html" data-i18n="nav.dash.analytics">Analytics</a>
              </li>
              <li><a class="menu-item" href="dashboard-crm.html" data-i18n="nav.dash.crm">CRM</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-note"></i><span class="menu-title" data-i18n="nav.templates.main">Templates</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">Vertical</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="../vertical-menu-template" data-i18n="nav.templates.vert.classic_menu">Classic Menu</a>
                  </li>
                  <li><a class="menu-item" href="../vertical-compact-menu-template" data-i18n="nav.templates.vert.compact_menu">Compact Menu</a>
                  </li>
                  <li><a class="menu-item" href="../vertical-content-menu-template" data-i18n="nav.templates.vert.content_menu">Content Menu</a>
                  </li>
                  <li><a class="menu-item" href="../vertical-overlay-menu-template" data-i18n="nav.templates.vert.overlay_menu">Overlay Menu</a>
                  </li>
                  <li><a class="menu-item" href="../vertical-multi-level-menu-template" data-i18n="nav.templates.vert.multi_level_menu">Multi-level Menu</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Horizontal</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="../horizontal-menu-template" data-i18n="nav.templates.horz.classic">Classic</a>
                  </li>
                  <li><a class="menu-item" href="../horizontal-top-icon-menu-template" data-i18n="nav.templates.horz.top_icon">Top Icon</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-drawer"></i><span class="menu-title" data-i18n="nav.layouts.temp">Layouts</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#" data-i18n="nav.page_layouts.main">Page layouts</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="layout-1-column.html" data-i18n="nav.page_layouts.1_column">1 column</a>
                  </li>
                  <li><a class="menu-item" href="layout-2-columns.html" data-i18n="nav.page_layouts.2_columns">2 columns</a>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.page_layouts.3_columns.main">Content Sidebar</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="layout-content-left-sidebar.html" data-i18n="nav.page_layouts.3_columns.left_sidebar">Left sidebar</a>
                      </li>
                      <li><a class="menu-item" href="layout-content-left-sticky-sidebar.html" data-i18n="nav.page_layouts.3_columns.left_sticky_sidebar">Left sticky sidebar</a>
                      </li>
                      <li><a class="menu-item" href="layout-content-right-sidebar.html" data-i18n="nav.page_layouts.3_columns.right_sidebar">Right sidebar</a>
                      </li>
                      <li><a class="menu-item" href="layout-content-right-sticky-sidebar.html" data-i18n="nav.page_layouts.3_columns.right_sticky_sidebar">Right sticky sidebar</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.page_layouts.3_columns_detached.main">Content Det. Sidebar</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="layout-content-detached-left-sidebar.html" data-i18n="nav.page_layouts.3_columns_detached.detached_left_sidebar">Detached left sidebar</a>
                      </li>
                      <li><a class="menu-item" href="layout-content-detached-left-sticky-sidebar.html" data-i18n="nav.page_layouts.3_columns_detached.detached_sticky_left_sidebar">Detached sticky left sidebar</a>
                      </li>
                      <li><a class="menu-item" href="layout-content-detached-right-sidebar.html" data-i18n="nav.page_layouts.3_columns_detached.detached_right_sidebar">Detached right sidebar</a>
                      </li>
                      <li><a class="menu-item" href="layout-content-detached-right-sticky-sidebar.html" data-i18n="nav.page_layouts.3_columns_detached.detached_sticky_right_sidebar">Detached sticky right sidebar</a>
                      </li>
                    </ul>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a class="menu-item" href="layout-fixed-navbar.html" data-i18n="nav.page_layouts.fixed_navbar">Fixed navbar</a>
                  </li>
                  <li><a class="menu-item" href="layout-fixed-navigation.html" data-i18n="nav.page_layouts.fixed_navigation">Fixed navigation</a>
                  </li>
                  <li><a class="menu-item" href="layout-fixed-navbar-navigation.html" data-i18n="nav.page_layouts.fixed_navbar_navigation">Fixed navbar &amp; navigation</a>
                  </li>
                  <li><a class="menu-item" href="layout-fixed-navbar-footer.html" data-i18n="nav.page_layouts.fixed_navbar_footer">Fixed navbar &amp; footer</a>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a class="menu-item" href="layout-fixed.html" data-i18n="nav.page_layouts.fixed_layout">Fixed layout</a>
                  </li>
                  <li><a class="menu-item" href="layout-boxed.html" data-i18n="nav.page_layouts.boxed_layout">Boxed layout</a>
                  </li>
                  <li><a class="menu-item" href="layout-static.html" data-i18n="nav.page_layouts.static_layout">Static layout</a>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a class="menu-item" href="layout-light.html" data-i18n="nav.page_layouts.light_layout">Light layout</a>
                  </li>
                  <li><a class="menu-item" href="layout-dark.html" data-i18n="nav.page_layouts.dark_layout">Dark layout</a>
                  </li>
                  <li><a class="menu-item" href="layout-semi-dark.html" data-i18n="nav.page_layouts.semi_dark_layout">Semi dark layout</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.navbars.main">Navbars</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="navbar-light.html" data-i18n="nav.navbars.nav_light">Navbar Light</a>
                  </li>
                  <li><a class="menu-item" href="navbar-dark.html" data-i18n="nav.navbars.nav_dark">Navbar Dark</a>
                  </li>
                  <li><a class="menu-item" href="navbar-semi-dark.html" data-i18n="nav.navbars.nav_semi">Navbar Semi Dark</a>
                  </li>
                  <li><a class="menu-item" href="navbar-brand-center.html" data-i18n="nav.navbars.nav_brand_center">Brand Center</a>
                  </li>
                  <li><a class="menu-item" href="navbar-fixed-top.html" data-i18n="nav.navbars.nav_fixed_top">Fixed Top</a>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.navbars.nav_hide_on_scroll.main">Hide on Scroll</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="navbar-hide-on-scroll-top.html" data-i18n="nav.navbars.nav_hide_on_scroll.nav_hide_on_scroll_top">Hide on Scroll Top</a>
                      </li>
                      <li><a class="menu-item" href="navbar-hide-on-scroll-bottom.html" data-i18n="nav.navbars.nav_hide_on_scroll.nav_hide_on_scroll_bottom">Hide on Scroll Bottom</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="navbar-components.html" data-i18n="nav.navbars.nav_components">Navbar Components</a>
                  </li>
                  <li><a class="menu-item" href="navbar-styling.html" data-i18n="nav.navbars.nav_styling">Navbar Styling</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.vertical_nav.main">Vertical Nav</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="#" data-i18n="nav.vertical_nav.vertical_navigation_types.main">Navigation Types</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="../vertical-menu-template" data-i18n="nav.vertical_nav.vertical_navigation_types.vertical_menu">Vertical Menu</a>
                      </li>
                      <li><a class="menu-item" href="../vertical-multi-level-menu-template" data-i18n="nav.vertical_nav.vertical_navigation_types.vertical_mmenu">Vertical MMenu</a>
                      </li>
                      <li><a class="menu-item" href="../vertical-overlay-menu-template" data-i18n="nav.vertical_nav.vertical_navigation_types.vertical_overlay">Vertical Overlay</a>
                      </li>
                      <li><a class="menu-item" href="../vertical-compact-menu-template" data-i18n="nav.vertical_nav.vertical_navigation_types.vertical_compact">Vertical Compact</a>
                      </li>
                      <li><a class="menu-item" href="../vertical-content-menu-template" data-i18n="nav.vertical_nav.vertical_navigation_types.vertical_content">Vertical Content</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-fixed.html" data-i18n="nav.vertical_nav.vertical_nav_fixed">Fixed Navigation</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-static.html" data-i18n="nav.vertical_nav.vertical_nav_static">Static Navigation</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-light.html" data-i18n="nav.vertical_nav.vertical_nav_light">Navigation Light</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-dark.html" data-i18n="nav.vertical_nav.vertical_nav_dark">Navigation Dark</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-accordion.html" data-i18n="nav.vertical_nav.vertical_nav_accordion">Accordion Navigation</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-collapsible.html" data-i18n="nav.vertical_nav.vertical_nav_collapsible">Collapsible Navigation</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-flipped.html" data-i18n="nav.vertical_nav.vertical_nav_flipped">Flipped Navigation</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-native-scroll.html" data-i18n="nav.vertical_nav.vertical_nav_native_scroll">Native scroll</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-right-side-icon.html" data-i18n="nav.vertical_nav.vertical_nav_right_side_icon">Right side icons</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-bordered.html" data-i18n="nav.vertical_nav.vertical_nav_bordered">Bordered Navigation</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-disabled-link.html" data-i18n="nav.vertical_nav.vertical_nav_disabled_link">Disabled Navigation</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-styling.html" data-i18n="nav.vertical_nav.vertical_nav_styling">Navigation Styling</a>
                  </li>
                  <li><a class="menu-item" href="vertical-nav-badge-pills.html" data-i18n="nav.vertical_nav.vertical_nav_badge_pills">Badge &amp; Pills</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.horz_nav.main">Horizontal Nav</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="#" data-i18n="nav.horz_nav.horizontal_navigation_types.main">Navigation Types</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="../horizontal-menu-template" data-i18n="nav.horz_nav.horizontal_navigation_types.horizontal_left_icon_navigation">Left Icon Navigation</a>
                      </li>
                      <li><a class="menu-item" href="../horizontal-top-icon-menu-template" data-i18n="nav.horz_nav.horizontal_navigation_types.horizontal_top_icon_navigation">Top Icon Navigation</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.page_headers.main">Page Headers</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="headers-breadcrumbs-basic.html" data-i18n="nav.page_headers.headers_breadcrumbs_basic">Breadcrumbs basic</a>
                  </li>
                  <li><a class="menu-item" href="headers-breadcrumbs-top.html" data-i18n="nav.page_headers.headers_breadcrumbs_top">Breadcrumbs top</a>
                  </li>
                  <li><a class="menu-item" href="headers-breadcrumbs-bottom.html" data-i18n="nav.page_headers.headers_breadcrumbs_bottom">Breadcrumbs bottom</a>
                  </li>
                  <li><a class="menu-item" href="headers-breadcrumbs-top-with-description.html" data-i18n="nav.page_headers.headers_breadcrumbs_top_with_description">Breadcrumbs top with desc</a>
                  </li>
                  <li><a class="menu-item" href="headers-breadcrumbs-with-button.html" data-i18n="nav.page_headers.headers_breadcrumbs_with_button">Breadcrumbs with button</a>
                  </li>
                  <li><a class="menu-item" href="headers-breadcrumbs-with-round-button.html" data-i18n="nav.page_headers.headers_breadcrumbs_with_round_button">Breadcrumbs with button 2</a>
                  </li>
                  <li><a class="menu-item" href="headers-breadcrumbs-with-button-group.html" data-i18n="nav.page_headers.headers_breadcrumbs_with_button_group">Breadcrumbs with buttons</a>
                  </li>
                  <li><a class="menu-item" href="headers-breadcrumbs-with-description.html" data-i18n="nav.page_headers.headers_breadcrumbs_breadcrumbs_with_description">Breadcrumbs with desc</a>
                  </li>
                  <li><a class="menu-item" href="headers-breadcrumbs-with-search.html" data-i18n="nav.page_headers.headers_breadcrumbs_breadcrumbs_with_search">Breadcrumbs with search</a>
                  </li>
                  <li><a class="menu-item" href="headers-breadcrumbs-with-stats.html" data-i18n="nav.page_headers.headers_breadcrumbs_breadcrumbs_with_stats">Breadcrumbs with stats</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.footers.main">Footers</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="footer-light.html" data-i18n="nav.footers.footer_light">Footer Light</a>
                  </li>
                  <li><a class="menu-item" href="footer-dark.html" data-i18n="nav.footers.footer_dark">Footer Dark</a>
                  </li>
                  <li><a class="menu-item" href="footer-transparent.html" data-i18n="nav.footers.footer_transparent">Footer Transparent</a>
                  </li>
                  <li><a class="menu-item" href="footer-fixed.html" data-i18n="nav.footers.footer_fixed">Footer Fixed</a>
                  </li>
                  <li><a class="menu-item" href="footer-components.html" data-i18n="nav.footers.footer_components">Footer Components</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-folder"></i><span class="menu-title" data-i18n="nav.category.general">General</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#" data-i18n="nav.color_palette.main">Color Palette</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="color-palette-primary.html" data-i18n="nav.color_palette.color_palette_primary">Primary palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-danger.html" data-i18n="nav.color_palette.color_palette_danger">Danger palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-success.html" data-i18n="nav.color_palette.color_palette_success">Success palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-warning.html" data-i18n="nav.color_palette.color_palette_warning">Warning palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-info.html" data-i18n="nav.color_palette.color_palette_info">Info palette</a>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a class="menu-item" href="color-palette-red.html" data-i18n="nav.color_palette.color_palette_red">Red palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-pink.html" data-i18n="nav.color_palette.color_palette_pink">Pink palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-purple.html" data-i18n="nav.color_palette.color_palette_purple">Purple palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-deep-purple.html" data-i18n="nav.color_palette.color_palette_deep_purple">Deep Purple palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-indigo.html" data-i18n="nav.color_palette.color_palette_indigo">Indigo palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-blue.html" data-i18n="nav.color_palette.color_palette_blue">Blue palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-light-blue.html" data-i18n="nav.color_palette.color_palette_light_blue">Light Blue palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-cyan.html" data-i18n="nav.color_palette.color_palette_cyan">Cyan palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-teal.html" data-i18n="nav.color_palette.color_palette_teal">Teal palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-green.html" data-i18n="nav.color_palette.color_palette_green">Green palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-light-green.html" data-i18n="nav.color_palette.color_palette_light_green">Light Green palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-lime.html" data-i18n="nav.color_palette.color_palette_lime">Lime palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-yellow.html" data-i18n="nav.color_palette.color_palette_yellow">Yellow palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-amber.html" data-i18n="nav.color_palette.color_palette_amber">Amber palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-orange.html" data-i18n="nav.color_palette.color_palette_orange">Orange palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-deep-orange.html" data-i18n="nav.color_palette.color_palette_deep_orange">Deep Orange palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-brown.html" data-i18n="nav.color_palette.color_palette_brown">Brown palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-blue-grey.html" data-i18n="nav.color_palette.color_palette_blue_grey">Blue Grey palette</a>
                  </li>
                  <li><a class="menu-item" href="color-palette-grey.html" data-i18n="nav.color_palette.color_palette_grey">Grey palette</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.starter_kit.main">Starter kit</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-1-column.html" data-i18n="nav.starter_kit.1_column">1 column</a>
                  </li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-2-columns.html" data-i18n="nav.starter_kit.2_columns">2 columns</a>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.starter_kit.3_columns.main">Content Sidebar</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-content-left-sidebar.html" data-i18n="nav.starter_kit.3_columns.3_columns_left_sidebar">Left sidebar</a>
                      </li>
                      <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-content-left-sticky-sidebar.html" data-i18n="nav.starter_kit.3_columns.3_columns_left_sticky_sidebar">Left sticky sidebar</a>
                      </li>
                      <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-content-right-sidebar.html" data-i18n="nav.starter_kit.3_columns.3_columns_right_sidebar">Right sidebar</a>
                      </li>
                      <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-content-right-sticky-sidebar.html" data-i18n="nav.starter_kit.3_columns.3_columns_right_sticky_sidebar">Right sticky sidebar</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.starter_kit.3_columns_detached.main">Content Det. Sidebar</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-content-detached-left-sidebar.html" data-i18n="nav.starter_kit.3_columns_detached.3_columns_detached_left_sidebar">Detached left sidebar</a>
                      </li>
                      <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-content-detached-left-sticky-sidebar.html" data-i18n="nav.starter_kit.3_columns_detached.3_columns_detached_sticky_left_sidebar">Detached sticky left sidebar</a>
                      </li>
                      <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-content-detached-right-sidebar.html" data-i18n="nav.starter_kit.3_columns_detached.3_columns_detached_right_sidebar">Detached right sidebar</a>
                      </li>
                      <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-content-detached-right-sticky-sidebar.html" data-i18n="nav.starter_kit.3_columns_detached.3_columns_detached_sticky_right_sidebar">Detached sticky right sidebar</a>
                      </li>
                    </ul>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-fixed-navbar.html" data-i18n="nav.starter_kit.fixed_navbar">Fixed navbar</a>
                  </li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-fixed-navigation.html" data-i18n="nav.starter_kit.fixed_navigation">Fixed navigation</a>
                  </li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-fixed-navbar-navigation.html" data-i18n="nav.starter_kit.fixed_navbar_navigation">Fixed navbar &amp; navigation</a>
                  </li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-fixed-navbar-footer.html" data-i18n="nav.starter_kit.fixed_navbar_footer">Fixed navbar &amp; footer</a>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-fixed.html" data-i18n="nav.starter_kit.fixed_layout">Fixed layout</a>
                  </li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-boxed.html" data-i18n="nav.starter_kit.boxed_layout">Boxed layout</a>
                  </li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-static.html" data-i18n="nav.starter_kit.static_layout">Static layout</a>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-light.html" data-i18n="nav.starter_kit.light_layout">Light layout</a>
                  </li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-dark.html" data-i18n="nav.starter_kit.dark_layout">Dark layout</a>
                  </li>
                  <li><a class="menu-item" href="../../../starter-kit/ltr/vertical-compact-menu-template/layout-semi-dark.html" data-i18n="nav.starter_kit.semi_dark_layout">Semi dark layout</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="changelog.html" data-i18n="nav.changelog.main">Changelog</a>
              </li>
              <li class="disabled"><a class="menu-item" href="#" data-i18n="nav.disabled_menu.main">Disabled Menu</a>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.menu_levels.main">Menu levels</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="#" data-i18n="nav.menu_levels.second_level">Second level</a>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.menu_levels.second_level_child.main">Second level child</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="#" data-i18n="nav.menu_levels.second_level_child.third_level">Third level</a>
                      </li>
                      <li><a class="menu-item" href="#" data-i18n="nav.menu_levels.second_level_child.third_level_child.main">Third level child</a>
                        <ul class="menu-content">
                          <li><a class="menu-item" href="#" data-i18n="nav.menu_levels.second_level_child.third_level_child.fourth_level1">Fourth level</a>
                          </li>
                          <li><a class="menu-item" href="#" data-i18n="nav.menu_levels.second_level_child.third_level_child.fourth_level2">Fourth level</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-screen-tablet"></i><span class="menu-title" data-i18n="nav.category.pages">Pages</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="email-application.html" data-i18n="nav.email-application.main">Email Application</a>
              </li>
              <li><a class="menu-item" href="chat-application.html" data-i18n="nav.chat-application.main">Chat Application</a>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.project.main">Project</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="project-summary.html" data-i18n="nav.project.project_summary">Project Summary</a>
                  </li>
                  <li><a class="menu-item" href="project-tasks.html" data-i18n="nav.project.project_tasks">Project Task</a>
                  </li>
                  <li><a class="menu-item" href="project-bugs.html" data-i18n="nav.project.project_bugs">Project Bugs</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="scrumboard.html" data-i18n="nav.scrumboard.main">Scrumboard</a>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.invoice.main">Invoice</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="invoice-summary.html" data-i18n="nav.invoice.invoice_summary">Invoice Summary</a>
                  </li>
                  <li><a class="menu-item" href="invoice-template.html" data-i18n="nav.invoice.invoice_template">Invoice Template</a>
                  </li>
                  <li><a class="menu-item" href="invoice-list.html" data-i18n="nav.invoice.invoice_list">Invoice List</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="page-checkout.html" data-i18n="nav.page-checkout">Checkout page</a>
              </li>
              <li><a class="menu-item" href="page-pricing.html" data-i18n="nav.page-pricing">Pricing page</a>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.timelines.main">Timelines</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="timeline-center.html" data-i18n="nav.timelines.timeline_center">Timelines Center</a>
                  </li>
                  <li><a class="menu-item" href="timeline-left.html" data-i18n="nav.timelines.timeline_left">Timelines Left</a>
                  </li>
                  <li><a class="menu-item" href="timeline-right.html" data-i18n="nav.timelines.timeline_right">Timelines Right</a>
                  </li>
                  <li><a class="menu-item" href="timeline-horizontal.html" data-i18n="nav.timelines.timeline_horizontal">Timelines Horizontal</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.users.main">Users</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="user-profile.html" data-i18n="nav.users.user_profile">Users Profile</a>
                  </li>
                  <li><a class="menu-item" href="user-cards.html" data-i18n="nav.users.user_cards">Users Cards</a>
                  </li>
                  <li><a class="menu-item" href="users-contacts.html" data-i18n="nav.users.users_contacts">Users List</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.gallery_pages.main">Gallery</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="gallery-grid.html" data-i18n="nav.gallery_pages.gallery_grid">Gallery Grid</a>
                  </li>
                  <li><a class="menu-item" href="gallery-grid-with-desc.html" data-i18n="nav.gallery_pages.gallery_grid_with_desc">Gallery Grid with Desc</a>
                  </li>
                  <li><a class="menu-item" href="gallery-masonry.html" data-i18n="nav.gallery_pages.gallery_masonry">Masonry Gallery</a>
                  </li>
                  <li><a class="menu-item" href="gallery-masonry-with-desc.html" data-i18n="nav.gallery_pages.gallery_masonry_with_desc">Masonry Gallery with Desc</a>
                  </li>
                  <li><a class="menu-item" href="gallery-hover-effects.html" data-i18n="nav.gallery_pages.gallery_hover_effects">Hover Effects</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.search_pages.main">Search</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="search-page.html" data-i18n="nav.search_pages.search_page">Search Page</a>
                  </li>
                  <li><a class="menu-item" href="search-website.html" data-i18n="nav.search_pages.search_website">Search Website</a>
                  </li>
                  <li><a class="menu-item" href="search-images.html" data-i18n="nav.search_pages.search_images">Search Images</a>
                  </li>
                  <li><a class="menu-item" href="search-videos.html" data-i18n="nav.search_pages.search_videos">Search Videos</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.login_register_pages.main">Authentication</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="login-simple.html" data-i18n="nav.login_register_pages.login_simple">Login Simple</a>
                  </li>
                  <li><a class="menu-item" href="login-with-bg.html" data-i18n="nav.login_register_pages.login_with_bg">Login with Bg</a>
                  </li>
                  <li><a class="menu-item" href="login-with-bg-image.html" data-i18n="nav.login_register_pages.login_with_bg_image">Login with Bg Image</a>
                  </li>
                  <li><a class="menu-item" href="login-with-navbar.html" data-i18n="nav.login_register_pages.login_with_navbar">Login with Navbar</a>
                  </li>
                  <li><a class="menu-item" href="login-advanced.html" data-i18n="nav.login_register_pages.login_advanced">Login Advanced</a>
                  </li>
                  <li><a class="menu-item" href="register-simple.html" data-i18n="nav.login_register_pages.register_simple">Register Simple</a>
                  </li>
                  <li><a class="menu-item" href="register-with-bg.html" data-i18n="nav.login_register_pages.register_with_bg">Register with Bg</a>
                  </li>
                  <li><a class="menu-item" href="register-with-bg-image.html" data-i18n="nav.login_register_pages.register_with_bg_image">Register with Bg Image</a>
                  </li>
                  <li><a class="menu-item" href="register-with-navbar.html" data-i18n="nav.login_register_pages.register_with_navbar">Register with Navbar</a>
                  </li>
                  <li><a class="menu-item" href="register-advanced.html" data-i18n="nav.login_register_pages.register_advanced">Register Advanced</a>
                  </li>
                  <li><a class="menu-item" href="unlock-user.html" data-i18n="nav.login_register_pages.unlock_user">Unlock User</a>
                  </li>
                  <li><a class="menu-item" href="recover-password.html" data-i18n="nav.login_register_pages.recover_password">Recover Password</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.error_pages.main">Error</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="error-400.html" data-i18n="nav.error_pages.error_400">Error 400</a>
                  </li>
                  <li><a class="menu-item" href="error-400-with-navbar.html" data-i18n="nav.error_pages.error_400_with_navbar">Error 400 with Navbar</a>
                  </li>
                  <li><a class="menu-item" href="error-401.html" data-i18n="nav.error_pages.error_401">Error 401</a>
                  </li>
                  <li><a class="menu-item" href="error-401-with-navbar.html" data-i18n="nav.error_pages.error_401_with_navbar">Error 401 with Navbar</a>
                  </li>
                  <li><a class="menu-item" href="error-403.html" data-i18n="nav.error_pages.error_403">Error 403</a>
                  </li>
                  <li><a class="menu-item" href="error-403-with-navbar.html" data-i18n="nav.error_pages.error_403_with_navbar">Error 403 with Navbar</a>
                  </li>
                  <li><a class="menu-item" href="error-404.html" data-i18n="nav.error_pages.error_404">Error 404</a>
                  </li>
                  <li><a class="menu-item" href="error-404-with-navbar.html" data-i18n="nav.error_pages.error_404_with_navbar">Error 404 with Navbar</a>
                  </li>
                  <li><a class="menu-item" href="error-500.html" data-i18n="nav.error_pages.error_500">Error 500</a>
                  </li>
                  <li><a class="menu-item" href="error-500-with-navbar.html" data-i18n="nav.error_pages.error_500_with_navbar">Error 500 with Navbar</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.other_pages.main">Others</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="#" data-i18n="nav.other_pages.coming_soon.main">Coming Soon</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="coming-soon-flat.html" data-i18n="nav.other_pages.coming_soon.coming_soon_flat">Flat</a>
                      </li>
                      <li><a class="menu-item" href="coming-soon-bg-image.html" data-i18n="nav.other_pages.coming_soon.coming_soon_bg_image">Bg image</a>
                      </li>
                      <li><a class="menu-item" href="coming-soon-bg-video.html" data-i18n="nav.other_pages.coming_soon.coming_soon_bg_video">Bg video</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="under-maintenance.html" data-i18n="nav.other_pages.under_maintenance">Maintenance</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-screen-desktop"></i><span class="menu-title" data-i18n="nav.category.ui">UI</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#" data-i18n="nav.cards.main">Cards</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="card-bootstrap.html" data-i18n="nav.cards.card_bootstrap">Bootstrap</a>
                  </li>
                  <li><a class="menu-item" href="card-headings.html" data-i18n="nav.cards.card_headings">Headings</a>
                  </li>
                  <li><a class="menu-item" href="card-options.html" data-i18n="nav.cards.card_options">Options</a>
                  </li>
                  <li><a class="menu-item" href="card-actions.html" data-i18n="nav.cards.card_actions">Action</a>
                  </li>
                  <li><a class="menu-item" href="card-draggable.html" data-i18n="nav.cards.card_draggable">Draggable</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.advance_cards.main">Advance Cards</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="card-statistics.html" data-i18n="nav.cards.card_statistics">Statistics</a>
                  </li>
                  <li><a class="menu-item" href="card-weather.html" data-i18n="nav.cards.card_weather">Weather</a>
                  </li>
                  <li><a class="menu-item" href="card-charts.html" data-i18n="nav.cards.card_charts">Charts</a>
                  </li>
                  <li><a class="menu-item" href="card-interactive.html" data-i18n="nav.cards.card_interactive">Interactive</a>
                  </li>
                  <li><a class="menu-item" href="card-maps.html" data-i18n="nav.cards.card_maps">Maps</a>
                  </li>
                  <li><a class="menu-item" href="card-social.html" data-i18n="nav.cards.card_social">Social</a>
                  </li>
                  <li><a class="menu-item" href="card-ecommerce.html" data-i18n="nav.cards.card_ecommerce">E-Commerce</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.content.main">Content</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="content-grid.html" data-i18n="nav.content.content_grid">Grid</a>
                  </li>
                  <li><a class="menu-item" href="content-typography.html" data-i18n="nav.content.content_typography">Typography</a>
                  </li>
                  <li><a class="menu-item" href="content-text-utilities.html" data-i18n="nav.content.content_text_utilities">Text utilities</a>
                  </li>
                  <li><a class="menu-item" href="content-syntax-highlighter.html" data-i18n="nav.content.content_syntax_highlighter">Syntax highlighter</a>
                  </li>
                  <li><a class="menu-item" href="content-helper-classes.html" data-i18n="nav.content.content_helper_classes">Helper classes</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.components.main">Components</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="component-alerts.html" data-i18n="nav.components.component_alerts">Alerts</a>
                  </li>
                  <li><a class="menu-item" href="component-callout.html" data-i18n="nav.components.component_callout">Callout</a>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.components.components_buttons.main">Buttons</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="component-buttons-basic.html" data-i18n="nav.components.components_buttons.component_buttons_basic">Basic Buttons</a>
                      </li>
                      <li><a class="menu-item" href="component-buttons-extended.html" data-i18n="nav.components.components_buttons.component_buttons_extended">Extended Buttons</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="component-carousel.html" data-i18n="nav.components.component_carousel">Carousel</a>
                  </li>
                  <li><a class="menu-item" href="component-collapse.html" data-i18n="nav.components.component_collapse">Collapse</a>
                  </li>
                  <li><a class="menu-item" href="component-dropdowns.html" data-i18n="nav.components.component_dropdowns">Dropdowns</a>
                  </li>
                  <li><a class="menu-item" href="component-list-group.html" data-i18n="nav.components.component_list_group">List Group</a>
                  </li>
                  <li><a class="menu-item" href="component-modals.html" data-i18n="nav.components.component_modals">Modals</a>
                  </li>
                  <li><a class="menu-item" href="component-pagination.html" data-i18n="nav.components.component_pagination">Pagination</a>
                  </li>
                  <li><a class="menu-item" href="component-navs-component.html" data-i18n="nav.components.component_navs_component">Navs Component</a>
                  </li>
                  <li><a class="menu-item" href="component-tabs-component.html" data-i18n="nav.components.component_tabs_component">Tabs Component</a>
                  </li>
                  <li><a class="menu-item" href="component-pills-component.html" data-i18n="nav.components.component_pills_component">Pills Component</a>
                  </li>
                  <li><a class="menu-item" href="component-tooltips.html" data-i18n="nav.components.component_tooltips">Tooltips</a>
                  </li>
                  <li><a class="menu-item" href="component-popovers.html" data-i18n="nav.components.component_popovers">Popovers</a>
                  </li>
                  <li><a class="menu-item" href="component-badges.html" data-i18n="nav.components.component_badges">Badges</a>
                  </li>
                  <li><a class="menu-item" href="component-pill-badges.html">Pill Badges</a>
                  </li>
                  <li><a class="menu-item" href="component-progress.html" data-i18n="nav.components.component_progress">Progress</a>
                  </li>
                  <li><a class="menu-item" href="component-media-objects.html" data-i18n="nav.components.component_media_objects">Media Objects</a>
                  </li>
                  <li><a class="menu-item" href="component-scrollable.html" data-i18n="nav.components.component_scrollable">Scrollable</a>
                  </li>
                  <li><a class="menu-item" href="component-loaders.html" data-i18n="nav.components.component_loaders">Loaders</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.extra_components.main">Extra Components</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="ex-component-sweet-alerts.html" data-i18n="nav.extra_components.ex_component_sweet_alerts">Sweet Alerts</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-tree-views.html" data-i18n="nav.extra_components.ex_component_tree_views">Tree Views</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-toastr.html" data-i18n="nav.extra_components.ex_component_toastr">Toastr</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-ratings.html" data-i18n="nav.extra_components.ex_component_ratings">Ratings</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-context-menu.html" data-i18n="nav.extra_components.ex_component_context_menu">Context Menu</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-noui-slider.html" data-i18n="nav.extra_components.ex_component_noui_slider">NoUI Slider</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-date-time-dropper.html" data-i18n="nav.extra_components.ex_component_date_time_dropper">Date Time Dropper</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-lists.html" data-i18n="nav.extra_components.ex_component_lists">Lists</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-toolbar.html" data-i18n="nav.extra_components.ex_component_toolbar">Toolbar</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-unslider.html" data-i18n="nav.extra_components.ex_component_unslider">Unslider</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-knob.html" data-i18n="nav.extra_components.ex_component_knob">Knob</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-long-press.html" data-i18n="nav.extra_components.ex_component_long_press">Long Press</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-offline.html" data-i18n="nav.extra_components.ex_component_offline">Offline</a>
                  </li>
                  <li><a class="menu-item" href="ex-component-zoom.html" data-i18n="nav.extra_components.ex_component_zoom">Zoom</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.icons.main">Icons</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="icons-feather.html" data-i18n="nav.icons.icons_feather">Feather</a>
                  </li>
                  <li><a class="menu-item" href="icons-font-awesome.html" data-i18n="nav.icons.icons_font_awesome">Font Awesome</a>
                  </li>
                  <li><a class="menu-item" href="icons-meteocons.html" data-i18n="nav.icons.icons_meteocons">Meteocons</a>
                  </li>
                  <li><a class="menu-item" href="icons-simple-line-icons.html" data-i18n="nav.icons.icons_simple_line_icons">Simple Line Icons</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="animation.html" data-i18n="nav.animation.main">Animation</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-note"></i><span class="menu-title" data-i18n="nav.category.forms">Forms</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#" data-i18n="nav.form_elements.main">Form Elements</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="form-inputs.html" data-i18n="nav.form_elements.form_inputs">Form Inputs</a>
                  </li>
                  <li><a class="menu-item" href="form-input-groups.html" data-i18n="nav.form_elements.form_input_groups">Input Groups</a>
                  </li>
                  <li><a class="menu-item" href="form-input-grid.html" data-i18n="nav.form_elements.form_input_grid">Input Grid</a>
                  </li>
                  <li><a class="menu-item" href="form-extended-inputs.html" data-i18n="nav.form_elements.form_extended_inputs">Extended Inputs</a>
                  </li>
                  <li><a class="menu-item" href="form-checkboxes-radios.html" data-i18n="nav.form_elements.form_checkboxes_radios">Checkboxes &amp; Radios</a>
                  </li>
                  <li><a class="menu-item" href="form-switch.html" data-i18n="nav.form_elements.form_switch">Switch</a>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.form_elements.form_select.main">Select</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="form-select2.html" data-i18n="nav.form_elements.form_select.form_select2">Select2</a>
                      </li>
                      <li><a class="menu-item" href="form-selectize.html" data-i18n="nav.form_elements.form_select.form_selectize">Selectize</a>
                      </li>
                      <li><a class="menu-item" href="form-selectivity.html" data-i18n="nav.form_elements.form_select.form_selectivity">Selectivity</a>
                      </li>
                      <li><a class="menu-item" href="form-select-box-it.html" data-i18n="nav.form_elements.form_select.form_select_box_it">Select Box It</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="form-dual-listbox.html" data-i18n="nav.form_elements.form_dual_listbox">Dual Listbox</a>
                  </li>
                  <li><a class="menu-item" href="form-tags-input.html" data-i18n="nav.form_elements.form_tags_input">Tags Input</a>
                  </li>
                  <li><a class="menu-item" href="form-validation.html" data-i18n="nav.form_elements.form_validation">Validation</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.form_layouts.main">Form Layouts</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="form-layout-basic.html" data-i18n="nav.form_layouts.form_layout_basic">Basic Forms</a>
                  </li>
                  <li><a class="menu-item" href="form-layout-horizontal.html" data-i18n="nav.form_layouts.form_layout_horizontal">Horizontal Forms</a>
                  </li>
                  <li><a class="menu-item" href="form-layout-hidden-labels.html" data-i18n="nav.form_layouts.form_layout_hidden_labels">Hidden Labels</a>
                  </li>
                  <li><a class="menu-item" href="form-layout-form-actions.html" data-i18n="nav.form_layouts.form_layout_form_actions">Form Actions</a>
                  </li>
                  <li><a class="menu-item" href="form-layout-row-separator.html" data-i18n="nav.form_layouts.form_layout_row_separator">Row Separator</a>
                  </li>
                  <li><a class="menu-item" href="form-layout-bordered.html" data-i18n="nav.form_layouts.form_layout_bordered">Bordered</a>
                  </li>
                  <li><a class="menu-item" href="form-layout-striped-rows.html" data-i18n="nav.form_layouts.form_layout_striped_rows">Striped Rows</a>
                  </li>
                  <li><a class="menu-item" href="form-layout-striped-labels.html" data-i18n="nav.form_layouts.form_layout_striped_labels">Striped Labels</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.form_wizard.main">Form Wizard</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="form-wizard-circle-style.html" data-i18n="nav.form_wizard.form_wizard_circle_style">Circle Style</a>
                  </li>
                  <li><a class="menu-item" href="form-wizard-notification-style.html" data-i18n="nav.form_wizard.form_wizard_notification_style">Notification Style</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="form-repeater.html" data-i18n="nav.form_repeater.main">Form Repeater</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-grid"></i><span class="menu-title" data-i18n="nav.category.tables">Tables</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#" data-i18n="nav.bootstrap_tables.main">Bootstrap Tables</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="table-basic.html" data-i18n="nav.bootstrap_tables.table_basic">Basic Tables</a>
                  </li>
                  <li><a class="menu-item" href="table-border.html" data-i18n="nav.bootstrap_tables.table_border">Table Border</a>
                  </li>
                  <li><a class="menu-item" href="table-sizing.html" data-i18n="nav.bootstrap_tables.table_sizing">Table Sizing</a>
                  </li>
                  <li><a class="menu-item" href="table-styling.html" data-i18n="nav.bootstrap_tables.table_styling">Table Styling</a>
                  </li>
                  <li><a class="menu-item" href="table-components.html" data-i18n="nav.bootstrap_tables.table_components">Table Components</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.data_tables.main">DataTables</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="dt-basic-initialization.html" data-i18n="nav.data_tables.dt_basic_initialization">Basic Initialisation</a>
                  </li>
                  <li><a class="menu-item" href="dt-advanced-initialization.html" data-i18n="nav.data_tables.dt_advanced_initialization">Advanced initialisation</a>
                  </li>
                  <li><a class="menu-item" href="dt-styling.html" data-i18n="nav.data_tables.dt_styling">Styling</a>
                  </li>
                  <li><a class="menu-item" href="dt-data-sources.html" data-i18n="nav.data_tables.dt_data_sources">Data Sources</a>
                  </li>
                  <li><a class="menu-item" href="dt-api.html" data-i18n="nav.data_tables.dt_api">API</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.datatable_extensions.main">DataTables Ext.</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="dt-extensions-autofill.html" data-i18n="nav.datatable_extensions.dt_extensions_autofill">AutoFill</a>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.datatable_extensions.datatable_buttons.main">Buttons</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="dt-extensions-buttons-basic.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_basic">Basic Buttons</a>
                      </li>
                      <li><a class="menu-item" href="dt-extensions-buttons-html-5-data-export.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_html_5_data_export">HTML 5 Data Export</a>
                      </li>
                      <li><a class="menu-item" href="dt-extensions-buttons-flash-data-export.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_flash_data_export">Flash Data Export</a>
                      </li>
                      <li><a class="menu-item" href="dt-extensions-buttons-column-visibility.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_column_visibility">Column Visibility</a>
                      </li>
                      <li><a class="menu-item" href="dt-extensions-buttons-print.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_print">Print</a>
                      </li>
                      <li><a class="menu-item" href="dt-extensions-buttons-api.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_api">API</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="dt-extensions-column-reorder.html" data-i18n="nav.datatable_extensions.dt_extensions_column_reorder">Column Reorder</a>
                  </li>
                  <li><a class="menu-item" href="dt-extensions-fixed-columns.html" data-i18n="nav.datatable_extensions.dt_extensions_fixed_columns">Fixed Columns</a>
                  </li>
                  <li><a class="menu-item" href="dt-extensions-key-table.html" data-i18n="nav.datatable_extensions.dt_extensions_key_table">Key Table</a>
                  </li>
                  <li><a class="menu-item" href="dt-extensions-row-reorder.html" data-i18n="nav.datatable_extensions.dt_extensions_row_reorder">Row Reorder</a>
                  </li>
                  <li><a class="menu-item" href="dt-extensions-select.html" data-i18n="nav.datatable_extensions.dt_extensions_select">Select</a>
                  </li>
                  <li><a class="menu-item" href="dt-extensions-fix-header.html" data-i18n="nav.datatable_extensions.dt_extensions_fix_header">Fix Header</a>
                  </li>
                  <li><a class="menu-item" href="dt-extensions-responsive.html" data-i18n="nav.datatable_extensions.dt_extensions_responsive">Responsive</a>
                  </li>
                  <li><a class="menu-item" href="dt-extensions-column-visibility.html" data-i18n="nav.datatable_extensions.dt_extensions_column_visibility">Column Visibility</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.handson_table.main">Handson Table</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="handson-table-appearance.html" data-i18n="nav.handson_table.handson_table_appearance">Appearance</a>
                  </li>
                  <li><a class="menu-item" href="handson-table-rows-columns.html" data-i18n="nav.handson_table.handson_table_rows_columns">Rows Columns</a>
                  </li>
                  <li><a class="menu-item" href="handson-table-rows-only.html" data-i18n="nav.handson_table.handson_table_rows_only">Rows Only</a>
                  </li>
                  <li><a class="menu-item" href="handson-table-columns-only.html" data-i18n="nav.handson_table.handson_table_columns_only">Columns Only</a>
                  </li>
                  <li><a class="menu-item" href="handson-table-data-operations.html" data-i18n="nav.handson_table.handson_table_data_operations">Data Operations</a>
                  </li>
                  <li><a class="menu-item" href="handson-table-cell-features.html" data-i18n="nav.handson_table.handson_table_cell_features">Cell Features</a>
                  </li>
                  <li><a class="menu-item" href="handson-table-cell-types.html" data-i18n="nav.handson_table.handson_table_cell_types">Cell Types</a>
                  </li>
                  <li><a class="menu-item" href="handson-table-integrations.html" data-i18n="nav.handson_table.handson_table_integrations">Integrations</a>
                  </li>
                  <li><a class="menu-item" href="handson-table-utilities.html" data-i18n="nav.handson_table.handson_table_utilities">Utilities</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="table-jsgrid.html" data-i18n="nav.table_jsgrid.main">jsGrid</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-plus"></i><span class="menu-title" data-i18n="nav.category.addons">Add Ons</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#" data-i18n="nav.editors.main">Editors</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="editor-quill.html" data-i18n="nav.editors.editor_quill">Quill</a>
                  </li>
                  <li><a class="menu-item" href="editor-ckeditor.html" data-i18n="nav.editors.editor_ckeditor">CKEditor</a>
                  </li>
                  <li><a class="menu-item" href="editor-summernote.html" data-i18n="nav.editors.editor_summernote">Summernote</a>
                  </li>
                  <li><a class="menu-item" href="editor-tinymce.html" data-i18n="nav.editors.editor_tinymce">TinyMCE</a>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.editors.code_editor_codemirror.main">Code Editor</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="code-editor-codemirror.html" data-i18n="nav.editors.code_editor_codemirror.code_editor_codemirror">CodeMirror</a>
                      </li>
                      <li><a class="menu-item" href="code-editor-ace.html" data-i18n="nav.editors.code_editor_codemirror.code_editor_ace">Ace</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.pickers.main">Pickers</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="pickers-date-&amp;-time-picker.html" data-i18n="nav.pickers.pickers_date_time_picker">Date &amp; Time Picker</a>
                  </li>
                  <li><a class="menu-item" href="pickers-color-picker.html" data-i18n="nav.pickers.pickers_color_picker">Color Picker</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.jquery_ui.main">jQuery UI</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="jquery-ui-interactions.html" data-i18n="nav.jquery_ui.jquery_ui_interactions">Interactions</a>
                  </li>
                  <li><a class="menu-item" href="jquery-ui-navigations.html" data-i18n="nav.jquery_ui.jquery_ui_navigations">Navigations</a>
                  </li>
                  <li><a class="menu-item" href="jquery-ui-date-pickers.html" data-i18n="nav.jquery_ui.jquery_ui_date_pickers">Date Pickers</a>
                  </li>
                  <li><a class="menu-item" href="jquery-ui-autocomplete.html" data-i18n="nav.jquery_ui.jquery_ui_autocomplete">Autocomplete</a>
                  </li>
                  <li><a class="menu-item" href="jquery-ui-buttons-select.html" data-i18n="nav.jquery_ui.jquery_ui_buttons_select">Buttons &amp; Select</a>
                  </li>
                  <li><a class="menu-item" href="jquery-ui-slider-spinner.html" data-i18n="nav.jquery_ui.jquery_ui_slider_spinner">Slider &amp; Spinner</a>
                  </li>
                  <li><a class="menu-item" href="jquery-ui-dialog-tooltip.html" data-i18n="nav.jquery_ui.jquery_ui_dialog_tooltip">Dialog &amp; Tooltip</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="add-on-block-ui.html" data-i18n="nav.add_on_block_ui.main">Block UI</a>
              </li>
              <li><a class="menu-item" href="add-on-image-cropper.html" data-i18n="nav.add_on_image_cropper.main">Image Cropper</a>
              </li>
              <li><a class="menu-item" href="add-on-drag-drop.html" data-i18n="nav.add_on_drag_drop.main">Drag &amp; Drop</a>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.file_uploaders.main">File Uploader</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="file-uploader-dropzone.html" data-i18n="nav.file_uploaders.file_uploader_dropzone">Dropzone</a>
                  </li>
                  <li><a class="menu-item" href="file-uploader-jquery.html" data-i18n="nav.file_uploaders.file_uploader_jquery">jQuery File Upload</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.event_calendars.main">Event Calendars</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="#" data-i18n="nav.event_calendars.full_calender.main">Full Calendar</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="full-calender-basic.html" data-i18n="nav.event_calendars.full_calender.full_calender_basic">Basic</a>
                      </li>
                      <li><a class="menu-item" href="full-calender-events.html" data-i18n="nav.event_calendars.full_calender.full_calender_events">Events</a>
                      </li>
                      <li><a class="menu-item" href="full-calender-advance.html" data-i18n="nav.event_calendars.full_calender.full_calender_advance">Advance</a>
                      </li>
                      <li><a class="menu-item" href="full-calender-extra.html" data-i18n="nav.event_calendars.full_calender.full_calender_extra">Extra</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="calendars-clndr.html" data-i18n="nav.event_calendars.calendars_clndr">CLNDR</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.internationalization.main">Internationalization</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="i18n-resources.html" data-i18n="nav.internationalization.i18n_resources">Resources</a>
                  </li>
                  <li><a class="menu-item" href="i18n-xhr-backend.html" data-i18n="nav.internationalization.i18n_xhr_backend">XHR Backend</a>
                  </li>
                  <li><a class="menu-item" href="i18n-query-string.html?lng=en" data-i18n="nav.internationalization.i18n_query_string">Query String</a>
                  </li>
                  <li><a class="menu-item" href="i18n-on-init.html" data-i18n="nav.internationalization.i18n_on_init">On Init</a>
                  </li>
                  <li><a class="menu-item" href="i18n-after-init.html" data-i18n="nav.internationalization.i18n_after_init">After Init</a>
                  </li>
                  <li><a class="menu-item" href="i18n-fallback.html" data-i18n="nav.internationalization.i18n_fallback">Fallback</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-graph"></i><span class="menu-title" data-i18n="nav.category.charts_maps">Charts &amp; Maps</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="#" data-i18n="nav.google_charts.main">google Charts</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="google-bar-charts.html" data-i18n="nav.google_charts.google_bar_charts">Bar charts</a>
                  </li>
                  <li><a class="menu-item" href="google-line-charts.html" data-i18n="nav.google_charts.google_line_charts">Line charts</a>
                  </li>
                  <li><a class="menu-item" href="google-pie-charts.html" data-i18n="nav.google_charts.google_pie_charts">Pie charts</a>
                  </li>
                  <li><a class="menu-item" href="google-scatter-charts.html" data-i18n="nav.google_charts.google_scatter_charts">Scatter charts</a>
                  </li>
                  <li><a class="menu-item" href="google-bubble-charts.html" data-i18n="nav.google_charts.google_bubble_charts">Bubble charts</a>
                  </li>
                  <li><a class="menu-item" href="google-other-charts.html" data-i18n="nav.google_charts.google_other_charts">Other charts</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.echarts.main">Echarts</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="echarts-line-area-charts.html" data-i18n="nav.echarts.echarts_line_area_charts">Line &amp; Area charts</a>
                  </li>
                  <li><a class="menu-item" href="echarts-bar-column-charts.html" data-i18n="nav.echarts.echarts_bar_column_charts">Bar &amp; Column charts</a>
                  </li>
                  <li><a class="menu-item" href="echarts-pie-doughnut-charts.html" data-i18n="nav.echarts.echarts_pie_doughnut_charts">Pie &amp; Doughnut charts</a>
                  </li>
                  <li><a class="menu-item" href="echarts-scatter-charts.html" data-i18n="nav.echarts.echarts_scatter_charts">Scatter charts</a>
                  </li>
                  <li><a class="menu-item" href="echarts-radar-chord-charts.html" data-i18n="nav.echarts.echarts_radar_chord_charts">Radar &amp; Chord charts</a>
                  </li>
                  <li><a class="menu-item" href="echarts-funnel-gauges-charts.html" data-i18n="nav.echarts.echarts_funnel_gauges_charts">Funnel &amp; Gauges charts</a>
                  </li>
                  <li><a class="menu-item" href="echarts-combination-charts.html" data-i18n="nav.echarts.echarts_combination_charts">Combination charts</a>
                  </li>
                  <li><a class="menu-item" href="echarts-advance-charts.html" data-i18n="nav.echarts.echarts_advance_charts">Advance charts</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.chartjs.main">Chartjs</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="chartjs-line-charts.html" data-i18n="nav.chartjs.chartjs_line_charts">Line charts</a>
                  </li>
                  <li><a class="menu-item" href="chartjs-bar-charts.html" data-i18n="nav.chartjs.chartjs_bar_charts">Bar charts</a>
                  </li>
                  <li><a class="menu-item" href="chartjs-pie-doughnut-charts.html" data-i18n="nav.chartjs.chartjs_pie_doughnut_charts">Pie &amp; Doughnut charts</a>
                  </li>
                  <li><a class="menu-item" href="chartjs-scatter-charts.html" data-i18n="nav.chartjs.chartjs_scatter_charts">Scatter charts</a>
                  </li>
                  <li><a class="menu-item" href="chartjs-polar-radar-charts.html" data-i18n="nav.chartjs.chartjs_polar_radar_charts">Polar &amp; Radar charts</a>
                  </li>
                  <li><a class="menu-item" href="chartjs-advance-charts.html" data-i18n="nav.chartjs.chartjs_advance_charts">Advance charts</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.d3_charts.main">D3 Charts</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="d3-line-chart.html" data-i18n="nav.d3_charts.d3_line_chart">Line Chart</a>
                  </li>
                  <li><a class="menu-item" href="d3-bar-chart.html" data-i18n="nav.d3_charts.d3_bar_chart">Bar Chart</a>
                  </li>
                  <li><a class="menu-item" href="d3-pie-chart.html" data-i18n="nav.d3_charts.d3_pie_chart">Pie Chart</a>
                  </li>
                  <li><a class="menu-item" href="d3-circle-diagrams.html" data-i18n="nav.d3_charts.d3_circle_diagrams">Circle Diagrams</a>
                  </li>
                  <li><a class="menu-item" href="d3-tree-chart.html" data-i18n="nav.d3_charts.d3_tree_chart">Tree Chart</a>
                  </li>
                  <li><a class="menu-item" href="d3-other-charts.html" data-i18n="nav.d3_charts.d3_other_charts">Other Charts</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.c3_charts.main">C3 Charts</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="c3-line-chart.html" data-i18n="nav.c3_charts.c3_line_chart">Line Chart</a>
                  </li>
                  <li><a class="menu-item" href="c3-bar-pie-chart.html" data-i18n="nav.c3_charts.c3_bar_pie_chart">Bar &amp; Pie Chart</a>
                  </li>
                  <li><a class="menu-item" href="c3-axis-chart.html" data-i18n="nav.c3_charts.c3_axis_chart">Axis Chart</a>
                  </li>
                  <li><a class="menu-item" href="c3-data-chart.html" data-i18n="nav.c3_charts.c3_data_chart">Data Chart</a>
                  </li>
                  <li><a class="menu-item" href="c3-grid-chart.html" data-i18n="nav.c3_charts.c3_grid_chart">Grid Chart</a>
                  </li>
                  <li><a class="menu-item" href="c3-transform-chart.html" data-i18n="nav.c3_charts.c3_transform_chart">Transform Chart</a>
                  </li>
                  <li><a class="menu-item" href="c3-other-charts.html" data-i18n="nav.c3_charts.c3_other_charts">Other Charts</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.chartist.main">Chartist</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="chartist-line-charts.html" data-i18n="nav.chartist.chartist_line_charts">Line charts</a>
                  </li>
                  <li><a class="menu-item" href="chartist-bar-charts.html" data-i18n="nav.chartist.chartist_bar_charts">Bar charts</a>
                  </li>
                  <li><a class="menu-item" href="chartist-pie-charts.html" data-i18n="nav.chartist.chartist_pie_charts">Pie charts</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.dimple_charts.main">Dimple Charts</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="dimple-line-area-chart.html" data-i18n="nav.dimple_charts.dimple_line_area_chart">Line &amp; Area Chart</a>
                  </li>
                  <li><a class="menu-item" href="dimple-bar-column-chart.html" data-i18n="nav.dimple_charts.dimple_bar_column_chart">Bar &amp; Column Chart</a>
                  </li>
                  <li><a class="menu-item" href="dimple-pie-ring-chart.html" data-i18n="nav.dimple_charts.dimple_pie_ring_chart">Pie &amp; Ring Chart</a>
                  </li>
                  <li><a class="menu-item" href="dimple-step-chart.html" data-i18n="nav.dimple_charts.dimple_step_chart">Step Chart</a>
                  </li>
                  <li><a class="menu-item" href="dimple-scatter-chart.html" data-i18n="nav.dimple_charts.dimple_scatter_chart">Scatter Chart</a>
                  </li>
                  <li><a class="menu-item" href="dimple-bubble-chart.html" data-i18n="nav.dimple_charts.dimple_bubble_chart">Bubble Chart</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="morris-charts.html" data-i18n="nav.morris_charts.main">Morris Charts</a>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.flot_charts.main">Flot Charts</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="flot-line-charts.html" data-i18n="nav.flot_charts.flot_line_charts">Line charts</a>
                  </li>
                  <li><a class="menu-item" href="flot-bar-charts.html" data-i18n="nav.flot_charts.flot_bar_charts">Bar charts</a>
                  </li>
                  <li><a class="menu-item" href="flot-pie-charts.html" data-i18n="nav.flot_charts.flot_pie_charts">Pie charts</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="rickshaw-charts.html" data-i18n="nav.rickshaw_charts.main">Rickshaw Charts</a>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.maps.main">Maps</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="#" data-i18n="nav.maps.google_maps.main">google Maps</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="gmaps-basic-maps.html" data-i18n="nav.maps.google_maps.gmaps_basic_maps">Maps</a>
                      </li>
                      <li><a class="menu-item" href="gmaps-services.html" data-i18n="nav.maps.google_maps.gmaps_services">Services</a>
                      </li>
                      <li><a class="menu-item" href="gmaps-overlays.html" data-i18n="nav.maps.google_maps.gmaps_overlays">Overlays</a>
                      </li>
                      <li><a class="menu-item" href="gmaps-routes.html" data-i18n="nav.maps.google_maps.gmaps_routes">Routes</a>
                      </li>
                      <li><a class="menu-item" href="gmaps-utils.html" data-i18n="nav.maps.google_maps.gmaps_utils">Utils</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="menu-item" href="#" data-i18n="nav.maps.vector_maps.main">Vector Maps</a>
                    <ul class="menu-content">
                      <li><a class="menu-item" href="#" data-i18n="nav.maps.vector_maps.jquery_mapael.main">jQuery Mapael</a>
                        <ul class="menu-content">
                          <li><a class="menu-item" href="vector-maps-mapael-basic.html" data-i18n="nav.maps.vector_maps.jquery_mapael.vector_maps_mapael_basic">Basic Maps</a>
                          </li>
                          <li><a class="menu-item" href="vector-maps-mapael-advance.html" data-i18n="nav.maps.vector_maps.jquery_mapael.vector_maps_mapael_advance">Advance Maps</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="menu-item" href="vector-maps-jvector.html" data-i18n="nav.maps.vector_maps.jvector_maps">jVector Map</a>
                      </li>
                      <li><a class="menu-item" href="vector-maps-jqv.html" data-i18n="nav.maps.vector_maps.vector_maps_jqv">JQV Map</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-support"></i><span class="menu-title" data-i18n="nav.category.support">Support</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="http://support.pixinvent.com/" data-i18n="nav.support_raise_support.main">Raise Support</a>
              </li>
              <li><a class="menu-item" href="https://pixinvent.com/robust-bootstrap-admin-template/documentation" data-i18n="nav.support_documentation.main">Documentation</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!--fitness stats-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
                            <div class="float-left pl-2">
                                <span class="grey darken-1 block">Age</span>
                                <span class="font-large-3 line-height-1 text-bold-300">25</span>
                            </div>
                            <div class="float-left mt-2">
                                <span class="grey darken-1 block">Years</span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
                            <div class="float-left pl-2">
                                <span class="grey darken-1 block">Height</span>
                                <span class="font-large-3 line-height-1 text-bold-300">185</span>
                            </div>
                            <div class="float-left mt-2">
                                <span class="grey darken-1 block">cm</span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
                            <div class="float-left pl-2">
                                <span class="grey darken-1 block">Weight</span>
                                <span class="font-large-3 line-height-1 text-bold-300">64</span>
                            </div>
                            <div class="float-left mt-2">
                                <span class="grey darken-1 block">Kg</span>
                                <span class="block"><i class="ft-arrow-down deep-orange accent-3"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 clearfix">
                            <div class="float-left pl-2">
                                <span class="grey darken-1 block">Body mass index</span>
                                <span class="font-large-3 line-height-1 text-bold-300">22.3</span>
                            </div>
                            <div class="float-left mt-2">
                                <span class="grey darken-1 block">Kg/m</span>
                                <span class="block"><i class="ft-arrow-up success"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--fitness stats-->

<!-- activity charts -->
<div class="row match-height">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header no-border-bottom">
                <h4 class="card-title">Activity Chart <span class="text-muted text-bold-400">Weekly</span></h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <ul class="list-inline text-right m-0">
                        <li>
                            <h6><i class="ft-circle primary"></i> Runnig</h6>
                        </li>
                        <li class="ml-1">
                            <h6><i class="ft-circle success"></i> Walking</h6>
                        </li>
                        <li class="ml-1">
                            <h6><i class="ft-circle warning"></i> Cycling</h6>
                        </li>
                    </ul>
                    <div id="weekly-activity-chart" class="height-250"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-content mt-2">
                <div class="card-body">
                    <div id="activity-division" class="height-250 echart-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ activity charts -->

<!-- fitness target -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                        <div class="my-1 text-center">
                            <div class="card-header mb-2 pt-0">
                                <span class="info">Steps</span>
                                <h3 class="font-large-2 text-bold-200">3,261</h3>
                            </div>
                            <div class="card-content">
                                <input type="text" value="65" class="knob hide-value responsive angle-offset" data-angleOffset="40" data-thickness=".15" data-linecap="round" data-width="130" data-height="130" data-inputColor="#e1e1e1" data-readOnly="true" data-fgColor="#00BCD4" data-knob-icon="ft-zap">
                                <ul class="list-inline clearfix mt-1 mb-0">
                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                        <h2 class="grey darken-1 text-bold-400">65%</h2>
                                        <span class="success">Completed</span>
                                    </li>
                                    <li class="pl-2">
                                        <h2 class="grey darken-1 text-bold-400">35%</h2>
                                        <span class="danger">Remaining</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                        <div class="my-1 text-center">
                            <div class="card-header mb-2 pt-0">
                                <span class="deep-orange">Distance</span>
                                <h3 class="font-large-2 text-bold-200">7.6 <span class="font-medium-1 grey darken-1 text-bold-400">mile</span></h3>
                            </div>
                            <div class="card-content">
                                <input type="text" value="70" class="knob hide-value responsive angle-offset" data-angleOffset="0" data-thickness=".15" data-linecap="round" data-width="130" data-height="130" data-inputColor="#e1e1e1" data-readOnly="true" data-fgColor="#FF5722" data-knob-icon="ft-trending-up">
                                <ul class="list-inline clearfix mt-1 mb-0">
                                    <li>
                                        <h2 class="grey darken-1 text-bold-400">10</h2>
                                        <span class="deep-orange">Miles Today's Target</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                        <div class="my-1 text-center">
                            <div class="card-header mb-2 pt-0">
                                <span class="success">Calories</span>
                                <h3 class="font-large-2 text-bold-200">4,025 <span class="font-medium-1 grey darken-1 text-bold-400">kcal</span></h3>
                            </div>
                            <div class="card-content">
                                <input type="text" value="81" class="knob hide-value responsive angle-offset" data-angleOffset="20" data-thickness=".15" data-linecap="round" data-width="130" data-height="130" data-inputColor="#e1e1e1" data-readOnly="true" data-fgColor="#009688" data-knob-icon="ft-target">
                                <ul class="list-inline clearfix mt-1 mb-0">
                                    <li>
                                        <h2 class="grey darken-1 text-bold-400">5000</h2>
                                        <span class="success">kcla Today's Target</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <div class="my-1 text-center">
                            <div class="card-header mb-2 pt-0">
                                <span class="danger">Heart Rate</span>
                                <h3 class="font-large-2 text-bold-200">102 <span class="font-medium-1 grey darken-1 text-bold-400">BPM</span></h3>
                            </div>
                            <div class="card-content">
                                <input type="text" value="75" class="knob hide-value responsive angle-offset" data-angleOffset="20" data-thickness=".15" data-linecap="round" data-width="130" data-height="130" data-inputColor="#e1e1e1" data-readOnly="true" data-fgColor="#DA4453" data-knob-icon="ft-heart">
                                <ul class="list-inline clearfix mt-1 mb-0">
                                    <li>
                                        <h2 class="grey darken-1 text-bold-400">125</h2>
                                        <span class="danger">BPM Highest</span>
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
<!--/ fitness target -->

<!-- friends & weather charts -->
<div class="row match-height">
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Daily Diet</h4>
                    <p class="card-text">Some quick example text to build on the card.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="badge badge-pill badge-primary float-right">4</span> Protein Milk
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-pill badge-info float-right">2</span> oz Water
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-pill badge-danger float-right">8</span> Vegetable Juice
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-pill badge-warning float-right">1</span> Sugar Free Jello-O
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-pill badge-success float-right">3</span> Protein Meal
                    </li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="card no-border box-shadow-0">
            <div class="card-content">
                <div class="weather-date position-relative">
                    <div class="date-info position-absolute bg-light-blue bg-lighten-1 white mt-3 p-1 text-center">
                        <span class="date block">14</span>
                        <span class="month">Nov</span>
                    </div>
                </div>
                <div class="card-body bg-light-blue bg-lighten-4">
                    <ul class="list-inline text-right mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw font-medium-4 light-blue"></i></a></li>
                    </ul>
                    <div class="animated-weather-icons text-center">
                        <svg version="1.1" id="cloudDrizzleAlt" class="climacon climacon_cloudDrizzleAlt climacon-light-blue climacon-darken-2 height-200" viewBox="15 15 70 70">
                            <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzleAlt">
                                <g class="climacon_wrapperComponent climacon_wrapperComponent-drizzle">
                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" id="Drizzle-Left_1_" d="M56.969,57.672l-2.121,2.121c-1.172,1.172-1.172,3.072,0,4.242c1.17,1.172,3.07,1.172,4.24,0c1.172-1.17,1.172-3.07,0-4.242L56.969,57.672z"></path>
                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M50.088,57.672l-2.119,2.121c-1.174,1.172-1.174,3.07,0,4.242c1.17,1.172,3.068,1.172,4.24,0s1.172-3.07,0-4.242L50.088,57.672z"></path>
                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M43.033,57.672l-2.121,2.121c-1.172,1.172-1.172,3.07,0,4.242s3.07,1.172,4.244,0c1.172-1.172,1.172-3.07,0-4.242L43.033,57.672z"></path>
                                </g>
                                <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud">
                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M59.943,41.642c-0.696,0-1.369,0.092-2.033,0.205c-2.736-4.892-7.961-8.203-13.965-8.203c-8.835,0-15.998,7.162-15.998,15.997c0,5.992,3.3,11.207,8.177,13.947c0.276-1.262,0.892-2.465,1.873-3.445l0.057-0.057c-3.644-2.061-6.106-5.963-6.106-10.445c0-6.626,5.372-11.998,11.998-11.998c5.691,0,10.433,3.974,11.666,9.29c1.25-0.81,2.732-1.291,4.332-1.291c4.418,0,8,3.581,8,7.999c0,3.443-2.182,6.371-5.235,7.498c0.788,1.146,1.194,2.471,1.222,3.807c4.666-1.645,8.014-6.077,8.014-11.305C71.941,47.014,66.57,41.642,59.943,41.642z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="weather-details text-center">
                        <span class="mt-2 block light-blue darken-2">Rain</span>
                        <span class="font-medium-4 text-bold-500 light-blue darken-4">Chicago, US</span>
                    </div>
                </div>
                <div class="card-footer bg-light-blue bg-darken-3 py-3 no-border">
                    <div class="row">
                        <div class="col-4 text-center display-table-cell">
                            <i class="ft-wind font-large-1 white lighten-3 valign-middle"></i> <span class="white valign-middle">2MPH</span>
                        </div>
                        <div class="col-4 text-center display-table-cell">
                            <i class="ft-sun font-large-1 white lighten-3 valign-middle"></i> <span class="white valign-middle">2%</span>
                        </div>
                        <div class="col-4 text-center display-table-cell">
                            <i class="ft-thermometer font-large-1 white lighten-3 valign-middle"></i> <span class="white valign-middle">13.0&deg;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Friends</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div id="friends-activity" class="media-list height-400 position-relative">
                    <a href="#" class="media active">
                        <div class="media-left">
                            <img class="media-object avatar avatar-sm rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <h5 class="list-group-item-heading">Kristopher Candy <span class="font-medium-4 float-right">1,0215</span></h5>
                            <p class="list-group-item-text mb-0"><span class="badge badge-success">Running</span><span class="badge badge-warning ml-1">Cycling</span></p>
                        </div>
                    </a>
                    <a href="#" class="media">
                        <div class="media-left">
                            <img class="media-object avatar avatar-sm rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-8.png" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <h5 class="list-group-item-heading">Lawrence Fowler <span class="font-medium-4 float-right">2,0215</span></h5>
                            <p class="list-group-item-text mb-0"><span class="badge badge-danger">Dancing</span> <span class="badge badge-primary ml-1">Fitness</span></p>
                        </div>
                    </a>
                    <a href="#" class="media">
                        <div class="media-left">
                            <img class="media-object avatar avatar-sm rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-9.png" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <h5 class="list-group-item-heading">Linda Olson <span class="font-medium-4 float-right">1,112</span></h5>
                            <p class="list-group-item-text mb-0"><span class="badge badge-success">Running</span> <span class="badge badge-warning ml-1">Cycling</span> <span class="badge badge-secondary ml-1">Other</span></p>
                        </div>
                    </a>
                    <a href="#" class="media">
                        <div class="media-left">
                            <img class="media-object avatar avatar-sm rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-10.png" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <h5 class="list-group-item-heading">Roy Clark <span class="font-medium-4 float-right">2,815</span></h5>
                            <p class="list-group-item-text mb-0"><span class="badge badge-warning">Fitness</span> <span class="badge badge-danger ml-1">Dancing</span></p>
                        </div>
                    </a>
                    <a href="#" class="media">
                        <div class="media-left">
                            <img class="media-object avatar avatar-sm rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-11.png" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <h5 class="list-group-item-heading">Tammy Gonzales <span class="font-medium-4 float-right">3,226</span></h5>
                            <p class="list-group-item-text mb-0"><span class="badge badge-danger">Dancing</span> <span class="badge badge-success ml-1">Running</span></p>
                        </div>
                    </a>
                    <a href="#" class="media">
                        <div class="media-left">
                            <img class="media-object avatar avatar-sm rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-12.png" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <h5 class="list-group-item-heading">Justin Hawkins <span class="font-medium-4 float-right">4,564</span></h5>
                            <p class="list-group-item-text mb-0"><span class="badge badge-success">Running</span> <span class="badge badge-primary ml-1">Fitness</span></p>
                        </div>
                    </a>
                    <a href="#" class="media">
                        <div class="media-left">
                            <img class="media-object avatar avatar-sm rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-10.png" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <h5 class="list-group-item-heading">Roy Clark <span class="font-medium-4 float-right">2,815</span></h5>
                            <p class="list-group-item-text mb-0"><span class="badge badge-warning">Fitness</span> <span class="badge badge-danger ml-1">Dancing</span></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- friends & weather charts -->

<!-- Running Routes & Daily Activities  -->
<div class="row">
    <div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-header no-border-bottom">
                <h4 class="card-title">Running Routes</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div id="routes" class="height-300"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-header no-border-bottom">
                <h4 class="card-title">Daily Activity</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div id="daily-activity" class="table-responsive height-350">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="icheck-input-all" class="icheck-activity"></th>
                                <th>Time</th>
                                <th>Activity</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-truncate"><input type="checkbox" id="icheck-input-1" class="icheck-activity" checked></td>
                                <td class="text-truncate">5.00 A.M</td>
                                <td class="text-truncate">Bricks Walking</td>
                                <td class="text-truncate"><span class="badge badge-success">Done</span></td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><input type="checkbox" id="icheck-input-2" class="icheck-activity" checked></td>
                                <td class="text-truncate">5.30 A.M</td>
                                <td class="text-truncate">Morning Exercise</td>
                                <td class="text-truncate"><span class="badge badge-success">Done</span></td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><input type="checkbox" id="icheck-input-3" class="icheck-activity"></td>
                                <td class="text-truncate">6.30 A.M</td>
                                <td class="text-truncate">Yoga</td>
                                <td class="text-truncate"><span class="badge badge-danger">Missed</span></td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><input type="checkbox" id="icheck-input-4" class="icheck-activity" checked></td>
                                <td class="text-truncate">7.00 A.M</td>
                                <td class="text-truncate">Gym</td>
                                <td class="text-truncate"><span class="badge badge-success">Done</span></td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><input type="checkbox" id="icheck-input-5" class="icheck-activity" checked></td>
                                <td class="text-truncate">8.00 A.M</td>
                                <td class="text-truncate">Steam Bath</td>
                                <td class="text-truncate"><span class="badge badge-success">Done</span></td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><input type="checkbox" id="icheck-input-6" class="icheck-activity"></td>
                                <td class="text-truncate">9.00 A.M</td>
                                <td class="text-truncate">Meditation</td>
                                <td class="text-truncate"><span class="badge badge-danger">Missed</span></td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><input type="checkbox" id="icheck-input-7" class="icheck-activity"></td>
                                <td class="text-truncate">8.00 P.M</td>
                                <td class="text-truncate">Bricks Walking</td>
                                <td class="text-truncate"><span class="badge badge-warning">Delayed</span></td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><input type="checkbox" id="icheck-input-8" class="icheck-activity"></td>
                                <td class="text-truncate">9.00 P.M</td>
                                <td class="text-truncate">Exercise</td>
                                <td class="text-truncate"><span class="badge badge-warning">Delayed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Running Routes & Daily Activities  -->

<!-- fitness info & twitter, facebook -->
<div class="row">
    <div class="col-xl-8 col-lg-12 col-md-12">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div id="carousel-example" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example" data-slide-to="1"></li>
                                <li data-target="#carousel-example" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img src="../../../app-assets/images/pages/fitness-slide-1.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img src="../../../app-assets/images/pages/fitness-slide-2.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img src="../../../app-assets/images/pages/fitness-slide-3.jpg" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Health News &amp; Fitness Advice</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                        <span class="float-left">2 days ago</span>
                        <span class="tags float-right">
                            <span class="badge-pill badge-primary">Branding</span>
                        <span class="badge-pill badge-danger">Design</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="card profile-card-with-cover">
                    <div class="card-content">
                        <div class="card-img-top img-fluid bg-cover height-200" style="background: url('../../../app-assets/images/pages/fitness-profile.jpg') 0 40%;"></div>
                        <div class="card-profile-image">
                            <img src="../../../app-assets/images/portrait/small/avatar-s-8.png" class="rounded-circle img-border box-shadow-1" alt="Card image">
                        </div>
                        <div class="profile-card-with-cover-content text-center">
                            <div class="my-2">
                                <h4 class="card-title">Susan Garrett</h4>
                                <ul class="list-inline clearfix mt-2">
                                    <li class="mr-2">
                                        <h2 class="block">-2.05 <span class="font-small-3 text-muted">KG</span></h2> Body Fat</li>
                                    <li class="mr-2">
                                        <h2 class="block">52 <span class="font-small-3 text-muted">KG</span></h2> Target</li>
                                    <li>
                                        <h2 class="block">-2.1 <span class="font-small-3 text-muted">KG</span></h2> Weight</li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-social btn-min-width mr-1 mb-1 btn-facebook"><i class="ft-facebook"></i> Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="row">
            <div class="col-xl-12 col-lg-6 col-md-12">
                <div class="card bg-twitter white">
                    <div class="card-content p-2">
                        <div class="card-body">
                            <div class="text-center mb-1">
                                <i class="ft-twitter font-large-3"></i>
                            </div>
                            <div class="tweet-slider">
                                <ul class="text-center">
                                    <li>Congratulations to Rob Jones in accounting for winning our <span class="yellow">#NFL</span> football pool!</li>
                                    <li>Contests are a great thing to partner on. Partnerships immediately <span class="yellow">#DOUBLE</span> the reach.</li>
                                    <li>Puns, humor, and quotes are great content on <span class="yellow">#Twitter</span>. Find some related to your business.</li>
                                    <li>Are there <span class="yellow">#common-sense</span> facts related to your business? Combine them with a great photo.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-6 col-md-12">
                <div class="card bg-facebook white">
                    <div class="card-content p-2">
                        <div class="card-body">
                            <div class="text-center mb-1">
                                <i class="ft-facebook font-large-3"></i>
                            </div>
                            <div class="fb-post-slider">
                                <ul class="text-center">
                                    <li>Congratulations to Rob Jones in accounting for winning our #NFL football pool!</li>
                                    <li>Contests are a great thing to partner on. Partnerships immediately #DOUBLE the reach.</li>
                                    <li>Puns, humor, and quotes are great content on #Twitter. Find some related to your business.</li>
                                    <li>Are there #common-sense facts related to your business? Combine them with a great photo.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ fitness info & twitter, facebook -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-dark navbar-border navbar-shadow">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
