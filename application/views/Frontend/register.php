
		<div class="container">

			<?php echo $this->session->flashdata('msg'); ?>

			<div class="row">
				<div class="col-sm-5 col-sm-offset-4">
					<div class="login-form"><!--login form-->
						<h2>Cerate your account</h2>
						<form method="POST" action="<?php echo base_url().'index.php/Frontend/proses_register' ?>" >
							<input type="text" name="username" placeholder="Username" required />
							<input type="password" name="password" placeholder="Password" required />
							<input type="text" name="nama_cus" placeholder="Nama" required />
							<input type="email" name="email" placeholder="Email" required />
							<input type="text" name="no_hp" placeholder="No Handphone" required />
							<select name="negara">
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
							<textarea name="alamat" required placeholder="Alamat"></textarea>
							<button type="submit" class="btn btn-default">Create</button><br/>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
		<P>&nbsp;</P>