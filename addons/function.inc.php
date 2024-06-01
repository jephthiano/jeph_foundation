<?php
//GENERAL FUNCTIONS STARTS
//classes auto load starts
spl_autoload_register(function ($className){
 $className = str_replace('..','',$className); //to removes .. so as to ensure that it is not used by attacker to get to above folder
 require_once(file_location('inc_path','classes/'.$className.'.inc.php'));
});
//classes auto load ends

//close connection function starts
function closeconnect($connectionType='',$connectionVar=''){
	if(@$connectionType === "db"){
		return @$connectionVar = null;
	}elseif(@$connectionType === "stmt"){
		return @$connectionVar->closeCursor();
		return @$connectionVar = null;
	}elseif(@$connectionType === "curl"){
		return curl_close(@$connectionVar);
	}
}
//close connection function ends

// decode output starts
function decode_data($data){
	$data = htmlspecialchars_decode($data);
	return $data;
}
//decode output ends

//sanitaition starts
//function test_input($data){
//	$data = filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
//	$data = trim($data);
//	$data = stripslashes($data);
//	$data = stripslashes($data);
//	$data = stripslashes($data);
//	$data = stripslashes($data);
//	$data = stripslashes($data);
//	$data = htmlspecialchars($data);
//	$data = strip_tags($data);
//	$data = htmlentities($data);
// return $data;
//}

function test_input($data){
 $data = htmlspecialchars($data,ENT_QUOTES,'UTF-8',true);
	$data = htmlentities($data,ENT_QUOTES,'UTF-8',true);
	$data = trim($data);
	$data = stripslashes($data);
	$data = stripslashes($data);
	$data = stripslashes($data);
	$data = stripslashes($data);
	$data = stripslashes($data);
 return $data;
}
//sanitaition ends

//encryption and decryption 2 starts
define('IV','mwrsaasghsh53456');
define("CIPHER","aes-128-cfb");
define("KEY","6346634bchbjdb");
//encryption
function ssl_encrypt_input($data){
	return openssl_encrypt($data,CIPHER,KEY,OPENSSL_ZERO_PADDING,IV);
}
//decryption
function ssl_decrypt_input($data){
	return openssl_decrypt($data,CIPHER,KEY,OPENSSL_ZERO_PADDING,IV);
}
// message encryption
function ssl_encrypt_message($data){
	return openssl_encrypt($data,CIPHER,KEY,OPENSSL_ZERO_PADDING,IV);
}
// message decryption
function ssl_decrypt_message($data){
	return openssl_decrypt($data,CIPHER,KEY,OPENSSL_ZERO_PADDING,IV);
}
//encryption and decryption 2 ends	

// hash input starts
function hash_input($data){
		$salt1 = '@jhdge$#fyyigetitun76565665nkeiw92383?(hryryr())hghg@%^&#$#';
		$salt2 = 'leehack2DJJDJSDQK($JFHF$))5nopeadudevhshs(874764_))';
		return hash('ripemd128',"$salt1$data$salt2");
}

function hash_pass($pass){
 $options = ['cost' => 10,];
	return password_hash($pass, PASSWORD_DEFAULT, $options);
}
// hash input ends

function file_location($type,$filename = ''){ 
	if($type === 'media_path'){
		return ($_SERVER['DOCUMENT_ROOT'].'/media/'.$filename);
	}elseif($type === 'media_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/media/'.$filename);
	}elseif($type === 'home_path'){
		return ($_SERVER['DOCUMENT_ROOT'].'/'.$filename);
	}elseif($type === 'home_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/'.$filename);
	}elseif($type === 'admin_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/admin/'.$filename);
	}elseif($type === 'admin_ajax_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/admin/ajax/'.$filename);
	}elseif($type === 'ajax_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/ajax/'.$filename);
	}elseif($type === 'inc_path'){
		return ($_SERVER['DOCUMENT_ROOT'].'/addons/'.$filename);
	}elseif($type === 'admin_inc_path'){
		return ($_SERVER['DOCUMENT_ROOT'].'/admin/addons/'.$filename);
	}
}

//page not available starts
function page_not_available($type="full"){
	if($type === 'full'){profile_header('');};
	?>
	<br>
	<center>
   <div class=""style="font-family: Roboto,sans-serif;width: 100%;"">
    <p class="j-text-color1">
     Sorry, the page you are looking for is not available, page may have been deleted, link may have been broken or you may not have access to the content<br>
     <a href="<?php if(strstr($_SERVER['REQUEST_URI'],'admin')){echo file_location('admin_url',''); }else{echo file_location('home_url','');}?>"class="j-btn j-color1 j-text-color4 j-round-large">Click here to go back to homepage.</a>
    </p>
   </div>
	</center>
	<?php
}
//page not available ends

// trigger error starts
function trigger_error_manual($error=404){http_response_code($error);die(require_once(file_location('home_path','error/index.php')));}
// trigger error starts

//error return starts
function return_message($type = ''){
 ?><span class='j-text-color4 j-button alert j-color1 j-bolder j-container j-padding j-round j-fixalert'id='thealert'><?=empty($type)?'Error running request':$type;?></span><?php
}
function return_message2($type = ''){
 ?><div id='return_message_modal'class='j-modal'><div class='j-card-4 j-modal-content j-color4 j-bolder'style='margin-top:200px;'><div class='j-padding'><?=empty($type)?'Error occurred while runing request, please try again later or reload page':$type;?></div><center class='j-padding'><div class='j-clickable j-text-color1 j-round j-border j-border-color1 j-padding'style='width:100%'onclick=$('#return_message_modal').hide();>Close</div></center></div></div><?php
}
//error return ends

//add random number starts
function addnum($data){$first_four = rand(1,9).rand(1,9).rand(1,9).rand(1,9);$last_three = rand(1,9).rand(1,9).rand(1,9);return strrev($first_four.$data.$last_three);}
//add random number ends
	
//remove random number starts
function removenum($data){return strrev(substr(substr($data,3),0,-4));}
//remove random number ends
	
//time token starts
function time_token(){return time().rand(000000,999999);}
//time token ends
 
// generate random token starts
function random_token($data = ''){return md5(microtime(true).mt_rand().$data);}
// generate random token ends
	
//text length start
function text_length($data,$length){if(strlen($data) > $length){return substr($data,0,$length)."...<i class='j-text-color5'>See More</i>";}else{return $data;}}
	
function text_length2($data,$length){if(strlen($data) > $length){return substr($data,0,$length)."...";}else{return $data;}}
//text length ends

//function convert to line break starts
function convert_2_br($data){$data2 = str_replace(array("\r\n","\r","\n"),"<br>",$data);echo $data2;}
//function convert to line break ends

//icon starts
function icon($data,$type='fas'){return $type.' fa-'.$data;}
//icon ends

//replace with asterisk starts
function replace_with_asterisk($data){return substr($data,0,2)."**********".substr($data,-3);}
//replace with asterisk ends

//remove last starts
function remove_last_value($input,$remove = '*'){
	$position = strpos($input,$remove);
	if ($position === false){
		return $input;
	}else{
		$input = substr($input,0,-1);return $input;
	}
}
//remove last ends

//s/n starts
function s_n(){
 static $x = 1;
 echo $x;
 $x++;
}
//s/n ends

//get numrow starts
function get_numrow($tablename,$column='',$param='',$returntype = "return",$round='round',$add_cond=''){
	// creating connection
	require_once(file_location('inc_path','connection.inc.php'));
	@$conn = dbconnect('admin','PDO');
 if(empty($column)){$where = '';}else{$where = "WHERE $column = :param";}
	$sql = "SELECT * FROM $tablename {$where} {$add_cond}";
	$stmt = $conn->prepare($sql);
 if(!empty($column)){
  $stmt->bindParam(':param',$param,PDO::PARAM_STR);
 }
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 999 && $numRow < 999999){
		$rounded_numRow = round($numRow/1000,1);
		$rounded_numRow = $rounded_numRow."K";
	}elseif($numRow > 999999 && $numRow < 999999999){
		$rounded_numRow = round($numRow/1000000,1);
		$rounded_numRow = $rounded_numRow."M";
	}elseif($numRow > 999999999){
		$rounded_numRow = round($numRow/1000000000,1);
		$rounded_numRow = $rounded_numRow."B";
	}else{
  $rounded_numRow = $numRow;
 }
	if($returntype === "echo"){
		if($round === 'round'){echo $rounded_numRow;}else{echo $numRow;}
	}else{
  if($round === 'round'){return $rounded_numRow;}else{return $numRow;}
 }
	closeconnect("stmt",$stmt);
	closeconnect("db",$conn);
}
//get numrow ends

//distinct numrow starts
function distinct_numrow($tablename,$id,$column='',$param='',$returntype = "return",$round='round',$add_cond=''){
	require_once(file_location('inc_path','connection.inc.php'));
	@$conn = dbconnect('admin','PDO');
 if(empty($column)){$where = '';}else{$where = "WHERE $column = :param";}
	$sql = "SELECT DISTINCT $id FROM $tablename {$where} {$add_cond}";
	$stmt = $conn->prepare($sql);
 if(!empty($column)){
  $stmt->bindParam(':param',$param,PDO::PARAM_STR);
 }
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 999 && $numRow < 999999){
		$rounded_numRow = round($numRow/1000,1);
		$rounded_numRow = $rounded_numRow."K";
	}elseif($numRow > 999999 && $numRow < 999999999){
		$rounded_numRow = round($numRow/1000000,1);
		$rounded_numRow = $rounded_numRow."M";
	}elseif($numRow > 999999999){
		$rounded_numRow = round($numRow/1000000000,1);
		$rounded_numRow = $rounded_numRow."B";
	}else{
  $rounded_numRow = $numRow;
 }
	if($returntype === "echo"){
		if($round === 'round'){echo $rounded_numRow;}else{echo $numRow;}
	}else{
  if($round === 'round'){return $rounded_numRow;}else{return $numRow;}
 }
	closeconnect("stmt",$stmt);
	closeconnect("db",$conn);
}
// distinct numrow ends

//content data starts
function content_data($table,$column,$param,$crit,$add = ''){
		// creating connection
		require_once(file_location('inc_path','connection.inc.php'));
		@$conn = dbconnect('admin','PDO');
		$sql = "SELECT $column FROM $table
		WHERE $crit = :id {$add} LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id',$param,PDO::PARAM_STR);
		$stmt->bindColumn($column,$result);
		$stmt->execute();
		$numRow = $stmt->rowCount();
		if($numRow > 0){
			while($stmt->fetch()){return decode_data($result);}// end of while
  }else{
   return false;
  }
closeconnect("stmt",$stmt);
closeconnect("db",$conn);
}
//content data ends

//function regex starts
function regex($type,$data){
 if($type === 'email'){
  $reg = "/^[\w.-]*@[\w.-]+\.[A-Za-z]{2,6}$/";
 }elseif($type === 'word_comma'){ //for languages and co
  $reg = "/^[\w]*\,?\ ?[\w]*\,?\ ?[\w]*\,?\ ?[\w]*\,?\ ?$/";
 }elseif($type === 'word_space'){
  $reg = "/^[a-zA-Z ]*$/";
 }elseif($type === 'word_number_nospace'){
  $reg = "/^[a-zA-Z0-9]*$/";
 }elseif($type === 'phonenumber'){
  $reg = "/^\+?[\d]{11,17}$/";
 }elseif($type === 'skill'){ // for word . ' - @ 
  $reg = "/^[\w .'-@]+$/";
 }elseif($type === 'sql_date'){
  $reg = "/^[\d]{4}-[\d]{2}-[\d]{2} [\d]{2}:[\d]{2}:[\d]{2}$/";
 }else{
  return false;
 }
 return preg_match($reg,$data);
}
//function regex ends

//get import data starts
function get_xml_data($type,$file_location='data.xml'){
 $file = file_location('home_path',$file_location);
 $xmlElement = new SimpleXMLElement($file, NULL, true); //object oriented
 return $xmlElement->$type;
}
//get import data ends

//get json_data starts
function get_json_data($key,$section,$file_location='settings.json'){
 $json = file_get_contents(file_location('home_path',$file_location));
 $array = json_decode($json,true);
 return decode_data($array[$section][$key]);
}
//get json_data ends

//write json data starts
function write_json_data($section,$key,$value,$file_location='settings.json'){
 $json = file_get_contents(file_location('home_path',$file_location));
 $array = json_decode($json,true);
 if(key_exists($key,$array[$section]) && key_exists($section,$array)){
  $array[$section][$key] = $value;
  $file = json_encode($array);
  if(file_put_contents(file_location('home_path',$file_location),$file)){return true;}else{return false;}
 }else{
  return false;
 }
}
//write json data ends

//get sum starts
function get_sum($table,$column,$crit,$param,$add=''){
 if($param !== 'all'){$all = "WHERE {$crit} = :param";}else{$all = '';}
// creating connection
		require_once(file_location('inc_path','connection.inc.php'));
  @$conn = dbconnect('admin','PDO');
  $sql = "SELECT SUM($column) AS total_amount FROM {$table}
  $all {$add}";
		$stmt = $conn->prepare($sql);
  if($param !== 'all'){
   $stmt->bindParam(':param',$param,PDO::PARAM_STR);
  }
		$stmt->bindColumn('total_amount',$total_sum);
		$stmt->execute();
		$numRow = $stmt->rowCount();
		if($numRow > 0){
			while($stmt->fetch()){
				return $total_sum;
			}// end of while
  }else{
   return (int)0;
  }
 closeconnect('stmt',$stmt);
 closeconnect('db',$conn);  
}
//get sum ends

//money format starts
function money($num){return number_format($num,2,'.',',');}
//money format endss

// transaction reuslt starts
function transaction_result($form,$type='confirm',$page="payment"){
 $follow_type = 'no follow';$image_link = file_location('media_url','home/logo.png');
 ?>
 <!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$form?></title></head><head>
<body id="body"class="j-color4"style="font-family:Roboto,sans-serif;width:100%;">
	<center>
		<div class="j-card-4 j-color6 j-round"style="width:96%;max-width:400px;height:auto;margin-top:50px">
			<div class="j-display-container">
				<div class="j-container">
					<br><br>
					<?php
					if($form === 'error'){
						?>
						<div style="width:150px;height: 150px;"class="j-border-color1 j-border j-circle j-display-container">
							<span class="j-display-middle j-text-color1"><i class="<?=icon('times')?> j-xxlarge"></i></span>
						</div>
						<div>
							<br>
							<p class="j-text-color1 j-large"><b>You Reach This Page by Error</b></p>
							<p>Click ok to redirect to homepage</p>
							<a href="<?=file_location('home_url','');?>"><span class="j-color1 j-round-large j-large j-btn" style='width: 90px'>Ok</span></a>
							<br><br>
						</div>
						<?php
					}elseif($form === 'unsuccessful payment'){
						?>
						<div style="width:150px;height: 150px;"class="j-border-color1 j-border j-circle j-display-container">
							<span class="j-display-middle j-text-color1"><i class="<?=icon('times')?> j-xxlarge"></i></span>
						</div>
						<div>
							<br>
							<p class="j-text-color1 j-large"><b>Transaction not Successful</b></p>
							<p>If you have been charged,wait for your bank to credit you or contact us</p>
							<p>Click ok to redirect to homepage</p>
							<a href="<?= file_location('home_url','');?>"><span class="j-color1 j-round-large j-large j-btn" style=''>Ok</span></a>
							<br><br>
						</div>
						<?php
					}elseif($form === 'error connecting'){
						?>
						<div style="width:150px;height: 150px;"class="j-border-color1 j-border j-circle j-display-container">
       <span class="j-display-middle j-text-color1"><i class="<?=icon('times')?> j-xxlarge"></i></span>
      </div>
					<div>
						<br>
       <p class="j-text-color1 j-large"><b>Error Connecting to <?=ucwords($page)?> Gateway</p>
       <p>Error occur while initiating <?=$page?> gateway.</p>
       <p>Click ok to redirect to homepage or reload the page</p>
       <a href="<?= file_location('home_url','');?>"><span class="j-color1 j-round-large j-large j-btn" style='width: 120px'>Ok</span></a>
						<br><br>
					</div>
						<?php
					}elseif($form === 'fail'){
						?>
						<div style="width:150px;height: 150px;"class="j-border-color1 j-border j-circle j-display-container">
						<span class="j-display-middle j-text-color1"><i class="<?=icon('times')?> j-xxlarge"></i></span>
					</div>
					<div>
      <br>
      <?php
      if($type === 'confirm'){
       ?>
       <p class="j-text-color1 j-large"><b>Order Failed</b></p>
						<p>Error occur while processing your order.</p>
						<p>Click ok to redirect to homepage</p>
						<a href="<?=file_location('home_url','');?>"><span class="j-color1 j-round-large j-large j-btn" style='width: 90px'>Ok</span></a>
       <?php
      }else{
       ?>
       <p class="j-text-color1 j-large"><b>Error Authenticating Transaction</b></p>
						<p>Error occur while authenticating your transaction.</p>
						<p>Click refresh to reload page</p>
						<a href=""><span class="j-color1 j-round-large j-large j-btn" style='width: 120px'>Refresh</span></a>
       <?php
      }
      ?>
						<br><br>
					</div>
						<?php
					}elseif($form === 'success'){
						?>
						<div style="width:150px;height: 150px;"class="j-border-color1 j-border j-circle j-display-container">
						<span class="j-display-middle j-text-color1"><i class="<?=icon('check')?> j-xxlarge"></i></span>
					</div>
					<div>
						<br>
      <?php
      if($type === 'confirm'){
       ?>
       <p class="j-text-color1 j-large"><b>Transaction Successful</b></p>
						<p>Payment successful. You will receive an email soon.</p>
      <p>Thanks for supporting us.</p>
						<p>Click ok to redirect to homepage</p>
						<a href="<?=file_location('home_url','');?>"><span class="j-color1 j-round-large j-large j-btn" style='width: 90px'>Ok</span></a>
       <?php
      }else{
       ?>
       <p class="j-text-color1 j-large"><b>Transaction Successful</b></p>
						<p>Payment successful. You will receive an email soon.</p>
      <p>Thanks for supporting us.</p>
						<p>Click ok to redirect to homepage</p>
						<a href="<?=file_location('home_url','');?>"><span class="j-color1 j-round-large j-large j-btn" style='width: 90px'>Ok</span></a>
       <?php
      }
      ?>
						<br><br>
					</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</center>
</body>
</html>
 <?php
}
//transaction result ends

//fucntion back button starts
function back_btn(){
 ?>
 <a href='<?=file_location('home_url','')?>'><span style='margin-left:5px;'class='j-right j-xlarge'>
  &#10094;<span class="j-large"style='margin:5px 10px;position:relative;top:-2px'>Home</span></span>
 </a>
 <span onclick='history.go(-1);'><span style='margin:5px 15px;'class='j-clickable j-xlarge'>&#10094;</span></span>
 <?php
}
//fucntion back button ends

//back to the top starts
function back_to_top($type=''){
 ?> <div><a class="j-color3 j-button j-right"href="#<?=$type?>"><i class="fa fa-arrow-up j-margin-right"> </i>To the top</a></div><br><br> <?php
}
//back to the top ends

//function misc header starts
function misc_header($data){
 ?>
	<div class='j-display-container j-misc-height'style='width:100%'>
		<img src="<?=file_location('media_url','home/logo_large.png')?>"style='height:inherit;width:inherit;'/>
		<div class='j-display-middle j-text-color4 j-misc-height'style="font-family:Sofia;width:100%;background-color:rgba(0,0,0,0.4)">
			<?php back_btn();?>
			<center>
				<span class='j-xxxlarge j-hide-small'><b><br><?=strtoupper(get_xml_data('company_name'))?><br><?=strtoupper($data)?></b></span>
				<span class='j-xlarge j-hide-medium j-hide-large j-hide-xlarge'><b><br><?=strtoupper(get_xml_data('company_name'))?><br><?=strtoupper($data)?></b></span>
			</center>
		</div>
	</div>
	<br>
 <?php
}
//function misc header ends
//GENERAL FUNCTIONS ENDS



//MAIL FUNCTION STARTS
//email code message starts
function email_code_message($name,$amount,$currency){
 $media_url = file_location('media_url','home/admin_logo.png');
 $home_url = file_location('home_url','');
 $company_name = ucwords(get_xml_data('company_name'));
	return
	<<< EOF
<html>
				<head>
					<meta charset='UTF-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1.0'>
					<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
					<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>		
					<style>
						.j-j-text-shadow{j-text-shadow: 7px 3px 5px;}
						.j-text-color5{color:#757575!important}
						.j-text-color7{color:#3a3a3a!important}
						</style>
				</head>
				<body id='body'class=''style='font-family:sans-serif'>
					<div style='padding: 20px;text-align: justify'>
						<center>
							<a href="{$home_url}" class='j-xxlarge j-j-text-shadow' style='padding: 15px 10px;color: teal;text-decoration: none;font-size: 35px;cursor: pointer;'>
        <img src="{$media_url}"class=''alt="{$company_name} LOGO IMAGE"style="width:98%;max-width:500px;height:70px;">
							</a><br><br><br>
						</center>
						<div class='j-text-color7'>
							<p>Hello Mr/Mrs {$name},</p>
							<p>We received your donation of {$currency} {$amount}, We appreciate and are grateful for your support.</b></p>
							<p>We will make sure that we use your donation for a good cause.<br> Thanks for supporting humanitarian service.</p><br>
							
							<p>Thanks for supporting us.</p>
							<p>Best Regards.</p>
							<p>{$company_name} Team.</p><br>
							
							<p>You receive this email, because you are currently using Jeph Foundation. If you are not responsible for this email, kindly ignore it.</p>
							<hr>
							<div class='j-text-color5' style='font-family: Open Sans'>
								<p>Copyright <?= date('Y');?> {$company_name} All rights reserved.</p>
							</div>
							<hr>
						</div>
					</div>
				</body>
			</html>
EOF;
}
//email code message ends
//MAIL FUNCTION ENDS

// DATE AND TIME FUNCTION STARTS
//show date starts
function show_date($date,$type = 'date'){
 if($type === 'year'){
  $year = new DateTime($date.'-01');
  return $year->format('Y');
 }elseif($type === 'month'){
  $month = new DateTime($date);
  return $month->format('F Y');
 }else{
		$thedate = strtotime($date);
		return date('M d, Y',$thedate);	
 }//end of else
}
//show date ends

//show time starts
function show_time($time){
 $time = new DateTime($time);
	return $time->format('g:ia');
}
//show time ends

//show date starts
 function showdate($datetime,$type){
	$now = time()-60*60;
	$thedate = strtotime($datetime);
	if($type === "short"){ //return in full format for short
		return date('jS, M Y',$thedate);
	}else{ // else return in full format
		return date('jS, M Y : g:i a',$thedate);	
	}
 }
//show date ends

//format date to sql starts
function format_sql_date($date=''){
 if(empty($date)){$datetime = new DateTime();}else{$datetime = new DateTime($date);}
 return $datetime->format('Y-m-d G:i:s');
}
//format date to sql ends
// DATE AND TIME FUNCTION ENDS

//FILE UPLOAD STARTS
// validate file starts
	function validate_uploaded_file($upload_name,$type,$array_file_format,$size,$form = 'single',$array_num = 0){
	if(is_array($upload_name) && is_array($array_file_format) && is_numeric($size) && is_numeric($array_num)){
		if($form === 'multiple'){
			if($type === 'image'){//if the type is image
				if(!is_uploaded_file($upload_name['tmp_name'][$array_num])){//check if file is truly uploaded
					return false;
				}elseif(!getimagesize($upload_name["tmp_name"][$array_num])){//check if file is image
					return false;
				}elseif(!in_array($upload_name["type"][$array_num],$array_file_format)){//check file format
					return false;
				}elseif($upload_name["size"][$array_num] > $size){//check image size $size000kb
					return false;
				}else{
					return true;
				}
			}elseif($type === 'video'){//if the type is video
				if(!in_array($upload_name["type"][$array_num],$array_file_format)){//check file format
					return false;
				}elseif($upload_name["size"][$array_num] > $size){//check video size $size000kb
					return false;	
				}else{
					return true;
				}
			}else{//if $type is not image or video
				return false;
			}
		}else{// else if $form is multiple
			if($type === 'image'){//if the type is image
				if(!is_uploaded_file($upload_name['tmp_name'])){//check if file is truly uploaded
					return false;
				}elseif(!getimagesize($upload_name["tmp_name"])){//check if file is image
					return false;
				}elseif(!in_array($upload_name["type"],$array_file_format)){//check file format
					return false;
				}elseif($upload_name["size"] > $size){//check image size $size000kb
					return false;
				}else{
					return true;
				}
			}elseif($type === 'video'){//if the type is video
				if(!in_array($upload_name["type"],$array_file_format)){//check file format
					return false;
				}elseif($upload_name["size"] > $size){//check video size $size000kb
					return false;	
				}else{
					return true;
				}
			}else{//if $type is not image or video
				return false;
			}
		}//end of else if $form is single
	}else{// if the upload and co requirment is not met
		return false;
	}// end if the upload and co requirment is not met
}
// validate file ends

//correct rotation starts
function correct_image_rotation($filename){
	//if function exists
	if(function_exists('exif_read_data')){
		@$exif = exif_read_data($filename); // assign exif_read_data info to variable
		// if the exif array and the orientation sub array is set
		if($exif && isset($exif['Orientation']) && ($exif['Orientation'] !== 1)){
			//if $orientation is not 1 check the orientation and assign the appropriate degree to be rotated to it
    $deg = 0;
    switch($exif['Orientation']){
     case 3:
     $deg = 180;
     break;
     case 6:
     $deg = 270;
     break;
     case 8:
     $deg = 90;
     break;
    }// end of switch
				if(exif_imagetype($filename) === 1 ){ //if imagetypes is gif
					$img = imagecreatefromgif($filename);
					//if degree is set
					if($deg){
						$img = imagerotate($img,$deg,0); //rotate image
					}// end of if degree
					imagegif($img,$filename,95); //rewrite image back to the disk as $filename
					imagedestroy($img); //destory image
				}elseif(exif_imagetype($filename) === 2 ){ //if imagetypes is jpg
					$img = imagecreatefromjpeg($filename);
					//if degree is set
					if($deg){
						$img = imagerotate($img,$deg,0); //rotate image
					}// end of if degree
					//rewrite image back to the disk as $filename
					imagejpeg($img,$filename,95);//rewrite image back to the disk as $filename
					imagedestroy($img); //destory image
				}elseif(exif_imagetype($filename) === 3){ //if imagetypes is png
					$img = imagecreatefrompng($filename);
					//if degree is set
					if($deg){
						$img = imagerotate($img,$deg,0); //rotate image
					}// end of if degree
					//rewrite image back to the disk as $filename
					imagepng($img,$filename,95);
					imagedestroy($img);
				}
		}// end of if orientation is set
	}// end of if function exists
}// end of function
//correct rotation ends

//correct_image_extension starts
function correct_image_extension($newfile,$extension_type){
 if(in_array(exif_imagetype($newfile),$extension_type) && exif_imagetype($newfile) === 1){ //gif
  $extension = "gif";
 }elseif(in_array(exif_imagetype($newfile),$extension_type) && exif_imagetype($newfile) === 2){ //jpg
  $extension = "jpg";
 }elseif(in_array(exif_imagetype($newfile),$extension_type) && exif_imagetype($newfile) === 3){ //png
  $extension = "png";
 }else{// else unlink
  unlink($newfile);
  $error[] = "no accepted extension";
  return false;
 }// end of else unlink
 
 if(empty($error)){
  $file = pathinfo($newfile);
  $realnewfile = $file['dirname']."/".$file['filename'].".".$extension;
  if(rename($newfile,$realnewfile)){
   return $realnewfile;
  }else{
   return false;
  }
 }
}
//correct_image_extension ends
//FILE UPLOAD ENDS

//SOCIAL MEDIA FUNCTION STARTS
function get_all_social_handle(){
 // creating connection
 require_once(file_location('inc_path','connection.inc.php'));
 @$conn = dbconnect('admin','PDO');
 $sql = "SELECT s_id,s_name,s_icon,s_link FROM social_handle_table";
 $stmt = $conn->prepare($sql);
 $stmt->bindColumn('s_id',$id);
 $stmt->bindColumn('s_name',$name);
 $stmt->bindColumn('s_icon',$icon);
 $stmt->bindColumn('s_link',$link);
 $stmt->execute();
 $numRow = $stmt->rowCount();
 if($numRow > 0){
  while($stmt->fetch()){
   ?><a href="http://<?=$link?>"style="margin:5px"class="j-tag j-xlarge j-round-large"title="<?=$name?>"target="_blank"><i class="<?=icon($icon,'fab')?>"></i></a></span><?php
  }// end of while
 }else{
   ?> <div class='j-text-color1 j-bolder'>No Social Media handle Uploaded</div> <?php
 }
closeconnect("stmt",$stmt);
closeconnect("db",$conn);
}
//SOCIAL MEDIA FUNCTION ENDS

//PARTNER FUNCTION STARTS
//get partner starts
function get_partner($id){
 ?>
  <div class='j-row'>
   <div class='j-col s12'style='padding: 0px 0px;'>
   <img src="<?=file_location('media_url',get_media('partner',$id))?>"alt="<?=ucfirst((content_data('partner_table','p_name',$id,'p_id')))?>Image"class=""style="width:17px;height:17px;margin-right:4px;">
   
   <span class=""><?=ucfirst((content_data('partner_table','p_name',$id,'p_id')))?></span>
   </div>
  </div>
 <?php
}
//get partner ends
//PARTNER FUNCTION ENDS

//NEWS FUNCTION STARTS
function get_news($id,$type='home'){
  if($type === 'sidebar'){
  ?>
  <a href="<?=file_location('home_url','n/n/'.urlencode(strtolower((content_data('news_table','n_title',$id,'n_id')))))?>"style='margin:15px 0px;'>
  <div class='j-row-padding'style='margin:10px 0px;'>
   <div class='j-col s2'style='padding: 5px 0px;'>
   <img src="<?=file_location('media_url',get_media('news',$id))?>"alt="Image"class="j-margin-right"style="width:100%">
   </div>
   <div class='j-col s10'>
   <span class=""><?=ucfirst((content_data('news_table','n_title',$id,'n_id')))?></span>
   </div>
  </div>
  </a>
  <?php
  }elseif($type === 'home' || $type === 'second_col'){
   ?>
   <a href="<?=file_location('home_url','n/n/'.urlencode(strtolower((content_data('news_table','n_title',$id,'n_id')))))?>">
 <div class='j-col s12 m12 <?=$type==='home'?'l4':'l6';?> j-padding'>
			<div class='j-color4 j-card-4'style='height:460px;overflow:hidden;'>
				<img src="<?=file_location('media_url',get_media('news',$id))?>"alt="<?=(content_data('news_table','n_title',$id,'n_id'))?> Image"class=""style="width:100%;height:230px;">
				<div class=''style='padding: 20px 15px;line-height:28px;'>
					<div class='j-large j-text-color3'><b><?=ucfirst((content_data('news_table','n_title',$id,'n_id')))?></b></div>
					<div class='j-bolder j-text-color5'><b><?=show_date(content_data('news_table','n_regdatetime',$id,'n_id'))?></b></div>
					<div class='j-text-color3'><?=text_length2(ucfirst((content_data('news_table','n_paragraph1',$id,'n_id'))),150)?></div>
				</div>
			</div>
		</div>
   </a>
 <?php
  }elseif($type === 'details'){
  ?>
  <div class="j-large"style=""><h3 title="<?=ucfirst((content_data('news_table','n_title',$id,'n_id')))?>"><b><?=ucfirst((content_data('news_table','n_title',$id,'n_id')))?></b></h3></div>
    <div class='j-display-container'style="width:98%;max-height:300px;padding: 0px 0px 0px 0px;">
       <img  class=''src="<?=file_location('media_url',get_media('news',$id))?>"alt="<?=ucfirst((content_data('news_table','n_title',$id,'n_id')))?> Image"style="width:100%;max-height:inherit;">
       <span class='j-color3 j-text-color4 j-display-bottomleft j-padding'><b><?=show_date(content_data('news_table','n_regdatetime',$id,'n_id'))?></b></span>
      </div>
    <div style='line-height:30px;'>
     <br>
     <div class=''style="padding:0px;"><?=convert_2_br(ucfirst((content_data('news_table','n_paragraph1',$id,'n_id'))))?></div><br>
     <?php if(!empty(content_data('news_table','n_paragraph2',$id,'n_id'))){ ?>
     <div class=''style="padding:0px;"><?=convert_2_br(ucfirst((content_data('news_table','n_paragraph2',$id,'n_id'))))?></div><br>
     <?php }
     if(!empty(content_data('news_table','n_paragraph3',$id,'n_id'))){ ?>
     <div class=''style="padding:0px;"><?=convert_2_br(ucfirst((content_data('news_table','n_paragraph3',$id,'n_id'))))?></div><br>
     <?php }?>
    </div>
  <?php
  }
}
//NEWS FUNCTIONS ENDS

//PROGRAMME FUNCTION STARTS
function get_programme($id,$type='home'){
 if($type === 'sidebar'){
  ?>
  <a href="<?=file_location('home_url','p/p/'.urlencode(strtolower((content_data('programme_table','p_title',$id,'p_id')))))?>"style='margin:15px 0px;'>
  <div class='j-row-padding'style='margin:10px 0px;'>
   <div class='j-col s2'style='padding: 5px 0px;'>
   <img src="<?=file_location('media_url',get_media('programme',$id))?>"alt="Image"class="j-margin-right"style="width:100%">
   </div>
   <div class='j-col s10'>
   <span class=""><?=ucfirst((content_data('programme_table','p_title',$id,'p_id')))?></span>
   </div>
  </div>
  </a>
  <?php
  }elseif($type === 'home' || $type === 'second_col'){
 ?>
 <a href="<?=file_location('home_url','p/p/'.urlencode(strtolower((content_data('programme_table','p_title',$id,'p_id')))))?>">
 <div class='j-col s12 m12 <?=$type==='home'?'l4':'l6';?> j-padding'>
			<div class='j-color4 j-card-4 j-display-container'style="height:320px;background-image:url('<?=file_location('media_url',get_media('programme',$id))?>');background-size:cover;">
    <div class='j-display-bottommiddle j-padding-large'style='width:100%;background-color:rgba(0,0,0,0.7);'>
     <div class='j-large j-text-color4'><?=ucfirst((content_data('programme_table','p_title',$id,'p_id')))?></div>
     <div class='j-bolder j-text-color5'><?=show_date(content_data('programme_table','p_regdatetime',$id,'p_id'))?></div>
    </div>
   </div>
	</div>
 </a>
 <?php
 }elseif($type === 'details'){
  ?>
  <div class="j-large"style=""><h3 title="<?=ucfirst((content_data('programme_table','p_title',$id,'p_id')))?>">
   <b><?=ucfirst((content_data('programme_table','p_title',$id,'p_id')))?></b></h3>
  </div>
    <div class='j-display-container'style="width:98%;max-height:300px;padding: 0px 0px 0px 0px;">
       <img  class=''src="<?=file_location('media_url',get_media('programme',$id))?>"alt="<?=ucfirst(content_data('programme_table','p_title',$id,'p_id'))?> Image"style="width:100%;max-height:inherit;">
       <span class='j-color3 j-text-color4 j-display-bottomleft j-padding'><b><?=show_date(content_data('programme_table','p_regdatetime',$id,'p_id'))?></b></span>
      </div>
    <div style='line-height:30px;'>
     <br>
     <div class=''style="padding:0px;"><?=convert_2_br(ucfirst((content_data('programme_table','p_paragraph1',$id,'p_id'))))?></div><br>
     <?php if(!empty(content_data('programme_table','p_paragraph2',$id,'p_id'))){?>
     <div class=''style="padding:0px;"><?=convert_2_br(ucfirst((content_data('programme_table','p_paragraph2',$id,'p_id'))))?></div><br>
     <?php }
     if(!empty(content_data('programme_table','p_paragraph3',$id,'p_id'))){ ?>
     <div class=''style="padding:0px;"><?=convert_2_br(ucfirst((content_data('programme_table','p_paragraph3',$id,'p_id'))))?></div><br>
     <?php } ?>
    </div>
  <?php
  }
}
//PROGRAMME FUNCTIONS ENDS

//OTHERS FUNCTION STARTS
//get media starts
function get_media($type,$id){
	if($type === 'admin'){
  require_once(file_location('inc_path','connection.inc.php'));
  @$conn = dbconnect('admin','PDO');
  $sql = "SELECT am_link_name,am_extension FROM admin_media_table WHERE ad_id = :id LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_STR);
  $stmt->bindColumn('am_link_name',$link_name);
  $stmt->bindColumn('am_extension',$extension);
 }elseif($type === 'partner'){
  require_once(file_location('inc_path','connection.inc.php'));
  @$conn = dbconnect('admin','PDO');
  $sql = "SELECT pm_link_name,pm_extension FROM partner_media_table WHERE p_id = :id LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_STR);
  $stmt->bindColumn('pm_link_name',$link_name);
  $stmt->bindColumn('pm_extension',$extension);
 }elseif($type === 'news'){
  require_once(file_location('inc_path','connection.inc.php'));
  @$conn = dbconnect('admin','PDO');
  $sql = "SELECT nm_link_name,nm_extension FROM news_media_table WHERE n_id = :id LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_STR);
  $stmt->bindColumn('nm_link_name',$link_name);
  $stmt->bindColumn('nm_extension',$extension);
 }elseif($type === 'programme'){
  require_once(file_location('inc_path','connection.inc.php'));
  @$conn = dbconnect('admin','PDO');
  $sql = "SELECT pm_link_name,pm_extension FROM programme_media_table WHERE p_id = :id LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_STR);
  $stmt->bindColumn('pm_link_name',$link_name);
  $stmt->bindColumn('pm_extension',$extension);
 }else{
  return 'home/no_media.jpg';
 }
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 0){
		while($stmt->fetch()){
   $file = $type.'/'.($link_name).".".($extension);
   if(file_exists(file_location('media_path',$file)) && is_file(file_location('media_path',$file))){
    return $file;
   }else{
     if($type === 'admin'){return 'home/avatar.png';}else{return 'home/no_media.png';}
   }
		}
	}else{
  if($type === 'admin'){return 'home/avatar.png';}else{return 'home/no_media.png';}
	}
 closeconnect("stmt",$stmt);
 closeconnect("db",$conn);
}
//get media ends
//OTHERS FUNCTION ENDS



//ADMIN FUNCTION STARTS
function get_level($highest){
 ?><option value="">Select Admin Level</option><?php
 for($i = 1;$i <= $highest;$i++){
 ?>
 <option value="<?=$i?>"><?=ucwords(check_level($i))?></option>
 <?php
 }//end of for
}
function check_level($id){
 if($id == 1){
  return 'admin';
 }elseif($id == 2){
  return "grand admin";
 }
}
//ADMIN FUNCTION ENDS


//MODAL FUNCTION STARTS
function image_modal($type,$id){//get_media($type,$id) !== 'home/home.jpg'
 ?>
 <div id="<?=$type?>_pics_modal" class="j-modal">
  <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-teal">
   <div class="j-display-container">
    <div class="j-line-height j-text-color1">
     <div class='j-clickable j-row'onclick="$('#<?=$type?>_pics_modal').hide();ti($('#<?=$type?>_pics'))">
      <div class="j-col s1"> <i class='<?= icon('upload');?>'></i> </div>
      <div class="j-col s11">Change Image</div>
     </div>
     <input type="file"name="<?=$type?>_pics"id="<?=$type?>_pics"class="j-round j-hide"onchange="ci(this,'<?=$type?>',<?=addnum($id)?>);">
     <?php
     if(get_media($type,$id) !== 'home/no_media.png' && get_media($type,$id) !== 'home/avatar.png'){
      ?>
      <div class='j-clickable j-row' onclick="$('#<?=$type?>_pics_modal').hide();ri('<?=$type?>',<?=addnum($id)?>);">
       <div class="j-col s1"> <i class='<?= icon('times');?>'></i> </div>
       <div class="j-col s11">Remove Image</div>
      </div>
      <?php
      }
      ?>
   </div>
   </div>
  </div>
 </div>
 <?php
 }
//image modal ends

//preview modal starts
function preview_modal($type,$id = ''){
 ?>
  <div  id="<?=$type.$id?>" class="j-modal">
   <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-large" style="width:98%; max-width:400px;height: auto;">
    <div class="j-display-container j-padding">
     <p class='j-text-color1'><b>Settings</b></p><hr>
							<span class="j-button j-display-topright j-large j-text-color1 <?= icon('times');?>"onclick="$('#<?=$type.$id?>').hide()"></span>
       <div class="j-text-color1" style="line-height: 35px;">
        <?php if($type === 'admin'){ ?>
        <div class='j-clickable j-row'onclick="$('#<?=$type.$id?>').hide();$('#update_<?=$type.$id?>').show();">
									<div class="j-col s1"><i class='<?=icon('sort-amount-up');?>'></i></div>
         <div class="j-col s11">Update <?=ucfirst($type)?> Level</div>
        </div>
        <?php content_data('admin_table','ad_status',$id,'ad_id') === 'active'? $status = 'suspend' : $status = 're-activate';?>
        <div class='j-clickable j-row'onclick="$('#<?=$type.$id?>').hide();cs('<?=$type?>',<?=addnum($id)?>)">
         <div class="j-col s1"><i class='<?=icon('ban');?>'></i></div>
         <div class="j-col s11"><?=ucwords($status.' '.content_data('admin_table','ad_fullname',$id,'ad_id'))?></div>
        </div>
        <?php
        }elseif($type === 'news'){
         content_data('news_table','n_status',$id,'n_id') === 'active'? $status = 'pend' : $status = 'activate';
         ?>
        <div class='j-clickable j-row'onclick="$('#<?=$type.$id?>').hide();cs('<?=$type?>',<?=addnum($id)?>)">
         <div class="j-col s1"><i class='<?=icon('ban');?>'></i></div>
         <div class="j-col s11"><?=ucwords($status)?> News</div>
        </div>
        <?php
        }elseif($type === 'programme'){
         content_data('programme_table','p_status',$id,'p_id') === 'active'? $status = 'pend' : $status = 'activate';
         ?>
        <div class='j-clickable j-row'onclick="$('#<?=$type.$id?>').hide();cs('<?=$type?>',<?=addnum($id)?>)">
         <div class="j-col s1"><i class='<?=icon('ban');?>'></i></div>
         <div class="j-col s11"><?=ucwords($status)?> Programme</div>
        </div>
        <?php
        }
        if($type !== 'message' && $type !== 'subscriber' && $type !== 'transaction' && $type !== 'admin'){?>
          <a href='<?= file_location("admin_url","{$type}/update_{$type}/".addnum($id)."/");?>'>
          <div class='j-clickable j-row'>
           <div class="j-col s1"><i class='<?= icon('edit');?>'></i></div>
           <div class="j-col s11">Update <?=ucfirst($type)?></div>
          </div>
          </a>
        <?php } ?>       
        <div class='j-clickable j-row'onclick="$('#<?=$type.$id?>').hide();$('#delete_<?=$type.$id?>').show();">
									<div class="j-col s1"><i class='<?=icon('trash');?>'></i></div>
         <div class="j-col s11">Delete <?=ucfirst($type)?></div>
        </div>
       </div><br>
       </div>
    </div>
   </div>
  </div>
  <!--update_modal starts-->
  <center>
					<div  id="update_<?=$type.$id?>" class="j-modal">
						<div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
							<div class="j-center">
								<div class="j-container j-text-color1 j-large"><p><b>Update <?=ucfirst($type)?> Level?</b></p></div>
								<div>
         <select id="lv"name="lv"class="j-select j-border j-border-color5 j-color4 j-round-large"style="width:90%;"><?php get_level(2)?></select><br><br>
         <div style='display:inline'>
          <input type='submit'class="j-btn j-color1 j-hover-color5 j-round-large"name='update_<?=$type?>'value='Update'
          onclick="$('#update_<?=$type.$id?>').hide();upl($('#lv').val(),<?=addnum($id)?>);">
         </div>
									<p style="display:inline"><button class="j-btn j-color5 j-hover-dark-color5 j-round-large" onclick="$('#update_<?=$type.$id?>').hide();">Cancel</button></p>
								</div><br>
							</div>
						</div>
					</div>
		</center>
  <!--update modal ends-->
  <!--delete_modal starts-->
  <center>
					<div  id="delete_<?=$type.$id?>" class="j-modal">
						<div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
							<div class="j-center">
								<div class="j-container j-text-color1 j-large"><p><b>Delete <?=ucfirst($type)?>?</b></p></div>
								<div>
									<h5 class="">Your action cannot be reversed</h5><hr>
         <div style='display:inline'>
          <input type='submit'class="j-btn j-color1 j-hover-color5 j-round-large"name='delete_<?=$type?>'value='Delete'onclick="$('#delete_<?=$type.$id?>').hide();dc('<?=$type?>',<?=addnum($id)?>);">
         </div>
									<p style="display:inline"><button class="j-btn j-color5 j-hover-dark-color5 j-round-large" onclick="$('#delete_<?=$type.$id?>').hide();">Cancel</button></p>
								</div><br>
							</div>
						</div>
					</div>
		</center>
  <!--delete modal ends-->
  <?php
}
//preview modal ends

//other modal starts
function other_modal($type){
 if($type === 'log_out'){
 ?>
 <!--logout modal starts-->
 <center>
  <div id="log_out_modal"class="j-modal j-large">
   <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1"style="width:98%;max-width:400px;height:auto;">
    <div class="j-display-container j-center">
     <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#log_out_modal').hide();"></span>
     <div class="j-container j-text-color1"><p><b>Log Out?</b></p></div>
     <div>
      <h5 class="">Are you sure want to log out of your account?</h5><hr>
							<p><span class="j-btn j-hover-color5 j-round-large j-color1 j-text-color4"onClick="lg();">Log Out</span></p>
       <p><button class="j-btn j-text-color3 j-hover-color1 j-round-large"onclick="$('#log_out_modal').hide();">Cancel</button></p>
					</div>
    </div>
   </div>
  </div>
	</center>
	<!--logout modal ends-->
 <?php
 }elseif($type === 'delete_account'){
  ?>
  <!--deleteadmin modal starts-->
  <center>
   <div  id="delete_account_modal" class="j-modal j-large">
    <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
     <div class="j-display-container j-center">
      <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#delete_account_modal').hide();"></span>
      <div class="j-container j-text-color1"><p><b>Delete Account?</b></p></div>
      <div>
       <h5 class="">Are you sure want to delete your account?. The action cannot be reverse.</h5><hr>
       <span class='j-text-color1 mg'id='pse'></span>
       <input type="password"class=" j-input j-medium j-border j-border-color5 j-round-large"placeholder="Password"
          name="ps"id="ps"value=""style="width:100%;"/><br>
							<p style='display:inline'><span type="submit" class="j-btn j-hover-color5 j-round-large j-color1 j-text-color4"onClick="da($('#ps'))">Delete</span></p>
       <p style='display:inline'><button class="j-btn j-color3 j-text-color4 j-hover-color1 j-round-large" onclick="$('#delete_account_modal').hide();">Cancel</button></p>
      </div>
     </div>
    </div>
   </div>
  </center>
  <!--deleteadmin modal ends-->
  <?php
 }
}
//other modal ends
//MODAL FUNCTIONS ENDS
?>