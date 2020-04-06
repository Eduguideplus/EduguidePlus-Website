<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class custom_file_upload 
{
	function allowedExtension($allowExt=array()) 
	{
		
		return $allowExt;
	}
	
	
	function getFileName($field_name) 
	{
		if($field_name)
		{
			$file_name=$_FILES[$field_name]['name'];
			return $file_name;
		}
		else
		{
			echo 'File empty..';exit;
		}
		
	}
	
	function getExtension($str) 
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; } 
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return strtolower($ext);
	}
	
	function compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth)
	{
		if($ext=="jpg" || $ext=="jpeg" )
		{
		$src = imagecreatefromjpeg($uploadedfile);
		}
		else if($ext=="png")
		{
		$src = imagecreatefrompng($uploadedfile);
		}
		else if($ext=="gif")
		{
		$src = imagecreatefromgif($uploadedfile);
		}
		else
		{
		$src = imagecreatefrombmp($uploadedfile);
		}
																		
		list($width,$height)=getimagesize($uploadedfile);
		$newheight=($height/$width)*$newwidth;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = $path.$newwidth.'_'.$actual_image_name;
		imagejpeg($tmp,$filename,100);
		imagedestroy($tmp);
		return $filename;
	}
	
	function moveUploadFile($uploadedfile, $actual_file_name_with_path)
	{
		if(move_uploaded_file($uploadedfile, $actual_file_name_with_path))
		{
		//mysqli_query($db,"INSERT INTO user_uploads(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
		//echo "<img src='".base_url().$path.$actual_file_name."'  class='preview'><br/>";
		//echo "<b>Original Image</b>  <br/><b>File Name:</br> ".$filename."<br/><br/>";
		}
	}
	
	function allowedExtensionCheckByAjax($allowed_extension_array_set_up,$ext)
	{
		if(in_array($ext,$allowed_extension_array_set_up))
		{
			return true;
		}
		else
		{
			return false;	
		}
	}
	
	
}
 ?>