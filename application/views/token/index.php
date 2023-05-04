
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Wallet count starts -->
            <section id="statistics-card">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div style="cursor:pointer;" onclick="token_but(`<?= $all_data['id'];?>`)">
                                    <p>Current Token Price&nbsp;&nbsp; (24 hour /)</p>
                                    <h2 class="text-bold-700 mb-2">
                                       $ <?php if($all_data['token_price'] == "") {?>0<?php }?><?= $all_data['token_price'];?> 
                                    </h2>
                                    <p>Updated Date&nbsp;&nbsp; <?= $all_data['token_date'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div style="cursor:pointer;" onclick="date_but(`<?= $free_data['id'];?>`)">
                                    <p>Free Date&nbsp;&nbsp;</p>
                                    <h2 class="text-bold-700 mb-2">
                                        <?php if($free_data['free_date'] == null){?> No <?php } else {?><?= $free_data['free_date'];?><?php } ?>
                                    </h2>
                                    <p>Updated Date&nbsp;&nbsp; <?= $free_data['create_date'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Wallet count end -->
            <!-- The Modal -->
            <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Token Price</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="t_id">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Token Price(24Hours/):</label>
                            <input type="number" class="form-control" id="token_price" name="token_price" value="">
                            </div>      
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" onclick="remove_token_data()">Delete</button>
                            <button type="button" class="btn btn-primary" onclick="save_data()">Update</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="date_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Free Date</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="f_id">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Free Date:</label>
                            <input type="date" class="form-control" id="f_date" name="f_date" value="">
                            </div>      
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" onclick="remove_free_data()">Delete</button>
                            <button type="button" class="btn btn-primary" onclick="update_free_data()">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Wallet data start -->
            <section id="basic-tabs-components">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h4 class="card-title">Log Using Token</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- recent transaction table start -->
                                        <section id="basic-datatable">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped dataex-html5-selectors">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No.</th>
                                                                                <th>Full Name</th>
                                                                                <th>Phone</th>
                                                                                <th>Rating</th>
                                                                                <th>Job Service</th>
                                                                                <th>Token Price</th>
                                                                                <th>Using Date</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                                $id = 0;
                                                                                foreach($log_data as $row) { 
                                                                                $id++;        
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?= $id ?></td>
                                                                                    <td><?= $row['driver_name']?></td>
                                                                                    <td><?= $row['phone_number']?></td>
                                                                                    <td><?= number_format($row['rating'], 1) ?></td>
                                                                                    <td><?= $row['driver_job']?></td>
                                                                                    <td>$ <?= $row['price']/100?></td>
                                                                                    <td><?= $row['order_time']?></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- end of recent transaction table -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of wallet data -->
        </div>
    </div>
</div>
<!-- END: Content-->
<script>
    function token_but(id)
    {
        $.ajax({
            url: '<?php echo site_url("token/sel_token_data");?>',
            method: 'post',
            dataType: 'json',
            data: {t_value : id},
            success: function(res){
                $('#token_price').val(res['token_price']);
                $('#t_id').val(res['id']);
                $('#edit_modal').modal("show");
              
            },
            error: function(data){
                console.log(error);
            }
        });    
    }

    function date_but(id)
    {
        if(id == null)
        {
            $('#date_modal').modal("show");
            return;
        }
        $.ajax({
            url: '<?php echo site_url("token/get_date_data");?>',
            method: 'post',
            dataType: 'json',
            data: {f_value : id},
            success: function(res){
                $('#date_modal').modal("show");
                $('#f_date').val(res['free_date']);
                $('#f_id').val(res['id']);
            },
            error: function(data){
                console.log(error);
            }
        });    
    }
    function save_data()
    {
        
        var t_id = $('#t_id').val();
        var price = $('#token_price').val();
        $.ajax({
            url: '<?php echo site_url("token/save_data");?>',
            method: 'post',
            dataType: 'json',
            data: {t_id : t_id, price:price},
            success: function(data){
                if(data == true)
                {
                    toastr['success']("update!");
                    $('#edit_modal').modal("hide");
                    setTimeout(() => {
                        location.href="<?= site_url('token');?>";
                    }, 1000);
                }
                else
                    toastr['error']("Error!");
            },
            error: function(data){
                console.log(error);
            }
        });    
    }

    function remove_token_data()
    {
        var t_id = $('#t_id').val();
        if(t_id == "")
        {
            toastr['warning']("There is no data to delete");
            return;
        }
        $.ajax({
            url: '<?php echo site_url("token/remove_token_data");?>',
            method: 'post',
            dataType: 'json',
            data: {t_id : t_id},
            success: function(data){
                if(data == true)
                {
                    toastr['success']("Delete!");
                    $('#edit_modal').modal("hide");
                    setTimeout(() => {
                        location.href="<?= site_url('token');?>";
                    }, 1000);
                }
                else
                    toastr['error']("Error!");
            },
            error: function(data){
                console.log(error);
            }
        });    
    }

    function update_free_data()
    {
        var f_id = $('#f_id').val();
        var f_date = $('#f_date').val();

        if(f_date == "")
        {
            toastr['warning']("Date format is incorrect");
            return;
        }
        $.ajax({
            url: '<?php echo site_url("token/update_free_data");?>',
            method: 'post',
            dataType: 'json',
            data: {f_id : f_id, f_date:f_date},
            success: function(data){
                if(data == true)
                {
                    toastr['success']("update!");
                    $('#date_modal').modal("hide");
                    setTimeout(() => {
                        location.href="<?= site_url('token');?>";
                    }, 1000);
                }
                else
                    toastr['error']("Error!");
            },
            error: function(data){
                console.log(error);
            }
        });    
    }

    function remove_free_data()
    {
        var f_id = $('#f_id').val();
        if(f_id == "")
        {
            toastr['warning']("There is no data to delete");
            return;
        }
        $.ajax({
            url: '<?php echo site_url("token/remove_free_data");?>',
            method: 'post',
            dataType: 'json',
            data: {f_id : f_id},
            success: function(data){
                if(data == true)
                {
                    toastr['success']("Delete!");
                    $('#date_modal').modal("hide");
                    setTimeout(() => {
                        location.href="<?= site_url('token');?>";
                    }, 1000);
                }
                else
                    toastr['error']("Error!");
            },
            error: function(data){
                console.log(error);
            }
        });    
    }
</script>