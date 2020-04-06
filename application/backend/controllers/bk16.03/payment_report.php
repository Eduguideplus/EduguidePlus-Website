<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payment_report extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	 
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');
	$this->load->model('admin_model');

	
		
}

public function payment_report_view()
{
	
	    if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

	$data['payment_report']=$this->admin_model->selectAll('tbl_user_payment_report');

	$this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
	$this->load->view('payment_report/payment_report_table',$data);
	$this->load->view('template/adminfooter_category');
    
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}


public function export_csv()
    {
        $start_date = $this->input->post('from_date');
        $end_date = $this->input->post('to_date');
      $pickupdate1=date("Y-m-d", strtotime($start_date) ); 
      $pickupdate2=date("Y-m-d", strtotime($end_date) ); 


      $booking_list= $this->admin_model->payment_export($pickupdate1, $pickupdate2);

     // echo '<pre>'; print_r($booking_list); exit;

          header("Content-type: text/csv");
          header("Content-Disposition: attachment; filename=Your_Success_Portal_Report.csv");
          
         
        //print_r($order_details_csv);exit;

           $output = fopen('php://output', 'w');

          fputcsv($output, array('User Name','Payment Amount ( Rs. )','Payment For', 'Paid On'));
$count=0;
          foreach($booking_list as $row)
      {
        
       
        
        fputcsv($output, array("User Name" => $row->user_name,
          "Payment Amount ( Rs. )"=>@$row->payment_amount, 
          "Payment For" => $row->payment_for, 
          "Paid On" =>date('d-M-y, H:i:s', strtotime($row->payment_done_on)),
           ));
        
        
        $count++;
      
      }
      
        
        
        
        
        exit;
      $data = $productStrFieldValue;
    
       
   
   
   
   
       
      
        $flag = false;
        foreach($data as $row) 
        {
        if(!$flag) 
        {
          // display field/column names as first row
          echo implode("\t", array_keys($row)) . "\n";
          $flag = true;
        }
        array_walk($row, array($this, 'cleanData'));
        //array_walk($row, $this->cleanData());
        echo implode("\t", array_values($row)) . "\n";
        }
      
        exit;
          

      
            

   


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

            if($this->db->update('tbl_user_payment_report',$data))
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

}
