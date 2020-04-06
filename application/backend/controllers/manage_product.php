<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_product extends CI_Controller {
	
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
	//$this->load->model('login_model');	
		
}

public function product_view()
{
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['product']=$this->admin_model->selectAll('tbl_product');


	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_product/product_table_view',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
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
    function add_product()
    {
    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	$data['category']=$this->admin_model->selectone('tbl_category','parent_category_id','0');
    	//$data['size']=$this->admin_model->selectAll('tbl_size');
    	$data['size']=$this->admin_model->selectone('tbl_size','status','active');

    	$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_product/product_add_view',$data);
		$this->load->view('template/adminfooter_category');
    }

    function file_box_show()
    {
    $id=$this->input->post('num');
    $next=$id+1;
      ?>
       <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Image<?php echo $id; ?></label>

                  <div class="col-sm-10">
                      <input type="file" name="picture[]" id="pic_<?php echo $id; ?>" value=""><b>(Dimension: 664 X 820 Pixel)</b>
                      <table>
                          <tr>
                              <td><?php if($next!=5){ ?><a href="javacript:void(0)" class="btn btn-primary" id="no_<?php echo $next; ?>" onclick="produce_file_box('<?php echo $next; ?>')">+</a><?php } ?></td>
                              
                              <td><span style="padding-right:20px;"></span></td>
                              
                              <td><a href="javacript:void(0)" class="btn btn-primary" id="minus" onclick="hiding_out('<?php echo $next; ?>')"><b>-</b></a></td>
                          </tr>
                      </table>
                       </div>
                 
                </div>
        <?php
      }

    function subcategory_show()
    {
      $id=$this->input->post('id');
      $data=$this->admin_model->selectOne('tbl_category','parent_category_id',$id);
      
      for($i=0;$i<count($data);$i++)
      {
        ?>

        <option value="<?php echo $data[$i]->category_id; ?>"><?php echo $data[$i]->category_name;?></option>
        <?php
      }
    

    }
    
    function product_insert()
    {
    	
//echo 'hh'; exit;

    	$cat_id=$this->input->post('category');
    	$sub_cat_id=$this->input->post('s_cate');
    	$p_name=$this->input->post('p_name');
    	$price=$this->input->post('price');
    	$discount=$this->input->post('discount');
    	$quantity=$this->input->post('qnty');
    	$features=$this->input->post('features');
    	$details=$this->input->post('details');
    	$p_info=$this->input->post('p_info');
    	$f_quality=$this->input->post('f_quality');
    	$p_sku=$this->input->post('p_sku');

    	$meta_title=$this->input->post('meta_title');
    	$meta_key=$this->input->post('meta_key');
    	$meta_desc=$this->input->post('meta_desc');
    	
    	$slug=$this->create_slug($p_name);
    	//echo $slug; exit;
    	$pro_image= $this->image_upload();
    	
    	$current_date=date('Y-m-d H:i:s');
    	$data= array(
    			'category_id'=>$cat_id,
    			'sub_cate_id'=>$sub_cat_id,
    			'p_name'=>$p_name,
    			'price'=>$price,
    			'discount'=>$discount,
    			'p_quantity'=>$quantity,
    			'fabric_quality'=>$f_quality,
    			'meta_title'=>$meta_title,
    			'meta_keyword'=>$meta_key,
    			'meta_description'=>$meta_desc,
    			'p_sku'=>$p_sku,
    			'p_features'=>$features,
    			'p_details'=>$details,
    			'p_info'=>$p_info,
    			'slug'=>$slug,
    			'created_date'=>$current_date);


    	$this->db->insert('tbl_product',$data);

    	//-----------------------------IMAGE INSERT-----------------------------------------------//
    	$product_id = $this->db->insert_id();

    	if(count($pro_image)>0)
				{
					for($x=0;$x<count($pro_image);$x++)
					{
						//echo $image[$x]['product_image'];
						$product_image_array = array(

													'product_id'=>$product_id,
													'image'=>$pro_image[$x]['product_image'],
																										
													);
						$this->db->insert('tbl_product_image',$product_image_array);
					}
				}	

		//------------------------------------SIZE ADD-------------------------------------------//			
        $size_id = $this->input->post('size');
        //print_r($size_id); exit;
        if(count($size_id)>0)
        {
        	for($x=0;$x<count($size_id);$x++)
					{
						
						$product_size_array = array(
													'product_id'=>$product_id,
													'size_id'=>$size_id[$x],
													'pro_category_id'=>$cat_id,
													'pro_subcate_id'=>$sub_cat_id													
												);
						$this->db->insert('tbl_product_size',$product_size_array);
					}
        }



    	$this->session->set_flashdata('succ_add','One Product added successfully');
    	redirect('index.php/manage_product/product_view/','refresh');


    }

    function image_upload()
	{
		//echo $abc;exit;
		$this->load->library('upload');		
		//print_r($_FILES['picture']['name']);exit;	
		$files = $_FILES;
		$cpt = count($_FILES['picture']['name']);
		$count = 0;
		$image_array = array();
		for($i=0; $i<$cpt; $i++)
		{	
			$_FILES['userfile']['name']= $files['picture']['name'][$i];
        	$_FILES['userfile']['type']= $files['picture']['type'][$i];
        	$_FILES['userfile']['tmp_name']= $files['picture']['tmp_name'][$i];
        	$_FILES['userfile']['error']= $files['picture']['error'][$i];
        	$_FILES['userfile']['size']= $files['picture']['size'][$i];    

        	$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload())
			{
				$file_info = $this->upload->data();
				//echo '<pre>';print_r($file_info); exit;
				$img_config_4['image_library'] = 'gd2';
				$img_config_4['source_image'] = '../assets/uploads/product/'.$file_info['orig_name'];
				$img_config_4['create_thumb'] = FALSE;
				$img_config_4['maintain_ratio'] = FALSE;
				$img_config_4['width'] = 332;
		   		$img_config_4['height']= 410;
				$img_config_4['new_image'] ='../assets/uploads/product/large/'.$file_info['orig_name'];
				//echo '<pre>';print_r($img_config_4); exit;
				//$image_config['quality'] = "100%";
				//$image_config['master_dim'] = "height";
				$this->image_lib->initialize($img_config_4);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
		   

				$img_config_4['image_library'] = 'gd2';
				$img_config_4['source_image'] = '../assets/uploads/product/'.$file_info['orig_name'];
				$img_config_4['create_thumb'] = FALSE;
				$img_config_4['maintain_ratio'] = FALSE;
				$img_config_4['width']	= 664;
				$img_config_4['height']	= 820;
				$img_config_4['new_image'] ='../assets/uploads/product/'.$file_info['orig_name'];
				//echo '<pre>';print_r($img_config_4);
				//$image_config['quality'] = "100%";
                //$img_config_4['master_dim'] = "height";
				$this->image_lib->initialize($img_config_4);
				$this->image_lib->resize();

				$this->image_lib->initialize($img_config_4);
				$this->image_lib->resize();
				$this->image_lib->clear();

			
				
				//echo '<pre>';print_r($file_info);
				$image_array[$count]['product_image'] = $file_info['orig_name'];
				$count++;
			}
		}	

		
		//echo '<pre>';print_r($image_array);
		//exit;
		return $image_array;      
	}

    private function set_upload_options()
	{   
    //upload an image options
    	$new_name = str_replace(".","",microtime());						
		$config['upload_path'] ='../assets/uploads/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';				
		$config['file_name']=$new_name;
		
		//echo '<pre>';print_r($config);exit;
		
    	return $config;
	}   

function delete_product()
{
	$id=$this->uri->segment(3);
//echo $id; exit;
	$data=$this->admin_model->selectOne('tbl_product','product_id',$id);
	$size=$this->admin_model->selectOne('tbl_product_size','product_id',$id);
	$image=$this->admin_model->selectOne('tbl_product_image','product_id',$id);
	if(count($data)!=0)
			{
			$this->db->where('product_id',$id);
			$this->db->delete('tbl_product');

			$this->db->where('product_id',$id);
			$this->db->delete('tbl_product_size');

			$this->db->where('product_id',$id);
			$this->db->delete('tbl_product_image');

			}
	if(count($image)>0)
	{
		for($x=0;$x<count($image);$x++)
						{
						
							@unlink('../assets/uploads/product/'.$image[$x]->image);
							@unlink('../assets/uploads/product/large/'.$image[$x]->image);
																																														
							
						}
	}
			
				
	$this->session->set_flashdata('succ_delete','One Product deleted successfully');
	
	redirect('index.php/manage_product/product_view/','refresh');

}
function edit_product()

{
		if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$product_id=$this->uri->segment(3);
		$data['product']=$this->admin_model->selectOne('tbl_product','product_id',$product_id);
		$cat_id = $data['product'][0]->category_id;
		$data['size']=$this->admin_model->selectAll('tbl_size');
		$data['edit_size']=$this->admin_model->selectOne('tbl_product_size','product_id',$product_id);
		$data['cat']=$this->admin_model->selectOne('tbl_category','parent_category_id','0');

		$data['sub_cat']=$this->admin_model->selectOne('tbl_category','parent_category_id',$cat_id);

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_product/product_edit_view',$data);
		$this->load->view('template/adminfooter_category');
}
function update_product()
{
		$pro_id=$this->input->post('p_id');

		$cat_id=$this->input->post('category');
    	$sub_cat_id=$this->input->post('s_cate');
    	$p_name=$this->input->post('p_name');
    	$price=$this->input->post('price');
    	$discount=$this->input->post('discount');
    	$quantity=$this->input->post('qnty');
    	$features=$this->input->post('features');
    	$details=$this->input->post('details');
    	$p_info=$this->input->post('p_info');
    	$f_quality=$this->input->post('f_quality');
    	$p_sku=$this->input->post('p_sku');

    	$meta_title=$this->input->post('meta_title');
    	$meta_key=$this->input->post('meta_key');
    	$meta_desc=$this->input->post('meta_desc');

    	$slug=$this->create_slug($p_name);
    	$current_date=date('Y-m-d H:i:s');

    	$data= array(
    			'category_id'=>$cat_id,
    			'sub_cate_id'=>$sub_cat_id,
    			'p_name'=>$p_name,
    			'price'=>$price,
    			'discount'=>$discount,
    			'p_quantity'=>$quantity,
    			'fabric_quality'=>$f_quality,
    			'meta_title'=>$meta_title,
    			'meta_keyword'=>$meta_key,
    			'meta_description'=>$meta_desc,
    			'p_sku'=>$p_sku,
    			'p_features'=>$features,
    			'p_details'=>$details,
    			'p_info'=>$p_info,
    			'slug'=>$slug,
    			'edited_date'=>$current_date);

    	$this->db->where('product_id',$pro_id);
    	$this->db->update('tbl_product',$data);

    	$size_array = $this->input->post('size');
    	$size = $this->admin_model->selectOne('tbl_product_size','product_id',$pro_id);
    	if(count($size)>0)
    	{

    		$this->db->where('product_id',$pro_id);

			$this->db->delete('tbl_product_size');

    		
        	if(count($size_array)>0)
        	{
        		for($x=0;$x<count($size_array);$x++)
						{
						
							$product_size_array = array(
													'product_id'=>$pro_id,
													'size_id'=>$size_array[$x],
													'pro_category_id'=>$cat_id,
													'pro_subcate_id'=>$sub_cat_id													
												);
							$this->db->insert('tbl_product_size',$product_size_array);
						}
        	}
        }

        else
        {
        	
        	if(count($size_array)>0)
        	{
        		for($x=0;$x<count($size_array);$x++)
						{
						
							$product_size_array = array(
													'product_id'=>$pro_id,
													'size_id'=>$size_array[$x],
													'pro_category_id'=>$cat_id,
													'pro_subcate_id'=>$sub_cat_id													
												);
							$this->db->insert('tbl_product_size',$product_size_array);
						}
        	}
        }
    	$this->session->set_flashdata('succ_update','One product updated successfully');
    	redirect('index.php/manage_product/product_view/','refresh');

}

function change_to_active()
{
	
		$pro_ids=$this->input->post('pid');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($pro_ids);$i++)
		{
			$id=$pro_ids[$i];
			$this->db->where('product_id',$id);

			if($this->db->update('tbl_product',$data))
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



	public function product_image_view()
	{
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$product_id=$this->uri->segment(3);
		$data['product_image']=$this->admin_model->selectOne('tbl_product_image','product_id',$product_id);
		//print_r($data['product']); exit;

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_product/product_image_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
	}

	public function delete_product_image()
	{
		if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$pro_image_id = $this->uri->segment(3);
		$data['product_id']=$this->admin_model->selectOne('tbl_product_image','pro_image_id',$pro_image_id);
		$product_id = $data['product_id'][0]->product_id;
		$product_image = $data['product_id'][0]->image;
		//echo $product_image; exit;
		$this->db->where('pro_image_id',$pro_image_id);
		$this->db->delete('tbl_product_image');

		@unlink('../assets/uploads/product/'.$product_image);
		@unlink('../assets/uploads/product/large/'.$product_image);

		$this->session->set_flashdata('succ_update','One Product Image deleted successfully');
    	redirect('index.php/manage_product/product_image_view/'.$product_id,'refresh');


	}

	public function product_image_add_view()
	{
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		
		//print_r($data['product']); exit;

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_product/product_image_add_view');
	$this->load->view('template/adminfooter_category');
	
	
	}

	public function product_image_submit()
	{
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$product_id = $this->input->post('pro_id');
		
	$image=NULL;

		if(($_FILES['image']['name'])!='')
		  {
		  $new_name =time();      
		  $config['upload_path'] ='../assets/uploads/product/';
		  $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
		  $config['file_name']=$new_name; 
		  
		    
		  $this->load->library('upload', $config);  
		  //==========end:resize body_part image======================   
		  $field_name = "image"; 
		      
		  $image=NULL;   
		  if($this->upload->do_upload($field_name))
		  { 
		    
		   $file_info = $this->upload->data();
		   $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
		   $file_size=$file_info['file_size'];
		   $this->image_lib->clear();     
		   $image =$file_info['raw_name'].$file_info['file_ext']; 
		    
		  
		  // $new_image_name='thumb_'.$file_info['raw_name'].$file_info['file_ext'];
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='../assets/uploads/product/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		  	$image_config['new_image'] = '../assets/uploads/product/large/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 332;
		   $image_config['height']= 410;
		   
		   $image_config['master_dim'] = "height";
		   $this->image_lib->initialize($image_config);
		   $this->image_lib->resize(); 
		   $this->image_lib->clear();

		   //$image='large_'.$file_info['raw_name'].$file_info['file_ext'];
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='../assets/uploads/product/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		   $image_config['new_image'] = '../assets/uploads/product/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 664;
		   $image_config['height']= 820;
		   
		   $image_config['master_dim'] = "height";
		   $this->image_lib->initialize($image_config);
		   $this->image_lib->resize(); 
		   $this->image_lib->clear();
		  } //end if
		}

		$data = array(	'product_id'=>$product_id,
						'image'=>$image );

		$this->db->insert('tbl_product_image',$data);

		$this->session->set_flashdata('succ_update','One Product Image added successfully');
    	redirect('index.php/manage_product/product_image_view/'.$product_id,'refresh');
	
	}


public function product_image_edit_view()
	{
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		
		$pro_image_id = $this->uri->segment(3);
		$data['image'] = $this->admin_model->selectOne('tbl_product_image','pro_image_id',$pro_image_id);

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_product/product_image_edit_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
	}

	public function product_image_update()
	{
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$pro_image_id = $this->input->post('pro_image_id');
		$old_image = $this->input->post('old_image');
		//echo $pro_image_id; exit;
		
	$image=NULL;

		if(($_FILES['image']['name'])!='')
		  {
		  $new_name =time();      
		  $config['upload_path'] ='../assets/uploads/product/';
		  $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
		  $config['file_name']=$new_name; 
		  
		    
		  $this->load->library('upload', $config);  
		  //==========end:resize body_part image======================   
		  $field_name = "image"; 
		      
		  $image=NULL;   
		  if($this->upload->do_upload($field_name))
		  { 
		    
		   $file_info = $this->upload->data();
		   $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
		   $file_size=$file_info['file_size'];
		   $this->image_lib->clear();     
		   $image =$file_info['raw_name'].$file_info['file_ext']; 
		    
		  
		  // $new_image_name='thumb_'.$file_info['raw_name'].$file_info['file_ext'];
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='../assets/uploads/product/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		  $image_config['new_image'] = '../assets/uploads/product/large/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 332;
		   $image_config['height']= 410;
		   
		   $image_config['master_dim'] = "height";
		   $this->image_lib->initialize($image_config);
		   $this->image_lib->resize(); 
		   $this->image_lib->clear();

		   //$image='large_'.$file_info['raw_name'].$file_info['file_ext'];
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='../assets/uploads/product/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		   $image_config['new_image'] = '../assets/uploads/product/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 664;
		   $image_config['height']= 820;
		   
		   $image_config['master_dim'] = "height";
		   $this->image_lib->initialize($image_config);
		   $this->image_lib->resize(); 
		   $this->image_lib->clear();
		  } //end if
		}

		if($image=='')
		{
			$image= $old_image;
		}
		else{

			@unlink('../assets/uploads/product/'.$old_image);
			@unlink('../assets/uploads/product/large/'.$old_image);
			
		}

		//echo $image; exit;
		$data = array(	'pro_image_id'=>$pro_image_id,
						'image'=>$image );

		$this->db->where('pro_image_id',$pro_image_id);
		$this->db->update('tbl_product_image',$data);


		$data['product'] = $this->admin_model->selectOne('tbl_product_image','pro_image_id',$pro_image_id);
		$product_id = $data['product'][0]->product_id;

		//echo $product_id; exit;
		

		$this->session->set_flashdata('succ_update','One Product Image updated successfully');
    	redirect('index.php/manage_product/product_image_view/'.$product_id,'refresh');
	
	}

public function dispatch_action()
{
	$order_id= $this->input->post('dispatch_order_id'); 
	$dispatch_order_status= $this->input->post('dispatch_order_status');
	$flight_no= $this->input->post('flight_no'); 
	$loading_port= $this->input->post('loading_port');

	$dischrge_port= $this->input->post('dischrge_port'); 
	$origin_country= $this->input->post('origin_country');
	$desti_country= $this->input->post('desti_country'); 
	$no_of_package= $this->input->post('no_of_package'); 
	$container_no= $this->input->post('container_no');

	$update_data=array(
						'order_status'=>$dispatch_order_status
						);

	$this->db->where('order_id', $order_id);
	$this->db->update('tbl_order', $update_data);

	$insert_data= array(
						'flight_no'=>$flight_no,
						'loading_port'=>$loading_port,
						'dischrge_port'=>$dischrge_port,
						'origin_country'=>$origin_country,
						'desti_country'=>$desti_country,
						'no_of_package'=>$no_of_package,
						'container_no'=>$container_no,
						'dispatch_order_id'=>$order_id

						);

	$this->db->insert('tbl_dispatched_orders', $insert_data);

	$this->session->set_flashdata('succ_update','Status changed successfully');
	redirect('index.php/manage_order','refresh');
}

}




