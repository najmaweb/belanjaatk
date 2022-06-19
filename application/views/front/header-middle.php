		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="/"><img src="/assets/eshopper/images/home/belanjaatklogo400x97_undertext.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
									if($islogged){
								?>
								<li><a><i>Hi <?php echo $username;?></i></a></li>
								<?php }?>
								<li><a href="/home/checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="/home/cart"><i class="fa fa-shopping-cart"></i> Keranjang Belanja<sub id="totalcart"></sub></a></li>
								<?php
									if($islogged){
								?>
								<li><a href="/home/logout"><i class="fa fa-lock"></i> Logout</a></li>
								<?php 
									}else{
								?>
								<li><a href="/home/login"><i class="fa fa-lock"></i> Login</a></li>
								<?php 
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
