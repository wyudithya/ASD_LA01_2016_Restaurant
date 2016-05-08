<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->checkLogin();
		$this->load->model('Admin_model','admin');
		$this->load->model('Dashboard_model','dashboard');
		$data = $this->admin->initializeTemplate();
		$data["topProduct"] = $this->dashboard->getMostSoldProduct();
		$data["topUser"] = $this->dashboard->getTopUser();
		$data["sales"] = $this->dashboard->getWeeklySales(10);
		//die(json_encode($data["sales"]));
		//die();
		$this->load->view('BackEnd/BackEndHome_Index',$data);
	}

	private function checkLogin()
	{
		if($this->session->userdata('username')!=null&&$this->session->userdata('username')!="")
		{
			if($this->session->userdata('userType')=="Customer")
			{
				redirect(base_url()."Home");
			}
		}
		else
		{
			redirect(base_url()."BackEnd/Login");
		}
	}
}
