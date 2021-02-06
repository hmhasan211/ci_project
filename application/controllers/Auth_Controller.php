<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends CI_Controller{

	Public function __construct(){
		parent::__construct();
		$this->load->model('Auth_Model','am');
	}

	Public function registerForm(){
		$this->load->helper('form');

		$this->load->view('register');
	}

	Public function adminSignUp(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('f_name','First Nama','Required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('l_name','Last Name','Required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('username','Username','Required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run() == false) {
			$this->registerForm();
		} else {
			$data['f_name'] = $this->input->post('f_name');
			$data['l_name'] = $this->input->post('l_name');
			$data['username'] = $this->input->post('username');
			$data['email'] = $this->input->post('email');
			$data['password'] = sha1($this->input->post('password'));
			
			if ($this->am->insertInfo('tbl_users',$data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success"> Register saved successfully!! </div>');
				$this->loginform();
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Sorry failed  saved register!! </div>');
				$this->registerForm();
			}
			$this->load->view('register');
	}
	}

	Public function loginform(){
		$this->load->helper('form');
		if($this->session->userdata('user_id')){
			$data['page'] = 'dashboard';
		$this->load->view('app', $data);
	}
		$this->load->view('login');
	}


	Public function adminLogin(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run() == false) {
			$this->loginform();
		} else {
			$data['email'] = $this->input->post('email');
			$data['password'] = sha1($this->input->post('password'));
			$chkAdmin = $this->am->adminExist($data);
			if ($chkAdmin){
				$sessionData['user_id'] = $chkAdmin->user_id;
				$sessionData['username'] = $chkAdmin->username;
				$sessionData['email'] = $chkAdmin->email;
				$this->session->set_userdata($sessionData);
				return redirect('dashboard');
				}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Sorry!! failed to login. </div>');
					$this->loginform();
			}
		}
	}


	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect('Auth_Controller/loginform');
	}
}