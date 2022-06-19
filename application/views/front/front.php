<!DOCTYPE html>
<html lang="en">

<head>
<style>
		.userlogin{
			font-family: Cambria, Georgia, serif;
		}

</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Belanja Peralatan Kantor">
    <meta name="author" content="Belanja Peralatan Kantor">

    <title>Belanja-atk.co.id</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://belanjaatk.co.id/css/media-query.css">
    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
    <link href="css/1-col-portfolio.css" rel="stylesheet">

    <link href="css/megamenu.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
</head>

<body>

<div id="sample" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="cartproductname">Beli</h4>
      </div>
      <div class="modal-body">
      <img id="productimage" src="" width="200" />
        <p>Harga<input type="text" id="sellingprice" value="1"></p>
        <p>Jumlah<input type="text" class="spinner" id="productamount" value="1"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="save-cart">Tambahkan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>

<div id='menu'>
<div class="filter" data-filter=".1">PERLENGKAPAN KANTOR</div>
<div class="filter" data-filter=".2">ALAT TULIS KANTOR & KERTAS</div>
<div class="filter" data-filter=".3">TONER & CARTRIDGE</div>
<div class="filter" data-filter=".4">PERLENGKAPAN RUMAH TANGGA</div>
<div class="filter" data-filter=".5">AKSESORIS KOMPUTER</div>
<div class="filter" data-filter=".promosi">PROMOSI</div>
</div>
<div id="Container">
<div class="selectContainer">
	<select class="form-control" id="smalloption">
	<option>Perlengkapan Kantor</option>
	<option>Alat Tulis Kantor & Kertas</option>
	<option>Toner & Cartridge</option>
	<option>Perlengkapan Rumah Tangga</option>
	<option>Aksesoris Komputer</option>
	<option>Promosi</option>
	</select>
	</div>
	<?php foreach($products as $product){?>
	<?php
	//if(read_file("media/products/".$product->image)){
	$myfile = "media/products/".$product->image;
	//}else{
	//$myfile = "images/imagenotavailable.jpeg";
	//}
	?>
	<div class="item mix text-center <?php echo ($product->category_id);?>"><img class="productimage" width="200px" src=<?php echo $myfile;?> />
		<div class="productname" myid="<?php echo $product->id;?>"><?php echo $product->name. " and " . $product->unit;?></div>
		<div class="sellingprice" sellingprice="<?php echo $product->sellingprice;?>"><?php echo "Rp. ".number_format($product->sellingprice);?></div>
		<span class="addtocart">Add To Cart</span>

	</div>
	<?php }?><!--
	<div class="item mix office"><img src="images/offices/chair.jpg" /></div>
	<div class="item mix office"><img src="images/offices/isolasi.jpg" /></div>
	<div class="item mix office"><img src="images/offices/plong.jpg" /></div>
	<div class="item mix office atk"><img src="images/offices/kertas.png" /></div>
	<div class="item mix office atk"><img src="images/atk/bolpen.jpeg" /></div>
	<div class="item mix computer"><img src="images/computers/dell_laptop.jpg" /></div>
	<div class="item mix computer"><img src="images/computers/printer.jpg" /></div>
	<div class="item mix computer"><img src="images/computers/printer2.jpeg" /></div>
	<div class="item mix tonerncartridge"><img src="images/cartridges/hp1.jpg" /></div>
	<div class="item mix promosi"><img src="images/promos/1615_308x228_triple_promo_zone_supplies.jpg" /></div>
	<div class="item mix homestuffs"><img src="images/homestuffs/drinkwaters.jpeg" /></div>
	<div class="item mix homestuffs"><img src="images/homestuffs/cleaner.jpg" /></div>-->
</div>



    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">belanjaatk.co.id</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url()?>home/about">About</a>
                    </li>
                    <li>
                        <a href="#">Check Out</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>home/contact">Contact</a>
                    </li>
                    <li>
                    <?php if($this->auth->is_logged_in()){
                    echo "<a href=".base_url()."home/logout>Logout</a>";
                   // echo "<a>".humanize($this->session->userdata["username"])."</a>";
                    }else{
                    ?>
                        <a href="<?php echo base_url();?>home/login">Login/Register</a>
                        <?php 
                        
                        }?>
                    </li>
                </ul>

	            <ul class="nav navbar-nav navbar-right" >
        	    <?php
	            if($this->auth->is_logged_in()){
        	    	echo "<li><a class='userlogin'>".humanize($this->session->userdata["username"]);
        	    	echo "<span class='badge'>0</span>";
        	    	echo "</a></li>";
	            }
        	    ?>
	            </ul>

                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <!-- Page Header -->

        <hr>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Belanjaatk.com 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/startbootstrap/jquery.js"></script>
      <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/mixItUp/jquery.mixitup.js"></script>

    <!-- Bootstrap Core JavaScript -->
       <script src="<?php echo base_url()?>js/radu.js"></script>

    <script src="js/startbootstrap/bootstrap.min.js"></script>
	<script type="text/javascript">
		(function($){
			console.log("js working");
			$('#Container').mixItUp({
				pagination:{
					limit:8,
					loop:false,
					generatePagers:true,
					maxPagers:5,
					pagerClass:'',
					prevButtonHTML:'sbl',
					nextButtonHTML:'stl'
				}
			});
			$('#menu .filter').click(function(){
				$('#menu .filter').removeClass('selected');
				$(this).addClass('selected');
			});
			$('.addtocart').click(function(){
                myname = $(this).stairUp({level:1}).find('.productname');
                myid = $(this).stairUp({level:1}).find('.productname').attr("myid");
                sellingprice = $(this).stairUp({level:1}).find('.sellingprice').attr('sellingprice');
                myimg = $(this).stairUp({level:1}).find(".productimage").attr("src");
                alert(myid);
                $("#cartproductname").html(myname.html());
                $("#cartproductname").attr("myid",myid);
                $("#sellingprice").val(sellingprice);
                $("#productimage").attr("src",myimg);
                //sellingprice
                $(".spinner").spinner();
                $('#sample').modal();
			});
            $("#save-cart").click(function(){
                console.log("cart saved");
                obj = $(this).stairUp({level:2});
                //alert(obj.find("#cartproductname").attr("myid"));
                //alert(obj.html());
                $.ajax({
                    url:"admin/addtosession",
                    //data:{id:4,name:'3oek'},
                    data:{
                        id:obj.find("#cartproductname").attr("myid") ,
                        name:obj.find("#cartproductname").html(),
                        amount:$("#productamount").val(),
                        sellingprice:$("#sellingprice").val(),
                        productimage:$("#productimage").attr("src")
                        },
                    type:'post'
                });
            });
		}(jQuery))
	</script>
</body>

</html>
 