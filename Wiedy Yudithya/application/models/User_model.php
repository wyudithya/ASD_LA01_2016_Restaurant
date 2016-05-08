<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct() 
	{
		parent::__construct();
	}

	function getAllUser()
	{
		$result =array();
		$id = $this->session->userdata('userTypeID');
		$queryString = "SELECT UserID,Username, UserType, Name, DOB, Address FROM msuser a JOIN ltusertype b ON a.UserTypeID = b.UserTypeID 
		WHERE AuditedActivity <> 'D'  and a.UserTypeID >= ? ";
		$query = $this->db->query($queryString,array($id));

		for($i=0;$i<$query->num_rows();$i++)
		{
			$temp = new stdClass();
			$temp->UserType = $query->row($i)->UserType;
			$temp->DOB =$query->row($i)->DOB;
			$temp->Address = $query->row($i)->Address;
			$temp->Name = $query->row($i)->Name;
			$temp->Username = $query->row($i)->Username;
			$temp->UserID = $query->row($i)->UserID;
			array_push($result, $temp);
		}
		return $result;
	}
	public function search_get_user($FilterType, $str)
	 {
		$result =array();
		$str = '%'.$str.'%';
		$id = $this->session->userdata('userTypeID');
		$queryString = "SELECT UserID,Username, UserType, Name, DOB, Address FROM msuser a JOIN ltusertype b ON a.UserTypeID = b.UserTypeID 
		WHERE AuditedActivity <> 'D'  and a.UserTypeID >= ? ";
		$queryString =  $queryString."and " . $FilterType . " like ?";
		$query = $this->db->query($queryString,array($id,$str));

		for($i=0;$i<$query->num_rows();$i++)
		{
			$temp = new stdClass();
			$temp->UserType = $query->row($i)->UserType;
			$temp->DOB =$query->row($i)->DOB;
			$temp->Address = $query->row($i)->Address;
			$temp->Name = $query->row($i)->Name;
			$temp->Username = $query->row($i)->Username;
			$temp->UserID = $query->row($i)->UserID;
			array_push($result, $temp);
		}
		//die();
		return $result;
	 }

	 public function getUserByID($id)
	 {
	 	$temp = new stdClass();
	 	$queryString = "SELECT UserID,Username, UserType, a.userTypeID , Name, DOB, Address, Email, PhoneNumber FROM msuser a JOIN ltusertype b ON a.UserTypeID = b.UserTypeID 
		WHERE AuditedActivity <> 'D' AND a.UserID = ?";
		$query = $this->db->query($queryString,array($id));
		$i = 0;
		$temp->UserID = $query->row($i)->UserID;
		$temp->UserTypeID = $query->row($i)->userTypeID;
		$temp->Name = $query->row($i)->Name;
		$temp->Username = $query->row($i)->Username;
		$temp->UserType = $query->row($i)->UserType;
		$temp->Address = $query->row($i)->Address;
		$temp->Email = $query->row($i)->Email;
		$temp->PhoneNumber = $query->row($i)->PhoneNumber;
		$temp->DOB = $query->row($i)->DOB;

		return $temp;
	 }

	 function deleteUserByID($id){
		$queryString = "UPDATE msuser  SET AuditedActivity = 'D' ,AuditedUser = ?, AuditedTime = CURRENT_TIMESTAMP  where UserID = ? and userTypeID > ?";
		$query = $this->db->query($queryString,array($this->session->userdata('userID'),$id,$this->session->userdata('userTypeID')));
		redirect('BackEnd/Users');				
	}


	function UpdateUserByID($id,$data){
		$queryString = "UPDATE msuser  SET AuditedActivity = 'U', Name = ?  , DOB = ? , Address = ? , AuditedUser = ?, AuditedTime = CURRENT_TIMESTAMP where UserID = ? and userTypeID > ?";
		$query = $this->db->query($queryString,array($data['txt_name'],$data['txt_DOB'],$data['txt_address'],$this->session->userdata('userID'),$id,$this->session->userdata('userTypeID')));
		redirect('BackEnd/Users');
	}

	function checkUserValidity($username)
	{
		//added by FS 12 Des
		$queryString = "SELECT * FROM msuser WHERE Username = ?";
		$query = $this->db->query($queryString,array($username));
		if($query->num_rows()==0)
			return true;
		else
			return false;
	}

	function getTimeString($t)
	{
		$t = strtotime($t);
		$ret = "";
		if(date('z')>date('z',$t+25200))
		{
			$ret = date('d-M-Y',$t+25200);
		}
		else
		{
			$ret = date('H:i',$t+25200);
		}
		return $ret;
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */