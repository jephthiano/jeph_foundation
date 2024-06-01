<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','admin/preview_admin/'.$_GET['page']);
$page = "PREVIEW ADMIN";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if($adid !== 1 || content_data('admin_table','ad_level',$adid,'ad_id') != 2){trigger_error_manual(404);}
if(isset($_GET['page']) AND is_numeric($_GET['page'])){ //getting the value of the get 
	$cid = test_input(removenum($_GET['page']));
	if(!empty($cid)){	
		$id = content_data('admin_table','ad_id',$cid,'ad_id');
	}else{
		trigger_error_manual(404);
	}
}else{
	trigger_error_manual(404);
}
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
				<div class='j-padding'>
					<a href="<?=file_location('admin_url','admin/')?>" class="j-btn j-color1 j-left j-round j-card-4 j-bolder">Show All Admins</a>
					<a href="<?=file_location('admin_url','admin/insert_admin/')?>"class='j-btn j-color1 j-right j-round j-card-4 j-bolder'>Insert New Admin</a>
				</div>
				</center>
				<br class='j-clearfix'><br>
				<div class="j-container">
					<?php
					if($id === false){
						page_not_available('short');
					}else{
						?>
						<h2 class='j-text-color1 j-center'><b>ADMIN DATA</b></h2>
						<span class="j-right j-clickable j-text-color1" onclick="$('#admin<?=$id?>').show()"><i class="j-xlarge <?=icon('cog')?>"></i></span>
						<center>
							<div>
								<img src='<?=file_location('media_url',get_media('admin',$id))?>'alt=''class='j-circle j-card-4'style='width:150px;height:150px;border:solid 2px white'>
								<br><br>
							</div>
						</center>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>EMAIL:</b></div>
							<div class='j-col s8'><b><?=(content_data('admin_table','ad_email',$id,'ad_id'))?></b></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>USERNAME:</b></div>
							<div class='j-col s8'><b><?=(content_data('admin_table','ad_username',$id,'ad_id'))?></b></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>FULLNAME:</b></div>
							<div class='j-col s8'><b><?=(content_data('admin_table','ad_fullname',$id,'ad_id'))?></b></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>LEVEL:</b></div>
							<div class='j-col s8'><b><?=ucwords(check_level(content_data('admin_table','ad_level',$id,'ad_id')))?></b></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>STATUS:</b></div>
							<div class='j-col s8'><b><?=ucwords((content_data('admin_table','ad_status',$id,'ad_id')))?></b></div>
						</div>
						
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>REGISTERED BY:</b></div>
							<div class='j-col s8'><b>
							<?php
							$reg = content_data('admin_table','ad_registered_by',$id,'ad_id');
							if(content_data('admin_table','ad_registered_by',$reg,'ad_id') === false ){echo "Unknown";}else{echo ucwords((content_data('admin_table','ad_username',$reg,'ad_id')));}
							?>
							</b></div>
						</div>
						<br><br>
						<?php
					}
					?>
				</div>
				<span id="st"></span>
			<?php if($adid === 1 && $id !== false){ preview_modal('admin',$id); } ?>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>