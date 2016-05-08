<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function SaveForm($form_data)
	{
		$data = array (
			'username' => $form_data['username'],
			'userType' => "Customer",
			'userTypeID' => 3,
			'userID' => $form_data['userid']
		);
		$this->session->set_userdata($data);
		$queryString = "INSERT INTO msuser(UserId,UserTypeID,Name,Username,Password,Email,PhoneNumber,DOB,Address,AuditedUser,AuditedTime,AuditedActivity) Values(?,'3',?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP,'I')";
		$query = $this->db->query($queryString,array($form_data['userid'],$form_data['name'],$form_data['username'],md5($form_data['password']),$form_data['email'],$form_data['phone_number'],$form_data['date_of_birth'],$form_data['address'],$form_data['userid']));
		return $query;
	}
}
?>