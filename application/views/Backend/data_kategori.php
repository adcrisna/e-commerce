            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Kategori</h1>
                        <br/>
                          <a href="<?php echo base_url().'index.php/Backend/data_kategori_add' ?>" class="btn btn-primary">Tambah </a>
                          <br/>
                          <br/>
                          <?php echo $this->session->flashdata('msg_tambah_kategori'); ?>
                          <?php echo $this->session->flashdata('msg_edit_kategori'); ?>
                           <?php echo $this->session->flashdata('msg_delete_kategori'); ?>
                          <br/>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Kategori</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Kategori</th>
                                                <th>Keterangan</th>
                                                <th width="120">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($kategori as $k) {
                                            ?>
                                            <tr>
                                                <td><?php echo $k->id_kategori; ?></td>
                                                <td><?php echo $k->nama_kategori; ?></td>
                                                <td><?php echo $k->keterangan; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url().'index.php/Backend/data_kategori_edit/'.$k->id_kategori.'' ?>" class="btn btn-success">Edit</a> &nbsp;<a href="<?php echo base_url().'index.php/Backend/data_kategori_delete/'.$k->id_kategori.'' ?>" class="btn btn-danger" onClick="return confirm('Apakah anda ingin menghapus data ini ?')">Hapus</a>
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
               