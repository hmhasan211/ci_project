<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class House_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		 if (!$this->session->userdata('user_id')){return redirect('auth_Controller/loginForm');}
		$this->load->model('House_Model','hm');
	}


	public function selectAll()
	{
		$data['page'] = 'House/view_house';
		$data['data'] = $this->hm->selectData('tbl_house', '*');
		$this->load->view('app', $data);
	}

	public function addHouse()
	{
		$this->load->helper('form');
		$data['page'] = 'House/add_house';
		$this->load->view('app', $data);
	}

	public function saveHouse()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'House', 'Required|min_length[3]|max_length[50]');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == false) {
			$this->addHouse();
		} else {
			$data['name'] = $this->input->post('name');
			if ($this->hm->insertInfo('tbl_house', $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success"> House saved successfully!! </div>');
				$this->selectAll();
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"> House not saved !! </div>');
				redirect('view_house');
			}
		}

	}

	public function editInfo($id){
		$this->load->helper('form');
		$con['id']= $id;
		$data['data']=$this->hm->selectData('tbl_house','*',$con,true); 
		$data['page']='House/edit_house';
		$this->load->view('app',$data);
	}
	
		

	public function updateInfo(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'Required|min_length[3]|max_length[50]');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == false) {
			$this->addTenant();
		} else {
			$data['name'] = $this->input->post('name');
			$con['id']=$this->input->post('id');
			if ($this->hm->updateInfo('tbl_tenant',$data,$con)) {

				$this->session->set_flashdata('msg', '<div class="alert alert-success"> Info Updated successfully!! </div>');
				$this->selectAll();
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Info not saved !! </div>');
				redirect('Tenant/view_tenant');
			}
		}

	}

	public function deleteInfo($id){
		$con['id'] = $id;
		if($this->hm->deleteInfo('tbl_house',$con))
		$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Data has been deleted!! </div>');
			else
		$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Failed to delete data!! </div>');
		$this->selectAll();
		
	}

// 	public function ViewInfo($id){
// 		$data['page'] = 'Tenant/view_info';
// 		$data['data'] = $this->hm->selectData('tbl_tenant', '*');
// 		$this->load->view('app', $data);
// 	}

}

