<?php
class M_CekOut extends CI_Model{
	
	function input_data($data, $table){
		$this->db->insert($table,$data);
	}
	function input_data_bayar($data, $table){
		$this->db->insert($table,$data);
	}
	function view_data_cekout($where){
		$this->db->select('*');
		$this->db->from('cekout');
      	$this->db->join('produk','cekout.id_produk = produk.id_produk');
      	$this->db->join('customer','customer.id_customer = cekout.id_customer');
      	$this->db->where('cekout.status = "Belum Dibayar " AND cekout.id_customer = '.$where);
		$query = $this->db->get();
      	return $query->result();
	}
	function view_data_status_belanja($where){
		$this->db->select('*');
		$this->db->from('cekout');
      	$this->db->join('produk','cekout.id_produk = produk.id_produk');
      	$this->db->join('customer','customer.id_customer = cekout.id_customer');
      	$this->db->join('bayar','bayar.no_refrensi = cekout.no_refrensi');
      	$this->db->where('cekout.status = "Sudah Dibayar " AND cekout.id_customer = '.$where);
		$query = $this->db->get();
      	return $query->result();
	}
	function edit_data_cekout($where,$data_cekout,$table){
		$this->db->where($where);
		$this->db->update($table,$data_cekout);
	}
}
?>