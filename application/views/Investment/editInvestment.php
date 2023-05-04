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
                          <a href="<?php echo base_url(); ?>Investment"><button class="btn btn-success">Back</button></a>  <h4 class="card-title">Edit Investment</h4>
                        </div>
                        <section id="basic-vertical-layouts">
                            <div class="card-content">
                                <div class="card-body">
                                    <?= form_open_multipart('Investment/editInvestment_submit'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                    <input type="hidden" class="form-control" name="ipt_id" id="ipt_id" value="<?= $news['ipt_id'] ?>">
                                                    
                                                    <div class="col-12 form-group">
                                                        <label for="newstitle">Plan Name</label>
                                                        <input type="text" class="form-control" name="ipt_name" id="ipt_name" value="<?= $news['ipt_name'] ?>" required>
                                                    </div>

                                                    <div class="col-12 form-group">
                                                    <label for="title">Currency</label>
                                                    <input type="text" class="form-control" name="ipt_currency" value="<?= $news['ipt_currency'] ?>" id="ipt_currency" placeholder="Currency" required>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="title">Amount</label>
                                                    <input type="number" class="form-control" name="ipt_amount" value="<?= $news['ipt_amount'] ?>" id="ipt_amount" placeholder="Amount" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="title">Profit(%)</label>
                                                    <input type="number" class="form-control" name="ipt_profit" value="<?= $news['ipt_profit'] ?>" value="10" id="ipt_profit" placeholder="Profit(%)" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="title">Min. Profit After Days </label>
                                                    <input type="text" class="form-control" name="ipt_get_profit_days"  value="<?= $news['ipt_get_profit_days'] ?>" id="ipt_get_profit_days" placeholder="Min. Profit After Days" required>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="title">Min. Withdraw Investment Days </label>
                                                    <input type="text" class="form-control" name="ipt_min_withdraw_days" value="<?= $news['ipt_min_withdraw_days'] ?>" id="ipt_min_withdraw_days" placeholder="Min. Withdraw Investment Days" required>
                                                </div>
                                                    
                                                    
                                                    <div class="col-12 form-group">
                                                        <label for="newscategory">News Investment Status</label>
                                                        <select class="select2 form-control" style="width:100%" name="ipt_status">

                                                            <option value="1" <?php if ($news['ipt_status'] == '1') { ?>selected<?php } ?>>Active</option>
                                                            <option value="2" <?php if ($news['ipt_status'] == '2') { ?>selected<?php } ?>>NonActive</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <label for="newscontent">Investment Content</label>
                                                        <textarea type="text" class="form-control" id="summernoteExample11" placeholder="Investment Content" name="ipt_detail" required><?= $news['ipt_detail'] ?></textarea>
                                                    </div>
                                                    <!-- end of add news form -->

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