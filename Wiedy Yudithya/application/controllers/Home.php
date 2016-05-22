<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function cart(){

		$id = $this->uri->segment(3);
  		$qty =  $this->uri->segment(4);
  		$price = $this->uri->segment(5);
  		$desc = $this->uri->segment(6);
  		$photo = $this->uri->segment(7);
		$data = array(
               'id'      => "1",
               'qty'     => 5,
               'price'   => 2,
               'name'    => "Meat Lover",
               'desc' => "Dirisi dengan hati",
               'photo' => "assets/themes/images/products/a.png"
             );
		$this->cart->insert($data);

		$i = 1; 
		foreach ($this->cart->contents() as $items):
			echo $i.'-----'.'[rowid]'.'---'.$items['rowid'];
			echo "<br>"; 
		echo $items['qty']; 
		echo "<br>"; 
		echo $items['name']; 
		echo "<br>"; 
		if ($this->cart->has_options($items['rowid']) == TRUE): 
			foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): 

				echo $option_name;
			echo "<br>"; 
				echo $option_value;

			endforeach;


		endif;

	  
		 echo $this->cart->format_number($items['price']);
		 echo "<br>"; 
		 echo $this->cart->format_number($items['subtotal']); 
		 echo "<br>"; echo "<br>"; 
		 echo $this->cart->total();
		 echo "<br>"; echo "<br>";


		$i++;

		endforeach;
		die();
		redirect('Cart');

	}

	public function addtoCart(){
	  	$id = $this->input->post("id");
	  	$name =  $this->input->post("name");
  		$qty =  $this->input->post("qty");
  		$price = $this->input->post("price");
  		$desc = $this->input->post("desc");
  		$photo = $this->input->post("photo");
		$data = array(
               'id'      => $id,
               'qty'     => $qty,
               'price'   => $price,
               'name'    => $desc,
               'desc' => $name,
               'photo' => $photo
             );
	  $this->cart->insert($data);
	  redirect('Cart');
	}
	public function index()
	{
		$data['content']='FrontEnd/home';
		$data['title']='Home';

		$this->load->model('Product_model','product');
		$data['food'] = $this->product->getProduct(1);
		$data['drink'] = $this->product->getProduct(2);

		$this->load->view('FrontEnd/master',$data);
	}
	
	public function detail_product($id=false)
	{
		if($id==false){

		}else{
			$data['content']='FrontEnd/detail_product';
			$data['title']='Detail Product';
			
			//data for header
			$this->load->model('Category_model','category');
			$data['category'] = $this->category->loadCategories();
			
			//data for content
			$this->load->model('Product_model','product');
			$data['detailProduct'] = $this->product->getDetailProducts($id);
			//$data['hotitems'] = $this->product->getHotItems();
			//$data['relatedproducts'] = $this->product->relatedproducts($id,$data['detailProduct']['CategoryID']);
			$this->load->view('FrontEnd/master',$data);
		}
	}
}

