<div id="layoutSidenav_content">
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Data Produk</h1>
		<div class="card mb-4">
			<div class="card header"> <span> <p> &nbsp; <i class="fa fa-edit"></i> Form Input Data Produk </p></span>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo base_url().'index.php/Backend/data_produk_add_aksi' ?>" enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-md-6">
							<label>Kode Produk : </label>
							<input type="text" name="kd_produk" class="form-control" placeholder="Masukan Kode Produk" required>
						</div>
						<div class="col-md-6">
							<label>Kategori Produk : </label>
							<select name="kategori" class="form-control" required>
								<option>Pilih Kategori</option>
								<?php 
                                   	foreach ($kategori as $k) {
                                ?>
								<option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
							 	<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12">
							<label>Nama Produk : </label>
							<input type="text" name="nm_produk" class="form-control" placeholder="Masukan Nama Produk" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<label>Harga :</label>
							<input type="number" name="harga_produk" class="form-control" placeholder="$0" required>
						</div>
						<div class="col-md-6">
							<label>Stok Produk : </label>
							<input type="text" name="stok" class="form-control" placeholder="Masukan Stok Produk">
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<label>Keterangan Produk : </label>
							<textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
						</div>
						<div class="col-md-6">
							<div class="form-group">	
							<label>Foto Produk : </label>
							<input type="file" name="foto" class="form-control" >
							</div>
						</div>
					</div>
					<br/>
					<center>
					<input type="submit" name="proses" class="btn btn-primary" value="Simpan">
					&nbsp;
					<input type="reset" name="reset" class="btn btn-warning" value="Reset">
					</center>
				</form>
				
			</div>
		</div>
		
	</div>
</main>