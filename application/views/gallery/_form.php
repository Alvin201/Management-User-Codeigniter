<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <?php
    echo $this->session->flashdata('msg');
    ?>

    <?php 
    if($this->session->flashdata('error')){
    echo'<div class="alert alert-warning-alt alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'  .$this->session->flashdata('error').'</div>';
    }
    ?>

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div>
                <br>
                <br> 
                <form class="form-horizontal form-label-left" action="<?php echo base_url('dashboard/savegallery');?>" method="POST"  enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="id_gallery" type="hidden" value="<?php echo $general->id_gallery;?>" <?php echo (!empty($general->id_gallery))?"readonly":"";?> class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Foto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <img  class="img-circle" height="150" width="150" alt="" src="<?php echo base_url();?><?php echo $general->foto; ?>" >
                            <input type="file" name="foto"><span style="color: red;"> *kosongkan jika data tidak diubah</span> 
                            <!-- <input type="hidden" name="foto_lama" value="<?php echo $general->foto; ?>" > -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea required="required" type="text" class="form-control" placeholder="Deskripsi" name="description" style=" width: 440px;height: 150px;"> <?php echo $general->description; ?></textarea>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button" onclick="goBack()">Cancel</button> 
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
