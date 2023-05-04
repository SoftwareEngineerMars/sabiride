 <!-- BEGIN: Content-->
<div class="app-content content">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
<div class="content-body">
<!-- customer data Start -->
<!-- customer tabs start -->
<a href="<?= base_url(); ?>Referal_package/All_Customer_Ride_Request"><button class="btn btn-primary">Back</button></a>
<section id="basic-tabs-components">
<div class="row">
<div class="col-sm-12">
<div class="card overflow-hidden">
<div class="card-header">
<h4 class="card-title">All Customer Ride Driver Request Data</h4>
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
                            <th>Mesage</th>
                            <th>Open Date & Time</th>
                            <th>Amount</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        
                        if(!empty($customer)){ 
                        foreach ($customer as $drv) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/driverphoto/') . $drv['photo']; ?>">
                                </td>
                              
                                <td>
                                    <b>UserId:</b> <?= $drv['id'] ?> <br>
                                    <b>Full Name:</b> <?= $drv['driver_name'] ?> <br>
                                   <!-- <b>Job:</b> <?= $drv['driver_job'] ?> <br> -->
                                    <b>Mobile:</b>  <?= $drv['phone_number'] ?>
                                </td>
                                
                                <td><?= $drv['rbr_message'] ?></td>
                               
                                <td><?= $drv['rbr_auto_date'] ?></td>
                                <td><?= $drv['rbr_currency'] ?> <?= $drv['rbr_amount'] ?></td>
                               
                                <td>
                                    <?php if ($drv['rbr_status'] == 0) { ?>
                                        <label class="badge badge-success">Waiting</label>
                                    <?php } else if ($drv['rbr_status'] == 1){ ?>
                                        <label class="badge badge-dark">Hire</label>
                                        
                                    <?php } ?>
                                </td>
                               
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