            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Pembayaran Customer</h1>
                            <br/>
                          <?php echo $this->session->flashdata('msg_pembayaran'); ?>
                           <br/>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Customer</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>No Refrensi</th>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($bayar as $b) {
                                            ?>
                                            <tr>
                                                <td><?php echo $b->id_bayar; ?></td>
                                                <td><?php echo $b->no_refrensi; ?></td>
                                                <td><?php echo $b->tgl_bayar; ?></td>
                                                <td><?php echo $b->total_bayar; ?></td>
                                                <td><?php echo $b->status_pembayaran; ?></td>
                                                <td>
                                                    <?php if ($b->status_pembayaran != "Terkonfirmasi") {      
                                                    ?>
                                                    <a href="<?php echo base_url().'index.php/Backend/data_pembayaran_detail/'.$b->no_refrensi.'' ?>" class="btn btn-success">Verifikasi</a> &nbsp;
                                                <?php }else{
                                                    
                                                } ?>
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
               