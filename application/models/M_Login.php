<?php
class M_Login extends CI_Model{
	function auth_admin($username, $password){
		$query = $this->db->query("select * from admin where username='$username' AND password='$password' limit 1");
		return $query;
	}
	function auth_customer($username, $password){
		$query = $this->db->query("select * from customer where username='$username' AND password='$password' limit 1");
		return $query;
	}
}
?>