<?php
if(isset($_POST["tt"]) && isset($_POST["ky"]) && isset($_POST["p1"]) && isset($_POST["p2"]) && isset($_POST["p3"]) && isset($_POST["dt"])){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $missing = []; $data = [];
	
	// validating and sanitizing title
	$tit = ($_POST['tt']);
	if(empty($tit)){$missing['tte'] = "* title cannot be empty";}else{$title=test_input($tit);}
	
	// validating and sanitizing keyword
	$nam = ($_POST['ky']);
	if(empty($nam)){$missing['kye'] = "* keyword cannot be empty";}else{$keyword=test_input($nam);}
	
	// validating and sanitizing paragraph1
	$par1 = ($_POST['p1']);
	if(empty($par1)){$missing['p1e'] = "* paragraph1 cannot be empty";}else{$paragraph1=test_input($par1);}
	
	// validating and sanitizing paragraph2
	$par2 = ($_POST['p2']);
	if(empty($par2)){$paragraph2 = NULL;}else{$paragraph2=test_input($par2);}
	
	// validating and sanitizing paragraph3
	$par3 = ($_POST['p3']);
	if(empty($par3)){$paragraph3 = NULL;}else{$paragraph3=test_input($par3);}
	
	// validating and sanitizing datetime
	$dat = ($_POST['dt']);
	if(empty($dat)){$regdatetime = format_sql_date();}elseif(!regex('sql_date',$dat)){$missing['dte'] = "* invalid date format";}else{$regdatetime=test_input($dat);}
	
	if(empty($error) and empty($missing)){
		//FORM IMAGE UPLOAD
		$location = 'news';$size = 50000000;$file_mode = ["image/png","image/jpeg"];$file_type = 'image';
		require_once(file_location('inc_path','image_upload.inc.php'));
		
		if(empty($missing) && empty($error)){
			if($file2 === "larger"){ // if file is larger tha expected echo error
				$data["status"] = 'fail';$data["message"] = 'Image is larger than expected';
			}elseif($file2 === "normal" || $file2 === "no file"){
				$news = new news('admin');
				$news->title = $title;
				$news->keyword = $keyword;
				$news->paragraph1 = $paragraph1;
				$news->paragraph2 = $paragraph2;
				$news->paragraph3 = $paragraph3;
				$news->regdatetime = $regdatetime;
				$news->type = $file2;
				if($file2 === "normal"){$news->file_name = $correct['filename'];$news->extension = $correct['extension'];}
				$insert = $news->insert_news();
				if($insert == true && is_numeric($insert)){
					$data["status"] = 'success';$data["message"] = file_location('admin_url','news/preview_news/'.addnum($insert));
				}elseif($insert === 'exists'){
					$data["status"] = 'fail';$data["message"] = 'News already exists';
				}elseif($insert === false){
					$data["status"] = 'fail';$data["message"] = 'Error uploading data';
				}
			}else{
				$data["status"] = 'fail';$data["message"] = 'Error occurred, try again later';
			}// end of else if $file = "" // end of else if $file = ""
		}
	}else{
		$data["status"] = 'error';$data["errors"] = $missing;
	}
	echo json_encode($data);
}//end of if isset
?>