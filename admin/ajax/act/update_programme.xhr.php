<?php
if(isset($_POST["tt"]) && isset($_POST["ky"]) && isset($_POST["p1"]) && isset($_POST["p2"]) && isset($_POST["p3"]) && isset($_POST["dt"]) && isset($_POST["tid"])){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	// validating and sanitizing title
	$tit = ($_POST['tt']);
	if(empty($tit)){$error['tte'] = "* title cannot be empty";}else{$title=test_input($tit);}
	
	// validating and sanitizing keyword
	$nam = ($_POST['ky']);
	if(empty($nam)){$error['kye'] = "* keyword cannot be empty";}else{$keyword=test_input($nam);}
	
	// validating and sanitizing paragraph1
	$par1 = ($_POST['p1']);
	if(empty($par1)){$error['p1e'] = "* paragraph1 cannot be empty";}else{$paragraph1=test_input($par1);}
	
	// validating and sanitizing paragraph2
	$par2 = ($_POST['p2']);
	if(empty($par2)){$paragraph2 = NULL;}else{$paragraph2=test_input($par2);}
	
	// validating and sanitizing paragraph3
	$par3 = ($_POST['p3']);
	if(empty($par3)){$paragraph3 = NULL;}else{$paragraph3=test_input($par3);}
	
	// validating and sanitizing datetime
	$dat = ($_POST['dt']);
	if(empty($dat)){$regdatetime = format_sql_date();}elseif(!regex('sql_date',$dat)){$error['dte'] = "* invalid date format";}else{$regdatetime=test_input($dat);}
	
	// validating and sanitizing id
	$id = test_input(removenum($_POST['tid']));
	if(empty($id) || !is_numeric($id)){$error[] = "number";}else{$c_id = test_input($id);}
	
	if(empty($error)){
		$programme = new programme('admin');
		$programme->id = $c_id;
		$programme->title = $title;
		$programme->keyword = $keyword;
		$programme->paragraph1 = $paragraph1;
		$programme->paragraph2 = $paragraph2;
		$programme->paragraph3 = $paragraph3;
		$programme->regdatetime = $regdatetime;
		$update = $programme->update_programme();
		if($update === true){
			$data["status"] = 'success';$data["message"] = file_location('admin_url','programme/preview_programme/'.addnum($c_id));
		}elseif($update === false){
			$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred while updating programme, try again later';
		}
	}else{
		$data["status"] = 'error';$data["errors"] = $error;
	}
	echo json_encode($data);
}//end of if isset
?>