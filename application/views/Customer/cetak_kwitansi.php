<body onload="javascript:window.print()" style="margin: auto; width: 100%;">
	<div style="margin-left: 10px; margin-right: 10px"></div>
	
	<table style="width: 100%" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center"><font size="7" >E-COMMERCE</font></td>
		</tr>
		<tr>
			<td align="center"><font size="3" >Jl. Kesambi No.202, RT.04, Kesambi, Kota Cirebon</font></td>
		</tr>
	</table><br/>
	<div style="border-bottom: 3px dotted gray"></div><br>

	<font size="5"><center><u>Kwitansi Pembelian Produk</u></center></font>
	<p></p>
	<table style="width: 100%" cellspacing="0" cellpadding="0">
		<tr>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px; background-color: lightgray">Items</td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px; background-color: lightgray">Nama Produk</td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px; background-color: lightgray">Harga</td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px; background-color: lightgray">Jumlah</td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px; background-color: lightgray">Total</td>
		</tr>
		<?php 
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
			$a = 0;
			foreach ($bayar as $k) { 						
			$a++;
			$ttl[$a] = $k->total;
		?>
		<tr>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px"><img src="<?php echo base_url();?>uploads/<?php echo $k->foto_produk; ?>" height='100' alt=""></td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px"><?php echo $k->nama_produk ?>
								<p>Kode Produk: <?php echo $k->kd_produk ?></p></td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px"><?php echo "Rp.".number_format($k->harga,0,',','.')."" ?></td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px"><?php echo $k->jml_belanja ?></td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px"><?php echo "Rp.".number_format($k->harga * $k->jml_belanja,0,',','.')."" ?></td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="4" align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px">Total Belanja</td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px"><?php echo "Rp.".number_format(array_sum($ttl),0,',','.')."" ?></td>
		</tr>
		<tr>
			<td colspan="4" align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px">Pajak</td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px">10%</td>
		</tr>
		<tr>
			<td colspan="4" align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px">Ongkos Kirim</td>
			<td align="center" style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; padding: 3px 5px">Rp.10.000</td>
		</tr>
	</table>
</body>