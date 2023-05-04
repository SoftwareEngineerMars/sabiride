<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <!-- Content types section start -->

            <section id="content-types">
                <div class="row match-height">
                    <?php
                    foreach ($product as $pro) { ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" style="max-height:180px" src="<?= $pro['item_image']; ?>" alt="Card image cap" />
                                    <div class="card-body">
                                        <h4 class="card-title" style="min-height:100px;">[<?= $pro['name']; ?>] <?= $pro['item_name']; ?></h4>
                                        <p class="card-text text-muted">By <?= $pro['author']; ?></p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <span class="float-left mr-1"><i class="feather icon-star text-warning"></i><?= $pro['rating']; ?></span>
                                    <span class="float-left"><i class="feather icon-tag text-warning"></i><?= $pro['sales']; ?> Sales</span>
                                    <span class="float-right">
                                        <?php
                                        if ($pro['soon'] != 1) { ?>
                                            <a href="<?= base_url(); ?>extensions/detail/<?= $pro['product_id']; ?>"><button class="btn btn-outline-success">Detail</button></a>
                                        <?php
                                        } else { ?>
                                            <button class="btn btn-outline-success">Coming Soon</button>
                                        <?php
                                        } ?>
                                    </span>
                                </div>
                            </div>

                        </div>
                    <?php
                    } ?>
                </div>
            </section>

            <!-- Content types section end -->

        </div>
    </div>
</div>
<!-- END: Content-->