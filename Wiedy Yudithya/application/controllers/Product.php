<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}


	public function detail($id = false)
	{
		$data['content']='FrontEnd/detail_product';
		$data['title']='Product';
		$this->load->model('Product_model','product');
		$data['product'] = $this->product->getDetailProducts($id);
		$this->load->view('FrontEnd/master',$data);
	}

}
