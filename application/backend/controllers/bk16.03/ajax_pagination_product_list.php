<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ajax_pagination_product_list extends CI_Controller {
	
	 private $username='';
	 private $user_fullname='';
	 private $user_role = 0;
	 private $user_email='';
	 private $user_id = 0;
	 
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
			$this->load->model('admin_model');
			$this->load->model('search_model');
			$this->load->library('datalist');	
			$this->load->model('product_details_model');
			$this->load->model('product_export_model');
			
			
			
			//START LOGIN CHECK++++++++++++++++++++++++++++++++++++++
			$this->session_check_and_session_data->session_check();
			//END LOGIN CHECK++++++++++++++++++++++++++++++++++++++	
			
			$controller_name=$this->router->fetch_class();
            $fetch_method_name=$this->router->fetch_method();
			//START PAGE PERMISSION ++++++++++++++++++++++++++++++++++++++
			$this->user_page_permission_checki_availablity_view_model->user_page_permission_checki_availablity($controller_name);
			//END PAGE PERMISSION ++++++++++++++++++++++++++++++++++++++
	}
	
	
	
	function _remap($method, $params=array())
    {
        $methodToCall = method_exists($this, $method) ? $method : 'index';
        return call_user_func_array(array($this, $methodToCall), $params);
    }
	
	function product_live_search()
	{
		        
				$keyword=$this->input->post('keyword');
				$url=base_url().'index.php/product_list';
				if($keyword)
				{
					$search='&search='.$keyword;
				}
				 
				$page = 1;
				$cur_page =1;
				$page -= 1;
				$per_page = 10;
				$previous_btn = true;
				$next_btn = true;
				$first_btn = true;
				$last_btn = true;
				$start = $page * $per_page;
				
				//$product_list=$this->product_details_model->product_deatails_listing_all($user_id=0,$is_active='',$start,$per_page);
				$product_list=$this->product_details_model->search_algo($keyword,$start,$per_page);
				
				//print_r($product_list);
				
				$data['product_list']=$product_list;
				//START TOTAL PRODUCT COUNT
				$product_list_count=$this->product_details_model->search_algo($keyword,$start1='',$per_page1='');
				$count = count($product_list_count);
				$data['product_list_count']=$count;
				//END TOTAL PRODUCT COUNT
				
				if($count>0)
				{
				/* --------------------------------------------- */
				$no_of_paginations = ceil($count / $per_page);
				/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
				$msg='';
				if ($cur_page >= 7) 
				{
					$start_loop = $cur_page - 3;
					if ($no_of_paginations > $cur_page + 3)
						$end_loop = $cur_page + 3;
					else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
						$start_loop = $no_of_paginations - 6;
						$end_loop = $no_of_paginations;
					} else {
						$end_loop = $no_of_paginations;
					}
				} else {
					$start_loop = 1;
					if ($no_of_paginations > 7)
						$end_loop = 7;
					else
						$end_loop = $no_of_paginations;
				}
				/* ----------------------------------------------------------------------------------------------------------- */
				$msg .= "<div class='pagination1'><ul>";
				
				// FOR ENABLING THE FIRST BUTTON
				if ($first_btn && $cur_page > 1) 
				{
					$msg .= "<a href='$url?page=1&per_page=$per_page$search'><li p='1' class='active'  onclick='page_func(1)'>First</li>";
				} 
				else if ($first_btn) 
				{
					$msg .= "<a href='$url?page=1&per_page=$per_page$search'><li p='1' class='inactive'  onclick='page_func(1)'>First</li></a>";
				}
				
				// FOR ENABLING THE PREVIOUS BUTTON
				if ($previous_btn && $cur_page > 1) {
				$pre = $cur_page - 1;
				$msg .= "<a href='$url?page=1&per_page=$per_page$search'><li p='$pre' class='active'  onclick='page_func($pre)'>Previous</li></a>";
				} else if ($previous_btn) {
				$msg .= "<li class='inactive'>Previous</li>";
				}
				for ($i = $start_loop; $i <= $end_loop; $i++) {
				
				if ($cur_page == $i)
				$msg .= "<a href='$url?page=$i&per_page=$per_page$search'><li p='$i' style='color:#fff;background-color:#2BB34B;' class='active'  onclick='page_func($i)'>{$i}</li></a>";
				else
				$msg .= "<a href='$url?page=$i&per_page=$per_page$search'><li p='$i' class='active'  onclick='page_func($i)'>{$i}</li></a>";
				}
				
				// TO ENABLE THE NEXT BUTTON
				if ($next_btn && $cur_page < $no_of_paginations) {
				$nex = $cur_page + 1;
				$msg .= "<a href='$url?page=$nex&per_page=$per_page$search'><li p='$nex' class='active' onclick='page_func($nex)'>Next</li></a>";
				} else if ($next_btn) {
				$msg .= "<li class='inactive'>Next</li>";
				}
				
				// TO ENABLE THE END BUTTON
				if ($last_btn && $cur_page < $no_of_paginations)
				{
				  $msg .= "<a href='$url?page=$no_of_paginations&per_page=$per_page$search'><li p='$no_of_paginations' class='active'  onclick='page_func($no_of_paginations)'>Last</li></a>";
				} 
				else if ($last_btn)
				{
				   $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
				}
				/*$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
				$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
				$msg = $msg . "</ul>" . $goto . $total_string . "</div>"; */ // Content for pagination
				$data['msg']=$msg;
				
				//echo $this->load->view('manage_stockless/stockless_pagination',$data);
				}
				else
				{
					 
	
				}	
		
				echo $this->load->view('ajax_pagination_product_list',$data);
				//echo  count($count);
			   // print_r( $searchAlgoResult);
	}
	
	
	
}?>