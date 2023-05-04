<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
          <?php if ($success) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $success; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="card-header">
                    <h4>Subscription Plan <span><a class="btn btn-success float-right mb-1 text-white" href="<?php echo base_url('plan/add'); ?>">
                                <i class="feather icon-plus mr-1"></i>Add Plan</a></span></h4>
                </div>
                <!-- vehicle type Table starts -->
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Velidty (in days)</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($plans as $plan) { ?>
                              <tr>
                                <td><?php echo $i; ?>.</td>
                                <td>
                                  <?php if ($plan['logo'] && is_file(FCPATH . $plan['logo'])) { ?>
                                    <img src="<?php echo base_url($plan['logo']); ?>" alt="plan-logo" height="60" width="60">
                                  <?php } else { ?>
                                    <img src="<?php echo base_url('asset/app-assets/images/logo/logoweb.png'); ?>" alt="plan-logo" height="60" width="60">
                                  <?php }?>
                                </td>
                                <td><?php echo $plan['name']; ?></td>
                                <td><?php echo $plan['price']; ?></td>
                                <td><?php echo $plan['valid_days']; ?></td>
                                <td><?php echo $plan['status'] == 0 ? 'Disabled' : 'Enabled'; ?></td>
                                <td class="text-right">
                                  <a href="<?php echo base_url('plan/edit/' . $plan['id']) ?>" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <a class="btn btn-danger" onclick="return confirm('Are you sure?') ? true : false" href="<?php echo base_url('plan/delete/plan/' . $plan['id']) ?>">
                                    <i class="fa fa-trash"></i>
                                  </a>
                                </td>
                              </tr>
                            <?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- vehicle type data Table ends -->
            </section>
            <!-- Data list view end -->
        </div>
    </div>
</div>
<!-- END: Content-->
