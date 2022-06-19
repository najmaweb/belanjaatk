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
				<div class="col-sm-12 col-sm-offset-1">
					Detail Pembelian anda adalah sebagai berikut:<br />
					<?php echo $detailorder;?>
					Order ID : <?php echo $orderid?><br />
					Silakan transfer ke Bank Mandiri atas nama CV Surya Kawitan no rek. 142-00-2403063-6<br />
					Paling lambat 2 hari setelah pemesanan (<?php echo date("d M Y",strtotime("+2 day"));?>)
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					Merupakan komitmen kami untuk melayani anda dengan baik.
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<br />	Terimakasih atas kunjungan anda <br />
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					&nbsp;
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