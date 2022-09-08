            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Pembayaran Customer</h1>
                            <br/>
                          <?php echo $this->session->flashdata('msg_pembayaran'); ?>
                           <br/>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Pembayaran</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Foto Produk</th>
                                                <th>No Belanja</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($detail as $d) {
                                            ?>
                                            <tr>
                                                <td><img width="100" src="<?php echo base_url();?>uploads/<?php echo $d->foto_produk; ?>"></td>
                                                <td><?php echo $d->no_belanja; ?></td>
                                                <td><?php echo $d->nama_produk; ?></td>
                                                <td><?php echo $d->harga; ?></td>
                                                <td><?php echo $d->jml_belanja; ?></td>
                                                <td><?php echo $d->total; ?></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="3"><h5>Total Belanja (Termasuk Pajak)</h5></td>
                                                <td><h4><?php echo $d->total_bayar; ?></h4></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url().'index.php/Backend/data_pembayaran_aksi' ?>" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Verifikasi Pembayaran </label>
                            <input type="hidden" name="no_ref" class="form-control" value="<?php echo $d->no_refrensi; ?>">
                           <select name="status" class="form-control">
                               <option> Pilih </option>
                               <option value="Terkonfirmasi">Terkonfirmasi</option>
                               <option value="Belum Terkonfirmasi"> Belum Terkonfirmasi</option>
                           </select>
                        </div>
                    </div>
                    <br/>
                    <center>
                    <input type="submit" name="proses" class="btn btn-primary" value="Verifikasi Pembayaran">
                    &nbsp;
                    <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                    </center>
                </form>
                
            </div>
        </div>
        
    </div>
</main>
</div>