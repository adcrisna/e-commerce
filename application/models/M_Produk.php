<?php
class M_Produk extends CI_Model{
	
	function tampil_data_produk(){
	  $this->db->select('*');
      $this->db->from('produk');
      $this->db->join('kategori','produk.id_kategori = kategori.id_kategori');   
      $query = $this->db->get();
      return $query;
	}

	function input_data($data, $table){
		$this->db->insert($table,$data);
	}

	function tampil_data($where, $table){
		$this->db->select('*');
      	$this->db->join('kategori','produk.id_kategori = kategori.id_kategori');   
		$query = $this->db->get_where($table,$where);
      	return $query;
	}
	function view_data($where, $table){
		return $this->db->get_where($table,$where);
	}
	function edit_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>