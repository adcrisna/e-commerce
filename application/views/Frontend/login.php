
		<div class="container">

			<?php echo $this->session->flashdata('msg'); ?>
			<?php echo $this->session->flashdata('msg_register'); ?>

			<div class="row">
				<div class="col-sm-4 col-sm-offset">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST" action="<?php echo base_url().'index.php/Login/proseslogin' ?>" >
							<input type="text" name="username" placeholder="Username" />
							<input type="password" name="password" placeholder="Password" />
							<button type="submit" class="btn btn-default">Sign In </button><br/>
							<p>Belum punya Account?  <a href="<?php echo base_url().'index.php/Frontend/register' ?>">Daftar</a></p>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
		<P>&nbsp;</P>