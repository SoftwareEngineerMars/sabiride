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
                           <a href="<?php echo base_url(); ?>Investment/Investment_customer_list"><button class="btn btn-success">Back</button></a> 
                           <h4 class="card-title"> Investment Customer</h4>
                        </div>
                        <section id="basic-vertical-layouts">
                            <div class="card-content">
                                <div class="card-body">
                                    <?= form_open_multipart('Investment/addInvestmentforcustomer'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12 form-group">
                                                    <label for="investment_plan">Select Investment Plan</label>
                                                    <select class="select2 form-control" style="width:100%" name="investment_plan" id="investment_plan" >
                                                        <?php foreach($investmentlist as $investmentlistsingle){ ?>
                                                        <option value="<?php echo $investmentlistsingle->ipt_id; ?>"><?php echo $investmentlistsingle->ipt_name; ?>(<?php echo $investmentlistsingle->ipt_currency; ?><?php echo $investmentlistsingle->ipt_amount; ?>)</option>
                                                        
                                                        <?php } ?>
                                                        
                                                    </select>
                                                </div>
                                                
                                                <div class="col-12 form-group">
                                                    <label for="customer_id">Select Customer</label>
                                                    <select class="select2 form-control" style="width:100%" name="customer_id" id="customer_id">
                                                        <?php foreach($customerlist as $customerlistsingle){ ?>
                                                        <option value="<?php echo $customerlistsingle->id; ?>"><?php echo $customerlistsingle->customer_fullname; ?>(<?php echo $customerlistsingle->id; ?>) </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                
                                                
                                                <div class="col-12 form-group">
                                                    <label for="newscontent">Starting Date</label>
                                                    <input name="starting_date" type="date" class="form-control" id="starting_date" placeholder="Starting Date" required>
                                                </div>
                                              
                                                <div class="col-12 form-group">
                                                    <label for="newscontent">Note</label>
                                                    <textarea name="note_detail" class="form-control" id="note_detail" placeholder="Note Detail" required></textarea>
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

<script>
    $(function() {
    "use strict";
    $(".select2").select2({
      dropdownAutoWidth: true,
      width: '100%'
    });
    
    
    });
</script>
<!-- END: Content-->