<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class autocomplete 
{
	
	public function brand_autowetewtcomplete()
	{
		
		
		
			
			$this->db->select('*');
			$this->db->from('tblbrand');
			$this->db->like('brand_name','b');
			$query = $this->db->get();
			$result=$query->result();
			
			
		
		return $result;
		
	}
	
	
	
}
 ?>