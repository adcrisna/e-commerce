<div id="layoutSidenav_content">
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Data Produk</h1>
		<div class="card mb-4">
			<div class="card header"> <span> <p> &nbsp; <i class="fa fa-edit"></i> Update Data Produk </p></span>
			</div>
			<div class="card-body">

				<?php 

				foreach ($produk as $p) {

				?>

				<form method="POST" action="<?php echo base_url().'index.php/Backend/data_produk_edit_aksi' ?>" enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-md-6">
							<label>Kode Produk : </label>
							<input type="hidden" name="id_produk" class="form-control" value="<?php echo $p->id_produk ?>" required>
							<input type="text" name="kd_produk" class="form-control" value="<?php echo $p->kd_produk ?>" required>
						</div>
						<div class="col-md-6">
							<label>Kategori Produk : </label>
							<select name="kategori" class="form-control" required>
								<?php 
                                   	foreach ($kategori as $k) {
                                ?>
								<option value="<?php echo $k->id_kategori; ?>" <?php if ($k->id_kategori == $p->id_kategori) echo "selected"; ?> ><?php echo $k->nama_kategori; ?></option>
							 	<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12">
							<label>Nama Produk : </label>
							<input type="text" name="nm_produk" class="form-control" value="<?php echo $p->nama_produk ?>" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<label>Harga :</label>
							<input type="number" name="harga_produk" class="form-control" value="<?php echo $p->harga ?>" required>
						</div>
						<div class="col-md-6">
							<label>Stok Produk : </label>
							<input type="text" name="stok" class="form-control" value="<?php echo $p->stok ?>">
						</div>
					</div>
					<br/>
					<div class="form-row">
						<div class="col-md-6">
							<label>Keterangan Produk : </label>
							<textarea name="keterangan" class="form-control" ><?php echo $p->keterangan ?></textarea>
						</div>
					<br/>
					<br/>
						<div class="col-md-6">
							<div class="form-group">	
							<label>Foto Produk : </label>
							<img width="200" height="200" src="<?php echo base_url();?>uploads/<?php echo $p->foto_produk; ?>">
							<input type="file" name="foto" class="form-control" >
							</div>
						</div>
					</div>
					<br/>
					<center>
					<input type="submit" name="proses" class="btn btn-primary" value="Update">
					&nbsp;
					<input type="reset" name="reset" class="btn btn-warning" value="Reset">
					</center>
				</form>
				<?php } ?>
			</div>
		</div>
		
	</div>
</main>