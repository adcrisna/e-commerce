<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url=base_url;
			redirect($url);
		}
	}
	public function index()
	{
		$this->load->model('M_Kategori');
		$data['kategori'] = $this->M_Kategori->tampil_data_kategori()->result();
		$this->load->model('M_Produk');
		$data['produk'] = $this->M_Produk->tampil_data_produk()->result();
		$this->load->view('Customer/Template/header.php');
		$this->load->view('Customer/index.php',$data);
		$this->load->view('Customer/Template/footer.php');
	}

	public function belanja($id_produk)
	{
		$this->load->model('M_Kategori');
		$data['kategori'] = $this->M_Kategori->tampil_data_kategori()->result();
		$where = array('id_produk'=>$id_produk);
		$this->load->model('M_Produk');
		$data['produk'] = $this->M_Produk->view_data($where,'produk')->result();
		$this->load->view('Customer/Template/header.php');
		$this->load->view('Customer/belanja.php',$data);
		$this->load->view('Customer/Template/footer.php');
	}
	public function belanja_add_aksi()
	{
		$no_belanja = $this->input->POST('no_belanja');
		$tgl_belanja = $this->input->POST("tgl_blnja");
		$id_produk = $this->input->POST('id_produk');
		$id_customer = $this->input->POST("id_cus");
		$jmlh = $this->input->POST('jumlah_blnja');

			$data = array(
				'no_belanja' => $no_belanja,
				'id_produk' => $id_produk,
				'tgl_belanja' => $tgl_belanja,
				'id_customer' => $id_customer,
				'jumlah_belanja' => $jmlh,
			);
			$this->load->model('M_Belanja');
			$this->M_Belanja->input_data($data,'belanja');
			$this->session->set_flashdata('msg_tambah_belanja','
				<div class="register-reg alert alert-primary">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Menambahkan Kategori!
				</div>
				');
			redirect('Customer/keranjang');
	}
	public function keranjang()
	{
		$where = $this->session->userdata('ses_id_cus');
		$this->load->model('M_Belanja');
		$data['keranjang'] = $this->M_Belanja->view_data_keranjang($where);
		$this->load->view('Customer/Template/header.php');
		$this->load->view('Customer/keranjang.php',$data);
		$this->load->view('Customer/Template/footer.php');
	}
	public function cekout_aksi()
	{
		$nob = $this->input->POST('no_belanja');
		$tgl = $this->input->POST("tgl_cekout");
		$noref = $this->input->POST("no_refrensi");
		$total = $this->input->POST('total');
		$idp = $this->input->POST('id_produk');
		$idc = $this->input->POST('id_customer');
		$jmlh = $this->input->POST('jml_belanja');
		$sts = $this->input->POST('status');

		for ($i=0; $i <count($nob) ; $i++) { 

			$data = array(
				'no_refrensi' => $noref,
				'no_belanja' => $nob[$i],
				'id_produk' => $idp[$i],
				'tgl_cekout' => $tgl,
				'id_customer' => $idc[$i],
				'jml_belanja' => $jmlh[$i],
				'total' => $total[$i],
				'status' => $sts,
			);
			$this->load->model('M_CekOut');
			$this->M_CekOut->input_data($data,'cekout');

			$where = array('no_belanja'=>$nob[$i]);
			$this->load->model('M_Belanja');
			$this->M_Belanja->delete_data($where,'belanja');
		}
			$this->session->set_flashdata('msg_tambah_belanja','
				<div class="register-reg alert alert-primary">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Menambahkan Kategori!
				</div>
				');
			redirect('Customer/cekout');
	}
	public function cekout()
	{
		$where = $this->session->userdata('ses_id_cus');
		$this->load->model('M_CekOut');
		$data['cekout'] = $this->M_CekOut->view_data_cekout($where);
		$this->load->view('Customer/Template/header.php');
		$this->load->view('Customer/cekout.php',$data);
		$this->load->view('Customer/Template/footer.php');
	}
	public function bayar_add_aksi()
	{
		$nor = $this->input->POST('no_refrensi');
		$tgl = $this->input->POST("tgl_bayar");
		$total = $this->input->POST('total_byr');
		$status = $this->input->POST("status");

		$sts = $this->input->POST('status_cekout');

			$data = array(
				'tgl_bayar' => $tgl,
				'no_refrensi' => $nor,
				'total_bayar' => $total,
				'status_pembayaran' => $status,
			);

			$data_cekout = array(
				'status' => $sts,
			);

			$where = array( 'no_refrensi'=>$nor );
			$this->load->model('M_CekOut');
			$this->M_CekOut->input_data($data,'bayar');
			$this->M_CekOut->edit_data_cekout($where,$data_cekout,'cekout');
			$this->session->set_flashdata('msg_bayar_belanja','
				<div class="register-reg alert alert-primary">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Menambahkan Pembayaran!
				</div>
				');
			redirect('Customer/status_transaksi');
	}
	public function status_transaksi()
	{
		$where = $this->session->userdata('ses_id_cus');
		$this->load->model('M_CekOut');
		$data['bayar'] = $this->M_CekOut->view_data_status_belanja($where);
		$this->load->view('Customer/Template/header.php');
		$this->load->view('Customer/status_belanja.php',$data);
		$this->load->view('Customer/Template/footer.php');
	}
	public function cetak_kwitansi()
	{
		$where = $this->session->userdata('ses_id_cus');
		$this->load->model('M_CekOut');
		$data['bayar'] = $this->M_CekOut->view_data_status_belanja($where);
		$this->load->view('Customer/cetak_kwitansi.php',$data);
	}
}
?>