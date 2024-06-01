<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "DONATE | ".get_xml_data('seo_tag');
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
$page_url = file_location('home_url','payment/donate/');
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title></head>
<body id="body"class="j-light-gray"style="font-family:Roboto,sans-serif;">
	<div><?php require_once(file_location('inc_path','navigation.inc.php')); //navigation?></div>
	<br><br><br>
	<div class='j-misc-padding'>
		<div class='j-color j-newsletter-padding'>
			<center>
				<div class='j-text-color1 j-xxlarge'><b>Donate To <?=ucwords(get_xml_data('company_name'))?> (Electronically)</b></div>
				<div class='j-bolder j-large'style='margin:10px 0px;font-family:sofia'>We Appreciate Your Effort to Support Us</div>
			</center>
			<form>
				<div><b class='j-text-color1'>NAME:</b><span class='mg j-text-color1'id='nme'>*</span></div>
				<input type='text'id='nm'name='nm'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Name'style="width:100%;max-width:400px;"/><br>
				<div><b class='j-text-color1'>EMAIL:</b><span class='mg j-text-color1'id='eme'>*</span></div>
				<input type='email'id='em'name='em'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Email'style="width:100%;max-width:400px;"/><br>
				<div><b class='j-text-color1'>PHONE NUMBER:</b><span class='mg j-text-color1'id='phe'>*</span></div>
				<input type='tel'id='ph'name='ph'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Phonenumber'style="width:100%;max-width:400px;"/><br>
				<div><b class='j-text-color1'>AMOUNT:(in dollar)</b><span class='mg j-text-color1'id='ame'>*</span></div>
				<input type='number'id='am'name='am'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Amount'style="width:100%;max-width:400px;"/><br>
				<button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round-large">Proceed to Payment</button>
			</form>
		</div>
	</div>
	<br>
	<div><?php require_once(file_location('inc_path','footer.inc.php')); //footer?></div>
	
	<span id='st'></span>
	<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>