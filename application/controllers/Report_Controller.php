<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')){return redirect('auth_Controller/loginForm');}
		$this->load->model('Report_model','rm');
	}

	public function index()
	{
		$data['data'] = $this->rm->viewReport();
		$data['page'] = 'Report/view_allReport';
		$this->load->view('app',$data);
	}


	public function details($id)
	{
		$data['data'] = $this->rm->viewReportDetails($id);
		$data['rents'] = $this->rm->viewReportDetailsRent($id);
		$data['page'] = 'Report/view_details';
		$this->load->view('app',$data);
	}


}