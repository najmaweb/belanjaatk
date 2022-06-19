<!DOCTYPE html>
<html>
<?php $this->load->view('administrator/products/header');?>
<body class="dt-example">
<?php $this->load->view('admin/products/modals');?>

<?php //$this->load->view('admin/header');?>
<!--=== Breadcrumbs ===-->
<div class="row-fluid breadcrumbs margin-bottom-20">
	<div class="container">
        <h1 class="pull-left">Order Pembelian</h1>
        <ul class="pull-right breadcrumb">
            <li id="productadd">
			<a href="/administrator/products/add">
			<img src="<?php echo base_url();?>assets/img/aquarius/ic_plus.png" />
			</a>
			</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

	<div class="container">
		<section>
            Nama: <?php echo $cust->username;?><br />
            Penerima: <?php echo $cust->destinationname;?><br />
            Alamat: <?php echo $cust->address;?><br />
            Kota: <?php echo $cust->city;?><br />
            Email: <?php echo $cust->email;?><br />
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Harga Jual</th>
						<th>Jumlah</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($objs as $obj){?>
					<tr rowid='<?php echo $obj->id;?>'>
						<td class='objname'><?php echo $obj->productname;?></td>
						<td class='objnewrelease text-center'><?php echo number_format($obj->sellprice);?></td>
						<td class='objisgallery text-center'><?php echo $obj->amount;?></td>
						<td class='objsellingprice text-right'><?php echo number_format($obj->total) ;?></td>
						<td>
						<span class="productedit pointer" >
							<img src="<?php echo base_url();?>assets/img/aquarius/ic_edit.png">
						</span>
						<span class="productdelete pointer" >
							<img src="<?php echo base_url();?>assets/img/aquarius/ic_delete.png">
						</span>
						</td>
					</tr>
					<?php }?>

				</tbody>
			</table>

		</section>
	</div>

</body>
</html>
