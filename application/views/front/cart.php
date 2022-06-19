<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("front/head");?>
	<link rel="stylesheet" href="/assets/css/cart.css" />
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<?php $this->load->view("front/header-top");?>
		<?php $this->load->view("front/header-middle");?>	
		<?php $this->load->view("front/header-bottom");?>
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed" id="totalcart">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="unit">Satuan</td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $c = 1;?>
						<?php foreach($carts as $cart){?>
						<tr cartid="<?php echo $cart["id"];?>">
							<td class="cart_product">
								<?php echo $c;?>
								<?php $c++;?>
							</td>
							<td class="cart_description">
								<h4 class="cartname">
								<a href="/home/productdetails/<?php echo $cart["id"];?>">
								<?php echo $cart["name"]?></h4>
								</a>
							</td>
							<td>
							<?php echo $cart['unit']?>
							</td>
							<td class="cart_pricez">
								<p class="cprice" sellprice="<?php echo $cart["sellingprice"]?>" 
								oriprice="<?php echo ($cart["sellingprice"]/$cart['amount'])?>">
								<?php echo "Rp. " . number_format($cart["sellingprice"]/$cart['amount'])?>
								</p>
							</td>
							<td class="cart_quantityz">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $cart['amount']?>" autocomplete="off" size="2">
									<a class="cart_quantity_down"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price number totprice" totprice="<?php echo $cart["sellingprice"]?>">
								<?php echo  "Rp. " . number_format($cart["sellingprice"])?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php }?>


					</tbody>
					<tfoot>
						<tr>
							<th></th><th colspan=4>Sub Total</th>
							<th id="subtotal" oritotal="<?php echo $sub_total;?>">
							<p class="cart_total_price number" >
								<?php echo "Rp. " . number_format($sub_total);?>
								</p>
							</th>
						</tr>
						<tr>
							<th></th><th colspan=4>PPN</th>
							<th id="fvat" oritotal="<?php echo $sub_total;?>">
							<p class="cart_total_price number" >
								<?php echo "Rp. " . number_format($vat);?>
								</p>
							</th>
						</tr>
						<tr>
							<th></th><th colspan=4>Total</th>
							<th id="ftotal" oritotal="<?php echo $sub_total;?>">
							<p class="cart_total_price number" >
								<?php echo "Rp. " . number_format($total);?>
								</p>
							</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Langkah berikutnya </h3>
				<p>Anda dapat memberikan Testimoni atas Toko Online Kami, Mengupdate belanja, atau Check Out.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<a class="btn btn-default update" href="">Testimoni</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
							<a class="btn btn-default update" href="/">Lanjutkan belanja</a>
							<a class="btn btn-default check_out" href="/home/checkout">Lanjutkan pembayaran</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php $this->load->view("front/footer");?>	


    <script src="/assets/eshopper/js/jquery.js"></script>
	<script src="/assets/eshopper/js/bootstrap.min.js"></script>
	<script src="/assets/eshopper/js/jquery.scrollUp.min.js"></script>
    <script src="/assets/eshopper/js/jquery.prettyPhoto.js"></script>
	<script src="/js/radu.js"></script>
    <script src="/assets/eshopper/js/main.js"></script>
	<script src="/assets/eshopper/js/cart.js"></script>
	<script type="text/javascript" src="/assets/esfront/cart-notifier.js"></script>
</body>
</html>