<?php
class M_Bayar extends CI_Model{
	
	function tampil_data_pembayaran(){
		return $this->db->get('bayar');
	}

	function tampil_data_detail($no_refrensi){
		$this->db->select('*');
		$this->db->from('cekout');
      	$this->db->join('produk','cekout.id_produk = produk.id_produk');
      	$this->db->join('customer','customer.id_customer = cekout.id_customer');
      	$this->db->join('bayar','bayar.no_refrensi = cekout.no_refrensi');
      	$this->db->where('cekout.no_refrensi = '.$no_refrensi);
		$query = $this->db->get();
      	return $query->result();
	}
	function update_data_bayar($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
?>