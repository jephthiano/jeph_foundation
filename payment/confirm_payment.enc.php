<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
isset($_GET['reference'])?$reference = ($_GET['reference']):$reference = '';
if(empty($reference) || (content_data('transaction_table','t_ref_id',$reference,'t_ref_id') !== false)){die(transaction_result('error'));} //IF REFERENCE IS EMPTY DIE || IF REF_ID HAS BEEN USED BEFORE

//CONNECT TO PAYSTACK
$paystack = new paystack();
$paystack->reference = $reference;
$result = $paystack->verify_payment();

if($result === false){die(transaction_result('error connecting','verification'));} // IF CANNOT CONNECT OT PAYMENT GATEWAY

$info = json_decode($result);
if(!$info->status){die(transaction_result('unsuccessful payment'));}//IF THE STATUS IS FALSE, SHOW ERROR

//DECALARING ALL THE VARIABLE
$trans = new transaction('admin');
$trans->email = $info->data->customer->email;
$trans->amount = $info->data->amount/100;
$trans->currency = $info->data->currency;
$trans->name = $info->data->metadata->name;
$trans->phonenumber = $info->data->metadata->phonenumber;
$trans->payment_method = $info->data->channel;
if($info->data->authorization->account_name == null){$trans->account_name = "Unknown";}else{$trans->account_name = $info->data->authorization->account_name;}
if(isset($info->data->plan->account_number)){$trans->account_number = $info->data->authorization->account_number;}else{$trans->account_number = "**********";}
$trans->bank = $info->data->authorization->bank;
$trans->brand = $info->data->authorization->brand;
$trans->ipaddress = $info->data->ip_address;
$trans->ref_id = $reference;
if($info->data->status !== "success"){
 //INSERT INTO DATABASE IF FAIL
 $trans->insert_transation();
 //DIE
 die(transaction_result('fail'));
 } // IF THE TRANSACTION FAILED

//INSERT INTO DATABASE if success
$trans->insert_transation('success');
//SEND MAIL
$mail = new mail();
$mail->p_receiver = $trans->email;
$mail->p_subject = "Thanks For Supporting ".get_xml_data('company_name');
$mail->p_message = email_code_message(ucwords($trans->name),money($trans->amount),$trans->currency);
$mail->p_header = implode("\r\n",[
  "From:".get_xml_data('company_name')." <".get_xml_data('business_email').">",
  "MIME-Version: 1.0",
  "Content-Type: text/html; charset=UTF-8"
]);
$mailsent = $mail->send_mail();
die(transaction_result('success'));
?>