<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')){return redirect('auth_Controller/loginForm');}
		$this->load->model('Payment_model','pm');
		$this->load->model('Rent_model','rm');
	}

//view
	public function index()
	{
		$data['rslts'] = $this->pm->viewRent();
		$data['page'] = 'Payment/view_payment';
		$this->load->view('app',$data);
	}




	public function updst($id,$status){
		$data['status'] = $status;
		$con['id'] = $id;
		if($this->rm->updateInfo('tbl_rent',$data,$con))
		$this->session->set_flashdata('msg', '<div class="alert alert-success"> Contgratulation!!! </div>');
			else
		$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Sorry!! Not paid yet!! </div>');
		$this->index();

	}

}

