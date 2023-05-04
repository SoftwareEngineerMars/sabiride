<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- start maps type -->

            <section id="basic-vertical-layouts">
                <div class="row match-height justify-content-center">
                    <div class="col-md-8 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Maps settings by services</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                <?= form_open_multipart('service/editmaps'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">

                                                <?php $i = 1;
                                                foreach ($mapstype as $mptp) { ?>
                                                    <input type="hidden" name="ext_id[]" value="<?= $mptp['ext_id'] ?>"></input>
                                                    <div class="form-group">
                                                        <h5 for="mapstype"><?= $mptp['title'] ?></h5>
                                                        <select name="maps[]" class="select2 form-group" style="width:100%">
                                                        <option value="1" <?php if ($mptp['maps'] == '1') { ?>selected<?php } ?>>Google Maps</option>
                                                            <option value="0" <?php if ($mptp['maps'] == '0') { ?>selected<?php } ?>>Map Box</option>
                                                        </select>
                                                    </div>
                                                <?php $i++;
                                                
                                                } ?>

                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
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

            <!-- end of maps type -->
        </div>
    </div>
</div>
<!-- END: Content-->