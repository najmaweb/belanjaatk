<!DOCTYPE html>
<html>
<?php $this->load->view('administrator/products/header');?>
<body class="dt-example">
<?php $this->load->view('admin/products/modals');?>

<?php //$this->load->view('admin/header');?>
<!--=== Breadcrumbs ===-->
<div class="row-fluid breadcrumbs margin-bottom-20">
	<div class="container">
        <h1 class="pull-left">Administrasi</h1>
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
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Produk Baru</th>
						<th>Gallery</th>
						<th>Harga Jual</th>
						<th>Harga Diskon</th>
						<th>Aktif</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($objs as $obj){?>
					<tr rowid='<?php echo $obj->id;?>'>
						<td class='objname'><?php echo $obj->name;?></td>
						<td class='objnewrelease text-center'><?php echo ($obj->isnewrelease=='1')?'Ya':'Tidak';?></td>
						<td class='objisgallery text-center'><?php echo ($obj->isgallery=='1')?'Ya':'Tidak';?></td>
						<td class='objsellingprice text-right'><?php echo number_format($obj->sellingprice) ;?></td>
						<td class='objalterprice text-center'><?php echo $obj->alterprice;?></td>
						<td class='activeproduct text-center'><?php echo ($obj->active=='1')?'Ya':'Tidak';?></td>
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
