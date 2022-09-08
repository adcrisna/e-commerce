<div id="layoutSidenav_content">
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Data Customer</h1>
		<div class="card mb-4">
			<div class="card header"> <span> <p> &nbsp; <i class="fa fa-edit"></i> Form Update Data Customer </p></span>
			</div>
			<div class="card-body">
				<?php 
                    foreach ($customer as $c) {
                ?>
				<form method="POST" action="<?php echo base_url().'index.php/Backend/data_customer_edit_aksi' ?>" >
					<div class="form-row">
						<div class="col-md-6">
							<input type="hidden" name="id_cus"  class="form-control" value="<?php echo $c->id_customer ?>" />
							<label>Username :</label>
							<input type="text" name="username"  class="form-control" value="<?php echo $c->username ?>" />
						</div>
						<div class="col-md-6">
							<label>Password :</label>
							<input type="password" name="password"  class="form-control"  placeholder="Masukan Password Baru" />
						</div>
					</div>&nbsp;
					<div class="form-row">
						<div class="col-md-6">
							<label>Name :</label>
							<input type="text" name="nama_cus"  class="form-control"  value="<?php echo $c->nama_customer ?>" />
						</div>
						<div class="col-md-6">
							<label>Email :</label>
							<input type="email" name="email"  class="form-control"  value="<?php echo $c->email ?>" />
						</div>
					</div>&nbsp;
					<div class="form-row">
						<div class="col-md-6">
							<label>No Telepon/WhatsApp</label>
							<input type="text" name="no_hp"  class="form-control"  value="<?php echo $c->no_hp ?>" />
						</div>
						<div class="col-md-6">
							<label>Country :</label>
							<select name="negara"  class="form-control">
								<option value="<?php echo $c->negara ?>"> <?php echo $c->negara ?> </option>
								<option value="Indonesia">Indonesia</option>
								<option value="Singapore">Singapore</option>
								<option value="Jepang">Jepang</option>
								<option value="Korea Utara">Korea Utara</option>
								<option value="Korea Selatan">Korea Selatan</option>
								<option value="China">China</option>
								<option value="Thailand">Thailand</option>
								<option value="Vietnam">Vietnam</option>
							</select> &nbsp;
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<label>Address</label>
							<textarea name="alamat"  class="form-control"><?php echo $c->alamat ?></textarea>
						</div>
					</div>
					<br/>
					<center>
						<button type="submit" class="btn btn-primary">Update</button>
						&nbsp;
						<input type="reset" name="reset" class="btn btn-warning" value="Reset">
					</center>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
</main>
</div>