<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_Login');
	}
	
	function proseslogin(){
		$username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

		$cek_admin = $this->M_Login->auth_admin($username,$password);
		$cek_customer = $this->M_Login->auth_customer($username,$password);

		if ($cek_admin->num_rows()>0) {
			$data = $cek_admin->row_array();
			$this->session->set_userdata('masuk',TRUE);
			if ($data['status']=='Aktif') {
				$this->session->set_userdata('akses','Aktif');
				$this->session->set_userdata('ses_id',$data['username']);
				$this->session->set_userdata('ses_nama',$data['nama_admin']);
				redirect('Backend');
			}
		}
		else if ($cek_customer->num_rows()>0) {
			$data = $cek_customer->row_array();
			$this->session->set_userdata('masuk',TRUE);
			
				$this->session->set_userdata('akses','Aktif');
				$this->session->set_userdata('ses_id',$data['username']);
				$this->session->set_userdata('ses_nama',$data['nama_customer']);
				$this->session->set_userdata('ses_id_cus',$data['id_customer']);
				redirect('Customer');

		}else
		{
			echo $this->session->set_flashdata('msg','
				<div class="register-reg alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
					</button> Username atau Password Salah
				</div>
				');
			redirect('Frontend/Login');
		}
	}
	function logout(){
		$this->session->sess_destroy();
		$url=base_url('');
		redirect($url);
	}
}
?>