<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Page</title>
    
    <meta name="description" content="Frequently Ask Question">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de"/>
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url()?>assets/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/lib/font-awesome/css/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
    

<body class="login">

    <div class="form-signin">
    <div class="text-center">
        <img src="<?=base_url()?>assets/img/Pqafu.png" alt="Pqafu Logo"  height="35">
    </div>
      <span class="confirm-div" style="float:right; color:green;"><?php if(null != $this->session->flashdata('login_error')) 
                  { echo $this->session->flashdata('login_error');};?></span>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="<?php echo base_url();?>index.php/admin/Login/login" method="POST">
                <p class="text-muted text-center">
                    Enter your username and password
                </p>
                <input type="text" placeholder="Username" class="form-control top" name="uemail">
                <input type="password" placeholder="Password" class="form-control bottom" name="upassword">
        
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html">
                <p class="text-muted text-center">Enter your valid e-mail</p>
                <input type="email" placeholder="mail@domain.com" class="form-control">
                <br>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
            </form>
        </div>
       <!--  <div id="signup" class="tab-pane">
            <form action="<?php //echo base_url();?>">
                <input type="text" placeholder="username" name="uemail" class="form-control top">
                <input type="email" placeholder="mail@domain.com" name="upassword" class="form-control middle">
                <input type="password" placeholder="password" class="form-control middle">
                <input type="password" placeholder="re-password" class="form-control bottom">
                <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
            </form>
        </div> -->
    </div>
    <hr>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <!-- <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li> -->
        </ul>
    </div>
  </div>

    <!--jQuery -->
    <script src="<?=base_url()?>assets/lib/jquery/jquery.js"></script>

    <!--Bootstrap -->
    <script src="<?=base_url()?>assets/lib/bootstrap/js/bootstrap.js"></script>


    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('.list-inline li > a').click(function() {
                    var activeForm = $(this).attr('href') + ' > form';
                    //console.log(activeForm);
                    $(activeForm).addClass('animated fadeIn');
                    //set timer to 1 seconds, after that, unload the animate animation
                    setTimeout(function() {
                        $(activeForm).removeClass('animated fadeIn');
                    }, 1000);
                });
            });
        })(jQuery);
    </script>
</body>

</html>
