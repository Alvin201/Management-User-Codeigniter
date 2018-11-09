<div id="fh5co-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-1 animate-box">
                <div id="thumbnails">
                    <ul class="clearfix">
                        <?php
                        if(sizeof($general)>0):
                        foreach ($general as $key => $value) {
                        ?>
                        <li><a class="fancybox" href="<?php echo base_url();?><?php echo $value->foto; ?>" title="<?php echo $value->description; ?>"><img src="<?php echo base_url();?><?php echo $value->foto; ?>" style="width: 150px;height: 150px;" alt="turntable"></a></li>
                        <?php
                        }
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>  
    </div>
</div>


