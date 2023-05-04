<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- start of revenue & in proggress -->
            <div class="row">
                <!-- Line Area Chart -->
                <div class="col-lg-8 col-md-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Transacaction Chart</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div id="line-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-end">
                            <h4 class="mb-0">Entire Complete Transaction</h4>
                            <p class="font-medium-5 mb-0"></p>
                        </div>
                        <div class="card-content">
                            <div class="card-body px-0 pb-0">
                                <div id="goal-overview-chart" class="mt-75"></div>
                                <div class="row text-center mx-0">
                                    <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">In progress</p>
                                        <p class="font-large-1 text-bold-700"><?= $totalprogress ?></p>
                                    </div>
                                    <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">Completed</p>
                                        <p class="font-large-1 text-bold-700 text-success"><?= $totalsuccess ?></p>
                                    </div>
                                    <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">Canceled</p>
                                        <p class="font-large-1 text-bold-700 text-danger"><?= $totalcanceled ?></p>
                                    </div>
                                    <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">No Driver</p>
                                        <p class="font-large-1 text-bold-700 text-danger"><?= $totalnodriver ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of transaction statistic -->
            <!-- Transaction statistic Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700"><?= $statistic->row('passangertranscount') ?></h2>
                                    <p class="mb-0 line-ellipsis">Total Passanger Transport Transaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700"><?= $statistic->row('shipmenttranscount') ?></h2>
                                    <p class="mb-0 line-ellipsis">Total Shipment Transaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700"><?= $statistic->row('rentaltranscount') ?></h2>
                                    <p class="mb-0 line-ellipsis">Total Rental Transaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700"><?= $statistic->row('purchasingtranscount') ?></h2>
                                    <p class="mb-0 line-ellipsis">Total Purchasing Service Transaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of dashboard analitics -->

                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Passanger Transport</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Complete</p>
                                            <h4><?= $countpassanger->row('successpassangercount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countpassanger->row('successpassangercountdaily') ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Canceled</p>
                                            <h4><?= $countpassanger->row('cancelpassangercount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countpassanger->row('cancelpassangercountdaily') ?></span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">No Driver</p>
                                            <h4><?= $countpassanger->row('nodriverpassangercount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countpassanger->row('nodriverpassangercountdaily') ?></span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Shipment Transport</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Complete</p>
                                            <h4><?= $countshipment->row('successshipmentcount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countshipment->row('successshipmentcountdaily') ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Canceled</p>
                                            <h4><?= $countshipment->row('cancelshipmentcount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countshipment->row('cancelshipmentcountdaily') ?></span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">No Driver</p>
                                            <h4><?= $countshipment->row('nodrivershipmentcount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countshipment->row('nodrivershipmentcountdaily') ?></span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rental Transport</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Complete</p>
                                            <h4><?= $countrental->row('successrentalcount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countrental->row('successrentalcountdaily') ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Canceled</p>
                                            <h4><?= $countrental->row('cancelrentalcount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countrental->row('cancelrentalcountdaily') ?></span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">No Driver</p>
                                            <h4><?= $countrental->row('nodriverrentalcount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countrental->row('nodriverrentalcountdaily') ?></span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Purchasing Transport</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Complete</p>
                                            <h4><?= $countpurchasing->row('successpurchasingcount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countpurchasing->row('successpurchasingcountdaily') ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Canceled</p>
                                            <h4><?= $countpurchasing->row('cancelpurchasingcount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countpurchasing->row('cancelpurchasingcountdaily') ?></span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">No Driver</p>
                                            <h4><?= $countpurchasing->row('nodriverpurchasingcount') ?></h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span><?= $countpurchasing->row('nodriverpurchasingcountdaily') ?></span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section id="data-thumb-view" class="data-thumb-view-header">
                <div class="card-header">
                    <h4>Transaction complete by service</h4>
                </div>
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Icon</th>
                                <th>Service</th>
                                <th>Today</th>
                                <th class="text-muted">Yesterday</th>
                                <th>This Month</th>
                                <th class="text-muted">Last Month</th>
                                <th>This Year</th>
                                <th class="text-muted">Last Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($complete as $cmpt) { ?>
                                <tr>
                                    <td class="product-name"><?= $i ?></td>
                                    <td class="product-img">
                                        <div class="badge badge-primary">
                                            <img src="<?= base_url('images/service/') . $cmpt['icon']; ?>">
                                        </div>
                                    </td>
                                    <td class="product-name"><?= $cmpt['service'] ?> Service</td>
                                    <td class="product-name"><?= $cmpt['daily'] ?></td>
                                    <td class="product-name">
                                        <span class="text-muted"><?= $cmpt['latestday'] ?>
                                            <?php if ($cmpt['icondaily'] == 'up') { ?>
                                                <i class="feather icon-arrow-up text-success"></i>
                                            <?php } else { ?>
                                                <i class="feather icon-arrow-down text-danger"></i>
                                            <?php } ?>
                                        </span>
                                    </td>
                                    <td class="product-name"><?= $cmpt['monthly'] ?></td>
                                    <td class="product-name">
                                        <span class="text-muted">
                                            <?= $cmpt['latestmonth'] ?>
                                            <?php if ($cmpt['iconmonthly'] == 'up') { ?>
                                                <i class="feather icon-arrow-up text-success"></i>
                                            <?php } else { ?>
                                                <i class="feather icon-arrow-down text-danger"></i>
                                            <?php } ?>
                                        </span>
                                    </td>
                                    <td class="product-name"><?= $cmpt['yearly'] ?></td>
                                    <td class="product-name">
                                        <span class="text-muted">
                                            <?= $cmpt['latestyear'] ?>
                                            <?php if ($cmpt['iconyearly'] == 'up') { ?>
                                                <i class="feather icon-arrow-up text-success"></i>
                                            <?php } else { ?>
                                                <i class="feather icon-arrow-down text-danger"></i>
                                            <?php } ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>

            </section>
        </div>
    </div>
</div>
<!-- END: Content-->