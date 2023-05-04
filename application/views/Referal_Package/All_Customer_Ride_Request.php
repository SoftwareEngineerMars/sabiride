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
<h4 class="card-title">All Customer Ride Request Data</h4>
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
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Open Date & Time</th>
                            <th>Amount</th>
                            <!--<th>Driver Bid</th>-->
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        
                        if(!empty($customer)){ 
                        foreach ($customer as $cstm) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/customer/') . $cstm['customer_image']; ?>">
                                </td>
                              
                                <td>
                                    <b>UserId:</b> <?= $cstm['id'] ?> <br><b>Full Name:</b> <?= $cstm['customer_fullname'] ?> <br><b>Email:</b> 
                                    <?= $cstm['email'] ?> <br><b>Mobile:</b>  <?= $cstm['phone_number'] ?>
                                </td>
                                
                                <td><?= $cstm['rr_detail'] ?></td>
                                <td><?= $cstm['rr_source'] ?></td>
                                <td><?= $cstm['rr_destination'] ?></td>
                                <td>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>:- <?= $cstm['rr_date'] ?><br>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>:- <?= $cstm['rr_time'] ?>
                                
                               </td>
                                <td><?= $cstm['rr_currency'] ?> <?= $cstm['rr_amount'] ?></td>
                               
                                <td>
                                    <?php
                                    $current_date = Date('Y-m-d');
                                    
                                    if ($cstm['rr_date'] >= $current_date) { ?>
                                    
                                    <?php if ($cstm['rr_status'] == 0) { ?>
                                        <label class="badge badge-success">Active</label>
                                    <?php } else if ($cstm['rr_status'] == 1){ ?>
                                        <label class="badge badge-dark">Close</label>
                                        <?php } else if ($cstm['rr_status'] == 2){ ?>
                                        <label class="badge badge-dark">Reject</label>
                                    <?php } ?>
                                    
                                    <?php }else{ ?>
                                    
                                    <label class="badge badge-danger">Expire</label>
                                    
                                    <?php } ?>
                                    
                                </td>
                                <td>
                                    <span class="">
                                        <a href="<?= base_url(); ?>Referal_package/Bid_Customer_list_detail/<?= $cstm['ride_req_id'] ?>">
                                            <i class="feather icon-eye text-info"></i>
                                        </a>
                                    </span>
                                    <span class="action-delete ml-1">
                                        <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>Referal_package/deleteusersbid/<?= $cstm['ride_req_id']; ?>">
                                            <i class="feather icon-trash text-danger"></i></a>
                                    </span>
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