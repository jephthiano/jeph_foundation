<?php
if(isset($_POST["s"]) && isset($_POST["k"]) && isset($_POST["v"])){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	
	// validating and sanitizing section
	$sect = ($_POST['s']);
	if(empty($sect)){$error[] = "empty";}else{$section = test_input($sect);}
	
	// validating and sanitizing key
	$ky = ($_POST['k']);
	if(empty($ky)){$error[] = "empty";}else{$key = test_input($ky);}
	
	// validating and sanitizing value
	$val = ($_POST['v']);
	if(empty($val)){$error[] = "empty";}else{$value = test_input($val);}
	
	if(empty($error)){
		if(write_json_data($section,$key,$value) === true){
			$data["status"] = 'success';$data["message"] = 'Success!!!<br>Setting successfully saved';
		}else{
			$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred while saving setting, try again';
		}
	}else{
		$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred while saving setting, try again';
	}
}else{
	$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred while saving setting, try again';
}//end of if isset
echo json_encode($data);
?>