<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rent_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')){return redirect('auth_Controller/loginForm');}
		$this->load->model('Rent_model','rm');
	}

	public function index()
	{
		$data['rslts'] = $this->rm->viewRent();
		$data['page'] = 'Rent/view_rent';
		$this->load->view('app',$data);
	}


	public function addRent()
	{
		$this->load->helper('form');
		$con = ['id','name'];
		$data['tenantNames'] = $this->rm->selectData('tbl_tenant',$con);
		$data['types'] = $this->rm->selectData('tbl_types','*');
		$data['houses'] = $this->rm->selectData('tbl_house',$con);
		$data['page'] = 'Rent/add_rent';
		$this->load->view('app', $data);
	}

	public function saveRent()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('t_id', 'Tenant Id', 'Required');
		$this->form_validation->set_rules('house_no', 'House No', 'Required');
		$this->form_validation->set_rules('type', 'Type ', 'required');
		$this->form_validation->set_rules('month', 'Month', 'required');
		$this->form_validation->set_rules('year', 'Year ', 'required');
		$this->form_validation->set_rules('rent', 'Rent', 'required');
		$this->form_validation->set_rules('elc_bill', 'Electric_bill', 'required');
		$this->form_validation->set_rules('gass_bill', 'Gas_bill', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == false) {
			$this->addrent();
		} else {
			$data['t_id'] = $this->input->post('t_id');
			$data['house_no'] = $this->input->post('house_no');
			$data['type'] = $this->input->post('type');
			$data['month'] = $this->input->post('month');
			$data['year'] = $this->input->post('year');
			$data['rent'] = $this->input->post('rent');
			$data['elc_bill'] = $this->input->post('elc_bill');
			$data['gass_bill'] = $this->input->post('gass_bill');
			$data['status'] = $this->input->post('status');

			if ($this->rm->insertInfo('tbl_rent', $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Rent Info saved successfully!! </div>');
				$this->index();
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Sorry fail to save info!</div>');
				$this->addRent();
			}
		}

	}

	public function editRentInfo($id){
		$this->load->helper('form');

		$field=['id','name'];
		$data['tenantNames'] = $this->rm->selectData('tbl_tenant',$field);
		$data['houses'] = $this->rm->selectData('tbl_house',$field);
		$data['types'] = $this->rm->selectData('tbl_types','*');
		$con['id'] = $id;
		$data['data']=$this->rm->selectData('tbl_rent','*',$con,true);
		$data['page']='Rent/edit_rent';
		$this->load->view('app',$data);
	}

	public function updateRentInfo(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('t_id', 'Tenant Id', 'Required');
		$this->form_validation->set_rules('house_no', 'House No', 'Required');
		$this->form_validation->set_rules('type', 'Type ', 'required');
		$this->form_validation->set_rules('month', 'Month', 'required');
		$this->form_validation->set_rules('year', 'Year ', 'required');
		$this->form_validation->set_rules('rent', 'Rent', 'required');
		$this->form_validation->set_rules('elc_bill', 'Electric_bill', 'required');
		$this->form_validation->set_rules('gass_bill', 'Gass_', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == false) {
			$this->addrent();
		} else {
			$data['t_id'] = $this->input->post('t_id');
			$data['house_no'] = $this->input->post('house_no');
			$data['type'] = $this->input->post('type');
			$data['month'] = $this->input->post('month');
			$data['year'] = $this->input->post('year');
			$data['rent'] = $this->input->post('rent');
			$data['elc_bill'] = $this->input->post('elc_bill');
			$data['gass_bill'] = $this->input->post('gass_bill');
			$data['status'] = $this->input->post('status');
			$con['id']=$this->input->post('id');
			if ($this->rm->updateInfo('tbl_rent',$data,$con)) {

				$this->session->set_flashdata('msg', '<div class="alert alert-success"> Info Updated successfully!! </div>');
				$this->index();
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Info not saved !! </div>');
				$this->editRentInfo();
			}
		}

	}

	public function deleteRentInfo($id){
		$con['id'] = $id;
		if($this->rm->deleteInfo('tbl_rent',$con))
		$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Data has been deleted!! </div>');
			else
		$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Failed to delete data!! </div>');
		$this->index();

	}
}

