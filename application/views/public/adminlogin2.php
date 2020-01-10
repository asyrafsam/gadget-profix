<!DOCTYPE html>
<!--  -->
<html>
<head>
  <title></title>
  <link href="<?php echo base_url('assets/css/login.css') ;?>" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="<?php echo base_url('assets/css/slideshow.css') ;?>" rel="stylesheet">
</head>
<body>
  <div class="container login-container">
    <div class="row">
      <div class="col-md-6 ads">
        <h1><img class="logo" src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="350" height="100"></h1>
        <div class="slideshow">
          <div class="content">
            <div class="content-carrousel">
              <figure class="shadow"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="50" height="50"></figure>
              <figure class="shadow"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="50" height="50"></figure>
              <figure class="shadow"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="50" height="50"></figure>
              <figure class="shadow"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="50" height="50"></figure>
              <figure class="shadow"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="50" height="50"></figure>
              <figure class="shadow"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="50" height="50"></figure>
              <figure class="shadow"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="50" height="50"></figure>
              <figure class="shadow"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="50" height="50"></figure>
              <figure class="shadow"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="50" height="50"></figure>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 login-form">
        <!-- <div class="profile-img">
          
        </div> -->
        <div class="col-md-12">
          <br>
          <h3 style="text-align: left;">Login | Please login to start session</h3>
          <br>
        </div>
        <br>
        <form action="<?php echo base_url('m_function/validatelogin'); ?>" method="post" enctype='multipart/form-data'>
          <div class="form-group">
            <input type="text" class="form-control" name="u_email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="u_pass" placeholder="Password">
          </div>
          <div class="form-group">
            <!-- <button type="button" class="btn btn-primary btn-lg btn-block">Sign In</button> -->
            <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Login">
          </div>
          <div class="form-group forget-password">
              <a href="#">Forget Password</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>


