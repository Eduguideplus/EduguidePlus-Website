<?php
class home_model extends CI_Model
{


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function record_count($table)
    {
        return $this->db->count_all($table);
    }

    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function update_data($data, $table, $columname, $columnvalue)
    {
        $this->db->where($columname, $columnvalue);
        $this->db->update($table, $data);
    }

    function delete_data($table, $columname, $columnvalue)
    {
        $this->db->where($columname, $columnvalue);
        $this->db->delete($table);
    }

    function selectOne($table_name, $column_name, $column_value)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($column_name, $column_value);
        $query = $this->db->get();
        return $query->result();
    }
    function select_data2($table,$collum_name1, $collum_value1,$collum_name2, $collum_value2)
     {
                    
          $this->db->select('*');
          $this->db->from($table); 
          $this->db->where($collum_name1, $collum_value1);
          $this->db->where($collum_name2, $collum_value2); 

          $query = $this ->db-> get();
            
        return $query->result();
            
     }   
     function selectcart($table_name, $column_name, $column_value)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($column_name, $column_value);
        $this->db->group_by('plan_id');
        $query = $this->db->get();
        return $query->result();
    }
    function select_cart()
    {
        $cart_session_id = $this->session->userdata('cart_session_id');
        $this->db->select('tc.created_on,tc.price,tp.plan_type,tp.plan_title');
        $this->db->from('tbl_cart tc');
        $this->db->join('tbl_plan tp','tp.id=tc.plan_id');
        $this->db->where('tc.cart_session_id',$cart_session_id);
        $query = $this->db->get();
        return $query->result();

    }
    function select_user_plan($user)
    {
      $this->db->select('tp.plan_title,tupd.plan_price,tupd.validity_date,tupd.id,tupd.plan_id');
      $this->db->from('tbl_user_plan_details tupd');
      $this->db->join('tbl_plan tp','tp.id = tupd.plan_id');
       $this->db->where('tupd.user_id',$user);
       $query = $this->db->get();
        return $query->result();
    }


     function select_custom_plan()
         {
            $this->db->select('tp.id,tet.icon,tet.slug,tet.exam_name,tet.description,tet.detail_description');
            $this->db->from('tbl_plan tp');
            $this->db->join('tbl_exam_type tet','tet.id = tp.company_id');
            $this->db->where('tp.plan_type','Customarized');
            $this->db->where('tet.status','Active');

            $query = $this->db->get();              
            return $query->result();
         }
         function select_general_plan()
         {
             $this->db->select('tp.id,tp.plan_title,tp.plan_price,tp.plan_month_duration,tpd.paper_per_company,tp.no_of_company');
              $this->db->from('tbl_plan tp'); 
              $this->db->join('tbl_plan_details tpd','tp.id = tpd.plan_id');
              $this->db->where('tp.plan_type','General'); 
              $query = $this -> db -> get();
                
            return $query->result();
         }

          function select_custom_plan_details($column1)
         {
            $this->db->select('tpd.id,tet.icon,tet.slug,tp.plan_title,tp.plan_month_duration,tp.no_of_company,tp.company_id,tpd.paper_per_company,tet.price,tpd.plan_id,tet.exam_name');
            $this->db->from('tbl_exam_type tet');
            $this->db->join('tbl_plan tp','tp.company_id=tet.id');
            $this->db->join('tbl_plan_details tpd','tpd.plan_id=tp.id');
            $this->db->where('tet.slug',$column1);

            $query = $this->db->get();              
            return $query->result();
         }


    function fetch_all($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_as_array($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }

    

    function url_slug($string)
    {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower($string);
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", " ", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", "-", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        //$string =substr_replace($string ,"",-1);//Last dashes remove
        return $string;
    }

    function fetch_first($table,$columname)
    {
         $this->db->select_min($columname);
         $this->db->from($table);
         $query = $this->db->get();
         return $query->result();
    }


    function fetch_all_blog($table,$limit,$start)
    {
        $this->db->limit($limit,$start);
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_all_blog_count($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_all_blog_select($table,$limit,$start,$url)
    {
        $this->db->limit($limit,$start);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('blog_cat_slug',$url);
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_all_blog_count_select($table,$url)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('blog_cat_slug',$url);
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_all_testimonial($table)
    {
        $this->db->limit(3,0);
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    function selectOne_price($level,$id)
    {
        $this->db->select('*');
        $this->db->from('tbl_price');
        $this->db->where('deadline_id', $id);
        $this->db->where('level_id', $level);
        $query = $this->db->get();
        return $query->result();
    }

    function selectOne_file($table_name, $column_name, $column_value,$type)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($column_name, $column_value);
        $this->db->where('doc_type', $type);
        $query = $this->db->get();
        return $query->result();
    }

    function select_order_max($reg_id)
    {
         $this->db->select_max('order_id');
         $this->db->from('tbl_order');
         $this->db->where('register_id', $reg_id);
         $query = $this->db->get();
         return $query->result();
    }

    function select_order($order_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_order');
         $this->db->where('order_id', $order_id);
         $query = $this->db->get();
         return $query->result();
    }

    function insertTransaction($data = array())
    {
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }

    function update_order($data,$order_id,$reg_id)
    {
        $this->db->where('order_id', $order_id);
        $this->db->where('register_id', $reg_id);
        $this->db->update('tbl_order', $data);
    }

    function selectOne_payment($order_id,$reg_id)
    {
         $this->db->select('*');
         $this->db->from('payments');
         $this->db->where('product_id', $order_id);
         $this->db->where('user_id', $reg_id);
         $query = $this->db->get();
         return $query->result();
    }

    function selectOne_order($order_id,$reg_id)
    {
         $this->db->select('*');
         $this->db->from('tbl_order');
         $this->db->where('order_id', $order_id);
         $this->db->where('register_id', $reg_id);
         $query = $this->db->get();
         return $query->result();
    }
    function get_material_exams()
    {
         $this->db->select('*');
         $this->db->from('tbl_study_material');
         $this->db->where('material_status', 'active');
         $this->db->group_by('exam_id'); 
         $query = $this->db->get();
         return $query->result();

    }
    function get_exam_documents_type($exam_id)

  {
         $this->db->select('*');
         $this->db->from('tbl_study_material');
         $this->db->where('material_status', 'active');
          $this->db->where('exam_id', $exam_id);
         $this->db->group_by('material_type'); 
         $query = $this->db->get();
         return $query->result();
  }
}
?>