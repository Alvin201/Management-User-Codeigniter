<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- /.row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div class="panel-body">
                <a href="<?php echo base_url('dashboard/inputgallery');?>" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i>
                    Add
                </a>
                <br>
                <br>
                <table class="table table-striped table-bordered table-hover" id="table-list-order">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if(sizeof($general)>0):
                        foreach ($general as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $value->foto;?></td>
                            <td><?php echo $value->description;?></td>
                            <td>
                                <a href="<?php echo base_url();?>dashboard/inputgallery/<?php echo $value->id_gallery;?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                                <a href="<?php echo base_url('dashboard/deletegallery/'.$value->id_gallery);?>" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                    Delete
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
    $('#table-list-order').DataTable({
        responsive: true
    });
})
</script>