<!DOCTYPE html>
<html class="loading" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta
            name="description"
            content="Multi Service App With Customer App, Driver App, Merchant App and Admin Panel">
        <meta
            name="keywords"
            content="car rental, codeigniter, delivery, driver, grab, maps tracking, ordering, package, ride, send, stripe, taxi, transportation, uber, wallet">
        <meta name="author" content="ourdevelops">
        <title>Ornids Admin</title>
        <link
            rel="apple-touch-icon"
            href="<?= base_url(); ?>asset/app-assets/images/ico/apple-icon-120.png">
        <link
            rel="shortcut icon"
            type="image/x-icon"
            href="<?= base_url(); ?>asset/app-assets/images/ico/logoweb.png">
        <link
            href="<?= base_url(); ?>asset/app-assets/css/ourdevelops/font.css"
            rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/vendors/css/vendors.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/vendors/css/charts/apexcharts.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/vendors/css/extensions/toastr.css">

        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/vendors/css/tables/datatable/datatables.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/vendors/css/extensions/swiper.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/vendors/css/forms/select/select2.min.css">
        <link
            rel="stylesheet"
            href="<?= base_url(); ?>asset/node_modules/summernote/dist/summernote-bs4.css">
        <link
            rel="stylesheet"
            href="<?= base_url(); ?>asset/node_modules/dropify/dist/css/dropify.min.css">

        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/bootstrap.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/bootstrap-extended.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/colors.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/components.css">

        <!-- BEGIN: Page CSS-->

        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/core/menu/menu-types/vertical-menu.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/core/colors/palette-gradient.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/ourdevelops/chart-dashboard.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/plugins/extensions/swiper.css">

        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/pages/data-list-view.css">

        <link
            rel="stylesheet"
            href="<?= base_url(); ?>asset/app-assets/css/ourdevelops/intlTelInput.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/pages/invoice.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/plugins/extensions/toastr.css">
        <link
            href="<?= base_url(); ?>asset/app-assets/css/ourdevelops/mapbox-gl.css"
            rel="stylesheet"/>
        <link
            rel="stylesheet"
            type="text/css"
            href="<?= base_url(); ?>asset/app-assets/css/ourdevelops/progressbar.css">
        <!-- END: Page CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body
        class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
        data-open="click"
        data-menu="vertical-menu-modern"
        data-col="2-columns">

        <input type="hidden" id="base" value="<?php echo base_url(); ?>"></input>
        <input type="hidden" id="tokenode" value="<?= mapboxToken ?>"></input>
        <!-- BEGIN: Header-->
        <nav
            class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
                                <li class="nav-item mobile-menu d-xl-none mr-auto">
                                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                        <i class="ficon feather icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <ul class="nav navbar-nav float-right">
                            <?php
                        $totalnotif = $countnotification->row('newreg_drivercount') + $countnotification->row('newreg_merchantcount') + $countnotification->row('topupreq_notif') + $countnotification->row('withdrawreq_notif');
                        ?>
                            <li class="dropdown dropdown-notification nav-item">
                                <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                    <i class="ficon feather icon-bell"></i>
                                    <?php if ($totalnotif != 0) { ?>
                                    <span class="badge badge-pill badge-primary badge-up">
                                        <?= $totalnotif ?>
                                    </span>
                                <?php } else { ?>

                                    <?php } ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                    <li class="dropdown-menu-header">
                                        <?php if ($totalnotif != 0) { ?>
                                        <div class="dropdown-header m-0 p-2">
                                            <h3 class="white">
                                                <?= $totalnotif ?>
                                            </h3>
                                            <span class="notification-title">Notifications</span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="dropdown-header m-0 p-2">
                                            <h3 class="white"></h3>
                                            <span class="notification-title">No Notifications</span>
                                        </div>
                                        <?php } ?>
                                    </li>

                                    <li class="scrollable-container media-list">
                                        <?php if($countnotification->row('newreg_drivercount') != 0) { ?>
                                        <a
                                            class="d-flex justify-content-between"
                                            href="<?= base_url(); ?>newregistration/newregdriver">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left">
                                                    <i class="feather icon-plus-circle font-medium-5 info"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="info media-heading">Driver Registration</h6>
                                                </div>
                                                <small class="text-dark"><?= $countnotification->row('newreg_drivercount') ?>
                                                    Request</small>
                                            </div>
                                        </a>
                                    <?php } else { ?>

                                        <?php } ?>

                                        <?php if($countnotification->row('newreg_merchantcount') != 0) { ?>
                                        <a
                                            class="d-flex justify-content-between"
                                            href="<?= base_url(); ?>newregistration/newregmerchant">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left">
                                                    <i class="feather icon-plus-circle font-medium-5 warning"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="warning media-heading red darken-1">Merchant Registration</h6>
                                                </div>
                                                <small class="text-dark"><?= $countnotification->row('newreg_merchantcount') ?>
                                                    Request</small>
                                            </div>
                                        </a>
                                    <?php } else { ?>

                                        <?php } ?>

                                        <?php if($countnotification->row('topupreq_notif') != 0) { ?>
                                        <a
                                            class="d-flex justify-content-between"
                                            href="<?= base_url(); ?>wallet/topupdata">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left">
                                                    <i class="feather icon-arrow-up-circle font-medium-5 success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="success media-heading red darken-1">Top Up Request</h6>
                                                </div>
                                                <small class="text-dark"><?= $countnotification->row('topupreq_notif')?>
                                                    Request</small>
                                            </div>
                                        </a>
                                    <?php } else { ?>

                                        <?php } ?>

                                        <?php if($countnotification->row('withdrawreq_notif') != 0) { ?>
                                        <a
                                            class="d-flex justify-content-between"
                                            href="<?= base_url(); ?>wallet/withdrawdata">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left">
                                                    <i class="feather icon-arrow-right-circle font-medium-5 danger"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="danger media-heading red darken-1">Withdraw Request</h6>
                                                </div>
                                                <small class="text-dark"><?= $countnotification->row('withdrawreq_notif') ?>
                                                    Request</small>
                                            </div>
                                        </a>
                                    <?php } else { ?>

                                        <?php } ?>
                                    </li>
                                    <li class="dropdown-menu-footer">
                                        <a class="dropdown-item p-1 text-center" href="javascript:void(0)">
                                            <?php if($totalnotif !=0) { ?>
                                            Complete the request!
                                        <?php } else { ?>
                                            All requests have been completed
                                            <?php } ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item d-none d-lg-block">
                                <a class="nav-link nav-link-expand">
                                    <i class="ficon feather icon-maximize"></i>
                                </a>
                            </li>
                            <li class="dropdown dropdown-user nav-item">
                                <a
                                    class="dropdown-toggle nav-link dropdown-user-link"
                                    href="#"
                                    data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none">
                                        <span class="user-name text-bold-600"><?= $this->session->userdata('user_name') ?></span><span class="user-status">Online</span></div>
                                    <span><img
                                        class="round"
                                        src="<?= base_url(); ?>/images/admin/<?= $this->session->userdata('image') ?>"
                                        alt="avatar"
                                        height="40"
                                        width="40"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?= base_url(); ?>profile">
                                        <i class="feather icon-user"></i>
                                        Edit Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url(); ?>login/logout">
                                        <i class="feather icon-power"></i>
                                        Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- END: Header-->

        <!-- BEGIN: Main Menu-->
        <div
            class="main-menu menu-fixed menu-light menu-accordion menu-shadow"
            data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="<?= base_url(); ?>">
                            <span><img
                                class="round"
                                src="<?= base_url(); ?>asset/app-assets/images/logo/logoweb.png"
                                alt="avatar"
                                height="40"
                                width="40"></span>
                            <h2 class="brand-text mb-0">Ornids</h2>
                        </a>
                    </li>
                    <li class="nav-item nav-toggle">
                        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                            <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                            <i
                                class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                                data-ticon="icon-disc"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul
                    class="navigation navigation-main"
                    id="main-menu-navigation"
                    data-menu="menu-navigation">
                    <?php
                foreach ($menu as $mnu) {
                    if ($mnu['menu_sub'] == 0) { ?>
                    <li class=" nav-item">
                        <a href="<?= base_url(); ?><?= $mnu['menu_url'] ?>">
                            <i class="feather <?= $mnu['menu_icon'] ?>"></i>
                            <span class="menu-title" data-i18n="Dashboard"><?= $mnu['menu_title'] ?></span></a>
                    <?php
                    } else { ?>

                        <li class=" nav-item">
                            <a href="<?= $mnu['menu_url'] ?>">
                                <i class="feather <?= $mnu['menu_icon'] ?>"></i>
                                <span class="menu-title" data-i18n="Dashboard"><?= $mnu['menu_title'] ?></span></a>
                            <ul class="menu-content">
                                <?php
                                foreach ($mnu['sub_menu'] as $sub) { ?>
                                <li>
                                    <a href="<?= base_url(); ?><?= $sub['sub_url'] ?>">
                                        <i class="feather icon-disc text-success"></i>
                                        <span class="menu-item" data-i18n="Basic"><?= $sub['sub_title'] ?></span></a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <?php
                    }
                }
                ?>

                    </ul>
                </div>
            </div>
            <!-- END: Main Menu-->