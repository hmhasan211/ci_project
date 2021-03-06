<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment_model extends cI_model{


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


	public function viewRent(){
		$this->db->select(['tbl_rent.*','tbl_tenant.name','tbl_types.type','tbl_rent.id','tbl_house.name as room']);
		$this->db->from('tbl_rent');
		$this->db->join('tbl_tenant','tbl_tenant.id = tbl_rent.t_id');
		$this->db->join('tbl_house','tbl_house.id = tbl_rent.house_no');
		$this->db->join('tbl_types','tbl_types.id = tbl_rent.type');
		$q = $this->db->get();
		$rslts = $q->result();
		return $rslts;
	}

	
}
