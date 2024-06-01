<?php
if(isset($_GET["t"]) && isset($_GET["i"] )){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	// validating and sanitizing type
	$ty = ($_GET['t']);
	if(empty($ty)){$error[] = "empty";}else{$type = test_input($ty);}
	
	// validating and sanitizing percentage
	$id = test_input(removenum($_GET['i']));
	if(empty($id) || !is_numeric($id)){$error[] = "number";}else{$c_id = test_input($id);}
	if(empty($error) and empty($missing)){
		if($type ===  "admin"){
			content_data('admin_table','ad_status',$c_id,'ad_id') === 'active'? $status = 'suspended' : $status = 'active';
			$admin = new admin('admin');
			$admin->id = $c_id;
			$admin->status = $status;
			$change = $admin->change_status();
		}elseif($type ===  "news"){
			content_data('news_table','n_status',$c_id,'n_id') === 'active'? $status = 'pending' : $status = 'active';
			$news = new news('admin');
			$news->id = $c_id;
			$news->status = $status;
			$change = $news->change_status();
		}elseif($type ===  "programme"){
			content_data('programme_table','p_status',$c_id,'p_id') === 'active'? $status = 'pending' : $status = 'active';
			$programme = new programme('admin');
			$programme->id = $c_id;
			$programme->status = $status;
			$change = $programme->change_status();
		}else{
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while updating status";
		}
		if($change === true){
			$data["status"] = 'success';$data["message"] = "Success!!!<br>Status Successfully Updated";
		}elseif($change === false){
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while updating status";
		}
	}else{
		$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while updating status";
	}
	echo json_encode($data);
}//end of if isset
?>