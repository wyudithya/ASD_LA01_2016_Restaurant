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
	function __construct()
	{
		parent::__construct();
	}

	public function cart($ProductID,$discount,$qty,$price,$name,$color){
		$name = str_replace("-"," ",$name);
		$name = str_replace("%20"," ",$name);

		$data = array(
               'id'      => $ProductID,
               'qty'     => $qty,
               'price'   => $price-($price*$discount/100),
               'name'    => $name,
               'discount' => $discount,
               'color'	=> $color
             );
		$this->cart->insert($data);
/*
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

		endforeach; */
		
		redirect('Cart');

	}
	public function index()
	{
		$data['content']='FrontEnd/home';
		$data['title']='Home';
		
		// //data for body
		// $this->load->model('Product_model','product');
		// $this->load->model('Banner_model','banner');
		// $data['newproducts'] = $this->product->getNewProducts(12,0);
		// $data['featuredproducts'] = $this->product->getFeaturedProducts(12,0);
		// $data['hotitems'] = $this->product->getHotItems();
		// $data['discounted'] = $this->product->getDiscountedProducts(12,0);
		// $data['popular'] = $this->product->getPopularProducts(12,0);
		// $data['banner'] = $this->banner->getAllBanner();
		
		//data for header
		// $this->load->model('Category_model','category');
		// $data['category'] = $this->category->loadCategories();
		$this->load->view('FrontEnd/master',$data);
		//$this->load->view('FrontEnd/test');
	}

	public function search()
	{
		$order = '';
		$desc= '';
		if(isset($_GET['sort']))
		{
			$s = $_GET['sort'];
			$ss = explode(' ', $s);
			$order = $ss[0];
			$desc = $ss[1];
		}
		$q = $_GET["q"];
		$keywords = explode(' ',$q);
		//created by FS 9 Des
		$this->load->model('Category_model','category');
		$title = "Search Result for '".$q."'";

		$data['content']='FrontEnd/product';
		$data['title']='Vape - Search Result';

		//data for body
		$this->load->model("Util","util");
		$data['header'] = $title;
		$data['product'] = $this->util->search($q,$order,$desc);
		$data['q'] = $q;
		if(isset($s))
			$data['sortBy'] = $s;
		
		//data for header
		$data['category'] = $this->category->loadCategories();
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

