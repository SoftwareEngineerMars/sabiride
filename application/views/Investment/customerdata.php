 BEGIN: Content-->
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
                                <h4 class="card-title">Customer Investment Data</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                     <a class="btn btn-success mb-1 text-white" href="<?= base_url(); ?>Investment/addinvestmentCustomer">
                                        <i class="feather icon-plus mr-1"></i>Add Customer Investment</a> 
                                    
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
                                                                                    <th>No</th>
                                                                                    <th>Users Image</th>
                                                                                    <th>Users Info</th>
                                                                                    <th>Plan Name</th>
                                                                                    <th>Plan Amount</th>
                                                                                    <th>Open Date</th>
                                                                                    <th>Status</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                if($customer){
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
                                                                                        <td><?= $cstm['ilu_plan_name'] ?></td>
                                                                                        <td><?= $cstm['ilu_plan_currency'] ?><?= $cstm['ilu_plan_amount'] ?></td>
                                                                                        <td><?= $cstm['ilu_created_date'] ?></td>
                                                                                       
                                                                                        <td>
                                                                                            <?php if ($cstm['ilu_status'] == 1) { ?>
                                                                                                <label class="badge badge-success">Active</label>
                                                                                            <?php } else { ?>
                                                                                                <label class="badge badge-dark">Blocked</label>
                                                                                            <?php } ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="">
                                                                                                <a href="<?= base_url(); ?>Investment/Investment_customer_list_detail/<?= $cstm['id'] ?>">
                                                                                                    <i class="feather icon-eye text-info"></i>
                                                                                                </a>
                                                                                            </span>
                                                                                            <?php if ($cstm['status'] == 0) { ?>
                                                                                                <span class="mr-1 ml-1">
                                                                                                    <a href="<?= base_url(); ?>Investment/unblock/<?= $cstm['id']; ?>">
                                                                                                        <i class="feather icon-lock text-danger"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            <?php } else { ?>
                                                                                                <span class="mr-1 ml-1">
                                                                                                    <a href="<?= base_url(); ?>Investment/block/<?= $cstm['id']; ?>">
                                                                                                        <i class="feather icon-unlock text-success"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            <?php } ?>
                                                                                            <span class="action-delete ml-1">
                                                                                                <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>Investment/deleteusers/<?= $cstm['id']; ?>">
                                                                                                    <i class="feather icon-trash text-danger"></i></a>
                                                                                            </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php $i++;
                                                                                }} ?>
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