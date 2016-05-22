<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index()
	{
		
		//$this->load->model('Admin_model','admin');
		$this->load->model('Product_model','product');
		$data['product'] = $this->product->getAllProduct();
		$this->load->view('BackEnd/BackEndProductAll', $data);
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

	public function viewProduct()
	{
		$this->checkLogin();
		$this->load->model('Admin_model','admin');
		$this->load->model('Product_model','product');
		$data = $this->admin->initializeTemplate();
		$data['product'] = $this->product->getAllProduct();
		$this->load->view('BackEnd/BackEndProductAll', $data);
	}

	
	public function viewProductbyCategory($id)
	{
		$this->checkLogin();
		$this->load->model('Admin_model','admin');
		$this->load->model('Product_model','product');
		//modified by FS 28 Okt
		$this->load->model('Category_model','category');
		$data = $this->admin->initializeTemplate();
		$data['product'] = $this->product->getProductbyCategory($id);
		$data["header"] = $this->category->getCategoryName($id);
		$data["categoryID"] = $id;
		$this->load->view('BackEnd/BackEndProductbyCategory', $data);
	}

	public function viewProductbyID($id)
	{
		$this->checkLogin();
		$this->load->model('Admin_model','admin');
		$this->load->model('Product_model','product');
		$data = $this->admin->initializeTemplate();
		$data['product'] = $this->product->getProductbyID($id);
		$this->load->view('BackEnd/BackEndProductDetail', $data);
	}

	public function deleteProduct($id){
		$this->checkLogin();
		$this->load->model('Product_model','product');
		$result = $this->product->deleteProductByID($id);


	}

	public function updateProduct($id)
	{
		$this->checkLogin();
		$this->load->model('Admin_model','admin');
		$this->load->model('Product_model','product');
		$this->load->model('Category_model','category');
		$data = $this->admin->initializeTemplate();
		$data['product'] = $this->product->getProductbyID($id);
		$data['parentCategory'] = $this->category->getParentCategory();
		$data['category'] = $this->category->getCategory();
		$data['detail'] = $this->category->getCategoryByID($data['product']->categoryID);

		$temp = new Temp();
		$temp = $this->product->getProductbyID($id);
		$temp->Photo;
		$photoName = explode(';', $temp->Photo);
		

		$data_insert = $this->input->post();
		if(!empty($data_insert)){


		if(empty($data_insert['chkfeatured']))
			$data_insert['chkfeatured'] = 0;
		else 
			$data_insert['chkfeatured'] = 1;

			$data_insert['txt_keyword'] = str_replace(' ', ';', $data_insert['txt_keyword']);		
		
			$data_insert['Image'] = "";
			for($i = 1; $i< 6 ; $i++){
				if(!empty($_FILES['ImageName'.$i]['name'])){
				$ProductID = "P".substr($data_insert['txt_productname'],0,2).date('Ymdhis').substr(microtime(), 2,3).$i;
				$upload = $this->uploadImage($ProductID,'assets/Products/','ImageName'.$i);
					$data_insert['Image'] = $data_insert['Image'].$upload['text'].';'; 
				}else if(!empty($photoName[$i-1])){
					$data_insert['Image'] = $data_insert['Image'].$photoName[$i-1].';';
				}

			}


			$this->product->UpdateProductByID($id,$data_insert);
			
		}
		$this->load->view('BackEnd/BackEndProductUpdate',$data);
	}


	public function addProduct()
	{
		$this->checkLogin();
		$this->load->model('Admin_model','admin');
		$this->load->model('Category_model','category');
		$this->load->model('Product_model','product');
		$data = $this->admin->initializeTemplate();			
		$data['parentCategory'] = $this->category->getParentCategoryP();
		$data['category'] = $this->category->getCategory();

		//modified by FS 28 okt
		$categoryID = $this->uri->segment(4);
		if(isset($categoryID))
			$data["currentCategory"] = $categoryID;
		
		$data_insert = $this->input->post();

		if(!empty($data_insert)){
			if(isset($data_insert['taste'])&&$data_insert['taste']!="")
			$data_insert['color'] = $data_insert['taste'];
			
			$data_insert['Image'] = "";
			for($i = 1; $i< 6 ; $i++){
				if(!empty($_FILES['ImageName'.$i]['name'])){
				$ProductID = "P".substr($data_insert['txt_productname'],0,2).date('Ymdhis').substr(microtime(), 2,3).$i;
				$upload = $this->uploadImage($ProductID,'assets/Products/','ImageName'.$i);
				$data_insert['Image'] = $data_insert['Image'].$upload['text'].';'; }

			}
			
			$data_insert['txt_keyword'] = str_replace(' ', ';', $data_insert['txt_keyword']);
			if(empty($data_insert['chkfeatured']))
				$data_insert['chkfeatured'] = 0;
			else 
				$data_insert['chkfeatured'] = 1;
			$this->product->AddProduct($data_insert,$ProductID);
		}
		$this->load->view('BackEnd/BackEndProductAdd',$data);
	}

	function uploadImage($ProductID,$path,$upload_text,$thumb = TRUE,$width = 400, $height = 400){
			
		$img =  str_replace(" ","-",$ProductID);
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = $img;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload($upload_text )){
			echo "Gagal Upload";
			exit();
		}else{
			$img_file = ($this->upload->data());
			$this->load->library('image_lib'); 
			//Thumbnail configs
			$config_t['source_image']   = $img_file["full_path"];
			if($thumb == FALSE)
				$config_t['new_image']  = $img_file["file_path"]; // ukuran asli folder biasaa
			else{
				//$config_t['new_image']  = $img_file["file_path"] . '/thumb'; // resize dan msukin folder thumb
				$config_t['new_image']  = $img_file["file_path"] . '/thumb';
				$config_t['width']   = $width;
				$config_t["height"] = $height;
			}

			$config_t['create_thumb'] = FALSE;///change this
			$config_t['maintain_ratio'] = TRUE;
			$this->load->library('image_lib', $config_t); 
			$this->image_lib->initialize($config_t);
			if(!$this->image_lib->resize()) {
				echo "Gagal Resize";				
			}
		}
		$data = array(
			'error' => '0',
			'text' => $img_file['file_name']
		);
		
		return $data;
	}
	public function detailProduct($id)
	{
		$this->checkLogin();
		$this->load->model('Admin_model','admin');
		$this->load->model('Product_model','product');
		$data = $this->admin->initializeTemplate();
		$data['product'] = $this->product->getProductbyCategory($id);
		$this->load->view('BackEnd/BackEndProductDetail', $data);
	}
}
