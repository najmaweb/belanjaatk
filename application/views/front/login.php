<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("front/head");?>
</head><!--/head-->
<body>
	<header id="header"><!--header-->
		<?php $this->load->view("front/header-top");?>
		<?php $this->load->view("front/header-middle");?>	
		<?php $this->load->view("front/header-bottom");?>
	</header><!--/header-->
	<section id="formx"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login ke Akun anda</h2>
						<form action="/home/sign_in" method="post">
							<input type="email" placeholder="Alamat Email"  name="loginemail"/>
							<input type="password" placeholder="Password" name="loginpassword" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Atau</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Mendaftar Keanggotaan baru</h2>
						<form action="/home/signuphandler" method="post">
							<input type="text" placeholder="Nama" name="signupname"/>
							<input type="email" placeholder="Alamat Email" name="signupemail"/>
							<input type="password" placeholder="Password" name="signuppassword"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	<?php $this->load->view("front/footer");?>	
    <script src="/assets/eshopper/js/jquery.js"></script>
	<script src="/assets/eshopper/js/price-range.js"></script>
    <script src="/assets/eshopper/js/jquery.scrollUp.min.js"></script>
	<script src="/assets/eshopper/js/bootstrap.min.js"></script>
    <script src="/assets/eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="/assets/eshopper/js/main.js"></script>
</body>
</html>