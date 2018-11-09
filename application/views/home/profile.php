
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <?php
    echo $this->session->flashdata('msg');
    ?>

    <?php 
    if($this->session->flashdata('error')){
    echo'<div class="alert alert-warning-alt alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'  .$this->session->flashdata('error').'</div>';
    }
    ?>
								
				<form class="form-horizontal" action="<?php echo base_url('dashboard/updateprofile') ?>" method="POST" enctype="multipart/form-data">

              	<div class="form-group">
              		            <label for="invoice_input">Username : </label>
								<?php echo form_input('username', $this->session->userdata('username'), 'class="form-control"');?>

                				<label for="invoice_input">Password : </label>
                				<input type="password" name="password" class="form-control">
								<code>Masukkan Password Kembali Jika Ingin Mengubah Data</code>
<br/>
<br/>
<br/>
								<button type="submit" class="btn btn-info btn-sm">Confirm</button>
								
           		</form>
            	
 