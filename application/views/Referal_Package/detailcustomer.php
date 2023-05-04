<!-- BEGIN: Content--> 
<div class="app-content content">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>

<div class="content-wrapper">
<div class="content-body">
<!-- detail customer Start -->

<div class="row">

<div class="col-lg-4 col-sm-12">

<div class="card">
    <div class="card-header mx-auto pb-0">
        <div class="row m-0">
            <div class="text-center">
                <h4><?= $customer['customer_fullname'] ?>
                </h4>
                <div>
                    <p class=""><?= $customer['id'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body text-center mx-auto">
            <div class="avatar avatar-xl">
                <img class="img-fluid" src="<?= base_url('images/customer/') . $customer['customer_image']; ?>" alt="img placeholder">
            </div>
            <div class="col-sm-12 text-center mt-2">
                <p class=""></p>
            </div>

            <div class="col-sm-12 text-center mt-1 mb-2">
                <?php if ($customer['status'] == 1) { ?>
                    <h3 class="badge badge-info">Active</h3>
                <?php } else { ?>
                    <h3 class="badge badge-dark">Banned</h3>
                <?php  } ?>
                <span class="badge badge-outline-warning" data-toggle="modal" data-target="#customerinfo">
                    <a>
                        <i class="feather icon-edit"></i>
                        change info
                    </a>
                </span>

            </div>
            <hr class="my-1">
            <div class="row">
                <div class="uploads col-6">
                    <p class="font-weight-bold font-medium-2 mb-0"><?= count($countorder) ?></p>
                    <span class="">Order</span>
                </div>
                <div class="followers col-6">
                    <p class="font-weight-bold font-medium-2 mb-0">
                        <?= $currency ?>
                        <?= number_format($customer['balance'] / 100, $decimal, ".", ",") ?>
                    </p>
                    <span class="">Balance</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header"></div>
    <div class="card-content">
        <div class="card-body">
            <ul class="activity-timeline timeline-left list-unstyled">
                <li>
                    <div class="timeline-icon bg-warning">
                        <i class="feather icon-mail font-medium-2"></i>
                    </div>
                    <div class="timeline-info">
                        <p class="font-weight-bold">Contact</p>
                        <p>phone :
                            <span class="text-muted"><?= $customer['countrycode'] ?>
                                <?= $customer['phone'] ?></span>
                        </p>
                        <p>email :
                            <span class="text-muted"><?= $customer['email'] ?></span>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="timeline-icon bg-info">
                        <i class="feather icon-credit-card font-medium-2"></i>
                    </div>
                    <div class="timeline-info">
                        <p class="font-weight-bold">Identity</p>
                        <p>date of birth :
                            <span class="text-muted"><?= $customer['dob'] ?></span>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="timeline-icon bg-danger">
                        <i class="feather icon-clock font-medium-2"></i>
                    </div>
                    <div class="timeline-info">
                        <p class="font-weight-bold">Member</p>
                        <p>created on :
                            <span class="text-muted"><?= $customer['created_on'] ?></span>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

</div>

<!-- customer tabs start -->
<div class="col-lg-8 col-sm-12">
<section id="basic-tabs-components">
    <h4 style=""><b>Referal Package Data </b></h4>
    <div class="card overflow-hidden">
        <div class="card-content">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="customertransaction-tab" data-toggle="tab" href="#customertransaction" aria-controls="customertransaction" role="tab" aria-selected="true">Package Detail</a>
                    </li>
                   <!--  <li class="nav-item">
                        <a class="nav-link" id="customerwallet-tab" data-toggle="tab" href="#customerwallet" aria-controls="customerwallet" role="tab" aria-selected="false">Wallet</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" id="Withdraw_investment-tab" data-toggle="tab" href="#Withdraw_investment" aria-controls="Withdraw_investment" role="tab" aria-selected="false">User Join With Referal Detail </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="customertransaction" aria-labelledby="customertransaction-tab" role="tabpanel">
                        <!-- start customer transaction data table -->
                        <section id="column-selectors">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Referal Package Detail</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        
                                                        <tbody>
                                                           
                                                            <tr>
                                                                <td>Package Name</td>
                                                                <td><?= $Packag_detail['rpc_package_name'] ?></td>
                                                            </tr>

                                                              <tr>
                                                                <td>Package Taken Date</td>
                                                                <td><?= $Packag_detail['rpc_ceated_date'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Package Amount</td>
                                                                <td>
                                        <?= $Packag_detail['rpc_package_currency'] ?><?= $Packag_detail['rpc_package_amount'] ?>
                                                                </td>
                                                            </tr>

                                                             <tr>
                                                                <td>Referal Code</td>
                                                                <td><?= $Packag_detail['rpc_referal_code'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Join With Referal Code Users</td>
                                                                <td><?= count($Packag_referal_join); ?></td>
                                                            </tr>
                                                                
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end of customer transaction data table -->
                    </div>
                    <div class="tab-pane" id="customerwallet" aria-labelledby="customerwallet-tab" role="tabpanel">
                        <!-- start customer wallet data table -->
                        <section id="column-selectors">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">customer Wallet</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                                                    <table class="table table-striped dataex-html5-selectors">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Id</th>
                                                                <th>Type</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        
                                                           
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- end of customer wallet data table -->
                    </div>


                       <!-- /////////////////////////////////////////// -->
                    <div class="tab-pane" id="Withdraw_investment" aria-labelledby="Withdraw_investment-tab" role="tabpanel">
                        <!-- start driver wallet data table -->
                        <section id="column-selectors">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">User Join With Referal Detail</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                                                    <table class="table table-striped dataex-html5-selectors">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>User Info</th>
                                                                <th>Package Name</th>
                                                                <th>Amount</th>
                                                                <th>join Date</th>
                                                                <th>Amount Recived</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($Packag_referal_join as $Packag_referal_join_single) { ?>
                                                                <tr>
                                                                    <td><?= $i ?></td>
                                                                    <td>

                                                                        
                                           <b>UserId:</b> <?= $Packag_referal_join_single['rpuj_user_id'] ?> <br>
                                           <b>Name:</b> <?= $Packag_referal_join_single['rpuj_user_name'] ?>
                                           </td>

                                                                    
                                                                    <td><?= $Packag_referal_join_single['rpuj_referal_package_name']; ?></td>
                                                                    <td>
                                                                        <?= $Packag_referal_join_single['rpuj_referal_package_curency']; ?>
                                                                            <?= $Packag_referal_join_single['rpuj_referal_package_amount']; ?>
                                                                        </td>

                                                                        <td>  <?= $Packag_referal_join_single['rpuj_join_date']; ?>
                                                                            
                                                                        </td>
                                                                        <td>  $<?= $Packag_referal_join_single['rpuj_invitation_amount']; ?>
                                                                            
                                                                        </td>

                                                                    


                                                                </tr>
                                                            <?php $i++;
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

                        <!-- end of driver wallet data table -->
                    </div>



                    <!-- /////////////////////////////////////////// -->


                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- end of customer tab -->

</div>

<!-- end of detail customer -->
</div>
</div>
</div>
<!-- END: Content-->

<!-- Modal -->
<!-- edit customer info -->
<div class="modal fade text-left" id="customerinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel17">Customer Info</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body pr-2 pl-2">

<section id="basic-vertical-layouts">
<?= form_open_multipart('detailuser/editdatacustomer'); ?>
<form class="form form-vertical">
    <div class="form-body">
        <div class="row">
            <!-- start customer info form -->

            <input type="hidden" name="id" value="<?= $customer['id'] ?>">

            <div class="col-12">
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="customer_image" class="dropify" data-max-file-size="1mb" data-default-file="<?= base_url('images/customer/') . $customer['customer_image'] ?>" />
                </div>

            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="customer_fullname">Name</label>
                    <input type="text" id="customer_fullname" class="form-control" name="customer_fullname" placeholder="enter name" value="<?= $customer['customer_fullname'] ?>" required="required">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="dob">Date of birth</label>
                    <input type="date" id="dob" class="form-control" name="dob" placeholder="enter name" value="<?= $customer['dob'] ?>" required="required">
                </div>
            </div>

            <div class="col-12">
                <label>Phone</label>

                <div class="row">

                    <input type="hidden" name="id" value="<?= $customer['id'] ?>">
                    <input type="hidden" id="countryec" value="<?= $customer['countrycode'] ?>">

                    <div class="form-group col-4">
                        <input type="tel" id="txtPhone" class="form-control" name="countrycode" required="required">
                    </div>
                    <div class=" form-group col-8">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="enter phone number" value="<?= $customer['phone'] ?>" required="required">
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="enter email" value="<?= $customer['email'] ?>" required="required">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="enter password">
                </div>
            </div>

            <!-- end of customer info form -->

            <div class="col-12">
                <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
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
<!-- edit customer info