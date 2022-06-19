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
	</header>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">belanja<span class="atktext">atk</span>.co.id</h4>
      </div>
      <div class="modal-body">
        <p>Anda telah menambahkan <br /><span id="confirmationproductname"></span>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>



	<?if(shotopwadds()){?>
	<section id="advertisement">
		<div class="container">
			<img src="/assets/eshopper/images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	<?php }?>
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
						<?php if(showrightadds()){?>
						<div class="shipping text-center"><!--shipping-->
							<img src="/assets/eshopper/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						<?php }?>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<div class="col-sm-12">
						<?php
						if($num_rows==0){
							echo "Produk kategori ini masih belum tersedia";
						}else{
							?>
													<ul class="pagination">
							<?php for($c=$startpagination;$c<=$endpagination;$c++){?>
								<?php $anchor = $c*9;?>
								<?php $active = (intval($anchor)===intval($page))?'active':'';?>
								<li class="<?php echo $active;?>"><a href="/home/category/<?php echo $id.'/'.$anchor;?>/9"><?php echo $c;?></a></li>
							<?php }?>
						</ul>

							
							
							<?php

						}
						?>
						</div>
						<?php foreach($products as $product){?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<?php
											if(trim($product->image)==""){
												$image = "/images/268x249/gambarbelumtersedia2.png";
											}else{
												$image = "/media/products/".$product->image;
											}
										?>
										<img class="pimage" src="<?php echo $image;?>" width="268" height="249" alt="" />
										<h2><?php 
											if(is_numeric($product->sellingprice)){
												echo "Rp. " . number_format($product->sellingprice);
											}else{
												echo "Rp. " . $product->sellingprice;
											}
										?></h2>
										<p myid = "<?php echo $product->id;?>" mysellingprice="<?php echo $product->sellingprice;?>" class="cartproductname"><?php echo $product->name;?></p>
										<button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<a href="/home/productdetails/<?php echo $product->id;?>">
											<img src="<?php echo $image;?>" width="268" height="249" alt="" />
											</a>
											<h2><?php 
												if(is_numeric($product->sellingprice)){
													echo "Rp. " . number_format($product->sellingprice);
												}else{
													echo "Rp. " . $product->sellingprice;
												}
												?></h2>
											<p myid = "<?php echo $product->id;?>" mysellingprice="<?php echo $product->sellingprice;?>" class="cartproductname" unitname="<?php echo $product->unit;?>"><?php echo $product->name;?></p>
											<button class="btn btn-default add-to-cart btnaddtocart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
									<?php if($product->isgallery==='1'){?>
									<img src="/assets/eshopper/images/home/sale.png" class="new" alt="" />
									<?php }?>
									<?php if($product->isnewrelease==='1'){?>
									<img src="/assets/eshopper/images/home/new.png" class="new" alt="" />
									<?php }?>
									
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php }?>
						<?php
						if($num_rows==0){
						}else{
							?>
						
						<ul class="pagination">
							<?php for($c=$startpagination;$c<=$endpagination;$c++){?>
								<?php $anchor = $c*9;?>
								<?php $active = (intval($anchor)===intval($page))?'active':'';?>
								<li class="<?php echo $active;?>">
									<a href="/home/category/<?php echo $id.'/'.$anchor;?>/9"><?php echo $c;?></a>
								</li>
							<?php }?>
						</ul>
							<?php

						}
						?>

					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	<?php $this->load->view("front/footer");?>	  
<script type="text/javascript" src="/assets/esfront/shop.js"></script>
<script type="text/javascript" src="/assets/esfront/cart-notifier.js"></script>
</body>
</html>