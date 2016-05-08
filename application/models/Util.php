<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Util extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
	}

	function generateTrackingID($originalID)
	{
		$a = md5($originalID);
 		$a = unpack("L", substr($a,0,4));
 		return $a[1];
	}

	function getCityList()
	{
		//modified by FS 14 Des
		//unused method, jadi ya gitu aja
		$cities = array();
		return $cities;
	}

	function search($keywords,$order,$desc)
	{
		$counter = 0;
		$result = array();
		for($i=0;$i<count($keywords);$i++)
		{
			if(strlen($order)>0)
				$queryString = "SELECT ProductID, ProductName, Price, Discount, Photo FROM msproduct WHERE ProductName LIKE concat('%',?,'%') ORDER BY $order $desc";
			else
				$queryString = "SELECT ProductID, ProductName, Price, Discount, Photo FROM msproduct WHERE ProductName LIKE concat('%',?,'%')";
			if(!isset($keywords[$i]))
				return $result;
			$query = $this->db->query($queryString,array($keywords[$i]));
			for($j=0;$j<$query->num_rows();$j++)
			{
				//$temp = new stdClass();
				$result[$counter]['ProductID'] = $query->row($j)->ProductID;
				$result[$counter]['ProductName'] = $query->row($j)->ProductName;
				$result[$counter]['Price'] = $query->row($j)->Price;
				$arr = explode(";", $query->row($j)->Photo);
				$result[$counter]['Thumbnail'] = $arr[0];
				$result[$counter]['Discount'] = $query->row($j)->Discount;
				$counter++;
			}

			if(strlen($order)>0)
				$queryString = "SELECT ProductID, ProductName, Price, Discount, Photo FROM msproduct WHERE Keyword LIKE concat('%',?,'%') ORDER BY $order $desc";
			else
				$queryString = "SELECT ProductID, ProductName, Price, Discount, Photo FROM msproduct WHERE Keyword LIKE concat('%',?,'%')";
			$query = $this->db->query($queryString,array($keywords[$i]));
			for($j=0;$j<$query->num_rows();$j++)
			{
				$isFound = false;
				for($k=0;$k<count($result);$k++)
				{
					if($query->row($j)->ProductID==$result[$k]['ProductID'])
					{
						if(strlen($order)==0)
						{
							$temp = $result[0];
							$result[0] = $result[$k];
							$result[$k] = $temp;
						}
						$isFound = true;
						break;
					}
				}
				if(strlen($order)==0&&$isFound)
					continue;
				else if($isFound)
					break;
				//$temp = new stdClass();
				$result[$counter]['ProductID'] = $query->row($j)->ProductID;
				$result[$counter]['ProductName'] = $query->row($j)->ProductName;
				$result[$counter]['Price'] = $query->row($j)->Price;
				$arr = explode(";", $query->row($j)->Photo);
				$result[$counter]['Thumbnail'] = $arr[0];
				$result[$counter]['Discount'] = $query->row($j)->Discount;
				$counter++;
			}
		}
		return $result;
	}
}