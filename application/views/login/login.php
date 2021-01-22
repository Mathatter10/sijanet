<html>
  <head>
    <title>SIJANET</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="<?php echo site_url('assets/login/img/logogram2.png')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/menu.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/main.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/bgimg.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/font.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/font-awesome.min.css')?>"/>
    <script type="text/javascript" src="<?php echo base_url('assets/login/js/jquery-1.12.4.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/login/js/main.js')?>"></script>
  </head>
<body>
  <div class="background"></div>
  <div class="backdrop"></div>
  <div class="login-form-container" id="login-form">
    <div class="login-form-content">
      <div class="login-form-header">
        <div class="logo" >
          <img style="background: #1f6eb7;" src="<?php echo base_url('assets/login/img/logogram.png')?>"/>
        </div>
        <h3>SIJANET</h3>
        <?php if($this->session->flashdata('msg')){ ?>  
         <div class="alert alert-success">  
           <a href="#" class="close" data-dismiss="alert">&times;</a>  
           <button class="btn btn-alert"><strong>Username Atau Password Salah</strong></button> 
         </div>
        <?php } ?> 
     
      </div>
      <form method="post" action="<?php echo site_url('login/auth') ?>" class="login-form">
        <div class="input-container">
          <i class="fa fa-user"></i>
          <input type="text" class="input" name="username" placeholder="Username"/>
        </div>
        <div class="input-container">
          <i class="fa fa-lock"></i>
          <input type="password"  id="login-password" class="input" name="password" placeholder="Password"/>
          <i id="show-password" class="fa fa-eye"></i>
        </div>
        <input type="submit" name="login" value="Login" class="button"/>
      </form>
    </div>
  </div>
</body>
</html>

<script type="application/javascript">  
     /** After windod Load */  
     $(window).bind("load", function() {  
       window.setTimeout(function() {  
         $(".alert").fadeTo(500, 0).slideUp(500, function() {  
           $(this).remove();  
         });  
       }, 500);  
     });  
   </script>