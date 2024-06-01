<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','admin/profile/');
$page = "PROFILE";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once(file_location('inc_path','meta.inc.php'));?>		
<title><?=$page_name?></title>
</head>
<body class="" style="font-family:Roboto,sans-serif;width:100%;"onload="">
<?php require_once(file_location('admin_inc_path','navigation.inc.php'));?>
<!-- BODY STARTS-->
<div class="j-row">
	<div class="j-col s12 l2 j-hide-small j-hide-medium">o
		<?php require_once(file_location('admin_inc_path','first_column.inc.php'));?>
	</div>
	<div class="j-col s12 l10"><br>
		<div id="maincol"class='j-main-col'>
			<!--ADMIN SECTION BEGINS -->
			<center>
				<br><br>
				<div class='j-padding j-right'>
					<a href="<?=file_location('admin_url','admin/edit_profile')?>"class="j-btn j-color1 j-round j-bolder j-card-4 j-margin">Edit Profile</a>
					<a href="<?=file_location('admin_url','admin/change_password/')?>"class='j-btn j-color1 j-round j-bolder j-card-4'>Change Password</a>
					<?php if(content_data('admin_table','ad_id',$adid,'ad_id') != 1){ ?>
					<span class="j-btn j-color1 j-round j-bolder j-card-4" onclick="$('#delete_account_modal').show();">Delete Account</span>
					<?php other_modal('delete_account')?>
					<?php }?>
				</div				
			</center>
			<br class='j-clearfix'><br>
			<h2 class='j-text-color1 j-center'><b>PROFILE DATA</b></h2>
				<div class="j-container">
					<center>
						<div>
							<img src='<?=file_location('media_url',get_media('admin',$adid))?>'alt=''class='j-circle j-card-4'style='width:150px;height:150px;border:solid 2px white'>
							<br><br>
						</div>
					</center>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>EMAIL:</b></div>
							<div class='j-col s8'><b><?=(content_data('admin_table','ad_email',$adid,'ad_id'))?></b></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>USERNAME:</b></div>
							<div class='j-col s8'><b><?=(content_data('admin_table','ad_username',$adid,'ad_id'))?></b></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>fullNAME:</b></div>
							<div class='j-col s8'><b><?=(content_data('admin_table','ad_fullname',$adid,'ad_id'))?></b></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>LEVEL:</b></div>
							<div class='j-col s8'><b><?=ucwords(check_level(content_data('admin_table','ad_level',$adid,'ad_id')))?></b></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>STATUS:</b></div>
							<div class='j-col s8'><b><?=ucwords((content_data('admin_table','ad_status',$adid,'ad_id')))?></b></div>
						</div>
						<br><br>
				</div>
				<span id="st"></span>
			<?php  //preview_modal('admin',$adid); ?>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>