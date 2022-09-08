<div id="layoutSidenav_content">
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Data Customer</h1>
		<div class="card mb-4">
			<div class="card header"> <span> <p> &nbsp; <i class="fa fa-edit"></i> Form Input Data Customer </p></span>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo base_url().'index.php/Backend/data_customer_add_aksi' ?>" >
					<div class="form-row">
						<div class="col-md-6">
							<input type="text" name="username"  class="form-control" placeholder="Username" required />
						</div>
						<div class="col-md-6">
							<input type="password" name="password"  class="form-control"  placeholder="Password" required />
						</div>
					</div>&nbsp;
					<div class="form-row">
						<div class="col-md-6">
							<input type="text" name="nama_cus"  class="form-control" placeholder="Nama" required />
						</div>
						<div class="col-md-6">
							<input type="email" name="email"  class="form-control" placeholder="Email" required />
						</div>
					</div>&nbsp;
					<div class="form-row">
						<div class="col-md-6">
							<input type="text" name="no_hp"  class="form-control" placeholder="No Handphone" required />
						</div>
						<div class="col-md-6">
							<select name="negara"  class="form-control">
								<option> -Your Country </option>
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
							<textarea name="alamat"  class="form-control" required placeholder="Alamat"></textarea>
						</div>
					</div>
					<br/>
					<center>
						<button type="submit" class="btn btn-primary">Tambah</button>
						&nbsp;
						<input type="reset" name="reset" class="btn btn-warning" value="Reset">
					</center>
				</form>
			</div>
		</div>
	</div>
</main>
</div>