<?php
class M_Belanja extends CI_Model{
	
	function tampil_data_belanja(){
		return $this->db->get('belanja');
	}

	function input_data($data, $table){
		$this->db->insert($table,$data);
	}
	function view_data_keranjang($where){
		$this->db->select('*');
		$this->db->from('belanja');
      	$this->db->join('produk','belanja.id_produk = produk.id_produk');
      	$this->db->join('customer','customer.id_customer = belanja.id_customer');
      	$this->db->where('belanja.id_customer = '.$where);
		$query = $this->db->get();
      	return $query->result();
	}
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>