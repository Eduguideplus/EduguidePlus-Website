<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_plans extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	 
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');			
	$this->load->library('image_lib');
	$this->load->model('common/common_model');	
		
}

public function view()
{
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	//$data['degree']=$this->admin_model->selectAll('tbl_degree');
	$data['plans']= $this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	//echo '<pre>'; print_r($data['plans']); exit;
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_plans/c_plans_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
}

public function general_view()
{
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	//$data['degree']=$this->admin_model->selectAll('tbl_degree');
	$data['plans']= $this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_plans/plans_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
}


 function create_slug($string)
  {     
        $replace = '-';         
        $string = strtolower($string);     
 
        //replace / and . with white space     
        $string = preg_replace("/[\/\.]/", " ", $string);     
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
 
        //remove multiple dashes or whitespaces     
        $string = preg_replace("/[\s-]+/", " ", $string);     
 
        //convert whitespaces and underscore to $replace     
        $string = preg_replace("/[\s_]/", $replace, $string);     
 
        //limit the slug size     
        $string = substr($string, 0, 100);     
 
        //slug is generated     
        return $string; 
    }
    function add()
    {
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	/*$data['category']=$this->admin_model->selectone('tbl_category','parent_category_id','0');*/
    	//$data['subject']=$this->admin_model->selectAll('tbl_category');

          $data['test_type']= $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    	$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_plans/c_plans_add_view',$data);
		$this->load->view('template/adminfooter_category');
    }

    function general_add()
    {
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	/*$data['category']=$this->admin_model->selectone('tbl_category','parent_category_id','0');*/
    	//$data['subject']=$this->admin_model->selectAll('tbl_category');

        $data['test_type']= $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    //print_r($data['test_type']);exit;
    	$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_plans/plans_add_view',$data);
		$this->load->view('template/adminfooter_category');
    }
    function insert()
    {

    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	
    	$test_type=$this->input->post('test_type');
    	$plan_name=$this->input->post('plan_name');
    	$price_per_test=$this->input->post('price_per_test');
    	$plan_month_duration=$this->input->post('plan_duration');
        if($test_type==3)
        {
            $plan_code='KNOW';
            $type='Knowledge Test';
        }
        if($test_type==4)
        {
            $plan_code='KNOCK';
            $type='Knock Out Test';
        }
        if($test_type==5)
        {
            $plan_code='QUIZ1';
            $type='Quiz Test1';
        }
        if($test_type==6)
        {
            $plan_code='QUIZ2';
            $type='Quiz Test2';
        }
    	
    	
    	
    	$current_date=date('Y-m-d H:i:s');

    	$data = array(

    				'plan_title'=>$plan_name,
    				'plan_code'=>$plan_code,
    				'test_type_id'=>$test_type,
    				'price_per_set'=>$price_per_test,
    				'plan_month_duration'=>$plan_month_duration,
    				'created_by'=>$user_id,
    				'created_on'=>$current_date,
    				
    				);
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->insert('tbl_plan',$data);

    		
    	
    	$this->session->set_flashdata('succ_msg',$type.'Plan added successfully');
    	redirect('index.php/manage_plans/view/','refresh');


    }

    function general_plan_insert()
    {

    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
        $current_date=date('Y-m-d H:i:s');
        $test_type=1;
        $price12=$this->input->post('plan_price12');
        $price1=(float)($price12 / 12);
        //echo $price1.'<br>';

        $tempMod = (float)($price1 / 5);
        $tempMod = ($tempMod - (int)$tempMod)*5;
        $actual_price_per_month=$price1-$tempMod;
        //echo $actual_price_per_month;exit;

        $price9=$actual_price_per_month*9+25;
        $price6=$actual_price_per_month*6+50;
        $price3=$actual_price_per_month*3+100;

        $data_12=array(
            'plan_title'=>'Practice Plan1',
            'plan_code'=>'PRAC12',
            'test_type_id'=>'1',
            'plan_month_duration'=>'12',
            'plan_price'=>$price12,
            'created_by'=>$user_id,
            'created_on'=>$current_date


        );

        $this->db->insert('tbl_plan',$data_12);

          $data_09=array(
            'plan_title'=>'Practice Plan2',
            'plan_code'=>'PRAC09',
            'test_type_id'=>'1',
            'plan_month_duration'=>'9',
            'plan_price'=>$price9,
            'created_by'=>$user_id,
            'created_on'=>$current_date


        );

        $this->db->insert('tbl_plan',$data_09);

        $data_06=array(
            'plan_title'=>'Practice Plan3',
            'plan_code'=>'PRAC06',
            'test_type_id'=>'1',
            'plan_month_duration'=>'6',
            'plan_price'=>$price6,
            'created_by'=>$user_id,
            'created_on'=>$current_date


        );

        $this->db->insert('tbl_plan',$data_06);


        $data_03=array(
            'plan_title'=>'Practice Plan4',
            'plan_code'=>'PRAC03',
            'test_type_id'=>'1',
            'plan_month_duration'=>'3',
            'plan_price'=>$price3,
            'created_by'=>$user_id,
            'created_on'=>$current_date


        );

        $this->db->insert('tbl_plan',$data_03);
    	
    	

    	$this->session->set_flashdata('succ_msg','Practice Plans cAdded successfully');
    	redirect('index.php/manage_plans/general_view/','refresh');


    }

function delete()
{
	$id=$this->uri->segment(3);

	$plans = $this->admin_model->selectOne('tbl_plan','id',$id);

	if(count($plans)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_plan');

				$this->db->where('plan_id',$id);
				$this->db->delete('tbl_plan_details');
				
				$this->session->set_flashdata('succ_msg','Deleted successfully.');
			
			}
			redirect('index.php/manage_plans/view/','refresh');

	
}

function general_delete()
{
	$id=$this->uri->segment(3);

	$plans = $this->admin_model->selectOne('tbl_plan','id',$id);

	if(count($plans)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_plan');

				$this->db->where('plan_id',$id);
				$this->db->delete('tbl_plan_details');
				
				$this->session->set_flashdata('succ_msg','Deleted successfully.');
			
			}
			redirect('index.php/manage_plans/general_view/','refresh');

	
}
function edit()

{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$id = $this->uri->segment(3);
		$data['view']=$this->admin_model->selectOne('tbl_plan','id',$id);
        $data['test_type']= $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		//$data['plan_details'] = $this->admin_model->selectOne('tbl_plan_details','plan_id',$id);

		//echo '<pre>'; print_r($data['plan_details']); exit;
		
		
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_plans/c_plans_edit_view',$data);
		$this->load->view('template/adminfooter_category');
}

function general_edit()

{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$id =$this->uri->segment(3);

        $data['ids']=$id;

        $arr_id=explode('-',$id);

        $plan1_id=$arr_id[0];


		$data['view']=$this->admin_model->selectOne('tbl_plan','id',$plan1_id);
         $data['test_type']= $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		//$data['plan_details'] = $this->admin_model->selectOne('tbl_plan_details','plan_id',$id);
		
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_plans/plans_edit_view',$data);
		$this->load->view('template/adminfooter_category');
}
function update()
{
		$id=$this->input->post('edit_id');

    	
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	$price_per_test=$this->input->post('price_per_test');
    	$test_type_id=$this->input->post('hid_test_type_id');
    	$plan_name=$this->input->post('plan_name');
    	
    	$plan_month_duration=$this->input->post('plan_duration');
    	
    	$current_date=date('Y-m-d H:i:s'); 

        if($test_type_id==3)
        {
            $plan_code='KNOW';
            $type='Knowledge Test';
        }
        if($test_type_id==4)
        {
            $plan_code='KNOCK';
            $type='Knock Out Test';
        }
        if($test_type_id==5)
        {
            $plan_code='QUIZ1';
            $type='Quiz Test1';
        }
        if($test_type_id==6)
        {
            $plan_code='QUIZ2';
            $type='Quiz Test2';
        }
        
                                

    	$data = array(

                    'plan_title'=>$plan_name,
                    'plan_code'=>$plan_code,
                    'test_type_id'=>$test_type_id,
                    'price_per_set'=>$price_per_test,
                    'plan_month_duration'=>$plan_month_duration,
                    'edited_by'=>$user_id,
                    'edited_on'=>$current_date
                    
                    );
        //echo '<pre>'; print_r($data); exit;
      
    	
    	$this->db->where('id',$id);
    	$this->db->update('tbl_plan',$data);

    	

    	$this->session->set_flashdata('succ_msg',$type.'Updated successfully.');
    	redirect('index.php/manage_plans/view/','refresh');

}

function general_update()
{




    	
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}



        $id=$this->input->post('general_edit_id');

        $arr_id=explode('-',$id);

        $current_date=date('Y-m-d H:i:s');
        $test_type=1;
        $price12=$this->input->post('plan_price12');
        $price1=(float)($price12 / 12);
        //echo $price1.'<br>';

        $tempMod = (float)($price1 / 5);
        $tempMod = ($tempMod - (int)$tempMod)*5;
        $actual_price_per_month=$price1-$tempMod;
        //echo $actual_price_per_month;exit;

        $price9=$actual_price_per_month*9+25;
        $price6=$actual_price_per_month*6+50;
        $price3=$actual_price_per_month*3+100;
        $arr_price=array($price12,$price9,$price6,$price3);

        /*print_r($arr_id);
        print_r($arr_price);exit;*/
        for($i=0;$i<count($arr_id);$i++)
        {
            $plan_price=@$arr_price[$i];
            $plan_id=@$arr_id[$i];

            $data_arr=array(
                    'plan_price'=>$plan_price,
                    'edited_by'=>$user_id,
                    'edited_on'=>$current_date

            );
            //print_r($data_arr);
            $this->db->where('id',$plan_id);
            $this->db->update('tbl_plan',$data_arr);
        }
    	
    	
    	$this->session->set_flashdata('succ_msg','Practice Plans Updated Successfully.');
    	redirect('index.php/manage_plans/general_view/','refresh');

}


function change_to_active()
{
	
		$ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($ids);$i++)
		{
			$id=$ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_plan',$data))
			{
				$result=1;
			}
			else
			{
				$result=0;
			}


			}
			
		echo json_encode(array('changedone'=>$result));
		


}

function box_show()
    {
    $id=$this->input->post('num');
    $next=$id+1;
   
    
      ?>
     

              <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Paper / Company<?php echo $id; ?><span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-7">
                    <input type="text" name="plan_per_company[]" id="plan_per_company" class="form-control" placeholder="" value="">
                    
                  </div>

                   <table>
                          <tr>
                              <td>
                                  <?php if($next!=5){ ?><a href="javacript:void(0)" class="btn btn-primary" id="no_<?php echo $next; ?>" onclick="multiple_paper_per_company('<?php echo $next; ?>')">+</a><?php } ?></td>
                              <td>
                                  <a href="javacript:void(0)" class="btn btn-primary" id="minus" onclick="hiding_out('<?php echo $next; ?>');"><b>-</b></a></td>
                          </tr>
                      </table>
                 
              </div>
        <?php
      }
		
		
		
}




