<?php
if(isset($_POST["nm"]) && isset($_POST["tid"])){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	// validating and sanitizing name
	$nam = ($_POST['nm']);
	if(empty($nam)){$error['nme'] = "* name cannot be empty";}else{$name = test_input($nam);}
	
	// validating and sanitizing id
	$id = test_input(removenum($_POST['tid']));
	if(empty($id) || !is_numeric($id)){$error[] = "number";}else{$c_id = test_input($id);}
	
	if(empty($error) and empty($missing)){
		$partner = new partner('admin');
		$partner->id = $c_id;
		$partner->name = $name;
		$update = $partner->update_partner();
		if($update === true){
			$data["status"] = 'success';$data["message"] = file_location('admin_url','partner/preview_partner/'.addnum($c_id));
		}elseif($update === false){
			$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred while updating partner, try again later';
		}
	}else{
		$data["status"] = 'error';$data["errors"] = $error;
	}
	echo json_encode($data);
}//end of if isset
?>