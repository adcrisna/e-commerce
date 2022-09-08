            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Customer</h1>
                            <br/>
                          <a href="<?php echo base_url().'index.php/Backend/data_customer_add' ?>" class="btn btn-primary">Tambah Customer</a>
                          <br/>
                          <br/>
                          <?php echo $this->session->flashdata('msg_tambah_customer'); ?>
                          <?php echo $this->session->flashdata('msg_edit_customer'); ?>
                          <?php echo $this->session->flashdata('msg_delete_customer'); ?>
                           <br/>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Customer</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Nama Customer</th>
                                                <th>Email</th>
                                                <th>No Handphone</th>
                                                <th>Negara</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($customer as $c) {
                                            ?>
                                            <tr>
                                                <td><?php echo $c->id_customer; ?></td>
                                                <td><?php echo $c->username; ?></td>
                                                <td><?php echo $c->nama_customer; ?></td>
                                                <td><?php echo $c->email; ?></td>
                                                <td><?php echo $c->no_hp; ?></td>
                                                <td><?php echo $c->negara; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url().'index.php/Backend/data_customer_edit/'.$c->id_customer.'' ?>" class="btn btn-success">Edit</a> &nbsp;<a href="<?php echo base_url().'index.php/Backend/data_customer_delete/'.$c->id_customer.'' ?>" class="btn btn-danger" onClick="return confirm('Apakah anda ingin menghapus data ini ?')">Hapus</a>
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
               