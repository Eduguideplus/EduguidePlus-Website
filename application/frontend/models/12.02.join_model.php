<?php
class join_model extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }



     function get_user_exam_list($test_type,$user_id)
    {

        $this->db->select('*');
         $this->db->from('tbl_user_exam tue');
         //$this->db->join('tbl_set ts','tue.set_id=ts.id','left');
         $this->db->where('tue.user_id',$user_id);
         $this->db->where('tue.test_type',$test_type);
         $query=$this->db->get();
         return $query->result();
     }

      function get_plan_exam_available($category_id,$usr)
    {
        
        $exam_ids=array();
         $this->db->select('*');
         $this->db->from('tbl_user_plan');
         $this->db->where('user_id',$usr);
         $query=$this->db->get();
         $result= $query->result();

         if(count($result)>0)
         {
            for($i=0;$i<count($result);$i++)
         {
            if($result[$i]->exam_id!='' && $result[$i]->exam_id!=0)
            {
                $validity=$result[$i]->plan_validity;
                $created_on=$result[$i]->created_on;

                $time = strtotime($created_on);
                $final = date("Y-m-d", strtotime("+".$validity." month", $time));

                $current_date=date('Y-m-d');

                 

                if(strtotime($current_date) < strtotime($final))
                {
                    array_push($exam_ids,$result[$i]->exam_id);
                }
                                
            }
         }
        
         }

         
        /* return $exam_ids;
         exit;*/

         $this->db->select('*');
         $this->db->from('tbl_exam_type');
         $this->db->where('exam_type_id',$category_id);
         if(count($exam_ids)>0)
         {
            $this->db->where_not_in('id',$exam_ids);
         }
         
         $query=$this->db->get();
         return $query->result();
     }


     function check_option_status($qstn,$optn)
     {
         $this->db->select('*');
         $this->db->from('tbl_question_choice');
         $this->db->where('que_id',$qstn);
         $this->db->where('is_correct','Yes');
         $query=$this->db->get();
         $result= $query->result();
         $right_optn=@$result[0]->id;
         if($optn==$right_optn)
         {
            return '1';
         }
         else
         {
            return '0';
         }
        
     }

      function check_option_status_multiple($qstn,$optn)
     {
         $this->db->select('*');
         $this->db->from('tbl_question_choice');
         $this->db->where('que_id',$qstn);
         $this->db->where('is_correct','Yes');
         $query=$this->db->get();
         $result= $query->result();
         $stat=0;
         for($i=0;$i<count($result);$i++)
         {
            $current_optn=@$result[$i]->id;
            if($current_optn==$optn)
            {
                $stat=1;
                break;
            }
            else
            {
                $stat=0;
            }
         }
         //$right_optn=@$result[0]->id;
         if($stat==1)
         {
            return '1';
         }
         else
         {
            return '0';
         }
        
     }


      public function get_selected_type_question($type,$exam_id,$sec_id)
    {
    
        $this->db->select('*');
        $this->db->from('tbl_questions tq');
        $this->db->join('tbl_question_test_type tqtt','tq.id=tqtt.question_id');
        $this->db->where('tqtt.test_type',$type);
        $this->db->where('tq.exam_id',$exam_id);
        $this->db->where('tq.section_id',$sec_id);
        $this->db->where('tq.status','active');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    function get_current_active_plan($user,$test_type)
    {
        
    $this->db->select('tup.plan_code,tup.id,tup.plan_id,tup.plan_validity,tup.test_qty,tup.remaining_qty,tup.plan_amount,tup.created_on');
    $this->db->from('tbl_user_plan tup');
    $this->db->join('tbl_plan tp','tup.plan_id=tp.id');
    $this->db->where('tp.test_type_id',$test_type);
    $this->db->where('tup.user_id',$user);
    $this->db->where('tup.remaining_qty >','0');
    $this->db->where('tup.status','active');
    $query=$this->db->get();
    $result=$query->result();
    return $result;

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


     function get_category_blog_total($cat_id)
    {

         $this->db->select('*');
         $this->db->from('tbl_blog_category_id');
         $this->db->where('blog_category_id',$cat_id);
         $query=$this->db->get();
         $list= $query->result();
         $blog_ids=array();
         for($i=0;$i<count($list);$i++)
         {
            $blog_ids[$i]=$list[$i]->blog_id;

         }
         
         $this->db->select('*');
         $this->db->from('tbl_blog');
         $this->db->where('blog_status','active');
         $this->db->where_in('blog_id',$blog_ids);
        
         $query=$this->db->get();
         return $query->result();
    }
     
    function get_category_blog($cat_id,$page,$per_page)
    {

         $this->db->select('*');
         $this->db->from('tbl_blog_category_id');
         $this->db->where('blog_category_id',$cat_id);
         $query=$this->db->get();
         $list= $query->result();
         $blog_ids=array();
         for($i=0;$i<count($list);$i++)
         {
            $blog_ids[$i]=$list[$i]->blog_id;

         }
     	 
         $this->db->select('*');
     	 $this->db->from('tbl_blog');
     	 $this->db->where('blog_status','active');
     	 $this->db->where_in('blog_id',$blog_ids);
     	
     	 $this->db->limit($per_page,$page);
         
         
     	 $query=$this->db->get();
     	 return $query->result();
    }

    function get_recent_category_blog($cat_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_blog_category_id');
         $this->db->where('blog_category_id',$cat_id);
         $query=$this->db->get();
         $list= $query->result();
         $blog_ids=array();
         for($i=0;$i<count($list);$i++)
         {
            $blog_ids[$i]=$list[$i]->blog_id;

         }
         
         $this->db->select('*');
         $this->db->from('tbl_blog');
         $this->db->where('blog_status','active');
         $this->db->where_in('blog_id',$blog_ids);
        $this->db->order_by("added_on", "desc");
        $this->db->limit('2','0');

         
         
         $query=$this->db->get();
         return $query->result();

    }

    function get_set_details($set_id)
    {
     	 
         $this->db->select('*');
     	 $this->db->from('tbl_set ts');
     	 $this->db->join('tbl_question_set tqs','tqs.set_id=ts.id','left');
     	 $this->db->join('tbl_questions tq','tq.id=tqs.question_id','left');
     	 $this->db->join('tbl_question_choice tqc','tqc.que_id=tq.id','left');
     	 $this->db->where('ts.id',$set_id);
     	 
         
         
     	 $query=$this->db->get();
     	 return $query->result();
    }

        function get_knowledge_set_details($set_id)
    {
         // echo $set_id; exit;
         $this->db->select('*');
         $this->db->from('tbl_knowledge_qiuz_set ts');
         $this->db->join('tbl_knowledge_quiz_set_dtls tqs','tqs.set_id=ts.kq_id','left');
         $this->db->join('tbl_questions tq','tq.id=tqs.que_id','left');
         $this->db->join('tbl_question_choice tqc','tqc.que_id=tq.id','left');
         $this->db->where('tqs.dtls_id',$set_id);
         
         
         
         $query=$this->db->get();
         return $query->result();
    }


    function get_set_question($set_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_set ts');
         $this->db->join('tbl_question_set tqs','tqs.set_id=ts.id','left');
         $this->db->join('tbl_questions tq','tq.id=tqs.question_id','left');
         $this->db->where('ts.id',$set_id);
         $query=$this->db->get();
         return $query->result();

    }

       function get_knowledge_set_question($set_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_knowledge_qiuz_set ts');
         $this->db->join('tbl_knowledge_quiz_set_dtls tqs','tqs.set_id=ts.kq_id','left');
         $this->db->join('tbl_questions tq','tq.id=tqs.que_id','left');
         $this->db->where('ts.kq_id',$set_id);
         $query=$this->db->get();
         return $query->result();

    }

    function get_knockout_set_question($set_id,$level_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_knowledge_qiuz_set ts');
         $this->db->join('tbl_knowledge_quiz_set_dtls tqs','tqs.set_id=ts.kq_id','left');
         $this->db->join('tbl_questions tq','tq.id=tqs.que_id','left');
          $this->db->where('tqs.level_id',$level_id);
         $this->db->where('ts.kq_id',$set_id);
         $query=$this->db->get();
         return $query->result();

    }

    function get_set_passage_question($set_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_question_set');
         $this->db->where('set_id',$set_id);
         $query=$this->db->get();
         $passage= $query->result();
         $passage_ids=array();
         for($i=0;$i<count($passage);$i++)
         {
             $passage_ids[$i]=$passage[$i]->passage_id;

         }
if(count($passage_ids)>0)
{
         $this->db->select('*');
         $this->db->from('tbl_questions');
         
         $this->db->where_in('passage_id',$passage_ids);
         
         $query=$this->db->get();
         return $query->result();

}
        
    }


    function get_knowledge_set_passage_question($set_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_question_set');
         $this->db->where('set_id',$set_id);
         $query=$this->db->get();
         $passage= $query->result();
         $passage_ids=array();
         for($i=0;$i<count($passage);$i++)
         {
             $passage_ids[$i]=$passage[$i]->passage_id;

         }
if(count($passage_ids)>0)
{
         $this->db->select('*');
         $this->db->from('tbl_questions');
         
         $this->db->where_in('passage_id',$passage_ids);
         
         $query=$this->db->get();
         return $query->result();

}
        
    }

    function get_pattern($exam_id)
    {
        $this->db->select('*');
         $this->db->from('tbl_set_pattern tsp');
         $this->db->join('tbl_question_section tqs','tqs.id=tsp.section_id','left');
         $this->db->where('tsp.exam_id',$exam_id);
        $this->db->where('tqs.section_status','active');
         $query=$this->db->get();
         return $query->result();

        
    }

    function get_question_of_section($set_id,$section_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_question_set tqs');
         $this->db->join('tbl_questions tq','tq.id=tqs.question_id','left');
         $this->db->where('tqs.set_id',$set_id);
         $this->db->where('tq.section_id',$section_id);
         
         $query=$this->db->get();
         return $query->result();

    }

        function get_question_of_section_knowledgetest($set_id,$section_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_knowledge_quiz_set_dtls tqs');
         $this->db->join('tbl_questions tq','tq.id=tqs.que_id','left');
         $this->db->where('tqs.set_id',$set_id);
        
         
         $query=$this->db->get();
         return $query->result();

    }

      function get_question_of_section_knockouttest($set_id,$section_id,$level_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_knowledge_quiz_set_dtls tqs');
         $this->db->join('tbl_questions tq','tq.id=tqs.que_id','left');
         $this->db->where('tqs.set_id',$set_id);
          $this->db->where('tqs.level_id',$level_id);
         $this->db->where('tq.section_id',$section_id);
         
         $query=$this->db->get();
         return $query->result();

    }


    function get_question_of_section_attempted($user_exam_id,$section_id)
    {
        $this->db->select('*');
         $this->db->from('tbl_user_exam_details tued');
         $this->db->join('tbl_questions tq','tq.id=tued.question_master_id','left');
         $this->db->where('tued.user_exam_id',$user_exam_id);
         $this->db->where('tq.section_id',$section_id);
         
         $query=$this->db->get();
         return $query->result();

    }

    function get_answer_of_section_correct_attempted($user_exam_id,$section_id)
    {
         $this->db->select('question_master_id');
         $this->db->from('tbl_user_exam_details tued');
         $this->db->join('tbl_questions tq','tq.id=tued.question_master_id','left');
         $this->db->where('tued.user_exam_id',$user_exam_id);
         $this->db->where('tq.section_id',$section_id);

         
         $query=$this->db->get();
         $qstn= $query->result();
            $qstn_ids=array();
            for($i=0;$i<count($qstn);$i++)
            {
                $qstn_ids[$i]=$qstn[$i]->question_master_id;

            }
         $this->db->select('*');
         $this->db->from('tbl_user_exam_details tued');
         $this->db->join('tbl_questions tq','tq.id=tued.question_master_id','left');
         $this->db->where('tued.user_exam_id',$user_exam_id);
         $this->db->where('tq.section_id',$section_id);
         if(count($qstn_ids)>0)
         {
            $this->db->where_in('tued.question_master_id',$qstn_ids);
         }
         
         
         $query=$this->db->get();
          return $query->result();

         



    }
    function get_passage_question_of_section($set_id,$section_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_question_set');
         $this->db->where('set_id',$set_id);
         $this->db->where('passage_id !=','');
         $query=$this->db->get();
         $passage= $query->result();
         $passage_ids=array();
         for($i=0;$i<count($passage);$i++)
         {
             $passage_ids[$i]=$passage[$i]->passage_id;

         }
         //$first_passage_id=$passage[0]->passage_id;


         $this->db->select('*');
         $this->db->from('tbl_questions');
         $this->db->where('section_id',$section_id);
         $this->db->where_in('passage_id',$passage_ids);
         
         $query=$this->db->get();
         return $query->result();



    }

    function get_passage($set_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_question_set');
         $this->db->where('set_id',$set_id);
         $this->db->where('passage_id !=','');
         $query=$this->db->get();
         return $query->result();
         



    }

    function get_passage_questions_all($set_id,$section_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_question_set');
         $this->db->where('set_id',$set_id);
         $this->db->where('passage_id !=','');
         $query=$this->db->get();
         $passage= $query->result();
         $pass_ids=array();
         for($i=0;$i<count($passage);$i++)
         {
            $pass_ids[$i]=$passage[$i]->passage_id;

         }
         
         $this->db->select('*');
         $this->db->from('tbl_questions');
         $this->db->where('section_id',$section_id);
         $this->db->where_in('passage_id ',$pass_ids);
         $query=$this->db->get();
         return $query->result();


    }

    function get_exam_question_details($user_id,$s_id,$q_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_user_exam tue');
         $this->db->join('tbl_user_exam_details tued','tue.id=tued.user_exam_id','left');
         $this->db->where('tue.user_id',$user_id);
         $this->db->where('tue.set_id',$s_id);
         $this->db->where('tued.question_master_id',$q_id);
         $query=$this->db->get();
         return $query->result();

    }

   function get_knockout_exam_question_details($user_id,$s_id,$q_id,$level_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_user_exam tue');
         $this->db->join('tbl_user_exam_details tued','tue.id=tued.user_exam_id','left');
         $this->db->where('tue.user_id',$user_id);
         $this->db->where('tue.set_id',$s_id);
         $this->db->where('tue.level_id',$level_id);
         $this->db->where('tued.question_master_id',$q_id);
         $query=$this->db->get();
         return $query->result();

    }

   function get_completed_exam_except_practice($user_id)
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



         $this->db->select('*');
         $this->db->from('tbl_knowledge_qiuz_set ts');
          $this->db->join('tbl_user_exam tue','ts.kq_id=tue.set_id','left');
         $this->db->where('user_id',$user_id);
          $this->db->where('exam_result','complete');
         if(count($practice_set_ids)>0)
         {
            $this->db->where_not_in('ts.exam_id', $practice_set_ids);
         }
         
         $query=$this->db->get();
         return $query->result();

   }

   function get_completed_exam_except_practice_incomplete($user_id)
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



         $this->db->select('*');
         $this->db->from('tbl_knowledge_qiuz_set ts');
          $this->db->join('tbl_user_exam tue','ts.kq_id=tue.set_id','left');
         $this->db->where('user_id',$user_id);
          $this->db->where('exam_result','incomplete');
           if(count($practice_set_ids)>0)
         {
            $this->db->where_not_in('ts.exam_id', $practice_set_ids);
         }
         
         $query=$this->db->get();
         return $query->result();
         

   }

   function get_completed_exam_practice($user_id)
   {
        $result=array();

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



         
         if(count($practice_set_ids)>0)
         {
            $this->db->select('*');
            $this->db->from('tbl_set ts');
            $this->db->join('tbl_user_exam tue ','ts.id=tue.set_id','left');
            $this->db->where('user_id',$user_id);
            $this->db->where('exam_result','complete');
            $this->db->where_in('ts.exam_id', $practice_set_ids);
            $query=$this->db->get();
            return $query->result();
         }

         else
         {
            return $result;
         }

        
         

   }

   function get_user_activated_plan($user_id)
   {
         $this->db->select('*');
         $this->db->from('tbl_user_plan_details tupd');
         $this->db->join('tbl_user_plan_company tupc','tupc.user_plan_id=tupd.id','left');
         $this->db->where('tupd.user_id',$user_id);
         $this->db->where('tupd.plan_status','active');
         $query=$this->db->get();
         return $query->result();


   }

   function get_tax_details_order($order_id)
   {
         $this->db->select('*');
         $this->db->from('tbl_order_tax tot');
         $this->db->join('tbl_tax_master ttm','tot.tax_id=ttm.tax_id','left');
         $this->db->where('tot.order_id',$order_id);
         
         $query=$this->db->get();
         return $query->result();

   }

   function get_plan_details_order($order_id)
   {
         $this->db->select('*');
         $this->db->from('tbl_order_detail tod');
         $this->db->join('tbl_plan tp','tp.id=tod.plan_id');
         //$this->db->join('tbl_plan_details tpd','tpd.plan_id=tp.id','left');
         $this->db->where('tod.order_id',$order_id);
         
         $query=$this->db->get();
         return $query->result();

   }

    /*function get_tutor_by_medium($medium)
    {
         
         //echo $medium;
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

        /* $this->db->select('*');
         
         $this->db->from('tbl_class tc');
        
         $this->db->join('tbl_user tu','tu.qualification=tc.id','left');
         $this->db->where('tc.id',$stand);
         $this->db->where('tu.user_type_id','2');
        
         $query=$this->db->get();
         return $query->result();
    }*/

    /*function get_tutor_by_rating($rating)
    {
         
         $this->db->select('*');     
         $this->db->from('tbl_average_rating tar');
         
         $this->db->join('tbl_user tu','tu.id=tar.tutor_id','left');
         $this->db->where('tar.average_rating',$rating);
         $this->db->where('tu.user_type_id','2');
         
         
         
         $query=$this->db->get();
         return $query->result();
    }*/

    function get_release_plans($exam_type_id)
    { //echo $exam_type_id;
        $this->db->select('*');
         $this->db->from('tbl_plan tp');
         $this->db->join('tbl_plan_details tpd','tpd.plan_id=tp.id','left');
         $this->db->where('tp.company_id',$exam_type_id);
        
         
         
         
         $query=$this->db->get();
         return $query->result();
        /* $rs=$query->result();
         echo $exam_type_id;
         echo '<pre>';

         print_r($rs);exit;*/

    }

    function get_section_searched($exam_type_id,$section_name)
    {
        $pattern=$this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>@$exam_type_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $this->db->select('*');
         $this->db->from('tbl_set_pattern');
         
         $this->db->where('exam_id',$exam_type_id);
         $query=$this->db->get();
         $rs= $query->result();
         $sec_ids=array();
         for($i=0;$i<count($rs);$i++)
         {
            $sec_ids[$i]=$rs[$i]->section_id;


         }
         $sec_ids_unique=array_unique( $sec_ids);
         $sec_ids_val=array_values($sec_ids_unique);

        $this->db->select('*');
        $this->db->from('tbl_question_section');
        $this->db->where_in('id',$sec_ids_val);
        $this->db->like('section_name', $section_name);
        $query=$this->db->get();
        return $query->result();
    }

    function get_ranks_by_exam($exam_type_id)
    {
         $this->db->select('user_id, AVG(total_marks) as total');
         $this->db->from('tbl_user_rank');
         $this->db->where('exam_id',$exam_type_id);
         $this->db->group_by('user_id'); 
         $this->db->order_by("total", "desc");
         $query=$this->db->get();
         return $query->result();


    }

    function get_practice_set_of_exam($exam_id)
    {
        $this->db->select('*');
         $this->db->from('tbl_set ts');
         $this->db->join('tbl_exam_type tet','tet.id=ts.exam_id','left');
         $this->db->where('ts.exam_id',$exam_id);
         $this->db->where('tet.type','practice');
        
         
         
         
         $query=$this->db->get();
         return $query->result();

    }

   
}
?>