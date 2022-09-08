<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url=base_url;
			redirect($url);
		}
	}

	public function index()
	{
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/index.php');
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_customer()
	{
		$this->load->model('M_Customer');
		$data['customer'] = $this->M_Customer->tampil_data_customer()->result();
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_customer.php',$data);
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_customer_add()
	{
		$this->load->model('M_Customer');
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_customer_add.php');
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_customer_add_aksi()
	{
		$username = $this->input->POST('username');
		$pass = $this->input->POST('password');
		$nama = $this->input->POST('nama_cus');
		$email = $this->input->POST('email');
		$nohp = $this->input->POST('no_hp');
		$negara = $this->input->POST('negara');
		$alamat = $this->input->POST('alamat');

		$data = array(
			'username' => $username,
			'password' => $pass,
			'nama_customer' => $nama,
			'email' => $email,
			'no_hp' => $nohp,
			'negara' => $negara,
			'alamat' => $alamat
		);

		$this->load->model('M_Customer');
		$this->M_Customer->input_data($data,'customer');

		$this->session->set_flashdata('msg_tambah_customer','
				<div class="register-reg alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Tambah Data Customer!
				</div>
				');
			redirect('Backend/data_customer');
	}
	public function data_customer_edit($id_customer)
	{
		$where = array('id_customer' => $id_customer);
		$this->load->model('M_Customer');
		$data['customer'] = $this->M_Customer->tampil_data_c($where,'customer')->result();
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_customer_edit.php',$data);
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_customer_edit_aksi()
	{
		$id_cus = $this->input->POST('id_cus');
		$username = $this->input->POST('username');
		$pass = $this->input->POST('password');
		$nama = $this->input->POST('nama_cus');
		$email = $this->input->POST('email');
		$nohp = $this->input->POST('no_hp');
		$negara = $this->input->POST('negara');
		$alamat = $this->input->POST('alamat');

		if (empty($pass)) {
			$data = array(
			'id_customer' => $id_cus,
			'username' => $username,
			'nama_customer' => $nama,
			'email' => $email,
			'no_hp' => $nohp,
			'negara' => $negara,
			'alamat' => $alamat
		);

			$where = array( 'id_customer'=>$id_cus );

			$this->load->model('M_Customer');
			$this->M_Customer->edit_data_c($where,$data,'customer');
			$this->session->set_flashdata('msg_edit_customer','
				<div class="register-reg alert alert-warning">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Mengubah Data Customer!
				</div>
				');
			redirect('Backend/data_customer');
		}else {	
		$data = array(
			'id_customer' => $id_cus,
			'username' => $username,
			'password' => $pass,
			'nama_customer' => $nama,
			'email' => $email,
			'no_hp' => $nohp,
			'negara' => $negara,
			'alamat' => $alamat
		);

			$where = array( 'id_customer'=>$id_cus );

			$this->load->model('M_Customer');
			$this->M_Customer->edit_data_c($where,$data,'customer');
			$this->session->set_flashdata('msg_edit_customer','
				<div class="register-reg alert alert-warning">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Mengubah Data Customer!
				</div>
				');
			redirect('Backend/data_customer');
		}

	}
	public function data_customer_delete($id_customer){
		$where = array('id_customer'=>$id_customer);
		$this->load->model('M_Customer');
		$this->M_Customer->delete_data($where,'customer');
		$this->session->set_flashdata('msg_delete_customer','
				<div class="register-reg alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Menghapus Data Customer!
				</div>
				');
			redirect('Backend/data_customer');
	}
	public function data_produk()
	{
		$this->load->model('M_Produk');
		$data['produk'] = $this->M_Produk->tampil_data_produk()->result();
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_product.php',$data);
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_produk_add()
	{
		$this->load->model('M_Produk');
		$this->load->model('M_Kategori');
		$data['kategori'] = $this->M_Kategori->tampil_data_kategori()->result();
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_product_add.php',$data);
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_produk_add_aksi()
	{
		$pic['upload_path'] 	= './uploads/';
		$pic['allowed_types']	= 'jpg|png|gif';
		$pic['max_size']		= 20048;
		$pic['encrypt_name']	= TRUE;
		$this->load->library('upload',$pic);

		if (! $this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_error());
			redirect('Backend/data_product_add',$error);
		}else{
			$kd = $this->input->POST('kd_produk');
			$nm = $this->input->POST('nm_produk');
			$ktgr = $this->input->POST('kategori');
			$hrg = $this->input->POST('harga_produk');
			$stk = $this->input->POST('stok');
			$ket = $this->input->POST('keterangan');
			$ft = $this->upload->data("file_name");

			$data = array(
				'kd_produk' => $kd,
				'nama_produk' => $nm,
				'id_kategori' => $ktgr,
				'harga' => $hrg,
				'stok' => $stk,
				'keterangan' => $ket,
				'foto_produk' => $ft
			);
			$this->load->model('M_Produk');
			$this->M_Produk->input_data($data,'produk');
			$this->session->set_flashdata('msg_tambah_produk','
				<div class="register-reg alert alert-primary">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Menambahkan Produk!
				</div>
				');
			redirect('Backend/data_produk');
		}
	}
	public function data_produk_edit($id_produk)
	{
		$where = array('id_produk'=>$id_produk);
		$this->load->model('M_Produk');
		$this->load->model('M_Kategori');
		$data['kategori'] = $this->M_Kategori->tampil_data_kategori()->result();
		$data['produk'] = $this->M_Produk->tampil_data($where,'produk')->result();
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_product_edit.php',$data);
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_produk_edit_aksi()
	{
		$pic['upload_path'] 	= FCPATH.'./uploads/';
		$pic['allowed_types']	= 'jpg|png|gif';
		$pic['max_size']		= 20048;
		$pic['encrypt_name']	= TRUE;
		$this->load->library('upload',$pic);

		if (! $this->upload->do_upload('foto')) {
			$id = $this->input->POST('id_produk');
			$kd = $this->input->POST('kd_produk');
			$nm = $this->input->POST('nm_produk');
			$ktgr = $this->input->POST('kategori');
			$hrg = $this->input->POST('harga_produk');
			$stk = $this->input->POST('stok');
			$ket = $this->input->POST('keterangan');


			$data = array(
				'kd_produk' => $kd,
				'nama_produk' => $nm,
				'id_kategori' => $ktgr,
				'harga' => $hrg,
				'stok' => $stk,
				'keterangan' => $ket,
			);

			$where = array( 'id_produk'=>$id );

			$this->load->model('M_Produk');
			$this->M_Produk->edit_data($where,$data,'produk');
			$this->session->set_flashdata('msg_edit_produk','
				<div class="register-reg alert alert-warning">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Mengubah Data Produk!
				</div>
				');
			redirect('Backend/data_produk');
		}else{
			$id = $this->input->POST('id_produk');
			$kd = $this->input->POST('kd_produk');
			$nm = $this->input->POST('nm_produk');
			$ktgr = $this->input->POST('kategori');
			$hrg = $this->input->POST('harga_produk');
			$stk = $this->input->POST('stok');
			$ket = $this->input->POST('keterangan');
			$ft = $this->upload->data("file_name");

			$data = array(
				'kd_produk' => $kd,
				'nama_produk' => $nm,
				'id_kategori' => $ktgr,
				'harga' => $hrg,
				'stok' => $stk,
				'keterangan' => $ket,
				'foto_produk' => $ft
			);

			$where = array( 'id_produk'=>$id );

			$file = $this->db->get_where('produk',['id_produk'=>$id])->row();
			unlink("./uploads/".$file->foto_produk);

			$this->load->model('M_Produk');
			$this->M_Produk->edit_data($where,$data,'produk');
			$this->session->set_flashdata('msg_edit_produk','
				<div class="register-reg alert alert-warning">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Mengubah Data & Foto Produk!
				</div>
				');
			redirect('Backend/data_produk');
		}
	}
	public function data_produk_delete($id_produk){
		$where = array('id_produk'=>$id_produk);
		$file = $this->db->get_where('produk',['id_produk'=>$id_produk])->row();
			unlink("./uploads/".$file->foto_produk);
		$this->load->model('M_Produk');
		$this->M_Produk->delete_data($where,'produk');
		$this->session->set_flashdata('msg_delete_produk','
				<div class="register-reg alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Menghapus Data Produk!
				</div>
				');
			redirect('Backend/data_produk');
	}

	public function data_kategori()
	{
		$this->load->model('M_Kategori');
		$data['kategori'] = $this->M_Kategori->tampil_data_kategori()->result();
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_kategori.php',$data);
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_kategori_add()
	{
		$this->load->model('M_Kategori');
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_kategori_add.php');
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_kategori_add_aksi()
	{
		$nm = $this->input->POST('nm_ktgr');
		$ket = $this->input->POST("keterangan");

			$data = array(
				'nama_kategori' => $nm,
				'keterangan' => $ket
			);
			$this->load->model('M_Kategori');
			$this->M_Kategori->input_data($data,'kategori');
			$this->session->set_flashdata('msg_tambah_kategori','
				<div class="register-reg alert alert-primary">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Menambahkan Kategori!
				</div>
				');
			redirect('Backend/data_kategori');
	}
	public function data_kategori_edit($id_kategori)
	{
		$where = array('id_kategori' => $id_kategori);
		$this->load->model('M_Kategori');
		$data['kategori'] = $this->M_Kategori->tampil_data_k($where,'kategori')->result();
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_kategori_edit.php',$data);
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_kategori_edit_aksi()
	{
			$id = $this->input->POST('id_ktgr');
			$nama = $this->input->POST('nm_ktgr');
			$ket = $this->input->POST('keterangan');


			$data = array(
				'id_kategori' => $id,
				'nama_kategori' => $nama,
				'keterangan' => $ket
			);

			$where = array( 'id_kategori'=>$id );

			$this->load->model('M_Kategori');
			$this->M_Kategori->edit_data_k($where,$data,'kategori');
			$this->session->set_flashdata('msg_edit_kategori','
				<div class="register-reg alert alert-warning">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Mengubah Data Kategori!
				</div>
				');
			redirect('Backend/data_kategori');
	}
	public function data_kategori_delete($id_kategori){
		$where = array('id_kategori'=>$id_kategori);
		$this->load->model('M_Kategori');
		$this->M_Kategori->delete_data($where,'kategori');
		$this->session->set_flashdata('msg_delete_kategori','
				<div class="register-reg alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Menghapus Data Kategori!
				</div>
				');
			redirect('Backend/data_kategori');
	}
	public function data_pembayaran()
	{
		$where = $this->session->userdata('ses_id_cus');
		$this->load->model('M_Bayar');
		$data['bayar'] = $this->M_Bayar->tampil_data_pembayaran()->result();
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/data_pembayaran_customer.php',$data);
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_pembayaran_detail($no_refrensi)
	{
		$this->load->model('M_Bayar');
		$data['detail'] = $this->M_Bayar->tampil_data_detail($no_refrensi);
		$this->load->view('Backend/Template/header.php');
		$this->load->view('Backend/detail_belanja.php',$data);
		$this->load->view('Backend/Template/footer.php');
	}
	public function data_pembayaran_aksi()
	{
		$nor = $this->input->POST('no_ref');
		$sts = $this->input->POST('status');

			$data = array(
				'status_pembayaran' => $sts,
			);

			$where = array( 'no_refrensi'=>$nor );
			$this->load->model('M_Bayar');
			$this->M_Bayar->update_data_bayar($where,$data,'bayar');
			$this->session->set_flashdata('msg_bayar_belanja','
				<div class="register-reg alert alert-primary">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Menambahkan Pembayaran!
				</div>
				');
			redirect('Backend/data_pembayaran');
	}
}
?>