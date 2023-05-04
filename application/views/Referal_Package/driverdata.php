<!-- BEGIN: Content-->
<div class="app-content content">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
<div class="content-body">
<!-- drivers data Start -->
<!-- drivers tabs start -->
<section id="basic-tabs-components">
<div class="row">
<div class="col-sm-12">
<div class="card overflow-hidden">

<div class="card-content">
<div class="card-body">

<div class="tab-content">
<div class="tab-pane active" id="alldriver" aria-labelledby="alldriver-tab" role="tabpanel">

<section id="column-selectors">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">All Drivers Referal Detail Data</h4>
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
            if(!empty($driver)){  
            foreach ($driver as $drv) {
                 ?>
                    <tr>
                        <td>
                            <?= $i ?>
                        </td>
                        
                        <td>
                            <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/driverphoto/') . $drv['photo']; ?>">
                        </td>
                        <td> 
                             <b>UserId:</b> <?= $drv['id'] ?> <br>
                             <b>Full Name:</b> <?= $drv['driver_name'] ?> <br>
                             <!-- <b>Job:</b> <?= $drv['driver_job'] ?> <br> -->
                             <b>Mobile:</b>  <?= $drv['phone_number'] ?>
                         </td>
                                <td><?= $drv['rpc_package_name'] ?></td>
                                <td><?= $drv['rpc_package_currency'] ?><?= $drv['rpc_package_amount'] ?></td>
                                <td><?= $drv['rpc_ceated_date'] ?></td>
                                <td><?= $drv['rpc_referal_code'] ?></td>

                        
                        <td>
                            <?php if ($drv['status'] == 3) { ?>
                                <label class="badge badge-dark">Banned</label>
                            <?php } elseif ($drv['status'] == 0) { ?>
                                <label class="badge badge-secondary text-dark">New Reg</label>
                                <?php } else {
                                if ($drv['status_job'] == 1) { ?>
                                    <label class="badge badge-info">Active</label>
                                <?php }
                                if ($drv['status_job'] == 2) { ?>
                                    <label class="badge badge-primary">Pick'up</label>
                                <?php }
                                if ($drv['status_job'] == 3) { ?>
                                    <label class="badge badge-success">work</label>
                                <?php }
                                if ($drv['status_job'] == 4) { ?>
                                    <label class="badge badge-warning">Non Active</label>
                                <?php }
                                if ($drv['status_job'] == 5) { ?>
                                    <label class="badge badge-danger">Log Out</label>
                            <?php }
                            } ?>
                        </td>
                        <td>
                            <span class="mr-1">
                                <a href="<?= base_url(); ?>Referal_package/Referal_package_driver_list_detail/<?= $drv['id'] ?>/<?= $drv['rpc_id'] ?>/<?= $drv['rpc_referal_code'] ?>">
                                    <i class="feather icon-eye text-success"></i>
                                </a>
                            </span>
                            <?php
                            if ($drv['status'] != 0) {

                                if ($drv['status'] != 3) { ?>
                                    <span class="action-edit mr-1">
                                        <a href="<?= base_url(); ?>Referal_package/blockdriver/<?= $drv['id']; ?>">
                                            <i class="feather icon-unlock text-info"></i>
                                        </a>
                                    </span>
                                <?php } else { ?>
                                    <span class="action-edit mr-1">
                                        <a href="<?= base_url(); ?>Referal_package/unblockdriver/<?= $drv['id']; ?>">
                                            <i class="feather icon-lock text-info"></i>
                                        </a>
                                    </span>
                            <?php }
                            } ?>
                            <span class="action-edit mr-1">
                                <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>Referal_package/deletedriver/<?= $drv['rpc_id']; ?>">
                                    <i class="feather icon-trash text-danger"></i></a>
                            </span>
                        </td>
                    </tr>
            <?php $i++;
                } }
             ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end of all driver data table -->
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end of drivers tab -->
<!-- end of drivers data -->
</div>
</div>
</div>
<!-- END: Content-->