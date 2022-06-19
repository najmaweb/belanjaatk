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
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<div class="login-formx"><!--login form-->
						<h2>Permasalahan Login</h2>
						Email yang anda masukkan tidak dikenali
					</div><!--/login form-->
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