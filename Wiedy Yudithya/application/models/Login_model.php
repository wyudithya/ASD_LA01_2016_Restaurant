<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
	}

	function login($username,$password){
		//Audited activity: I -> insert, U-> update, D -> delete
		$password = md5($password);
		$queryString = "SELECT * FROM msuser JOIN msusertype ON msuser.UserTypeID = msusertype.UserTypeID WHERE Username = ? AND Password = ?";
		$query = $this->db->query($queryString,array($username,$password));
		if ($query != null && $query->num_rows() > 0) 
			return $query;
		else
		{
			return false;
		}
	}
}