<?php
class Search_model extends CI_Model
{
	function fetch_data($data1, $data2)
	
	{
		$this->db->select("*");
		$this->db->from("kendaraan");
		if($data1 != '')
		{	
				$this->db->like('Word', $data1);
				$this->db->or_like('Word', $data2);
		}
	
		$this->db->order_by('No', 'Asc');
		return $this->db->get();
	}
	
}
?>