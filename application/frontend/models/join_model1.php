<?php
class join_model extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    /*function get_product_by_size($id,$cat_id,$page,$per_page)
    {
     	 
         $this->db->select('*');
     	 $this->db->from('tbl_product_size tps');
     	 $this->db->join('tbl_product tp','tp.product_id=tps.product_id','left');
     	 $this->db->where('tp.status','active');
     	 $this->db->where('tps.size_id',$id);
         $this->db->where('tps.pro_category_id',$cat_id);
         $this->db->limit($per_page,$page);
     	 $query=$this->db->get();
     	 return $query->result();
    }
    function get_product_by_size_by_subcat($id,$cat_id,$page,$per_page)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_product_size tps');
         $this->db->join('tbl_product tp','tp.product_id=tps.product_id','left');
         $this->db->where('tp.status','active');
         $this->db->where('tps.size_id',$id);
         $this->db->where('tps.pro_subcate_id',$cat_id);
         $this->db->limit($per_page,$page);
         $query=$this->db->get();
         return $query->result();
    }*/
     
    function get_tutor_by_subject($slug,$page,$per_page)
    {
     	 
         $this->db->select('*');
     	 $this->db->from('tbl_subject ts');
     	 $this->db->join('tbl_tutor_subject tts','tts.subject_id=ts.id','left');
     	 $this->db->join('tbl_user tu','tu.id=tts.user_id','left');
     	 //$this->db->where('ts.id',$id);
     	 $this->db->where('tu.status','Active');
     	 $this->db->where('tu.user_type_id','2');
     	 $this->db->where('ts.subject_slug',$slug);
     	 $this->db->limit($per_page,$page);
         
         
     	 $query=$this->db->get();
     	 return $query->result();
    }

    function check($slug)
    {
     	 
         $this->db->select('*');
     	 $this->db->from('tbl_subject ts');
     	 $this->db->join('tbl_tutor_subject tts','tts.subject_id=ts.id','left');
     	 $this->db->join('tbl_user tu','tu.id=tts.user_id','left');
     	 //$this->db->where('ts.id',$id);
     	 $this->db->where('tu.status','Active');
     	 $this->db->where('tu.user_type_id','2');
     	 $this->db->where('ts.subject_slug',$slug);
     	 
         
         
     	 $query=$this->db->get();
     	 return $query->result();
    }

    function get_tutor_by_medium($medium)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_medium tm');
         $this->db->join('tbl_subject ts','ts.medium_id=tm.id','left');
         $this->db->join('tbl_tutor_subject tts','tts.subject_id=ts.id','left');
         $this->db->join('tbl_user tu','tu.id=tts.user_id','left');
         $this->db->where('tm.id',$medium);
         
         $this->db->where('tu.user_type_id','2');
        
         
         
         $query=$this->db->get();
         return $query->result();
    }

    function get_tutor_by_experience($exp)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_experience te');
         $this->db->join('tbl_user tu','tu.experience=te.id','left');
         $this->db->where('te.id',$exp);
         $this->db->where('tu.user_type_id','2');
         //$this->db->where('ts.subject_slug',$slug);
         //$this->db->limit($per_page,$page);
         
         
         $query=$this->db->get();
         return $query->result();
    }

    function get_tutor_by_area($area)
    {
         
         $this->db->select('*');
         
         //$this->db->group_by('user_id');
         $this->db->from('tbl_address ta');
         $this->db->join('tbl_user tu','tu.id=ta.user_id','left');
         $this->db->where('ta.id',$area);
         $this->db->where('tu.user_type_id','2');
         //$this->db->where('ts.subject_slug',$slug);
         //$this->db->limit($per_page,$page);
         
         
         $query=$this->db->get();
         return $query->result();
    }

    function get_tutor_by_standard($stand)
    {
         
         /*$this->db->select('*');
         
         $this->db->from('tbl_class tc');
         $this->db->join('tbl_subject ts','ts.class_id=tc.id','left');
         $this->db->join('tbl_tutor_subject tts','tts.subject_id=ts.id','left');
         $this->db->join('tbl_user tu','tu.id=tts.user_id','left');
         $this->db->where('tc.id',$stand);
         $this->db->where('tu.user_type_id','2');*/

         $this->db->select('*');
         
         $this->db->from('tbl_class tc');
        
         $this->db->join('tbl_user tu','tu.qualification=tc.id','left');
         $this->db->where('tc.id',$stand);
         $this->db->where('tu.user_type_id','2');
        
         $query=$this->db->get();
         return $query->result();
    }

    function get_tutor_by_rating($rating)
    {
         
         $this->db->select('*');     
         $this->db->from('tbl_average_rating tar');
         
         $this->db->join('tbl_user tu','tu.id=tar.tutor_id','left');
         $this->db->where('tar.average_rating',$rating);
         $this->db->where('tu.user_type_id','2');
         
         
         
         $query=$this->db->get();
         return $query->result();
    }
}
?>