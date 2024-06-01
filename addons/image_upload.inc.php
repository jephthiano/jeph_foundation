<?php
//PROCESS IMAGE
		if(isset($_FILES['image'])){$html_file_name = $_FILES['image'];}else{$html_file_name = '';}
		if($html_file_name === '' || (isset($html_file_name["error"]) && $html_file_name["error"] === UPLOAD_ERR_NO_FILE)){
			$file2 = "no file";
		}elseif($html_file_name["error"] === UPLOAD_ERR_INI_SIZE || $html_file_name["error"] === UPLOAD_ERR_FORM_SIZE){ //IF FILE IS LARGER THAN EXPECTED
			$file2 = "larger";
		}elseif($html_file_name["error"] === UPLOAD_ERR_OK){// if file error is 0 i.e false
			$file2 = "normal";
			if(!validate_uploaded_file($html_file_name,$file_type,$file_mode,$size)){ //if the image is not valid
				$error[] = "false image"; $data["status"] = 'fail';$data["message"] = 'File must be jpg & png and must not exceed 5mb';
			}else{//if image is valid
				$extension =".". strtolower(pathinfo($html_file_name['name'],PATHINFO_EXTENSION));
				// to be used for naming the uploaded file
				$file_name = "IMG_".time_token();$imagename = basename($file_name.$extension);
				// filepath
				$dir = file_location('media_path',$location."/");$file = $dir.$imagename;
				if(@!move_uploaded_file($html_file_name["tmp_name"],$file)){//upload file
					$error[] = "not upload";$data["status"] = 'fail';$data["message"] = 'Error uploading image, try again later';
				}
			}//end of if image is valid
			// correct the rotation and the image extenstion
			if((empty($missing) && empty($error))){
				// correct image extension type and unlink image that does not have correct image extension
				$newfile = correct_image_extension($file,[2,3]);
				if($newfile === false){
					$error[] = "wrong image type";$data["status"] = 'fail';$data["message"] = 'Invalid image selected';
				}else{//correct iamge extension and assign file name and extension
					correct_image_rotation($newfile);
					$correct =pathinfo($newfile);
				}
			}
		}//end of if the a selected and $file is normal
?>