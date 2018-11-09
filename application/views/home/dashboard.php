    <div class="container-fluid">
        <div class="row">

            <?php
                $user = $this->session->userdata('user');
                extract($user);
            ?>

            <!-- /.col-lg-12 -->
            <div class="col-sm-12">
                <div class="alert alert-danger" role="alert" style="text-align: center">
                    Role: <?php echo $namerole ?><br/>
                    User: <?php echo $username ?>
                </div>
                <?php echo $this->session->flashdata('pesan') ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
