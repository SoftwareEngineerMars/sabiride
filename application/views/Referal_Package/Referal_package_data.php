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
                                <h4 class="card-title">Referal Package Commission</h4>
                            </div>
                           
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Package Name</th>
                                                    <th>First Commission(%)</th>
                                                    <th>Second Commission(%)</th>
                                                    <th>THird Commission(%)</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <tr>
                                                        <td>3 Level</td>
                                                        <td>
                                                            <?=  $CEOPackage->name_comission ?>
                                                        </td>
                                                        <td><?=  $CEOPackage->first_referal ?>%</td>
                                                        
                                                        <td><?=  $CEOPackage->second_referal ?>%</td>
                                                        
                                                        <td><?=  $CEOPackage->third_referal ?>%</td>
                                                        
                                                        
                                                       
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CEOPACKAGE" data-whatever="@mdo">Edit CEO</button>
                                                            
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                      <tr>
                                                        <td>2 Level</td>
                                                        <td>
                                                            <?=  $ManagerPackage->name_comission ?>
                                                        </td>
                                                        <td><?=  $ManagerPackage->first_referal ?>%</td>
                                                        
                                                        <td><?=  $ManagerPackage->second_referal ?>%</td>
                                                        
                                                        <td></td>
                                                        
                                                        
                                                       
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MANAGERPACKAGE" data-whatever="@mdo">Edit Manager</button>
                                                            
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                      <tr>
                                                        <td>1 Level</td>
                                                        <td>
                                                            <?=  $EmployeePackage->name_comission ?>
                                                        </td>
                                                        <td><?=  $EmployeePackage->first_referal ?>%</td>
                                                        
                                                        <td></td>
                                                        
                                                        <td></td>
                                                        
                                                        
                                                       
                                                        <td>
                                                            
                                                                
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EMPLOYEEPACKAGE" data-whatever="@mdo">Edit Employee</button>
                                                                
                                                            
                                                            
                                                        </td>
                                                    </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
<div class="modal fade" id="CEOPACKAGE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update CEO Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <?= form_open_multipart('Referal_package/updateCEOPackage'); ?>
        <form>
            <input type="hidden" value="1" name="rpc_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Referal(%):</label>
           <input type="text" class="form-control" id="first_referal" name="first_referal" value="<?=  $CEOPackage->first_referal ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Second Referal(%):</label>
            <input type="text" class="form-control" id="second_referal" name="second_referal" value="<?=  $CEOPackage->second_referal ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Third Referal(%):</label>
            <input type="text" class="form-control" id="third_referal" name="third_referal" value="<?=  $CEOPackage->third_referal ?>">
          </div>
          
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
       </div>
      </form>
       <?= form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="MANAGERPACKAGE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Manager Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <?= form_open_multipart('Referal_package/updateManagerPackage'); ?>
        <form>
            <input type="hidden" value="2" name="rpc_id">
          <div class="form-group">
            <label for="first_referal" class="col-form-label">First Referal(%):</label>
           <input type="text" class="form-control" id="first_referal" name="first_referal" value="<?=  $ManagerPackage->first_referal ?>">
          </div>
          <div class="form-group">
            <label for="second_referal" class="col-form-label">Second Referal(%):</label>
            <input type="text" class="form-control" id="second_referal" name="second_referal" value="<?=  $ManagerPackage->second_referal ?>">
          </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
       </div>
      </form>
       <?= form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="EMPLOYEEPACKAGE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Employee Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <?= form_open_multipart('Referal_package/UpdateEmployeePackage'); ?>
        <form method="POST" action="">
            <input type="hidden" value="3" name="rpc_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Referal(%):</label>
            <input type="text" class="form-control" id="first_referal" name="first_referal" value="<?=  $EmployeePackage->first_referal ?>">
          </div>
          
        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </div>
      </form>
       <?= form_close(); ?>
    </div>
  </div>
</div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Referal Package Plan Data</h4>
                            </div>
                            <!--<div class="card-header">-->
                                <!--<a class="btn btn-success mb-1 text-white" href="<?= base_url(); ?>Referal_package/addReferal_package">-->
                                    <!--<i class="feather icon-plus mr-1"></i>Add Referal Package Plan</a>-->
                            <!--</div>-->
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
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
                                                            <?=  $nw->pp_name ?>
                                                        </td>
                                                        <td><?=  $nw->pp_currency ?><?=  $nw->pp_amount ?></td>
                                                        
                                                        
                                                        <td>
                                                            <?php if ($nw->pp_status == 1) { ?>
                                                                <label class="badge badge-success">Active</label>
                                                            <?php } else { ?>
                                                                <label class="badge badge-danger">Non Active</label>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <span class="mr-1">
                                                                <a href="<?= base_url(); ?>Referal_package/editReferal_package/<?= $nw->pp_id; ?>">
                                                                    <i class="feather icon-edit text-info"></i>
                                                                </a>
                                                            </span>
                                                            <!--<span class="mr-1">-->
                                                            <!--    <a href="<?= base_url(); ?>Referal_package/deleteReferal_package/<?= $nw->pp_id; ?>" onclick="return confirm ('are you sure want to delete?')">-->
                                                            <!--        <i class="feather icon-trash text-danger"></i>-->
                                                            <!--    </a>-->
                                                            <!--</span>-->
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