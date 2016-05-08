<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//test test
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$error['err'] = '';
		$this->load->view('BackEnd/BackEndHome_Login',$error);
	}

	public function checkLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('Login_model','login');

		$query = $this->login->login($username,$password);
		
		if($query == false){
			$error['err'] = 'Invalid username or password';
			$this->load->view('BackEnd/BackEndHome_Login',$error);
		}
		else if($this->session->userdata('username') != null && $this->session->userdata('username') !="" && $this->session->userdata('UserType')!="Customer")
		{
			redirect('BackEnd/Home');
		}
		else{
			$data = array (
					'username' => $query->row(0)->Username,
					'userType' => $query->row(0)->UserType,
					'userTypeID' => $query->row(0)->UserTypeID,
					'userID' => $query->row(0)->UserID
				);
			$this->session->set_userdata($data);
			redirect('BackEnd/Home');
		}
		//print_r($this->session->userdata);
	}

	public function logout(){
		$this->session->unset_userdata('username');
		redirect('/Admin');
	}
}
