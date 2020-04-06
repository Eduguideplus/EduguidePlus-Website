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
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	//$data['degree']=$this->admin_model->selectAll('tbl_degree');
	$data['plans']= $this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

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
    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	/*$data['category']=$this->admin_model->selectone('tbl_category','parent_category_id','0');*/
    	//$data['subject']=$this->admin_model->selectAll('tbl_category');
    	$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_plans/plans_add_view');
		$this->load->view('template/adminfooter_category');
    }
    function insert()
    {

    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	
    	$plan_title=$this->input->post('plan_name');
    	$paper_per_company=$this->input->post('plan_per_company');
    	$no_of_company=$this->input->post('no_of_company');
    	$plan_month_duration=$this->input->post('plan_duration');
    	$plan_price=$this->input->post('plan_cost');

    	//$total_paper=($no_of_company*$paper_per_company);
    	
    	//$slug=$this->create_slug($class);
    	
    	
    	$current_date=date('Y-m-d H:i:s');

    	$data = array(

    				
    				'plan_title'=>$plan_title,
    				/*'paper_per_company'=>$paper_per_company,*/
    				'no_of_company'=>$no_of_company,
    				'plan_month_duration'=>$plan_month_duration,
    				/*'total_paper'=>$total_paper,*/
    				'plan_price'=>$plan_price,
    				'created_by'=>$user_id,
    				'created_on'=>$current_date,
    				
    				);
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->insert('tbl_plan',$data);

    	$insert_plan_id = $this->db->insert_id();
    	if(count($paper_per_company)>0)
				{
					for($x=0;$x<count($paper_per_company);$x++)
					{
						//echo $image[$x]['product_image'];
						$data1 = array(

													'paper_per_company'=>$paper_per_company[$x],
													'plan_id'=>$insert_plan_id,
																										
													);
						$this->db->insert('tbl_plan_details',$data1);
					}
				}	
    	/*$data1 = array(


    				'paper_per_company'=>$paper_per_company,
    				'plan_id'=>$insert_plan_id,
    				
    				
    				);

    	$this->db->insert('tbl_plan_details',$data1);
*/
    	$this->session->set_flashdata('succ_msg','Added successfully');
    	redirect('index.php/manage_plans/view/','refresh');


    }

function delete()
{
	$id=$this->uri->segment(3);

	$plans = $this->admin_model->selectOne('tbl_plan_details','id',$id);

	if(count($plans)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_plan_details');
				
				$this->session->set_flashdata('succ_msg','Deleted successfully.');
			
			}
			redirect('index.php/manage_plans/view/','refresh');

	
}
function edit()

{
		if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$id =$this->uri->segment(3);
		$data['view']=$this->admin_model->selectOne('tbl_plan_details','id',$id);
		
		
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_plans/plans_edit_view',$data);
		$this->load->view('template/adminfooter_category');
}
function update()
{
		$id=$this->input->post('edit_id');

    	
    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	
    	$plan_title=$this->input->post('plan_name');
    	$paper_per_company=$this->input->post('plan_per_company');
    	$no_of_company=$this->input->post('no_of_company');
    	$plan_month_duration=$this->input->post('plan_duration');
    	$plan_price=$this->input->post('plan_cost');

    	$total_paper=($no_of_company*$paper_per_company);
    	
    	//$slug=$this->create_slug($class);
    	
    	
    	$current_date=date('Y-m-d H:i:s');

    	$data = array(

    				
    				'plan_title'=>$plan_title,
    				'paper_per_company'=>$paper_per_company,
    				'no_of_company'=>$no_of_company,
    				'plan_month_duration'=>$plan_month_duration,
    				'total_paper'=>$total_paper,
    				'plan_price'=>$plan_price,
    				'created_by'=>$user_id,
    				'created_on'=>$current_date,
    				
    				);
    	//echo '<pre>'; print_r($data); exit;
    	
    	$this->db->where('id',$id);
    	$this->db->update('tbl_plan_details',$data);
    	$this->session->set_flashdata('succ_msg','Updated successfully.');
    	redirect('index.php/manage_plans/view/','refresh');

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

			if($this->db->update('tbl_plan_details',$data))
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
                                  <?php if($next!=4){ ?><a href="javacript:void(0)" class="btn btn-primary" id="no_<?php echo $next; ?>" onclick="multiple_paper_per_company('<?php echo $next; ?>')">+</a><?php } ?></td>
                              <td>
                                  <a href="javacript:void(0)" class="btn btn-primary" id="minus" onclick="hiding_out('<?php echo $next; ?>');"><b>-</b></a></td>
                          </tr>
                      </table>
                 
              </div>
        <?php
      }
		
		
		
}




