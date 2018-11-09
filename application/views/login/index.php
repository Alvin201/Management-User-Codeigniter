<div class="container">
   
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
   
<div id="responseDiv" class="alert text-center" style="margin-top:30px;display: none;width: 100%; ">
                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                <span id="message"></span>
</div> 

            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <br>
                  
                <div class="panel-body">
                    <form id="logForm">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="User Name" name="username" type="username" autofocus id="name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" id="pwd">
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block"><span id="logText">Login</span></button> 
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#logText').html('Login');
        $('#logForm').submit(function(e){
            e.preventDefault();
            $('#logText').html('Checking...');
            var url = '<?php echo base_url(); ?>';
            var user = $('#logForm').serialize();
            var login = function(){
                $.ajax({
                    type: 'POST',
                    url: url + 'dashboard/validate',
                    dataType: 'json',
                    data: user,
                    success:function(response){
                        $('#message').html(response.message);
                        $('#logText').html('Login');
                        if(response.error){
                            $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                        }
                        else{
                            $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                            $('#logForm')[0].reset();
                            setTimeout(function(){
                                //location.reload();
                                //alert("review your answer");
                                window.location.href = "/kompas_alvin/dashboard";
                            }, 3000);
                        }
                    }
                });
            };
            setTimeout(login, 3000);
        });
 
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    });
</script> 