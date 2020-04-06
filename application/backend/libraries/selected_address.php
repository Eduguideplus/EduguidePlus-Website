<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class selected_address {
	
	
	function statelist($id,$where)
	{
		$CI=& get_instance();
		$str='';
		$statelist=$CI->front_model->selectWhere('tbl_state',$where);
		foreach($statelist as $row)
		{
			$str.='<option value="'.$row->state_id.'"';
			if($id == $row->state_id)
			{
				$str.=' selected="selected" ';
			}
			$str.='>'.$row->state_name.'</option>';
		}
		
		return $str;
	}
	
	
	function citylist($id)
	{
		$CI=& get_instance();
		$str='';
		$citylist=$CI->front_model->selectAll('tbl_city');
		foreach($citylist as $row)
		{
			$str.='<option value="'.$row->city_id.'"';
			if($id == $row->city_id)
			{
				$str.=' selected="selected" ';
			}
			$str.='>'.$row->city_name.'</option>';
		}
		return $str;
	}
	
	
	
	
		
	function arealist($id,$where)
	{
		$CI=& get_instance();
		$str='';
		$arealist=$CI->front_model->selectWhere('tbl_area',$where);
		foreach($arealist as $row)
		{
			$str.='<option value="'.$row->area_id.'"';
			if($id == $row->area_id)
			{
				$str.=' selected="selected" ';
			}
			$str.='>'.$row->area_name.'</option>';
		}
		return $str;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function yearlist($id)
	{
		$CI=& get_instance();
		$str='';
		$citylist=$CI->front_model->selectAll('tblacademic_year');
		$startyear='';
		$endyear='';
		foreach($citylist as $row)
		{
			$startyear=$row->startyear;
			$endyear=$row->endyear;
		}
		
		if($startyear!= "" && $endyear!='')
		{
			for($i=$startyear; $i<=$endyear; $i++)
			{
				$str.='<option value="'.$i.'"';
				if($id == $i)
				{
					$str.=' selected="selected" ';
				}
				$str.='>'.$i.'</option>';
			}
		}
		
		return $str;
	}
	}
 ?>