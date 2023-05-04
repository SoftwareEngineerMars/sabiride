<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Investment Plan Data</h4>
                            </div>
                            <div class="card-header">
                                <a class="btn btn-success mb-1 text-white" href="<?= base_url(); ?>Investment/addInvestment">
                                    <i class="feather icon-plus mr-1"></i>Add Investment Plan</a></div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Plan Type</th>
                                                    <th>Detail</th>
                                                    
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                if($all_plan){
                                                foreach ($all_plan as $nw) { ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td>
                                                            <?=  $nw->ipt_name ?>
                                                        </td>
                                                        <td><?=  $nw->ipt_currency ?><?=  $nw->ipt_amount ?></td>
                                                        
                                                        <td><button  class="btn btn-success float-right mb-1 text-white action-add">Detail</button></td>
                                                        <td>
                                                            <?php if ($nw->ipt_status == 1) { ?>
                                                                <label class="badge badge-success">Active</label>
                                                            <?php } else { ?>
                                                                <label class="badge badge-danger">Non Active</label>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <span class="mr-1">
                                                                <a href="<?= base_url(); ?>Investment/editInvestment/<?= $nw->ipt_id; ?>">
                                                                    <i class="feather icon-edit text-info"></i>
                                                                </a>
                                                            </span>
                                                            <span class="mr-1">
                                                                <a href="<?= base_url(); ?>Investment/deleteInvestment/<?= $nw->ipt_id; ?>" onclick="return confirm ('are you sure want to delete?')">
                                                                    <i class="feather icon-trash text-danger"></i>
                                                                </a>
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

                 <!-- add new sidebar starts -->

            </section>
            <!-- Data list view end -->
        </div>
    </div>
</div>
<!-- END: Content-->