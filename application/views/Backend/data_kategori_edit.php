<div id="layoutSidenav_content">
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Data Kategori</h1>
		<div class="card mb-4">
			<div class="card header"> <span> <p> &nbsp; <i class="fa fa-edit"></i> Update Data Kategori </p></span>
			</div>
			<div class="card-body">
				<?php 
                    foreach ($kategori as $k) {
                ?>
				<form method="POST" action="<?php echo base_url().'index.php/Backend/data_kategori_edit_aksi' ?>" enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-md-12">
							<label>ID Kategori : </label>
							<input type="text" name="id_ktgr" class="form-control" value="<?php echo $k->id_kategori?>" readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12">
							<label>Nama Kategori : </label>
							<input type="text" name="nm_ktgr" class="form-control" value="<?php echo $k->nama_kategori?>" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12">
							<label>Keterangan : </label>
							<textarea name="keterangan" class="form-control" ><?php echo $k->keterangan?></textarea>
						</div>
					</div>
					<br/>
					<center>
					<input type="submit" name="proses" class="btn btn-primary" value="Simpan">
					&nbsp;
					<input type="reset" name="reset" class="btn btn-warning" value="Reset">
					</center>
				</form>
				<?php } ?>
				
			</div>
		</div>
		
	</div>
</main>