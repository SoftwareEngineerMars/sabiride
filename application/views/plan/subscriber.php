<!-- BEGIN: Content-->
<link rel="stylesheet" href="<?php echo base_url('asset/app-assets/css/admin.css'); ?>">
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
                    <h4> Subscriber</h4>
                </div>
                <!-- vehicle type Table starts -->
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Driver</th>
                                <th>Plan</th>
                                <th>Plan Logo</th>
                                <th>Price</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($subscribers as $subscriber) { ?>
                              <tr>
                                <td><?php echo $i; ?>.</td>
                                <td><?php echo $subscriber['driver_name']; ?></td>
                                <td><?php echo $subscriber['name']; ?></td>
                                <td>
                                  <?php if ($subscriber['logo'] && is_file(FCPATH . $subscriber['logo'])) { ?>
                                    <img src="<?php echo base_url($subscriber['logo']); ?>" alt="plan-logo" height="60" width="60">
                                  <?php } else { ?>
                                    <img src="<?php echo base_url('asset/app-assets/images/logo/logoweb.png'); ?>" alt="plan-logo" height="60" width="60">
                                  <?php }?>
                                </td>
                                <td><?php echo $subscriber['amount']; ?></td>
                                <td><?php echo $subscriber['start_date']; ?></td>
                                <td><?php echo $subscriber['end_date']  ; ?></td>
                                <td>
                                  <label class="switch">
                                    <input type="checkbox" <?php if ($subscriber['status'] == 1) { ?>checked<?php } ?> onchange="changePlanStatus(this, <?php echo $subscriber['id']; ?>)">
                                    <span class="slider round"></span>
                                  </label>
                                </td>
                                <td class="text-right">
                                  <a class="btn btn-danger" onclick="return confirm('Are you sure?') ? true : false" href="<?php echo base_url('plan/delete/subscription/' . $subscriber['id']) ?>">
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
<div class="modal" id="modal-subscriber-view">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Subscription Detail</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table>

        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
  changePlanStatus = (input, id) => {
    let status = input.checked ? 1 : 0;
    $.ajax({
      url: '<?php echo base_url("plan/update_subscription_status") ?>',
      type: 'post',
      dataType: 'json',
      data: {status: status, id: id},
      success: (json) => {
        if (json['success']) {
          toastr.success(json['success']);
        }
      }
    });
  }
</script>
