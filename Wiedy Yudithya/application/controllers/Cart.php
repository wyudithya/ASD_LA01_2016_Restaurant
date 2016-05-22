<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$data['content']='FrontEnd/cart';
		$data['title']='Cart';

		$this->load->view('FrontEnd/master',$data);
	}

	public function remove($rowid){

		$data = array(
               'rowid' => $rowid,
               'qty'   => 0
            );
		$this->cart->update($data); 
		redirect('Cart');
	}

	public function increase($rowid, $qty){
		$qty = $qty + 1;
		$data = array(
               'rowid' => $rowid,
               'qty'   => $qty 
            );
		
		$this->cart->update($data); 
		redirect('Cart');
	}

	public function decrease($rowid, $qty){
		$qty = $qty - 1;
		$data = array(
               'rowid' => $rowid,
               'qty'   => $qty 
            );
		
		$this->cart->update($data); 
		redirect('Cart');
	}
}
