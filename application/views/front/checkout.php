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
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Informasi Pelanggan</p>
							<form>
								<input type="text" id="username" placeholder="Display Name" value="<?php echo $username?>">
								<input type="text" id="email" placeholder="Email" value="<?php echo $memberemail?>">
							</form>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Alamat Pengiriman</p>
							<div class="form-onex">
								<form>
									<input type="text" id="dstname" placeholder="Nama">
									<input type="text" id="dsttelp" placeholder="Telepon">
									<input type="text" id="dstaddress" placeholder="Alamat">
									<input type="text" id="dstcity" placeholder="Kota">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Keterangan</p>
							<textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Detail Pembelian</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="table-responsive cart_infox">
						<table class="receipt" id="tdetails">
							<thead>
								<tr>
									<td colspan=5 class="centered">Transfer ke Bank Mandiri KCP Surabaya Klampis</td>
								</tr>
								<tr>
									<td colspan=5 class="centered">a.n CV Surya Kawitan 142-00-2403063-6</td>
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
									<td class="pname">
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
				<button id="btnsaveorder">Simpan</button>
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<?php $this->load->view("front/footer");?>
    <script src="/assets/eshopper/js/jquery.js"></script>
	<script src="/assets/eshopper/js/bootstrap.min.js"></script>
    <script src="/assets/eshopper/js/jquery.scrollUp.min.js"></script>
    <script src="/assets/eshopper/js/jquery.prettyPhoto.js"></script>
	<script src="/js/radu.js"></script>
    <script src="/assets/eshopper/js/checkout.js"></script>
</body>
</html>