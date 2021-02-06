<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model{

	public function insertInfo($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	//register admin check
	public function adminExist($data){
		$chkAdmin = $this->db->WHERE($data)->get('tbl_users');
		if ($chkAdmin->num_rows() > 0){
			return $chkAdmin->row();
		}
	}
}