<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class House_Model extends cI_model{


	public function selectData($table,$field,$con=false,$row=false){
		$this->db->select($field);
		$q = $this->db->get($table);
		if($con)
			$this->db->where($con);

		if($row)
			$r = $q->row();
		else
			$r = $q->result();
			return $r;
	}

	public function insertInfo($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	public function updateInfo($table,$data,$con){
		$this->db->update($table,$data);
		$this->db->where($con);
		return $this->db->affected_rows();
	}

	public function deleteInfo($table,$con){
		$this->db->delete($table,$con);
		return $this->db->affected_rows();
	}
}
