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
		<link rel="stylesheet" href="/assets/css/cart.css" />
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">

			<div class="step-one">
				<h2 class="heading">Check Out</h2>
			</div>

			<div class="register-req">
				<p>Silakan <a href="/home/login">Login</a> atau <a href="/home/login">mendaftar</a> sebagai Pelanggan kami</p>
			</div><!--/register-req-->

			<div class="review-payment">
				<h2>Detail Pembelian</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="table-responsive cart_infox">
						<table class="table table-condensed" id="tdetails">
							<thead>
								<tr>
									<th colspan=5 class="centered">Bank Mandiri KCP Surabaya Klampis </th>
								</tr>
								<tr>
									<th colspan=5 class="centered">a.n CV Surya Kawitan 142-00-2403063-6</th>
								</tr>
								<tr>
									<th>No</th>
									<th>Item</th>
									<th>Harga</th>
									<th>Banyaknya</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
							<?php $c = 0;?>
							<?php $total = 0;?>
								<?php foreach($carts as $cart){?>
								<?php $c++;?>
								<tr myid="<?php echo $cart['id']?>">
									<td>
										<?php echo $c;?>
									</td>
									<td>
										<?php echo $cart["name"]?>
									</td>
									<td class="cart_price number">
										<?php echo "Rp. " . number_format($cart["sellingprice"]/$cart["amount"])?>
									</td>
									<td class="cart_quantity centered">
										<?php echo $cart["amount"]?>
									</td>
									<td class="cart_total number">
										<?php echo "Rp. " . number_format($cart["sellingprice"])?>
									</td>
								</tr>
								<?php $total+= $cart["sellingprice"];?>
								<?php }?>
							</tbody>
							<tfoot>
								<tr><td colspan=4>Sub Total</td><td class="number"><?php echo "Rp. " . number_format($total);?></td></tr>
								<tr><td colspan=4>PPN</td><td class="number"><?php echo "Rp. " . number_format($total*0.1);?></td></tr>
								<tr><td colspan=4>Total</td><td class="number"><?php echo "Rp. " . number_format($total*1.1);?></td></tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="col-md-6">
				&nbsp;
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	

	<?php $this->load->view("front/footer");?>
	


    <script src="/assets/eshopper/js/jquery.js"></script>
	<script src="/assets/eshopper/js/bootstrap.min.js"></script>
    <script src="/assets/eshopper/js/jquery.scrollUp.min.js"></script>
    <script src="/assets/eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="/assets/eshopper/js/main.js"></script>
</body>
</html>