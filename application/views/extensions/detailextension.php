<!-- BEGIN: Content-->


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <!-- app ecommerce details start -->
            <section class="app-ecommerce-details">
                <div class="card">
                    <?php
                    foreach ($product as $pro) { ?>
                        <div class="card-body">
                            <div class="row mb-0 mt-0">
                                <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0">
                                    <div class="d-flex justify-content-center" style="height: 250px;">
                                        <img src="<?= $pro['item_image']; ?>" class="img-fluid" alt="product image">
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 mt-2 mb-2 d-flex align-self-center flex-wrap">
                                    <div class="col-12 col-md-12">
                                        <h3 class="col-12">[<?= $pro['name']; ?>] <?= $pro['item_name']; ?>
                                        </h3>
                                        <p class="text-muted col-12">by <?= $pro['author']; ?></p>
                                        <div class="ecommerce-details-price d-flex flex-wrap col-12">

                                            <p class="text-primary font-medium-3 mr-1 mb-0">$<?= number_format($pro['price'] / 100, 2, ".", "."); ?></p>
                                            <span class="pl-1 font-medium-3 border-left mr-1">
                                                <i class="<?php if ($pro['rating'] >= 1) { ?>fa fa-star text-warning<?php } else { ?>feather icon-star text-secondary<?php } ?>"></i>
                                                <i class="<?php if ($pro['rating'] >= 1.5) { ?>fa fa-star text-warning<?php } else { ?>feather icon-star text-secondary<?php } ?>"></i>
                                                <i class="<?php if ($pro['rating'] >= 2.5) { ?>fa fa-star text-warning<?php } else { ?>feather icon-star text-secondary<?php } ?>"></i>
                                                <i class="<?php if ($pro['rating'] >= 3.5) { ?>fa fa-star text-warning<?php } else { ?>feather icon-star text-secondary<?php } ?>"></i>
                                                <i class="<?php if ($pro['rating'] >= 4.5) { ?>fa fa-star text-warning<?php } else { ?>feather icon-star text-secondary<?php } ?>"></i>
                                            </span>
                                            <span class="text-dark font-medium-1"><?= $pro['rating']; ?> (<?= $pro['rating_count']; ?> ratings)</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pt-1">
                                        <a href="<?= $pro['url']; ?>"><button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i class="feather icon-shopping-cart mr-25"></i>BUY NOW</button></a>
                                        <!-- <button class="btn btn-outline-success mr-0 mr-sm-1 mb-1 mb-sm-0" data-toggle="modal" data-target="#installextension">Support</button> -->
                                        <?php
                                        if (!empty($lognew)) {
                                            foreach ($lognew as $log) { ?>
                                                <?php if ($version > 0) { ?>
                                                    <button class="btn btn-outline-danger mr-0 mr-sm-1 mb-1 mb-sm-0" data-toggle="modal" data-target="#installextension"><?= $log['title']; ?></button>
                                                <?php } else { ?>
                                                    <button class="btn btn-outline-success mr-0 mr-sm-1 mb-1 mb-sm-0" data-toggle="modal" data-target="#installextension">Install</button>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } else {  ?>
                                            <button class="btn btn-outline-dark mr-0 mr-sm-1 mb-1 mb-sm-0">Updated</button>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                    <hr>
                    <section id="basic-tabs-components">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="itemdescription-tab" data-toggle="tab" href="#itemdescription" aria-controls="itemdescription" role="tab" aria-selected="true">Item Description</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="changelog-tab" data-toggle="tab" href="#changelog" aria-controls="changelog" role="tab" aria-selected="false">Change Log</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="itemdescription" aria-labelledby="itemdescription-tab" role="tabpanel">

                                                    <div class="container mt-3">
                                                        <div class="row">

                                                            <div class="col-md-3 p-2 align-self-start mb-2" style="background-color: mintcream;">

                                                                <p class="font-weight-bold mb-25"> <i class="feather icon-clock mr-50 font-medium-2"></i>Last Update : </p>
                                                                <p><?= $pro['last_update']; ?></p>
                                                                <p class="font-weight-bold mb-25"> <i class="feather icon-check mr-50 font-medium-2"></i>Created : </p>
                                                                <p><?= $pro['created']; ?></p>
                                                                <?php foreach ($pro['summary'] as $smr) { ?>
                                                                    <p class="font-weight-bold mb-25"> <i class="feather icon-file mr-50 font-medium-2"></i><?= $smr['name']; ?> : </p>
                                                                    <p><?= implode(", ", (array)$smr['value']); ?></p>
                                                                <?php } ?>
                                                                <p class="font-weight-bold mb-25"> <i class="feather icon-tag mr-50 font-medium-2"></i>Tags : </p>
                                                                <p><?= implode(", ", $pro['tags']); ?></p>

                                                            </div>
                                                            <div class="col-md-9">
                                                                <?= $pro['description']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="changelog" aria-labelledby="changelog-tab" role="tabpanel">


                                                    <div class="col-12">
                                                        <div class="card collapse-icon accordion-icon-rotate">
                                                            <div class="card-body">
                                                                <?php
                                                                $i = 1;
                                                                foreach ($logs as $log) { ?>
                                                                    <div class="accordion" id="accordionExample" data-toggle-hover="true">
                                                                        <div class="collapse-margin">
                                                                            <div class="card-header" id="heading<?= $i ?>" data-toggle="collapse" role="button" data-target="#collapse<?= $i ?>" aria-expanded="false" aria-controls="collapse<?= $i ?>">
                                                                                <span class="lead collapse-title collapsed">
                                                                                    <?= $log['title'] . ' [' . date_format(date_create($log['created']), 'd M Y') . ']'; ?>
                                                                                </span>
                                                                            </div>

                                                                            <div id="collapse<?= $i ?>" class="collapse" aria-labelledby="heading<?= $i ?>" data-parent="#accordionExample">
                                                                                <div class="card-body">
                                                                                    <?= $log['description']; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php $i++;
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </section>

        </div>
        </section>
        <!-- app ecommerce details end -->

    </div>
</div>
</div>
<!-- END: Content-->

<div class="modal fade text-left" id="installextension" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Install Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pr-2 pl-2">

                <section id="basic-vertical-layouts">
                    <?= form_open_multipart('extensions/install'); ?>
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <!-- start install extension form -->

                                <div class="col-12">
                                    <input type="hidden" name="version" value="<?= $version; ?>">
                                    <input type="hidden" name="itemid" value="<?= $itemid; ?>">
                                    <div class="form-group">
                                        <label for="username">Codecanyon Username</label>
                                        <input id="username" type="text" class="form-control" name="username" placeholder="enter codecanyon username" required="required">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="purchasecode">Extension Purchase Code</label>
                                        <input id="pc" type="text" class="form-control" name="pcode" placeholder="enter codecanyon username" required="required">
                                    </div>
                                </div>
                                <!-- end of install extension form -->

                                <div class="col-12">
                                    <p class="text-danger" id="warning1">By clicking the button below the system will make adjustments to your previous project with this extension, please do a backup first to avoid system errors.</p>
                                    <p class="text-danger" id="warning2" style="display: none;">Don't close this window until the install process is complete</p>
                                </div>



                                <div class="col-12">
                                    <button id="buttoninstall" type="submit" class="btn btn-primary mr-1 mb-1" onclick="Updating()">Install</button>
                                    <span id="installing" style="display: none;" class="align-self-center">Installing update<mark><span class="typed"></span><span class="typed-cursor"></span></mark></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?= form_close(); ?>
                </section>
            </div>
        </div>
    </div>
</div>