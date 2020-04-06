<?php
class dash_board_model extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
	
	
function total_category_count()
	{
		
		$this->db->select('*');
		$this->db->from('tbl_category'); 
		$query = $this->db->get();
		$category=$query->result();
		return count($category);
	}
function total_course_count()
	{
		
		$this->db->select('*');
		$this->db->from('tbl_course'); 
		$query = $this->db->get();
		$course=$query->result();
		return count($course);
	}	
function total_gallery_count()
	{
		
		$this->db->select('*');
		$this->db->from('tbl_galary'); 
		$query = $this->db->get();
		$gallery=$query->result();
		return count($gallery);
	}

function total_expert_count()
	{
		
		$this->db->select('*');
		$this->db->from('tbl_expert'); 
		$query = $this->db->get();
		$expert=$query->result();
		return count($expert);
	}
function total_news_count()
	{
		
		$this->db->select('*');
		$this->db->from('tbl_news'); 
		$query = $this->db->get();
		$news=$query->result();
		return count($news);
	}
function total_testimonial_count()
	{
		
		$this->db->select('*');
		$this->db->from('tbl_testimonial'); 
		$query = $this->db->get();
		$testimonial=$query->result();
		return count($testimonial);
	}	
}
?>