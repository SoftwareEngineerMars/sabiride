<!-- BEGIN: Content-->
<style media="screen">
  #image-preview {
    float: right;
    margin-left: auto;
  }
</style>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="basic-vertical-layouts">
                <div class="row match-height justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Plan</h4>
                                <div class="pull-right" style="margin-left: auto;">
                                  <a href="<?php echo base_url('plan'); ?>" class="btn btn-danger mr-1 mb-1" data-toggle="tooltip" title="Cancel">
                                    <i class="fa fa-reply"></i>
                                  </a>
                                  <button type="submit" form="form-plan" class="btn btn-primary mr-1 mb-1" data-toggle="tooltip" title="Save">
                                    <i class="fa fa-save"></i>
                                  </button>
                                </div>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical" id="form-plan" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="input-name">Name</label>
                                                        <input type="text" id="input-name" class="form-control" name="name" placeholder="enter name *" value="<?php echo $name; ?>">
                                                        <?php if ($error_name) { ?>
                                                          <div class="text-danger">
                                                            <?php echo $error_name; ?>
                                                          </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="input-price">Price</label>
                                                        <input type="text" id="input-price" class="form-control" name="price" placeholder="enter price *" value="<?php echo $price; ?>" onkeypress="return validate(event, this, false)">
                                                        <?php if ($error_price) { ?>
                                                          <div class="text-danger">
                                                            <?php echo $error_price; ?>
                                                          </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="input-logo">Logo</label>
                                                        <input type="file" name="logo" id="input-logo" value="<?php echo $logo; ?>" hidden>
                                                        <?php if (isset($_FILES['logo'])) { ?>
                                                          <img src="<?php echo $logo; ?>" alt="plan-logo" height="100" width="100" id="image-preview">
                                                        <?php } elseif ($logo && is_file(FCPATH . $logo)) { ?>
                                                          <img src="<?php echo base_url($logo); ?>" alt="plan-logo" height="100" width="100" id="image-preview">
                                                        <?php } else { ?>
                                                          <img src="<?php echo base_url('asset/app-assets/images/logo/logoweb.png'); ?>" alt="plan-logo" height="100" width="100" id="image-preview">
                                                        <?php }?>
                                                        <button type="button" class="btn btn-info" id="button-upload" onclick="document.getElementById('input-logo').click()" data-toggle="tooltip" title="Upload">
                                                          <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="input-description">Description</label>
                                                        <textarea id="input-description" class="form-control" name="description" placeholder="enter description"><?php echo $description; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="input-validaity">Validity (in days)</label>
                                                        <input type="text" id="input-validity" class="form-control" name="valid_days" placeholder="enter validity *" min="1" value="<?php echo $valid_days; ?>" onkeypress="return validate(event, this, true)">
                                                        <?php if ($error_valid_days) { ?>
                                                          <div class="text-danger">
                                                            <?php echo $error_valid_days; ?>
                                                          </div>
                                                        <?php } ?>
                                                      </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="input-status">Status</label>
                                                        <select  id="password" class="form-control" name="status">
                                                          <option <?php if ($status == 1) { echo 'selected'; } ?> value="1">Enabled</option>
                                                          <option <?php if ($status == 0 && $status != '') { echo 'selected'; } ?> value="0">Disabled</option>
                                                        </select>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript">
let input_logo = document.getElementById('input-logo');
input_logo.addEventListener('change', (event) => {
  const file = event.target.files[0];
  const reader = new FileReader();
  const preview = document.querySelector('#image-preview');
  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
});
//Function to allow only numbers to textbox
function validate(key, thisthis, nodot) {
  //getting key code of pressed key
  var keycode = (key.which) ? key.which : key.keyCode;

  if (keycode == 46) {
    if (nodot) {
      return false;
    }

    var val = $(thisthis).val();
    if (val == val.replace('.', '')) {
      return true;
    } else {
      return false;
    }
  }

  //comparing pressed keycodes
  if (!(keycode == 8 || keycode == 9 || keycode == 46 || keycode == 116) && (keycode < 48 || keycode > 57)) {
    return false;
  } else {
    return true;
  }
}
</script>
<!-- END: Content-->
