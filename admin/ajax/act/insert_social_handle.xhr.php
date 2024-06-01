<?php
if(isset($_POST["nm"]) && isset($_POST["ic"]) && isset($_POST["lk"])){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	// validating and sanitizing name
	$nam = ($_POST['nm']);
	if(empty($nam)){$error['nme'] = "* Name cannot be empty";}else{$name = test_input($nam);}
	
	// validating and sanitizing icon
	$ico = ($_POST['ic']);
	if(empty($ico)){$error['ice'] = "* Icon cannot be empty";}else{$icon = test_input($ico);}
	
	// validating and sanitizing link
	$lnk = ($_POST['lk']);
	if(empty($lnk)){$error['lke'] = "* Link cannot be empty";}else{$link = test_input($lnk);}
	
	if(empty($error) and empty($missing)){
		$social_handle = new social_handle('admin');
		$social_handle->name = $name;
		$social_handle->icon = $icon;
		$social_handle->link = $link;
		$insert = $social_handle->insert_social_handle();
		if($insert == true && is_numeric($insert)){
			$data["status"] = 'success';$data["message"] = file_location('admin_url','social_handle/preview_social_handle/'.addnum($insert));
		}elseif($insert === false){
			$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred, try again later';
		}
	}else{
		$data["status"] = 'error';$data["errors"] = $error;
	}
	echo json_encode($data);
}//end of if isset
?>