<?php
class M_Customer extends CI_Model{
	
	function tampil_data_customer(){
		return $this->db->get('customer');
	}

	function input_data($data, $table){
		$this->db->insert($table,$data);
	}
	function tampil_data_c($where, $table){
		return $this->db->get_where($table,$where);
	}
	function edit_data_c($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>