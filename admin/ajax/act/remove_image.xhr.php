<?php
if(isset($_GET['t']) && isset($_GET['i'])){
	require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');// all functions
	$error = [];
	//validating and sanitising content type
	$ty = ($_GET['t']);
	if(empty($ty)){$error[] = "t";}else{$type = test_input($ty);}
	
	// validating and sanitizing percentage
	$id = test_input(removenum($_GET['i']));
	if(empty($id) || !is_numeric($id)){$error[] = "number";}else{$c_id = test_input($id);}
	
	if(empty($error)){
		//DELETE IMAGE AND DELETE IF FROM THE DB
		if($type === 'admin'){
			$admin = new admin('admin');
			$admin->id = $c_id;
			$remove = $admin->remove_image();
		}elseif($type === 'partner'){
			$partner = new partner('admin');
			$partner->id = $c_id;
			$remove = $partner->remove_image();
		}elseif($type === 'news'){
			$news = new news('admin');
			$news->id = $c_id;
			$remove = $news->remove_image();
		}elseif($type === 'programme'){
			$programme = new programme('admin');
			$programme->id = $c_id;
			$remove = $programme->remove_image();
		}else{
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while removing image";
		}
		if(empty($missing)){
			if($remove === true){
				$data["status"] = 'success';$data["message"] = "Success!!!<br>Image successfully removed";
			}else{
				$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while removing image";
			}
		}else{
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while removing image";
		}
	}//end of if empty
	echo json_encode($data);
}//end of if isset
?>