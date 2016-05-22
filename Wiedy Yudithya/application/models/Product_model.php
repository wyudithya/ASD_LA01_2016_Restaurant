<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	function __construct() 
	{
		parent::__construct();
	}

	function getAllProduct()
	{
		$result = array();
		//modified by FS 1 Des
		$queryString = "SELECT ProductID,ProductName, ProductDecription, ProductPrice from msproduct";
		$query = $this->db->query($queryString);
		
		for($i=0;$i<$query->num_rows();$i++)
		{ 
			$temp = new stdClass();
			$temp->ProductID = $query->row($i)->ProductID;
			$temp->ProductName = $query->row($i)->ProductName;
			$temp->Price = $query->row($i)->ProductPrice;
			$temp->Desc = $query->row($i)->ProductDecription;
			
			array_push($result, $temp);			
		}
		return $result;
	}
	function getProductbyCategory($id)
	{
		$result = array();
		//modified by FS 1 Des
		$queryString = "SELECT ProductID,ProductName,ProductDesc, Price ,CategoryName, Color, TransactionCount, Discount FROM msproduct JOIN mscategory ON msproduct.CategoryID = mscategory.CategoryID WHERE msproduct.AuditedActivity <> 'D' and msproduct.CategoryID = ?";
		$query = $this->db->query($queryString,array($id));
		
		for($i=0;$i<$query->num_rows();$i++)
		{ 
				
			$temp = new Temp();
			$temp->ProductID = $query->row($i)->ProductID;
			$temp->ProductName = $query->row($i)->ProductName;
			$temp->Price = $query->row($i)->Price;
			$temp->CategoryName = $query->row($i)->CategoryName;
			$temp->TransactionCount = $query->row($i)->TransactionCount;
			$temp->Discount = $query->row($i)->Discount;
			//modified by FS 1 Des
			$temp->color = $query->row($i)->Color;
			$arr = explode(" ", $query->row($i)->ProductDesc);
			$ProductDesc = "";
			$charCount = 0;
			
			if(strlen($query->row($i)->ProductDesc) > 300)
			{	
				$arr = "";
				$arr = explode(" ", $query->row($i)->ProductDesc);
				$ProductDesc = "";
				
				for($j = 0 ; $j < 15 ; $j++)
				{
					$ProductDesc = $ProductDesc . " ". $arr[$j];
					$charCount += strlen($arr[$i]);
					if($charCount>300)
						break;
				}
				$temp->ProductDesc = $ProductDesc . "...";
			}else
			{
				$temp->ProductDesc = $query->row($i)->ProductDesc;
			}
			array_push($result, $temp);
		}
		return $result;
	}

	function deleteProductByID($id){
			$queryString = "UPDATE msproduct  SET AuditedActivity = 'D', AuditedUser = ?, AuditedTime = CURRENT_TIMESTAMP where ProductID = ? ";
			$query = $this->db->query($queryString,array($this->session->userdata('userID'),$id));
			redirect('BackEnd/Products');
						
	}

	function UpdateProductByID($id,$data)
	{
		if($data['ddlSubCategory']!=0)
			$categoryID = $data['ddlSubCategory'];
		else
			$categoryID = $data['ddlcategory'];
		$queryString = "UPDATE msproduct  SET AuditedActivity = 'U', ProductName = ?, 
		ProductDesc = ?  , Price = ? , Discount = ? , Keyword = ?, AuditedUser = ?,
		 AuditedTime = CURRENT_TIMESTAMP, Photo = ? ,IsFeatured = ?, ShortDescription = ?,CategoryID = ?, Color = ? WHERE ProductID = ? ";
		$query = $this->db->query($queryString,array($data['txt_productname'],$data['txt_productdesc'],$data['txt_price'],$data['txt_discount'],
			$data['txt_keyword'],$this->session->userdata('userID'),$data['Image'],$data['chkfeatured'],$data['shortDescription'],$categoryID, $data['color'],$id));
		redirect('BackEnd/Products/viewProduct');
	}
	function AddProduct($data,$ProductID)
	{
		if($data['ddlSubCategory']!=0)
			$categoryID = $data['ddlSubCategory'];
		else
			$categoryID = $data['ddlcategory'];
		$queryString = "INSERT INTO msproduct(ProductID,AuditedActivity,AuditedTime,AuditedUser,ProductName,ProductDesc,Price,Discount,Keyword,CategoryID,TransactionCount,IsFeatured,Photo,ShortDescription,Color) Values(?,'I',CURRENT_TIMESTAMP,?,?,?,?,?,?,?,'0',?,?,?,?)";
		$query = $this->db->query($queryString,array($ProductID,$this->session->userdata('userID'),$data['txt_productname'],$data['txt_productdesc'],$data['txt_price'],$data['txt_discount'],$data['txt_keyword'],$categoryID,$data['chkfeatured'],$data['Image'],$data["shortDescription"],$data['color']));
		redirect('BackEnd/Products/viewProduct');
	}
	function getProductbyID($id)
	{
		$temp = new Temp();
		//modified by FS 1 Des
		$queryString = "SELECT ProductID,ProductName,ProductDesc, IsFeatured, Color, Price ,CategoryName, msproduct.CategoryID, TransactionCount, Discount, Photo,
		Keyword, ShortDescription FROM msproduct JOIN mscategory ON msproduct.CategoryID = mscategory.CategoryID WHERE msproduct.AuditedActivity <> 'D' and msproduct.ProductID = ?";
		$query = $this->db->query($queryString,array($id));
				
		$i = 0;
		$temp->ProductID = $query->row($i)->ProductID;
		$temp->ProductName = $query->row($i)->ProductName;
		$temp->Price = $query->row($i)->Price;
		$temp->CategoryName = $query->row($i)->CategoryName;
		//modified by FS 8 Jan
		$temp->categoryID = $query->row($i)->CategoryID;
		$temp->isFeatured = $query->row($i)->IsFeatured;
		//modified by FS 1 Des
		$temp->color = $query->row($i)->Color;
		$temp->shortDescription = $query->row($i)->ShortDescription;
		$temp->Photo = $query->row($i)->Photo;
		$temp->TransactionCount = $query->row($i)->TransactionCount;
		$temp->Discount = $query->row($i)->Discount;
		$temp->ProductDesc = $query->row($i)->ProductDesc;
		$temp->Keyword = $query->row($i)->Keyword;
		//modified by FS 1 Des
		$temp->otherColor = array();

		$queryString = "SELECT ProductID, Color, Photo FROM msproduct WHERE AuditedActivity<>'D' AND ProductID<>? AND ProductName = ?";
		$query = $this->db->query($queryString, array($temp->ProductID, $temp->ProductName));
		for($i=0;$i<$query->num_rows();$i++)
		{
			$color = new Temp();
			$color->productID = $query->row($i)->ProductID;
			$color->color = $query->row($i)->Color;
			$color->photo = $query->row($i)->Photo;
			array_push($temp->otherColor, $color);
		}
		
		return $temp;
	}
	function getProduct($jenis){
		//modified by FS 9 Des
		$queryString= "SELECT ProductID, ProductName, ProductPrice, ProductDecription, ProductPhoto from msproduct WHERE ProductCategory = ? LIMIT 4";
		$query = $this->db->query($queryString,array($jenis));
		$i=0;
		if($query->num_rows() === 0){
			return false;
		}else{
           foreach ($query->result() as $Row)
           {
               $Data[$i]['ProductID'] = $Row->ProductID;
               $Data[$i]['ProductName'] = $Row->ProductName;
               $Data[$i]['ProductPrice'] = $Row->ProductPrice; 
			   $Data[$i]['ProductPhoto']= $Row->ProductPhoto;
			   $Data[$i]['ProductDescription']= $Row->ProductDecription;
               $i++;
           }
			return $Data;
		}
	}

	function getFeaturedProducts($limit, $offset){
		//modified by FS 9 Des
		$queryString= "SELECT ProductID, ProductName, Price, Photo,Discount from msproduct WHERE AuditedActivity <> 'D' AND IsFeatured = 1 ORDER BY TransactionCount DESC LIMIT ? OFFSET ?";
		$query = $this->db->query($queryString, array($limit, $offset));
		$i=0;
		if($query->num_rows() === 0){
			return false;
		}else{
           foreach ($query->result() as $Row)
           {
               $Data[$i]['ProductID'] = $Row->ProductID;
               $Data[$i]['ProductName'] = $Row->ProductName;
               $Data[$i]['Price'] = $Row->Price; 
               $arr = explode(";", $Row->Photo);
			   $Data[$i]['Thumbnail']= $arr[0];       
               $Data[$i]['Discount'] = $Row->Discount;
               $i++;
           }
			return $Data;
		}
	}

	function getHotItems(){
		$queryString= "SELECT ProductID, ProductName, Price, Photo,Discount from msproduct WHERE AuditedActivity <> 'D' ORDER BY TransactionCount LIMIT 4";
		$query = $this->db->query($queryString);
		$i=0;
		if($query->num_rows() === 0){
			return false;
		}else{
           foreach ($query->result() as $Row)
           {
               $Data[$i]['ProductID'] = $Row->ProductID;
               $Data[$i]['ProductName'] = $Row->ProductName;
               $Data[$i]['Price'] = $Row->Price; 
               $arr = explode(";", $Row->Photo);
			   $Data[$i]['Thumbnail']= $arr[0];       
               $Data[$i]['Discount'] = $Row->Discount;
               $i++;
           }
			return $Data;
		}
	}

	function getDetailProducts($id){
		$queryString= "SELECT b.ProductID, b.ProductName, b.ProductDecription, b.ProductPhoto, c.ingredientName FROM msproduct b LEFT Join msrecipe a on a.ProductID = b.ProductID JOIN msingredient c on a.ingredientid = c.id WHERE a.ProductID='".$id."'";
		$query = $this->db->query($queryString);
		if($query->num_rows() === 0){
			return false;
		}else{
		  $Data['ingredientName'] = "";
           foreach ($query->result() as $Row)
           {
               $Data['ProductID'] = $Row->ProductID;
               $Data['ProductName'] = $Row->ProductName;
               $Data['ProductDecription'] = $Row->ProductDecription;
               $Data['ProductPhoto'] = $Row->ProductPhoto;
               if($Data['ingredientName']=="")
               	$Data['ingredientName'] = $Row->ingredientName;
  				else{
  					$Data['ingredientName'] = $Data['ingredientName'] . ', '.$Row->ingredientName;
  				}

               return $Data;
           }
		}
	}

	function relatedproducts($ProductID, $CategoryID){
		//modified by FS 9 Des
		//ini masih harus diubah nanti
		$queryString= "SELECT ProductID, ProductName, Price, Photo,Discount from msproduct WHERE AuditedActivity <> 'D' AND CategoryID = $CategoryID AND ProductID NOT LIKE '$ProductID'  ORDER BY TransactionCount LIMIT 10";
		$query = $this->db->query($queryString);
		$i=0;
		if($query->num_rows() === 0){
			return false;
		}else{
           foreach ($query->result() as $Row)
           {
               $Data[$i]['ProductID'] = $Row->ProductID;
               $Data[$i]['ProductName'] = $Row->ProductName;
               $Data[$i]['Price'] = $Row->Price; 
               $arr = explode(";", $Row->Photo);
			   $Data[$i]['Thumbnail']= $arr[0];       
               $Data[$i]['Discount'] = $Row->Discount;
               $i++;
           }
			return $Data;
		}
	}
	function getDiscountedProducts($limit, $offset){
		//added by FS 9 Des
		$queryString= "SELECT ProductID, ProductName, Price, Photo,Discount from msproduct WHERE AuditedActivity <> 'D' AND Discount > 0 ORDER BY Discount DESC LIMIT ? OFFSET ?";
		$query = $this->db->query($queryString, array($limit, $offset));
		$i=0;
		if($query->num_rows() === 0){
			return false;
		}else{
           foreach ($query->result() as $Row)
           {
               $Data[$i]['ProductID'] = $Row->ProductID;
               $Data[$i]['ProductName'] = $Row->ProductName;
               $Data[$i]['Price'] = $Row->Price; 
               $arr = explode(";", $Row->Photo);
			   $Data[$i]['Thumbnail']= $arr[0];       
               $Data[$i]['Discount'] = $Row->Discount;
               $i++;
           }
			return $Data;
		}
	}

	function getPopularProducts($limit, $offset)
	{
		//added by FS 9 Des
		$queryString= "SELECT ProductID, ProductName, Price, Photo,Discount from msproduct WHERE AuditedActivity <> 'D' ORDER BY TransactionCount DESC LIMIT ? OFFSET ?";
		$query = $this->db->query($queryString, array($limit, $offset));
		$i=0;
		if($query->num_rows() === 0){
			return false;
		}else{
           foreach ($query->result() as $Row)
           {
               $Data[$i]['ProductID'] = $Row->ProductID;
               $Data[$i]['ProductName'] = $Row->ProductName;
               $Data[$i]['Price'] = $Row->Price; 
               $arr = explode(";", $Row->Photo);
			   $Data[$i]['Thumbnail']= $arr[0];       
               $Data[$i]['Discount'] = $Row->Discount;
               $i++;
           }
			return $Data;
		}
	}
}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */