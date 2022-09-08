<div id="layoutSidenav_content">
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Data Kategori</h1>
		<div class="card mb-4">
			<div class="card header"> <span> <p> &nbsp; <i class="fa fa-edit"></i> Form Input Data Kategori </p></span>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo base_url().'index.php/Backend/data_kategori_add_aksi' ?>" enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-md-12">
							<label>Nama Kategori : </label>
							<input type="text" name="nm_ktgr" class="form-control" placeholder="Masukan Kategori Produk" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12">
							<label>Keterangan : </label>
							<textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
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