<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url().'index.php/Customer/keranjang' ?>">Cart</a></li>
				  <li class="active"> <?php echo $this->session->userdata('ses_nama'); ?></li>
				</ol>
			</div>

			<div class="table-responsive cart_info">
				<form method="POST" action="<?php echo base_url().'index.php/Customer/cekout_aksi' ?>">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Nama Produk</td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($keranjang as $k) { 
							$no_refrensi = rand(1,999999);
							?>
						<tr>
							<td class="cart_product">
								<input type="checkbox" name="no_belanja[]" value="<?php echo $k->no_belanja ?>">
								<input type="hidden" name="no_refrensi" value="<?php echo $no_refrensi ?>">
								<input type="hidden" name="id_produk[]" value="<?php echo $k->id_produk ?>">
								<input type="hidden" name="id_customer[]" value="<?php echo $k->id_customer ?>">
								<input type="hidden" name="jml_belanja[]" value="<?php echo $k->jumlah_belanja ?>">
								<input type="hidden" name="status" value="Belum Dibayar">
							</td>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url();?>uploads/<?php echo $k->foto_produk; ?>" height='100' alt=""></a>
							</td>
							<td class="cart_description">
								<h4><?php echo $k->nama_produk ?></h4>
								<p>Kode Produk: <?php echo $k->kd_produk ?></p>
							</td>
							<td class="cart_price">
								<p>Rp.<?php echo $k->harga ?></p>
							</td>
							<td class="cart_quantity">
								<p> <?php echo $k->jumlah_belanja ?> </p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $k->harga * $k->jumlah_belanja ?></p>
								<input type="hidden" name="total[]" value="<?php echo $k->harga * $k->jumlah_belanja ?>">
								<input type="hidden" name="tgl_cekout" value="<?php echo date('Y-m-d') ?>">
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-fefault cart"> <i class="fa fa-shopping-cart"></i> Cek-Out </button>
			</form>
			</div>
		</div>
	</section> <!--/#cart_items-->