<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	
	public function index()
	{
		$this->load->model('M_Kategori');
		$data['kategori'] = $this->M_Kategori->tampil_data_kategori()->result();
		$this->load->model('M_Produk');
		$data['produk'] = $this->M_Produk->tampil_data_produk()->result();
		$this->load->view('Frontend/Template/header.php');
		$this->load->view('Frontend/index.php',$data);
		$this->load->view('Frontend/Template/footer.php');
	}

	public function login()
	{
		$this->load->view('Frontend/Template/header.php');
		$this->load->view('Frontend/login.php');
		$this->load->view('Frontend/Template/footer.php');
	}
	public function register()
	{
		$this->load->view('Frontend/Template/header.php');
		$this->load->view('Frontend/register.php');
		$this->load->view('Frontend/Template/footer.php');
	}

	public function proses_register()
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

		$this->session->set_flashdata('msg_register','
				<div class="register-reg alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Berhasil Membuat Account!
				</div>
				');
			redirect('Frontend/Login');
	}

}
?>