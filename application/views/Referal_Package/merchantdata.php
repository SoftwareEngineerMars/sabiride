<!-- BEGIN: Content-->
<div class="app-content content">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
<div class="content-body">
<!-- merchant data Start -->
<!-- merchant tabs start -->
<section id="basic-tabs-components">
<div class="row">
<div class="col-sm-12">
<div class="card overflow-hidden">

<div class="card-content">
<div class="card-body">

<div class="tab-content">
<div class="tab-pane active" id="allmerchant" aria-labelledby="allmerchant-tab" role="tabpanel">
<!-- start all merchant data table -->
<section id="column-selectors">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">All Merchants Referal Detail Data</h4>
</div>
<div class="card-content">
<div class="card-body card-dashboard">
<div class="table-responsive">
<table class="table table-striped dataex-html5-selectors">
<thead>
    <tr>
       <th>No</th>
        <th>Users Image</th>
        <th>Users Info</th>
        <th>Plan Name</th>
        <th>Plan Amount</th>
        <th>Open Date</th>
        <th>Referal Code</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php $i = 1;
     if($merchant){
    foreach ($merchant as $mrc) {
        if ($mrc['partner_status'] != 0) { ?>
            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/merchant/') . $mrc['merchant_image']; ?>">
                </td>
                <td> 
                     <b>UserId:</b> <?= $mrc['merchant_id'] ?> <br>
                     <b>Full Name:</b> <?= $mrc['merchant_name'] ?> <br>
                     <b>Mobile:</b>  <?= $mrc['merchant_phone_number'] ?>

                 </td>
                  <td><?= $mrc['rpc_package_name'] ?></td>
                <td><?= $mrc['rpc_package_currency'] ?><?= $mrc['rpc_package_amount'] ?></td>
                <td><?= $mrc['rpc_ceated_date'] ?></td>
                <td><?= $mrc['rpc_referal_code'] ?></td>
               
                <td>
                    <?php if ($mrc['rpc_status'] == 1) { ?>
                        <label class="badge badge-success">Active</label>
                    <?php } else { ?>
                        <label class="badge badge-dark">Blocked</label>
                    <?php } ?>
                </td>

                <td>
                    <span class="mr-1">
                        <a href="<?= base_url(); ?>Referal_package/Referal_package_merchant_list_Detail/<?= $mrc['merchant_id'] ?>/<?= $mrc['rpc_id'] ?>/<?= $mrc['rpc_referal_code'] ?>">
                            <i class="feather icon-eye text-success"></i>
                        </a>
                    </span>
                    <?php
                    if ($mrc['partner_status'] == 1) { ?>
                        <span class="action-edit mr-1">
                            <a href="<?= base_url(); ?>Referal_package/blockmerchant/<?= $mrc['merchant_id']; ?>">
                                <i class="feather icon-unlock text-info"></i>
                            </a>
                        </span>
                    <?php } else { ?>
                        <span class="action-edit mr-1">
                            <a href="<?= base_url(); ?>Referal_package/unblockmerchant/<?= $mrc['merchant_id']; ?>">
                                <i class="feather icon-lock text-danger"></i>
                            </a>
                        </span>
                    <?php } ?>
                    <span class="action-edit mr-1">
                        <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>Referal_package/deletemerchant/<?= $mrc['rpc_id']; ?>">
                            <i class="feather icon-trash text-danger"></i></a>
                    </span>

                </td>
            </tr>
    <?php $i++;
        }}
    } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end of all merchant data table -->
</div>


</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end of merchant tab -->
<!-- end of merchant data -->
</div>
</div>
</div>
<!-- END: Content-->