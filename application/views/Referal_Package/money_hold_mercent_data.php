 <!-- BEGIN: Content-->
<div class="app-content content">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
<div class="content-body">
<!-- customer data Start -->
<!-- customer tabs start -->
<section id="basic-tabs-components">
<div class="row">
<div class="col-sm-12">
<div class="card overflow-hidden">
<div class="card-header">
<h4 class="card-title">Mercent Money Hold On And Detail </h4>
</div>
<div class="card-content">
<div class="card-body">
<!-- <a class="btn btn-success mb-1 text-white" href="<?= base_url(); ?>user/addcustomerview">
<i class="feather icon-plus mr-1"></i>Add User</a> -->
<!-- <ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="allcustomer-tab" data-toggle="tab" href="#allcustomer" aria-controls="allcustomer" role="tab" aria-selected="true">All Customers</a>
</li>

</ul> -->
<div class="tab-content">
<div class="tab-pane active" id="allcustomer" aria-labelledby="allcustomer-tab" role="tabpanel">
<!-- start all customer data table -->
<section id="column-selectors">
<div class="row">
<div class="col-12">
<div class="card">
    <!-- <div class="card-header">
        <h4 class="card-title">All Customer Data</h4>
    </div> -->
    <div class="card-content">
        <div class="card-body card-dashboard">
            <div class="table-responsive">
                <table class="table table-striped dataex-html5-selectors">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Users Image</th>
                            <th>Users Info</th>
                            <th>Detail</th>
                            <th>Open Date & Time</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Comment</th>
                            <!--<th>Actions</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        
                        if(!empty($merchant)){ 
                        foreach ($merchant as $cstm) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/merchant/') . $cstm['merchant_image']; ?>">
                                </td>
                              
                                <td>
                                    <b>UserId:</b> <?= $cstm['merchant_id'] ?> <br>
                                    <b>Full Name:</b> <?= $cstm['merchant_name'] ?> <br>
                                    <b>Mobile:</b>  <?= $cstm['merchant_phone_number'] ?>
                                </td>
                                
                                <td><?= $cstm['moh_amount_type'] ?></td>
                               
                                <td><?= $cstm['moh_created_date'] ?></td>
                                <td><?= $cstm['moh_currency'] ?> <?= $cstm['moh_amount'] ?></td>
                               
                                <td>
                                    <?php if ($cstm['moh_status'] == 0) { ?>
                                        <label class="badge badge-success">Pending</label>
                                    <?php } else if ($cstm['moh_status'] == 1){ ?>
                                        <label class="badge badge-dark">Conform</label>
                                        <?php } else if ($cstm['moh_status'] == 2){ ?>
                                        <label class="badge badge-dark">Reject/Return</label>
                                    <?php } ?>
                                </td>
                                 <td><?= $cstm['moh_comment'] ?></td>
                               
                            </tr>
                        <?php $i++;
                        } }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<!-- end of all customer data table -->
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end of customer tab -->
<!-- end of customer data -->
</div>
</div>
</div>
<!-- END: Content