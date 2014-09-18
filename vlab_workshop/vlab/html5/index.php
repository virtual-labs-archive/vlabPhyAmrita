<?php
header('Expires: Thu, 01-Jan-70 00:00:01 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header("Modified-by: Amrita VL ",true);
/////////
include('../vl_config.php');
//files loading time... in seconds...
$maxallowedtime=90;
if(AUTHENTICATION_STATUS=='OFF')
{
	$token_id=$_GET['linktoken'];
	if($token_id=="")
	{
		$token_id=$_GET['token'];
		$url="http://".AUTH_HOST."/auth_token/?token=$token_id&format=text";
	}else{
		$url="http://".AUTH_HOST."/auth_token/?linktoken=$token_id&format=text";
	}
	if($token_id)
	{
		$main_url=$url ;
		$ch = curl_init($main_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//getting the response from the virtual lab server
		$response = curl_exec($ch);      
		$response = trim($response); 
		curl_close($ch);
	}
	if($response=='yes')
	{
		session_start();
		$_SESSION['auth_token']='yes';
		$_SESSION['expire'] = time()+ ($maxallowedtime);
	}else
	{
		session_start();
		$now = time(); 
		//echo $now .">". $_SESSION['expire'];
		if($now > $_SESSION['expire'])
		{
			session_destroy();
		}

		if(($_SESSION['auth_token']!='yes')||($_SESSION['expire']=="")){
				echo "Invalid Token... Error 001";
				exit();
		}
		
	}
}

$cat=$_GET['cat'];
$sub=$_GET['sub'];
$temp_id=$_GET['tempId'];
$exp_name=$_GET['exp'];
////////////////////////////////

if($sub==""){
$sub="PHY";
$cat="MPY";
$exp_name="Pressure";
$temp_id="olab";
}
///////////////
$sim_id="../".$sub."/".$cat."/".$exp_name;
/////////////////
////////////
$sim_file=$sim_id.'/html5.php';
$temp_dir='template/';
////////////
////////////////
$sim_title="";
$comp_name="Amrita Virtual Lab";
///////////
if($temp_id=='olab'){
	$copy_name="Developed by CDAC Mumbai & Amrita University<br/>Under research grant from department of IT";
}
else if($temp_id=='olab_ot'){
	$copy_name="Developed by CDAC Mumbai & Amrita University<br/>Under research grant from department of IT";
}
else if($temp_id=='vlab'){
	$copy_name="Copyright &copy; Amrita University 2009 - ". date("Y");
}

////////
///////////////

include("functions.php");
/////
getHeader();
///////////
include("$sim_file");
////////////
getFooter();
?>
