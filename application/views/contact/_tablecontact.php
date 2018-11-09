<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- /.row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div class="panel-body">
                <a href="<?php echo base_url('dashboard/editadmin');?>" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i>
                    Add
                </a>
                <br>
                <br>
                <table class="table table-striped table-bordered table-hover" id="table-list-member">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Email Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if(sizeof($models)>0):
                        foreach ($models as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $value->username;?></td>
                            <td><?php echo $value->password;?></td>
                            <td><?php echo $value->email;?></td>
                            <td>
                                <a href="<?php echo base_url();?>dashboard/editadmin/<?php echo $value->id_admin;?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
    $('#table-list-member').DataTable({
        responsive: true
    });
})
</script>