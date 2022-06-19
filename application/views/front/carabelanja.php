<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("front/head");?>
	<style>
	.step{
		border:1px;
		padding: 15px;
		margin: 10px;
	}
	.red{
		color:red;
	}
	.italic{
		font-style:italic;
	}
	.bold{
		font-weight:bold;
	}
	</style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<?php $this->load->view("front/header-top");?>		
		<?php $this->load->view("front/header-middle");?>
		<?php $this->load->view("front/header-bottom");?>

	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<?php $this->load->view("front/categories");?>					
						<?php 
						$showbrands = false;
						if($showbrands){
							$this->load->view("front/brands");
						}
						?>
						<?php
							$showpricerange = false;
							if($showpricerange){
							$this->load->view("front/pricerange");
							}
						?>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Cara Belanja</h2>
						Langkah-langkah berbelanja adalah sebagai berikut:
						<div class="single-blog-post step">
							<h3><span class="bold">1. Booking</span></h3>
							Pengunjung <span class="italic bold">belanja</span><span class="red italic bold">atk</span> memilih barang yang hendak dibeli, diakhiri dengan check out. Pengunjung <span class="italic bold">belanja</span><span class="red italic bold">atk</span> mendapatkan ID Pembelian.
						</div>
						<div class="single-blog-post step">
							<h3><span class="bold">2. Ordering</span></h3>
							Pengunjung <span class="italic bold">belanja</span><span class="red italic bold">atk</span> mentransfer uang sesuai dengan harga yang ditentukan, dan mengirimkan bukti transfer serta ID Pembelian.
						</div>
						<div class="single-blog-post step">
							<h3><span class="bold">3. Shipping</span></h3>
							<span class="italic bold">belanja</span><span class="red italic bold">atk</span> mengirimkan barang yang telah dipesan ke alamat yang telah ditentukan.
						</div>									
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php $this->load->view("front/footer");?>	

  
    <script src="/assets/eshopper/js/jquery.js"></script>
	<script src="/assets/eshopper/js/price-range.js"></script>
	<script src="/assets/eshopper/js/jquery.scrollUp.min.js"></script>
	<script src="/assets/eshopper/js/bootstrap.min.js"></script>
    <script src="/assets/eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="/assets/eshopper/js/main.js"></script>
	<script src="/assets/js/common.js"></script>
</body>
</html>