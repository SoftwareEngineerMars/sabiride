<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h1 class="text-bold-700">
                                        <?= $currency ?>
                                        <?= number_format($totaltransvalue->row('totaltransactionvalue') / 100, $decimal, ".", ",") ?>
                                    </h1>
                                    <p class="mb-0 line-ellipsis">Transaction Value</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700">
                                        <?= $currency ?>
                                        <?= number_format($completetransvalue->row('completetransactionvalue') / 100, $decimal, ".", ",") ?>
                                    </h2>
                                    <p class="mb-0 line-ellipsis">Complete Transaction Value</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700">
                                        <?= $currency ?>
                                        <?= number_format($canceltransvalue->row('canceltransactionvalue') / 100, $decimal, ".", ",") ?>
                                    </h2>
                                    <p class="mb-0 line-ellipsis">Cancel Transaction Value</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700">
                                        <?= $currency ?>
                                        <?= number_format($nodrivertransvalue->row('nodrivertransactionvalue') / 100, $decimal, ".", ",") ?>
                                    </h2>
                                    <p class="mb-0 line-ellipsis">No Driver Transaction Value</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Transaction statistic Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700">
                                        <?= $currency ?>
                                        <?= number_format($statistic->row('passangertranscount') / 100, $decimal, ".", ",") ?>
                                    </h2>
                                    <p class="mb-0 line-ellipsis">Passanger Transport Value</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700">
                                        <?= $currency ?>
                                        <?= number_format($statistic->row('shipmenttranscount') / 100, $decimal, ".", ",") ?>
                                    </h2>
                                    <p class="mb-0 line-ellipsis">Shipment Transaction Value</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700">
                                        <?= $currency ?>
                                        <?= number_format($statistic->row('rentaltranscount') / 100, $decimal, ".", ",") ?>
                                    </h2>
                                    <p class="mb-0 line-ellipsis">Rental Transaction Value</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <h2 class="text-bold-700">
                                        <?= $currency ?>
                                        <?= number_format($statistic->row('purchasingtranscount') / 100, $decimal, ".", ",") ?>
                                    </h2>
                                    <p class="mb-0 line-ellipsis">Purchasing Service Transaction Value</p>
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
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valuepassanger->row('successpassangercount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valuepassanger->row('successpassangercountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Canceled</p>
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valuepassanger->row('cancelpassangercount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valuepassanger->row('cancelpassangercountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">No Driver</p>
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valuepassanger->row('nodriverpassangercount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valuepassanger->row('nodriverpassangercountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
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
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valueshipment->row('successshipmentcount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valueshipment->row('successshipmentcountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Canceled</p>
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valueshipment->row('cancelshipmentcount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valueshipment->row('cancelshipmentcountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">No Driver</p>
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valueshipment->row('nodrivershipmentcount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valueshipment->row('nodrivershipmentcountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
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
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valuerental->row('successrentalcount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valuerental->row('successrentalcountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Canceled</p>
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valuerental->row('cancelrentalcount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valuerental->row('cancelrentalcountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">No Driver</p>
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valuerental->row('nodriverrentalcount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valuerental->row('nodriverrentalcountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
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
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valuepurchasing->row('successpurchasingcount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valuepurchasing->row('successpurchasingcountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">Canceled</p>
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valuepurchasing->row('cancelpurchasingcount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valuepurchasing->row('cancelpurchasingcountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
                                            <span class="text-muted d-block">today</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-25">
                                        <div class="browser-info">
                                            <p class="mb-25">No Driver</p>
                                            <h4>
                                                <?= $currency ?>
                                                <?= number_format($valuepurchasing->row('nodriverpurchasingcount') / 100, $decimal, ".", ",") ?>
                                            </h4>
                                        </div>
                                        <div class="stastics-info text-right">
                                            <span>
                                                <?= $currency ?>
                                                <?= number_format($valuepurchasing->row('nodriverpurchasingcountdaily') / 100, $decimal, ".", ",") ?>
                                            </span>
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
                                    <td class="product-name">
                                        <?= $currency ?>
                                        <?= number_format($cmpt['daily'] / 100, $decimal, ".", ",") ?>
                                    </td>
                                    <td class="product-name">
                                        <span class="text-muted">
                                            <?= $currency ?>
                                            <?= number_format($cmpt['latestday'] / 100, $decimal, ".", ",") ?>
                                            <?php if ($cmpt['icondaily'] == 'up') { ?>
                                                <i class="feather icon-arrow-up text-success"></i>
                                            <?php } else { ?>
                                                <i class="feather icon-arrow-down text-danger"></i>
                                            <?php } ?>
                                        </span>
                                    </td>
                                    <td class="product-name">
                                        <?= $currency ?>
                                        <?= number_format($cmpt['monthly'] / 100, $decimal, ".", ",") ?>
                                    </td>
                                    <td class="product-name">
                                        <span class="text-muted">
                                            <?= $currency ?>
                                            <?= number_format($cmpt['latestmonth'] / 100, $decimal, ".", ",") ?>
                                            <?php if ($cmpt['iconmonthly'] == 'up') { ?>
                                                <i class="feather icon-arrow-up text-success"></i>
                                            <?php } else { ?>
                                                <i class="feather icon-arrow-down text-danger"></i>
                                            <?php } ?>
                                        </span>
                                    </td>
                                    <td class="product-name">
                                        <?= $currency ?>
                                        <?= number_format($cmpt['yearly'] / 100, $decimal, ".", ",") ?>
                                    </td>
                                    <td class="product-name">
                                        <span class="text-muted">
                                            <?= $currency ?>
                                            <?= number_format($cmpt['latestyear'] / 100, $decimal, ".", ",") ?>
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