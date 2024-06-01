<?php
if(isset($_POST["nm"]) && isset($_POST["em"]) && isset($_POST["ph"]) && isset($_POST["am"])){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	
	// validating and sanitizing name
	$nam = ($_POST['nm']);
	if(empty($nam)){$error['nme'] = "* name cannot be empty";}else{$name = test_input($nam);}
	
	// validating and sanitizing email
	$emai = ($_POST['em']);
	if(empty($emai)){$error['eme'] = "* email cannot be empty";}elseif(!regex('email',$emai)){$error['eme'] = "* Invalid email";}else{$email = test_input($emai);}
	
	// validating and sanitizing subject
	$ph = ($_POST['ph']);
	if(empty($ph)){$error['phe'] = "* phonenumber cannot be empty";}elseif(!regex('phonenumber',$ph)){$error['phe'] = "* Invalid Phonenumber";}else{$phonenumber = test_input($ph);}
	
	// validating and sanitizing message
	$am = ($_POST['am']);
	if(empty($am)){$error['ame'] = "* amount cannot be empty";}else{$amount = test_input($am);}
	
	if(empty($error)){
      $fields = [];
      $fields['email'] = $email;
      $fields['amount'] = $amount * 100;
      $fields['callback_url'] = file_location('home_url','payment/confirm_payment/');
      $fields['metadata'] = array("name" => $name,"phonenumber" => $phonenumber);
      $fields_string = json_encode($fields);
      //INITIALIZE PAYSTACK
      $paystack = new paystack();
      $paystack->data = $fields_string;
      $result = $paystack->initialize_payment();
      if($result === false){
         $data["status"] = 'fail';$data["message"] = "Sorry!!! We cannot connect to payment gateway at the moment, try again later";
      }else{ // if no curl error
         $info = json_decode($result,true);//DECODING THE RESPONSE
         if(!$info['status']){
            $data["status"] = 'fail';$data["message"] = "Sorry!!! Error occurred while connecting to payment gateway, try again later";
         }else{
				$data["status"] = 'success';$data["message"] = $info['data']['authorization_url'];
         }
      }
   }else{
      $data["status"] = 'error';$data["errors"] = $error;
   }
   echo json_encode($data);
}
?>