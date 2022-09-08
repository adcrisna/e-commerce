<?php
class M_Kategori extends CI_Model{
	
	function tampil_data_kategori(){
		return $this->db->get('kategori');
	}

	function input_data($data, $table){
		$this->db->insert($table,$data);
	}
	function tampil_data_k($where, $table){
		return $this->db->get_where($table,$where);
	}
	function edit_data_k($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>