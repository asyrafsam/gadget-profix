<!DOCTYPE html>
<html lang="en">
<head>
	<title>Gadget Profix</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/vendor/bootstrap/css/bootstrap.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/fonts/iconic/css/material-design-iconic-font.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/vendor/animate/animate.css');?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/vendor/css-hamburgers/hamburgers.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/vendor/animsition/css/animsition.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/vendor/select2/select2.min.css');?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/vendor/daterangepicker/daterangepicker.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/css/util.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/loginasset/css/main.css');?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(<?php echo base_url('assets/loginasset/images/bg-02.png');?>">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo base_url('m_function/validatelogin'); ?>" method="post" enctype='multipart/form-data'>
					<span class="login100-form-logo">
						<img width="200" height="70" src="<?php echo base_url('images/ProfixLogin.png');?>">
					</span>

					<span class="login100-form-title p-b-25 p-t-20">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="text" name="u_email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="u_pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<a class="txt1" href="<?php echo base_url('Main/forgotpassword');?>">
							Forgot Password?
						</a>
						<br>
						<a class="txt1" href="<?php echo base_url('Main/index');?>">
							<- Back to Main Page?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<!-- <div class="text-center p-t-10">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/loginasset/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/loginasset/vendor/animsition/js/animsition.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/loginasset/vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?php echo base_url('assets/loginasset/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/loginasset/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/loginasset/vendor/daterangepicker/moment.min.js');?>"></script>
	<script src="<?php echo base_url('assets/loginasset/vendor/daterangepicker/daterangepicker.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/loginasset/vendor/countdowntime/countdowntime.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/loginasset/js/main.js');?>"></script>

</body>
</html>