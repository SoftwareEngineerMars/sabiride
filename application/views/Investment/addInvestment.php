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
                           <a href="<?php echo base_url(); ?>Investment"><button class="btn btn-success">Back</button></a>  <h4 class="card-title">Add Investment</h4>
                        </div>
                        <section id="basic-vertical-layouts">
                            <div class="card-content">
                                <div class="card-body">
                                    <?= form_open_multipart('Investment/addInvestment_submit'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                
                                                <div class="col-12 form-group">
                                                    <label for="title">Plan Name</label>
                                                    <input type="text" class="form-control" name="ipt_name" id="ipt_name" placeholder="Plan Name title" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="title">Currency</label>
                                                    <input type="text" class="form-control" name="ipt_currency" value="$" id="ipt_currency" placeholder="Currency" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="title">Amount</label>
                                                    <input type="number" class="form-control" name="ipt_amount" id="ipt_amount" placeholder="Amount" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="title">Profit(%)</label>
                                                    <input type="number" class="form-control" name="ipt_profit" value="10" id="ipt_profit" placeholder="Profit(%)" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="title">Min. Profit After Days </label>
                                                    <input type="text" class="form-control" name="ipt_get_profit_days" value="180" id="ipt_get_profit_days" placeholder="Min. Profit After Days" required>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="title">Min. Withdraw Investment Days </label>
                                                    <input type="text" class="form-control" name="ipt_min_withdraw_days" value="730" id="ipt_min_withdraw_days" placeholder="Min. Withdraw Investment Days" required>
                                                </div>

                                               
                                                <div class="col-12 form-group">
                                                    <label for="news_status">News Investment Status</label>
                                                    <select class="select2 form-control" style="width:100%" name="ipt_status" id="ipt_status">
                                                        <option value="1">Active</option>
                                                        <option value="0">NonActive</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="newscontent">Investment Content</label>
                                                    <textarea name="ipt_detail" type="text" class="form-control" id="ipt_detail" placeholder="Investment Content" required></textarea>
                                                </div>
                                                <!-- end of add news form -->

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </section>

            <!-- end of add news -->
        </div>
    </div>
</div>
<!-- END: Content-->