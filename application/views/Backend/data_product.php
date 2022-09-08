            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Produk</h1>
                        <br/>
                          <a href="<?php echo base_url().'index.php/Backend/data_produk_add' ?>" class="btn btn-primary">Tambah </a>
                          <br/>
                          <br/>
                          <?php echo $this->session->flashdata('msg_tambah_produk'); ?>
                           <?php echo $this->session->flashdata('msg_edit_produk'); ?>
                           <?php echo $this->session->flashdata('msg_delete_produk'); ?>
                          <br/>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Produk</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Foto</th>
                                                <th>Kode</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th width="115">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($produk as $p) {
                                            ?>
                                            <tr>
                                                <td><?php echo $p->id_produk; ?></td>
                                                <td><img width="100" src="<?php echo base_url();?>uploads/<?php echo $p->foto_produk; ?>"></td>
                                                <td><?php echo $p->kd_produk; ?></td>
                                                <td><?php echo $p->nama_produk; ?></td>
                                                <td><?php echo $p->nama_kategori; ?></td>
                                                <td><?php echo $p->harga; ?></td>
                                                <td><?php echo $p->stok; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url().'index.php/Backend/data_produk_edit/'.$p->id_produk.'' ?>" class="btn btn-success">Edit</a> &nbsp;<a href="<?php echo base_url().'index.php/Backend/data_produk_delete/'.$p->id_produk.'' ?>" class="btn btn-danger" onClick="return confirm('apakah anda ingin menghapus data ini ?')" >Hapus</a>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               