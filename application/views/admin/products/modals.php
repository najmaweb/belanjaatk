<div id="dInformation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Informasi</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="without-head">
					Data telah tersimpan
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
	</div>
</div>
<div id="dImages" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Images</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="without-head">
					<ul class='images'>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
	</div>
</div>

<div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="without-head">
					Anda akan menghapus <span id='productoremove'></span>
					Anda yakin ?
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnRemove">Ya</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
	</div>
</div>
<div id="dProductAdd" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Penambahan Produk</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="without-head">
					<div class="row-form clearfix">
						<div class="span6">Nama:</div>
						<div class="span6">
							<input id="name" name="name"/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Ditampilkan di gallery:</div>
						<div class="span6">
							<select id='isgallery'>
							<option>Ya</option>
							<option>Tidak</option>
							</select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Ditampilkan di New Release:</div>
						<div class="span6">
							<select id='isnewrelease'>
							<option>Ya</option>
							<option>Tidak</option>
							</select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Jenis:</div>
						<div class="span6">
							<select id="ctype">
							<option value="1">Produk</option>
							<option value="0">Kategori</option>
							</select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Satuan:</div>
						<div class="span6">
							<input type='text' id='unit'/>
						</div>
					</div>
					<div class="row-form clearfix" id="dproductparent">
						<div class="span6">Parent:</div>
						<div class="span6">
							<select id='productparent'>
								<?php foreach($categories as $category){?>
								<option value='<?php echo $category->id;?>'><?php echo $category->name;?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="row-form clearfix" id="dproductparent">
						<div class="span6">Harga Jual:</div>
						<div class="span6">
							<input type='text' id='sellingprice'/>
						</div>
					</div>
					<div class="row-form clearfix" id="dproductparent">
						<div class="span6">Harga Pengganti:</div>
						<div class="span6">
							<input type='text' id='alterprice'/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Image (270px X 329px):</div>
						<div class="span6">
							<p><input type='text' id='productImageAdd'/></p>
							<p><a class="imageuploader" id="uploadimageAdd">Pilih Gambar (270px X 329px)</a></p>
							<span id="statusAdd"></span>
						</div>
					</div>
					<div id="pictureAdd" class="row-form clearfix">

					</div>

					<div class="row-form clearfix">
						<div class="span6">Image (270px X 329px):</div>
						<div class="span6">
							<p><input type='text' id='productImageAddsearchresult'/></p>
							<p><a class="imageuploader" id="uploadimageAddsearchresult">Pilih Gambar Search Result (270px X 329px)</a></p>
							<span id="statusAddsearchresult"></span>
						</div>
					</div>
					<div id="pictureAddsearchresult" class="row-form clearfix">

					</div>
					<div class="row-form clearfix">
						<div class="span6">Keterangan:</div>
						<div class="span6">
							<input id="description" name="description"/>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnSave">Simpan</button>
		<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
	</div>
</div>

<div id="dProductEdit" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" objid="" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Edit Produk</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="without-head">
					<div class="row-form clearfix">
						<div class="span6">Nama:</div>
						<div class="span6">
							<input id="nameedit" name="nameedit"/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Aktif:</div>
						<div class="span6">
							<select  id='activeedit'></select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Ditampilkan di gallery:</div>
						<div class="span6">
							<select id='galleryeedit'></select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Ditampilkan di New Release:</div>
						<div class="span6">
							<select  id='newreleaseedit'></select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Parent:</div>
						<div class="span6">
							<select id='productparentedit'>
								<option value='1'>Perlengkapan Kantor</option>
								<option value='2'>Alat Tulis Kantor & Kertas</option>
								<option value='3'>Toner & Cartridge</option>
								<option value='4'>Perlengkapan Rumah Tangga</option>
								<option value='5'>Aksesoris Komputer</option>
								<option value='6'>Furniture Kantor</option>
							</select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Satuan:</div>
						<div class="span6">
							<input type='text' id='unitedit'/>
						</div>
					</div>
					<div class="row-form clearfix" id="dproductparent">
						<div class="span6">Harga Jual:</div>
						<div class="span6">
							<input type='text' id='sellingpriceedit'/>
						</div>
					</div>
					<div class="row-form clearfix" id="dproductparent">
						<div class="span6">Harga Pengganti:</div>
						<div class="span6">
							<input type='text' id='alterpriceedit'/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Image (270px X 329px):</div>
						<div class="span6">
							<p><input type='text' id='productImageEdit'/></p>
							<p><a class="imageuploader" id="uploadimage">Upl. Gambar (270 X 329)</a></p>
							<span id="status"></span>
						</div>
					</div>
					<div id="pictureEdit" class="row-form clearfix">

					</div>
					<div class="row-form clearfix">
						<div class="span6">Image (862px X 398px):</div>
						<div class="span6">
							<p><input type='text' id='productImageEditsearchresult'/></p>
							<p><a class="imageuploader" id="uploadimagesearchresult">Upl. Gambar (862 X 398)</a></p>
							<span id="statussearchresult"></span>
						</div>
					</div>
					<div id="pictureEditsearchresult" class="row-form clearfix">

					</div>
					<div class="row-form clearfix">
						<div class="span6">Keterangan:</div>
						<div class="span6">
							<input id="descriptionedit" name="descriptionedit"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnUpdate">Simpan</button>
		<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnCloseUpdate">Tutup</button>
	</div>
</div>

