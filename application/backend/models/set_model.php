<?php
class set_model extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }



 /*************************************************************   P2Exam   **********************************************************************/

  function exam_name($exam_id) 
	{       
        $this->db->select('*');
        $this->db->from('tbl_exam_type');
        $this->db->group_by('exam_name');
        $this ->db -> where($exam_id);
        $query=$this->db->get();

        return $query->result();
    }	

    function pattern_unique($table) 
	{       
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by('exam_id');
        
        $query=$this->db->get();

        return $query->result();
    }	

    function get_question_by_section($section_id,$exam_id,$qty)
    {
        $this->db->select('*');
        $this->db->from('tbl_questions');
        $this->db->where('exam_id',$exam_id);
        $this->db->where('section_id',$section_id);
        $this->db->order_by("id", "RANDOM");
        $this->db->limit($qty, '0');
        
        $query=$this->db->get();

        return $query->result();

    }

    function get_set_details($set_id)
    {

        $this->db->select('*');
        $this->db->from('tbl_set ts');
        $this->db->join('tbl_question_set tqs','tqs.set_id=ts.id','left');
        $this->db->join('tbl_questions tq','tq.id=tqs.question_id','left');
        
        $this->db->where('ts.id',$set_id);
       
        
        $query=$this->db->get();

        return $query->result();

    }

    function get_passage_details($set_id)
    {

         $this->db->select('*');
         $this->db->from('tbl_question_set');
         $this->db->where('set_id',$set_id);
        $this->db->where('passage_id !=','');
       

       /* $this->db->select('*');
        $this->db->from('tbl_set ts');
        $this->db->join('tbl_question_set tqs','tqs.set_id=ts.id','left');
        $this->db->join('tbl_passage tp','tp.id=tqs.passage_id','left');
        $this->db->join('tbl_questions tq','tq.id=tqs.question_id','left');
        $this->db->where('ts.id',$set_id);*/
       
        
        $query=$this->db->get();

        return $query->result();

    }

    function get_set_pattern($exam_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_set_pattern tsp');
        $this->db->join('tbl_question_section tqs','tqs.id=tsp.section_id','left');
       
        $this->db->where('tsp.exam_id',$exam_id);
       
        
        $query=$this->db->get();

        return $query->result();

    }

    function get_passage($exam_id,$type_id) 
    {   
        $this->db->distinct();    
        $this->db->select('passage_id');
        $this->db->from('tbl_questions');
        
        $this ->db -> where('exam_id',$exam_id);
        $this ->db -> where('section_id',$type_id);
        $query=$this->db->get();

        $rs= $query->result();
        
        if(count($rs)>0)
        {
            $ids=array();
            for($i=0;$i<count($rs);$i++)
            {
                $ids[$i]=$rs[$i]->passage_id;

            }
            $this->db->select('*');
            $this->db->from('tbl_passage');
            $this->db->where_not_in('id', $ids);
            
            $query=$this->db->get();
            return $query->result();

        }
        else
        {
            $this->db->select('*');
            $this->db->from('tbl_passage');
            $query=$this->db->get();
            return $query->result();

        }
    }

        function get_passage_by_section($section_id,$exam_id,$qty)
    {
        $no_pf_passage=$qty/5;
        $this->db->distinct();
        $this->db->select('passage_id');
        $this->db->from('tbl_questions');
        $this->db->where('exam_id',$exam_id);
        $this->db->where('section_id',$section_id);
        $this->db->order_by("passage_id", "RANDOM");
        $this->db->limit($no_pf_passage, '0');
        
        $query=$this->db->get();
        return $query->result();
        //$rs= $query->result();
        //print_r($rs);exit;

    }   

    /*************************************backend**********************************************/

    function plan_by_type($plan_type,$user_id) 
    {       
        $this->db->select('*');
        $this->db->from('tbl_user_plan_details tupd');
        $this->db->join('tbl_plan tp','tp.id=tupd.plan_id','left');
        //$this->db->join('tbl_user_plan_company tupc', 'tupc.user_plan_id=tupd.id','left');
        
        $this->db->where('tp.plan_type',$plan_type);
        $this->db->where('tupd.user_id',$user_id);

        $query=$this->db->get();

        return $query->result();
    } 

    function get_plan_details($user_plan,$user_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user_plan_details tupd');
        $this->db->join('tbl_plan tp','tp.id=tupd.plan_id','left');
        $this->db->where('tupd.id',$user_plan);
        $this->db->where('tupd.user_id',$user_id);

        $query=$this->db->get();

        return $query->result();

    }  

    function get_completed_exam_except_practice_incomplete()
   {

         $this->db->select('*');
         $this->db->from('tbl_exam_type');
         $this->db->where('type','practice');
         $query=$this->db->get();
         $practice= $query->result();
         $practice_set_ids=array();
         for($i=0;$i<count($practice);$i++)
         {
            $practice_set_ids[$i]=$practice[$i]->id;
         }

         //print_r($practice_exam_ids);exit;


         if(count($practice_set_ids)>0)
         {
            $this->db->select('*');
            $this->db->from('tbl_set ts');
            $this->db->join('tbl_user_exam tue','ts.id=tue.set_id','left');
        
            $this->db->where('exam_result','incomplete');
            $this->db->where_not_in('ts.exam_id', $practice_set_ids);
            $query=$this->db->get();
            return $query->result();

         }
         
         

   }
}

?>