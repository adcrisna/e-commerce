        <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
        
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Kategori</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <?php 
                                    foreach ($kategori as $k) {
                                ?>  
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="#"><?php echo $k->nama_kategori; ?></a></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                        </div><!--/category-products-->
                    
                    
                    </div>
                </div>
                <form method="POST" action="<?php echo base_url().'index.php/Customer/belanja_add_aksi' ?>">
                    
                <?php 

                foreach ($produk as $p) {
                    $no_belanja = 'EC-'.rand(1,99999).'';
                    $tgl_skrng = date('Y-m-d');
                    $cus = $this->session->userdata('ses_id_cus');
                ?>
                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img width="100" src="<?php echo base_url();?>uploads/<?php echo $p->foto_produk; ?>">
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2><?php echo $p->nama_produk ?></h2>
                                <p>Kode Produk : <?php echo $p->kd_produk ?></p>
                                 <img width="100" src="<?php echo base_url();?>uploads/<?php echo $p->foto_produk; ?>">
                                <span>
                                    <span>Rp.<?php echo $p->harga ?></span>
                                    <label>Qty:</label>
                                    <input type="number" name="jumlah_blnja" value="1" />
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i> Add </button>
                                </span>
                                    <input type="hidden" value="<?php echo $no_belanja ?>" name="no_belanja">
                                    <input type="hidden" value="<?php echo $tgl_skrng ?>" name="tgl_blnja">
                                    <input type="hidden" value="<?php echo $p->id_produk ?>" name="id_produk">
                                    <input type="hidden" value="<?php echo $cus ?>" name="id_cus">
                                <p><b>Ketersediaan Stok :</b> <?php echo $p->stok ?></p>
                                <p><b>Keterangan :</b> <?php echo $p->keterangan ?></p>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                </div>
                <?php } ?>
            </form>
            </div>
        </div>
    </section>