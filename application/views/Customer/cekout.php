<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url().'index.php/Customer/cekout' ?>">Cekout </a></li>
				  <li class="active"> <?php echo $this->session->userdata('ses_nama'); ?></li>
				</ol>
			</div>

			<div class="table-responsive cart_info">
				<form method="POST" action="<?php echo base_url().'index.php/Customer/bayar_add_aksi' ?>">
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
						error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
							$a = 0;
							foreach ($cekout as $k) { 						
							$a++;
							$ttl[$a] = $k->total;
						?>
						<tr>
							<input type="hidden" name="no_refrensi" value="<?php echo $k->no_refrensi ?>">
							<input type="hidden" name="tgl_bayar" value="<?php echo date('Y-m-d') ?>">

							<td class="cart_product">
								<a href=""><img src="<?php echo base_url();?>uploads/<?php echo $k->foto_produk; ?>" height='100' alt=""></a>
							</td>
							<td class="cart_description">
								<h4><?php echo $k->nama_produk ?></h4>
								<p>Kode Produk: <?php echo $k->kd_produk ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo "Rp.".number_format($k->harga,0,',','.')."" ?></p>
							</td>
							<td class="cart_quantity">
								<p> <?php echo $k->jml_belanja ?> </p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo "Rp.".number_format($k->harga * $k->jml_belanja,0,',','.')."" ?></p>
							</td>
						</tr>
					<?php } ?>
					<tr>
						<td colspan="3"></td>
						<td class="cart_description" align="left"> <h3> Total Belanja </h3></td>

						<td class="cart_total"><h3> <?php echo "Rp.".number_format(array_sum($ttl),0,',','.')."" ?> </h3> 
						<?php
						 $pajak = array_sum($ttl)*0.1;
						 $total = array_sum($ttl)+$pajak+10000;

						 ?>
							<input type="hidden" name="total_byr" value="<?php echo $total ?>">
							<input type="hidden" name="status" value="Menunggu Verifikasi">
							<input type="hidden" name="status_cekout" value="Sudah Dibayar">
						</td>
					</tr>
					<tr>
						<td colspan="3" class="cart_description" align="center"> <i class="fa fa-warning"> <h4> Pembayaran Melalui Rekening BRI <br/>A/N E-KOMERS  <BR/> 4324-3932-42328-51</h4></i></td>
						<td class="cart_total" align="left">
							<h3>Pajak Belanja </h3>
						</td>
						<td class="cart_total">
							<h3>10% </h3>
						</td>
					</tr>
					<tr>
						<td colspan="3"></td>
						<td class="cart_total" align="left">
							<h3>Ongkos Kirim </h3>
						</td>
						<td class="cart_total">
							<h3>Rp. 10.000 </h3>
						</td>
					</tr>
					</tbody>
				</table>
				<button type="submit" class="btn btn-fefault cart"> <i class="fa fa-money"></i> Bayar </button>
			</form>
			</div>
		</div>
	</section> <!--/#cart_items-->