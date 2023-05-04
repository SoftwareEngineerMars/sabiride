<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- start add news -->
            <div class="row match-height justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                          <a href="<?php echo base_url(); ?>Referal_package"><button class="btn btn-success">Back</button></a>  <h4 class="card-title">Edit Investment</h4>
                        </div>
                        <section id="basic-vertical-layouts">
                            <div class="card-content">
                                <div class="card-body">
                                    <?= form_open_multipart('Referal_package/editreferal_package_submit'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                    <input type="hidden" class="form-control" name="pp_id" id="pp_id" value="<?= $news['pp_id'] ?>">
                                                    
                                                    <div class="col-12 form-group">
                                                        <label for="newstitle">Package Plan Name</label>
                                                        <input type="text" class="form-control" name="pp_name" id="pp_name" value="<?= $news['pp_name'] ?>" required>
                                                    </div>

                                                    <div class="col-12 form-group">
                                                    <label for="title">Currency</label>
                                                    <input type="text" class="form-control" name="pp_currency" value="<?= $news['pp_currency'] ?>" id="pp_currency" placeholder="Currency" required>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="title">Amount</label>
                                                    <input type="number" class="form-control" name="pp_amount" value="<?= $news['pp_amount'] ?>" id="pp_amount" placeholder="Amount" required>
                                                </div>
                                                
                                                    
                                                    
                                                    <div class="col-12 form-group">
                                                        <label for="newscategory">Package Status</label>
                                                        <select class="select2 form-group" style="width:100%" name="pp_status">

                                                            <option value="1" <?php if ($news['pp_status'] == '1') { ?>selected<?php } ?>>Active</option>
                                                            <option value="2" <?php if ($news['pp_status'] == '2') { ?>selected<?php } ?>>NonActive</option>

                                                        </select>
                                                    </div>
                                                

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                                                    </div>
                                            </div>
                                            </div>
                                    </form>
                                    <?= form_close(); ?>
                                </div>
                            </div>
            </section>
            </div>
    </div>
</div>

            <!-- end of add news -->
        </div>
    </div>
</div>
<!-- END: Content-->