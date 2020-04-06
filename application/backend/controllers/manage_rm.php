<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_rm extends CI_Controller {
	
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
  $this->load->library('excel');
	$this->load->model('login_model');
	$this->load->model('common/common_model');	
	if(get_cookie('session_user_id')=="")
  {
     redirect('index.php/dashboard','refresh');
  }
		
}
public function index()
{
	if(get_cookie('session_user_id')!="")
      {
      	redirect('index.php/dashboard','refresh');
      }
      else
      {
	    $this->load->view('login');	
	}	
	
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

  function checkemail()
      {
          $email=$this->input->post('email');
          $this->db->select('*');
          $this->db->where('login_email',$email);
          //$this->db->where('user_type_id',4);
          $query=$this->db->get('tbl_user');
          if($query->num_rows() > 0)
          {
              $a = 1;
              echo $a;
 

          }
          else
          {
              $a = 2;
              echo $a;
          }
      }


      function checkemail_retailer()
      {
          $email=$this->input->post('email');
          $oldid=$this->input->post('oldid');
          $this->db->select('*');
          $this->db->where('login_email',$email);
          $this->db->where('id !=',$oldid);
       
          $query=$this->db->get('tbl_user');
          if($query->num_rows() > 0)
          {
              $a = 1;
              echo $a;
 

          }
          else
          {
              $a = 2;
              echo $a;
          }
      }

function change_status()
    {
        $id=$this->input->post('id');
        $status= $this->input->post('status');
        //echo $id; exit;
        for($i=0;$i<count($id);$i++)
        {
             $slider_id=$id[$i];
             //echo $slider_id;
             $status_data= array(
                                    'status'=>$status
                                    
                                );
             $this->db->where('id',$slider_id);
            $this->db->update('tbl_user',$status_data);
             
                $result=1;
             
        }
        echo json_encode(array('changedone'=>$result));
    }


   public function get_method()
    {

$payment_method=$this->input->post('payment_method');
$subadmin_id=$this->input->post('subadmin_id');

$all_data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$subadmin_id,'user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$total_client = $this->admin_model->selectOne('tbl_user','user_type_id','6');

if(strlen(count($total_client))==1)
                {
                  $auto_id = 'NF0000'.$subadmin_id;
                }
                if(strlen(count($total_client))==2)
                {
                  $auto_id = 'NF000'.$subadmin_id;
                }
                if(strlen(count($total_client))==3)
                {
                  $auto_id = 'NF00'.$subadmin_id;
                }
                if(strlen(count($total_client))==4)
                {
                  $auto_id = 'NF0'.$subadmin_id;
                }


if($payment_method=='NEFT'){


?>

<div class="form-group">
                  <label for="bank_name" class="col-sm-2 control-label">Bank Name : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Branch Name" value="<?php echo @$all_data[0]->bank_name; ?>" readonly="">
                            
                    
                    
                  </div>
                 
              </div>
 
              <div class="form-group">
                  <label for="account" class="col-sm-2 control-label">Bank A/C No: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-8">
                    <input type="text" name="account" id="account" class="form-control" value="<?php echo @$all_data[0]->bank_account; ?>" placeholder="A/C No" readonly="" >
                    
                </div>
                 
              </div> 


               <div class="form-group">
                  <label for="ifsc" class="col-sm-2 control-label">IFSC Code: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-8">
                    <input type="text" name="ifsc" id="ifsc" class="form-control" value="<?php echo @$all_data[0]->bank_ifsc; ?>" placeholder="IFSC Code" readonly="" >
                    
                </div>
                 
              </div> 

 <div class="form-group">
                  <label for="transact_id" class="col-sm-2 control-label">Transaction Id : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="transact_id" value="<?php echo @$auto_id; ?>" id="transact_id" readonly="" >
                            
                    
                    
                  </div>
                 
              </div>


<?php } 
elseif($payment_method=='Cheque'){


?>


 <div class="form-group">
                  <label for="cheque_no" class="col-sm-2 control-label">Check No : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="cheque_no" id="cheque_no" onkeyup="chk_cheque_no(value)" >
                      <span style="color:red;" id="cheque_no_error" > </span>     
                    
                    
                  </div>
                 
              </div>

 <div class="form-group">
                  <label for="bank_name" class="col-sm-2 control-label">Bank Name : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="bank_name" placeholder="Enter Bank Branch Name" value="<?php echo @$all_data[0]->bank_name; ?>" id="bank_name"  readonly="">
                            
                    
                    
                  </div>
                 
              </div>
 
              <div class="form-group">
                  <label for="account" class="col-sm-2 control-label">Bank A/C No: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-8">
                    <input type="text" name="account" id="account" value="<?php echo @$all_data[0]->bank_account; ?>" class="form-control" placeholder="A/C No" readonly="" >
                    
                </div>
                 
              </div> 


               <div class="form-group">
                  <label for="ifsc" class="col-sm-2 control-label">IFSC Code: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-8">
                    <input type="text" name="ifsc" id="ifsc" class="form-control" value="<?php echo @$all_data[0]->bank_ifsc; ?>" placeholder="IFSC Code" readonly="" >
                    
                </div>
                 
              </div> 


<?php } ?>


 <!-- <div class="form-group">
                  <label for="reciept_number" class="col-sm-2 control-label">Reciept Number : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="reciept_number" id="reciept_number" >
                            
                    
                    
                  </div>
                 
              </div>

            <div class="form-group">
                  <label for="upload_reciept" class="col-sm-2 control-label">Reciept Upload : </label>

                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="upload_reciept" id="upload_reciept" >
            <img id="reciept_pic" src="<?php echo base_url()?>../assets/uploads/no_image.png"  alt=" Image" style="margin-top: 10px;width:90px;height:90px;" />             
                    
                    
                  </div>
                 
              </div>   
 -->
<?php } 


  function check_cheque_no()
  {

    $cheque_no=$this->input->post('cheque_no');

    $cheque_check=$this->common_model->common($table_name = 'tbl_subadmin_payment_history', $field = array(), $where = array('cheque_no'=>$cheque_no), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    if(count($cheque_check) > 0)
    {
      $result['status']=1;
      echo json_encode(array('changedone'=>$result));
    }
    else
    {
      $result['status']=0;
      echo json_encode(array('changedone'=>$result));
    }

  }


    public function question_price_list()
{
  $user_id=$this->uri->segment(3);
  
  //$data['degree']=$this->admin_model->selectAll('tbl_degree_master');

  $data['all_data']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $user_type_id=@$data['all_data'][0]->user_type_id;

 $data['question_data']=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('created_by'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $data['user_type_data']=$this->common_model->common($table_name = 'tbl_user_type', $field = array(), $where = array('id'=>$user_type_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    //$data['all_data']=$this->admin_model->all_master_dist_data_edit($id);

  $data['question_price']=$this->common_model->common($table_name = 'tbl_subadmin_question_add_report
', $field = array(), $where = array('created_by'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');    

   
  $data['subadmin']=$this->common_model->common($table_name = 'tbl_subadmin_payment_history
', $field = array(), $where = array('paid_to_user_name'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');    

  

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_rm/price_list',$data);
    $this->load->view('template/adminfooter_category');
  
}

    public function pre_payment_page()
{


  $user_id=$this->uri->segment(3);

   $data['question_price']=$this->common_model->common($table_name = 'tbl_subadmin_question_add_report
', $field = array(), $where = array('created_by'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');    

 $data['subadmin']=$this->common_model->common($table_name = 'tbl_subadmin_payment_history
', $field = array(), $where = array('paid_to_user_name'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
  //$data['degree']=$this->admin_model->selectAll('tbl_degree_master');

  // $data['all_data']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   
    //$data['all_data']=$this->admin_model->all_master_dist_data_edit($id);

  
    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_rm/payment_page',$data);
    $this->load->view('template/adminfooter_category');
  
}



public function insert_paid_amount()
{


  $user_id=get_cookie('session_user_id');
  
  
$available_amount=$this->input->post('payble_amount');
$paid_amount=$this->input->post('paid_amount');
$payment_method=$this->input->post('payment_method');
$reciept_number=$this->input->post('reciept_number');
// $upload_reciept=$this->input->post('upload_reciept');
$cheque_no=$this->input->post('cheque_no');
$bank_name=$this->input->post('bank_name');
$account=$this->input->post('account');
$ifsc=$this->input->post('ifsc');

$transact_id=$this->input->post('transact_id');
$subadmin_id=$this->input->post('subadmin_id');

                  $this->db->select('*');
                  $this->db->from('tbl_user');
                  $this->db->where('id',$subadmin_id);
                  $query=$this->db->get();
                  $user_details=$query->result();


if(@$_FILES['upload_reciept']['name']=="")
        {
            $receipt_file="";
            
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['upload_reciept']['tmp_name'];
            $file = $_FILES['upload_reciept']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png"|| $ext == "jpg" || $ext == "jpeg")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/subadmin_reciept/" . $new_name . "." . $ext);
                $receipt_file = $new_name . "." . $ext;
               
                      

            }
            else
            {
                $this->session->set_flashdata('image_error','please upload an image..!');
                redirect('index.php/home','refresh');
            }
        }
// echo $user_details[0]->user_name;


$data_arr=array(

               'paid_to_user_name'=>@$subadmin_id,
               'paid_amount'=>$paid_amount,
               'payment_method'=>$payment_method,
               'receipt_number'=>@$reciept_number,
               'receipt_file'=>@$receipt_file,
               'bank_account_number'=>@$account,
               'bank_ifsc_code'=>@$ifsc,
               'cheque_no'=>@$cheque_no,
               'bank_name'=>@$bank_name,
               'transaction_id'=>@$transact_id,
               'payment_date'=>date('Y-m-d H:i:s'),
               'payment_month'=>date('m'),
               'payment_year'=>date('Y'),
               'payment_by'=>$user_id

               );


// print_r($data_arr);

  $this->db->insert('tbl_subadmin_payment_history',$data_arr);
redirect('index.php/manage_rm/question_price_list/'.$subadmin_id,'refresh');
}


public function view_rm()
{
	//$data['degree']=$this->admin_model->selectAll('tbl_degree_master');

	$data['all_data']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



  
    
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_rm/rm_view',$data);
		$this->load->view('template/adminfooter_category');
	
}


public function rm_detail_view()
{
  $id = $this->uri->segment(3);
 // $data['all_details']= $this->admin_model->selectOne('tbl_application','application_id',$r_id);

 $data['all_data']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


 /*$data['fees']=$this->admin_model->selectOne('tbl_user_type','id','4');
// print_r($data['fees']);exit;
    $data['address_data']=$this->admin_model->selectOne('tbl_user_address','user_id',$id);
   
    $data['level_data']=$this->admin_model->selectOne('tbl_user_level','user_id',$id);

  $data['kyc_data']=$this->admin_model->selectOne('tbl_user_kyc','user_id',$id);*/


  $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
 $this->load->view('manage_rm/rm_detail_view',$data);
    $this->load->view('template/adminfooter_category');
}


public function add_rm()
{
		

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_rm/rm_add');
		$this->load->view('template/adminfooter_category');
}



function random_generator($log_email,$id,$name)
{
      $time=time();

      $f3= substr($name, 0, 3);
      
      $all_char='0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z';
      $name_arr=explode(",",$all_char);
      shuffle($name_arr);
      $rand_name = '';
      
      for ($i = 0; $i<4; $i++) 
      {
        $indx=mt_rand(0,35);
        $rand_name .= @$name_arr[$indx];
          
         
      }  

      $eml = $log_email;
      $sum_eml = 0;

      $split_eml = str_split($eml);
      foreach($split_eml as $item){
      $sum_eml += ord($item);

      }
     
      $make_name=strtoupper($f3).$id.$sum_eml.$rand_name;

    

      return $make_name;


}



public function rm_add_action()
{
		$created_by = get_cookie('session_user_id');
		$fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    $user_name=$fname.' '.$lname;
		$email = $this->input->post('email');
		$dob = $this->input->post('dob');
		$mobile = $this->input->post('mobile');
		$user_code = "USER-000".rand(00000,99999);
		//$reference_id = "SUB ADM".rand(00000,99999);

     $bank_name = $this->input->post('bank_name');
      $bank_ifsc = $this->input->post('ifsc');
       $bank_account = $this->input->post('account');
		$password = mt_rand();

      $house = $this->input->post('house');
      $street = $this->input->post('street');
      $location = $this->input->post('location');
      $pin = $this->input->post('pin');
      $city = $this->input->post('city');
      $state = $this->input->post('state');
      $country = $this->input->post('country');

      $full_add=@$house.', '.@$street.', '.$location.', '.$city.', '.$state.', '.$country.', '.$pin;
		if($_FILES['event_image']['name']==NULL)

         {
             $image=NULL;
         }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['event_image']['tmp_name'];
            $file = $_FILES['event_image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "gif" || $ext == "jpg" || $ext == "jpeg")
            {
               
              
              

                move_uploaded_file($file_tmp, "../assets/uploads/profile_image/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;

                $config['image_library'] = 'gd2';
                $config['source_image'] = '../assets/uploads/profile_image/' . $image;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = "100%";
               
    
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = '../assets/uploads/profile_image/'.$image;
                $config['quality'] = "100%";
                $config['width'] = 100;
                $config['height']= 100;
                $config['master_dim'] ="height" ;

               $this->image_lib->initialize($config);
               $this->image_lib->resize(); 
               $this->image_lib->clear();
                      
            
            } }


            $basic_data = array(
                        'user_type_id'=>'6',
                        'role_id'=>'5',
                        'user_name'=>$user_name,
                       
                        'login_email'=>$email,
                        'dob'=>$dob,
                        'login_mob'=>$mobile,
                        'profile_photo'=>$image,

                        'bank_name'=>$bank_name,
                        'bank_ifsc'=>$bank_ifsc,
                        'bank_account'=>$bank_account,
                        'login_pass'=>$password,
                        'user_code'=>$user_code,
                        'user_address'=>$full_add,
                        'status'=>'Active',
                        'created_by'=>$created_by,
                        'created_on'=>date('Y-m-d,H:i:s')
                        
                    );

           //echo '<pre>'; print_r($basic_data);
           //exit;
            $this->db->insert('tbl_user',$basic_data);

            $user_id = $this->db->insert_id();

            //echo $user_id; exit;
            /*$login_id=$this->random_generator($email,$user_id,$name);
            $up_arr=array('login_id'=>$login_id);
            $this->db->where('id',$user_id);
            $this->db->update('tbl_user',$up_arr);*/



         


    


       


          
	

		/*$data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		                $admin_recive=$data['email'][0]->recieve_email;
                    $admin_from=$data['email'][0]->from_email;
                   
                
                    $email_data['mail_data']=array
                    (
                       'uname'=>$name,
                       // 'ulname'=>$l_name,
                        'uemail'=> $email,
                        //'ucode'=> $user_code,
                       	'ulogin'=>$login_id,
                        'upass'=>$password,
                        'ureference'=>$reference_id
                        
                    );


                    // print_r($email_data['mail_data']);exit;
                    $this->email->set_mailtype("html");

                   // $html_email_user = $this->load->view('mail_template/admin_enquiry_registration_mail',$email_data, true);
                    $send_user_mail_html=$this->load->view('mail_template/registration_rm_reply_mail_view',$email_data, true);

                     $send_admin_mail_html=$this->load->view('mail_template/registration_rm_admin_mail_view',$email_data, true);


                   //print_r($send_user_mail_html );exit;

                    $this->email->from($admin_from,'Digital Bharat');
                    $this->email->to($email);
               		  $this->email->subject('Reply from Digital Bharat');
                    $this->email->message($send_user_mail_html);
                    @$reponse_reply=$this->email->send();


                    $this->email->from($admin_from,'Digital Bharat');
                    $this->email->to($admin_recive);
                    $this->email->subject('Reply from Digital Bharat');
                    $this->email->message($send_admin_mail_html);
                    @$reponse_reply=$this->email->send();

                      $this->session->set_flashdata('succ_msg','');*/
                      $this->session->set_flashdata('succ_msg','Sub Admin added successfully');
		                  redirect('index.php/manage_rm/view_rm/','refresh');



}



public function edit_rm()
{
		$id= $this->uri->segment(3);

		
		//$data['all_data']=$this->admin_model->all_master_dist_data_edit($id);
    $data['all_data']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


  


   // print_r( $data['all_data']);exit;

  
  //$data['address_data']=$this->admin_model->selectOne('tbl_user_address','user_id',$id);
  //$data['kyc']=$this->admin_model->selectOne('tbl_user_kyc','user_id',$id);
  

  //$data['kyc_data']=$this->admin_model->selectOne('tbl_user_kyc','user_id',$id);

		
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_rm/rm_edit',$data);
		$this->load->view('template/adminfooter_category');
		
}


public function rm_update_action()
{

		$id = $this->input->post('oldid');

		//echo $id; exit;
		$parent_id = get_cookie('session_user_id');
		$fname = $this->input->post('fname');
    //$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$dob = $this->input->post('dob');
		$mobile = $this->input->post('mobile');
    $address = $this->input->post('address');

     $bank_name = $this->input->post('bank_name');
      $bank_ifsc = $this->input->post('ifsc');
       $bank_account = $this->input->post('account');
		/*$user_code = "USER000".rand(00000,99999);
		$reference_id = "MD".rand(00000,99999);
		$password = mt_rand();*/
		if($_FILES['event_image']['name']==NULL)

         {
             $image=$this->input->post('old_image');
            
         }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['event_image']['tmp_name'];
            $file = $_FILES['event_image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "gif" || $ext == "jpg" || $ext == "jpeg")
            {
               
              
                $image=$this->input->post('old_image');
                @unlink('../assets/uploads/profile_image/'.$image);

                move_uploaded_file($file_tmp, "../assets/uploads/profile_image/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;

                $config['image_library'] = 'gd2';
                $config['source_image'] = '../assets/uploads/profile_image/' . $image;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = "100%";
               
    
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = '../assets/uploads/profile_image/'.$image;
                $config['quality'] = "100%";
                $config['width'] = 100;
                $config['height']= 100;
                $config['master_dim'] ="height" ;

               $this->image_lib->initialize($config);
               $this->image_lib->resize(); 
               $this->image_lib->clear();
                      
            
            } }


            $basic_data = array(
                        'user_type_id'=>'6',
                        'role_id'=>'5',
                        'user_name'=>$fname,
                        
                        'login_email'=>$email,
                        'dob'=>$dob,
                        'login_mob'=>$mobile,
                        'profile_photo'=>$image,

                        'bank_name'=>$bank_name,
                        'bank_ifsc'=>$bank_ifsc,
                        'bank_account'=>$bank_account,
                        'user_address'=>$address,
                        
                        'modified_by'=>$parent_id,
                        'modified_on'=>date('Y-m-d')
                        
                    );

            //echo '<pre>'; print_r($basic_data);
            $this->db->where('id',$id);
            $this->db->update('tbl_user',$basic_data);

            //$user_id = $this->db->insert_id();
           


      
		$this->session->set_flashdata('succ_update','Sub Admin updated successfully');
		redirect('index.php/manage_rm/view_rm/','refresh');



}
function change_to_active()
{
  
    $cat_ids=$this->input->post('catid');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($cat_ids);$i++)
    {
      $id=$cat_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_user',$data))
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


public function delete_rm()
{
    $id=$this->uri->segment(3);
    // echo $id; exit;
    $data=$this->admin_model->selectOne('tbl_user','id',$id);
   /* $address_data=$this->admin_model->selectOne('tbl_user_address','user_id',$id);
    $kyc=$this->admin_model->selectOne('tbl_user_kyc','user_id',$id);
    $level=$this->admin_model->selectOne('tbl_user_level','user_id',$id);
    $service=$this->admin_model->selectOne('tbl_user_service','id',$id);*/
    // print_r($discount); exit;

    if(count($data)!=0)
            {
            $this->db->where('id',$id);
            $this->db->delete('tbl_user');

            

            /*$this->db->where('user_id',$id);
            $this->db->delete('tbl_user_level');*/

            /*$this->db->where('user_id',$id);
            $this->db->delete('tbl_user_service');*/

            }
    if(count($data)>0)
    {
      
           @unlink('../assets/upload/profile_image/'.$data[0]->profile_photo);
                                                                                                                                                                                
                            
                     
    }
            
                
    $this->session->set_flashdata('succ_delete','Sub Admin deleted successfully');    
    redirect('index.php/manage_rm/view_rm/','refresh');


}






}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */