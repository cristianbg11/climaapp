<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

AppAsset::register($this);
$homeurl = Url::base();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">

        <?php $this->registerCsrfMetaTags() ?>

        <title><?= Html::encode(!empty($this->title) ? $this->title : 'ClimaApp') ?></title>

        <script src="<?= $homeurl ?>/mant_assets/js/jquery-2.1.4.min.js"></script>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />



        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />



        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/font-awesome/4.5.0/css/font-awesome.min.css" />


        <link rel="icon" type="image/png" href="<?php echo$homeurl; ?>/favicon.png">

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/css/fonts.googleapis.com.css?1.1" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/css/ace-rtl.min.css" />

        <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/css/jquery-ui.min.css" />
        <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/css/jquery.gritter.min.css" />
        <!--[if lte IE 9]>
          <link rel="stylesheet" href="<?= $homeurl ?>/mant_assets/css/ace-ie.min.css" />
        <![endif]-->




        <!-- <![endif]-->

        <!--[if IE]>
<script src="<?= $homeurl ?>/mant_assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script src="<?= $homeurl ?>/mant_assets/js/jquery-ui.min.js"></script>

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="<?= $homeurl ?>/mant_assets/js/ace-extra.min.js"></script>
        <script src="<?= $homeurl ?>/js/general.js?1.38"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="<?= $homeurl ?>/mant_assets/js/html5shiv.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="<?= $homeurl ?>/css/style.css?1.23" class="ace-main-stylesheet" id="main-ace-style" />

        <style type="text/css">
            .mant-link{
                cursor: pointer;
            }
            .mant-link:hover{
                color:blue;
            }    
        </style>

        <?php $this->head() ?>
    </head>
    <body class="no-skin">
        <?php $this->beginBody() ?>

        <div id="navbar" class="navbar navbar-default ace-save-state skin-planning">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>




                <div class="pull-left">
                    <h3 class="white">ClimaApp</h3>
                </div>


                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">


                        <li class="light-blue dropdown-modal">
                            <?php if (!Yii::$app->user->isGuest): ?>
                                <a data-toggle="dropdown" href="#" class="dropdown-toggle">


                                    <span class="user-info">
                                        <small>Bienvenido,</small>
                                        <?php echo Yii::$app->user->identity->username; ?>
                                    </span>

                                    <i class="ace-icon fa fa-caret-down"></i>
                                </a>

                                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">                                

                                    <li>
                                        <a href="#" onclick="goLogout()">
                                            <i class="ace-icon fa fa-power-off"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            <?php else: ?>
                                <a data-toggle="dropdown" href="#" class="dropdown-toggle">


                                    <span class="user-info">

                                        Usuario
                                    </span>

                                    <i class="ace-icon fa fa-caret-down"></i>
                                </a>

                                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">                                

                                    <li>
                                        <a href="<?= Url::to(['/user/security/login']) ?>">
                                            <i class="ace-icon fa fa-user"></i>
                                            Login
                                        </a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>


            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container ace-save-state" id="main-container">

            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar responsive ace-save-state">


                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')
                    } catch (e) {
                    }
                </script>


                <?php //= $this->render('menu/' . $this->context->mod . 'Menu', ['homeurl' => $homeurl, 'mod' => $this->context->mod]); ?>
                <?= $this->render('left') ?>
                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>

            </div>
            <?php
            $modMenu = [
                [
                    'url' => ['site/index'],
                    'module' => 'visualizacion',
                    'label' => 'Visualicaci&oacute;n Data',
                    'icon' => 'fa-table'
                ],
                [
                    'url' => ['site/predicciones'],
                    'label' => 'Predicciones',
                    'module' => 'predicciones',
                    'icon' => 'fa-line-chart'
                ],
                [
                    'url' => ['site/config'],
                    'label' => 'Configuracion',
                    'module' => 'config',
                    'icon' => 'fa-cogs'
                ],
            ];
            ?>
            <div class="main-content">

                <div class="main-content-inner">
                    <div id="sidebar2" class="sidebar h-sidebar navbar-collapse ace-save-state collapse" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true" aria-expanded="false" style="height: 1px;">
                        <ul class="nav nav-list" style="top: 0px;">
                            <?php foreach ($modMenu as $item): ?>


                                <li class="hover <?= isset($this->context->currMod) && $this->context->currMod == $item['module'] ? 'active' : '' ?>">
                                    <a href="<?= Url::to($item['url']) ?>">
                                        <i class="menu-icon fa <?= $item['icon'] ?>"></i>
                                        <span class="menu-text"> <?= $item['label'] ?> </span>

                                    </a>
                                    <b class="arrow"></b>
                                </li>
                            <?php endforeach; ?>      



                        </ul><!-- /.nav-list -->
                    </div>

                    <?php if (isset($this->params['Mbreadcrumbs'])): ?>
                        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                            <?=
                            Breadcrumbs::widget([
                                'links' => $this->params['Mbreadcrumbs'],
                                'homeLink' => false
                            ])
                            ?> 
                        </div>
                    <?php endif; ?>

                    <?php /*
                      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                      <ul class="breadcrumb">


                      <li>
                      <a href="#">Storage Locations</a>
                      </li>
                      <li class="active">Almacen 1</li>
                      </ul><!-- /.breadcrumb -->


                      </div> */ ?>
                    <div class="page-content">

                        <?php if (isset($this->pageHeader) && $this->pageHeader != null): ?>

                            <div class="page-header">
                                <h1>
                                    <?php echo $this->pageHeader; ?>

                                </h1>
                            </div><!-- /.page-header -->
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->

                                <?php echo $content; ?>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            ClimaApp
                        </span>


                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->
        <form id="logoutForm" action="<?= Url::to(['/user/security/logout']) ?>" method="post">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        </form>
        <!-- basic scripts -->


        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='<?= $homeurl ?>/mant_assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");

            $(document).ready(function () {
                if ($('.checkRowSel').length > 0) {
                    $('.checkRowSel').change(function () {
                        if (this.checked) {
                            $(this).parent().parent().addClass('sel-row-check');
                        } else {
                            $(this).parent().parent().removeClass('sel-row-check');
                        }

                    });
                }
            });
        </script>
        <script src="<?= $homeurl ?>/mant_assets/js/bootstrap.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/bootbox.js"></script>
        <!-- page specific plugin scripts -->
        <script src="<?= $homeurl ?>/mant_assets/js/jquery.dataTables.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/dataTables.buttons.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/buttons.flash.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/buttons.html5.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/buttons.print.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/buttons.colVis.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/dataTables.select.min.js"></script>

        <script src="<?= $homeurl ?>/mant_assets/js/jquery.gritter.min.js"></script>
        <!-- ace scripts -->
        <script src="<?= $homeurl ?>/mant_assets/js/ace-elements.min.js"></script>
        <script src="<?= $homeurl ?>/mant_assets/js/ace.min.js"></script>

        <script type="text/javascript">
            function goLogout() {
                $('#logoutForm').submit();
            }
        </script>

        <?php $this->endBody() ?>

    </body>
</html>
<?php $this->endPage() ?>
