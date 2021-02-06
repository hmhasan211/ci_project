<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tenant_Model extends cI_model{


	public function selectData($table,$field,$con=FALSE,$row=false){
		$this->db->select($field);

		if($con)
			$this->db->where($con);

		$q = $this->db->get($table);

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
		$this->db->where($con);
		$this->db->update($table,$data);
		return $this->db->affected_rows();
	}

	public function deleteInfo($table,$con){
		$this->db->delete($table,$con);
		return $this->db->affected_rows();
	}



//reports 

	public function viewAllReport(){
		$this->db->select(['tbl_tenant.*','tbl_rent.month  as rentMonth','tbl_rent.rent  as totalRent','tbl_payment.pay as totalPayment','tbl_types.type','tbl_house.name ']);
		$this->db->from('tbl_tenant');
		$this->db->join('tbl_rent','tbl_rent.id = tbl_tenant.id');
		$this->db->join('tbl_payment','tbl_payment.id = tbl_tenant.id');
		$this->db->join('tbl_types','tbl_types.id = tbl_tenant.type');
		$this->db->join('tbl_house','tbl_house.name = tbl_rent.house_no');
		$q = $this->db->get();
		$rslts = $q->result();
		return $rslts;
	}
}
