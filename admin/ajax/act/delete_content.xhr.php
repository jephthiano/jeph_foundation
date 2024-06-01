<?php
if(isset($_GET["t"]) && isset($_GET["i"])){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	// validating and sanitizing skill
	$ty = ($_GET['t']);
	if(empty($ty)){$error[] = "empty";}else{$type = test_input($ty);}
	
	// validating and sanitizing percentage
	$id = test_input(removenum($_GET['i']));
	if(empty($id) || !is_numeric($id)){$error[] = "number";}else{$c_id = test_input($id);}
	
	if(empty($error) and empty($missing)){
		if($type ===  "admin"){
			$admin = new admin('admin');
			$admin->id = $c_id;
			$delete = $admin->delete_admin();
		}elseif($type ===  "social_handle"){
			$social_handle = new social_handle('admin');
			$social_handle->id = $c_id;
			$delete = $social_handle->delete_social_handle();
		}elseif($type ===  "message"){
			$message = new message('admin');
			$message->id = $c_id;
			$delete = $message->delete_message();
		}elseif($type ===  "subscriber"){
			$subscriber = new subscribe('admin');
			$subscriber->id = $c_id;
			$delete = $subscriber->delete_subscriber();
		}elseif($type ===  "transaction"){
			$transaction = new transaction('admin');
			$transaction->id = $c_id;
			$delete = $transaction->delete_transaction();
		}elseif($type ===  "partner"){
			$partner = new partner('admin');
			$partner->id = $c_id;
			$delete = $partner->delete_partner();
		}elseif($type ===  "news"){
			$news = new news('admin');
			$news->id = $c_id;
			$delete = $news->delete_news();
		}elseif($type ===  "programme"){
			$programme = new programme('admin');
			$programme->id = $c_id;
			$delete = $programme->delete_programme();
		}else{
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while deleting content";
		}
		if($delete === true){
			$data["status"] = 'success';$data["message"] = "Success!!!<br>Content successfully deleted";
		}elseif($delete === false){
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while deleting content";
		}
	}else{
		$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while deleting content";
	}
	echo json_encode($data);
}//end of if isset
?>