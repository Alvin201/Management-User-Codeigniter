<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('welcome');?>">Dashboard System</a>
    </div>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard fa-fw"></i> DASHBOARD</a>
                </li>

            <?php
                $user = $this->session->userdata('user');
                extract($user);
            ?>

<?php if($idrole == 1) { ?>
                 <li>
                    <a href="<?php echo base_url('dashboard/contactadmin');?>"><i class="fa fa-dashboard fa-fw"></i> Master Data</a>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-camera"></i> GALERI<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url().'dashboard/gallery' ?>">Galeri</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
<?php } ?>

               <li>
                    <a href="<?php echo base_url().'dashboard/changeprofile' ?>"><i class="glyphicon glyphicon-user"></i> Profile</a>
                </li>

                <li>
                    <a href="<?php echo base_url().'dashboard/logout' ?>"><i class="glyphicon glyphicon-off"></i> LOGOUT</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>