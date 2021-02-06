<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		 if (!$this->session->userdata('user_id')){return redirect('auth_Controller/loginForm');}
		$this->load->model('Tenant_Model','tm');
	}

	public function index()
	{
		$data['page'] = 'dashboard';
		$this->load->view('app', $data);
	}

	public function selectAll()
	{
		$data['page'] = 'Tenant/view_tenant';
		$data['data'] = $this->tm->selectData('tbl_tenant', '*');
		$this->load->view('app', $data);
	}

	public function addTenant()

	{
		$this->load->helper('form');
		$data['page'] = 'Tenant/add_tenant';
		$this->load->view('app', $data);
	}

	public function saveTenant()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'Required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('p_address', 'Parmenant Address', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('contact', 'Contact ', 'required');
		$this->form_validation->set_rules('nid', 'NID', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('rent', 'Rent', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == false) {
			$this->addTenant();
		} else {
			$data['name'] = $this->input->post('name');
			$data['p_address'] = $this->input->post('p_address');
			$data['gender'] = $this->input->post('gender');
			$data['contact'] = $this->input->post('contact');
			$data['nid'] = $this->input->post('nid');
			$data['amount'] = $this->input->post('amount');
			$data['rent'] = $this->input->post('rent');
			$data['status'] = $this->input->post('status');
			if ($this->tm->insertInfo('tbl_tenant', $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success"> Info saved successfully!! </div>');
				$this->selectAll();
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Info saved successfully!! </div>');
				redirect('view_tenant');
			}
		}

	}


	public function editInfo($id){
		$this->load->helper('form');
		$con['id']= $id;
		$data['data']=$this->tm->selectData('tbl_tenant','*',$con,true);
		$data['page']='Tenant/edit_tenant';
		$this->load->view('app',$data);
	}

	public function updateInfo(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'Required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('p_address', 'Parmenant Address', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('contact', 'Contact ', 'required');
		$this->form_validation->set_rules('nid', 'NID', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('rent', 'Rent', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == false) {
			$this->addTenant();
		} else {
			$data['name'] = $this->input->post('name');
			$data['p_address'] = $this->input->post('p_address');
			$data['gender'] = $this->input->post('gender');
			$data['contact'] = $this->input->post('contact');
			$data['nid'] = $this->input->post('nid');
			$data['amount'] = $this->input->post('amount');
			$data['rent'] = $this->input->post('rent');
			$con['id'] = $this->input->post('id');
			if ($this->tm->updateInfo('tbl_tenant', $data,$con)) {

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
		if($this->tm->deleteInfo('tbl_tenant',$con))
		$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Data has been deleted!! </div>');
			else
		$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Failed to delete data!! </div>');
		$this->selectAll();
		
	}


}

