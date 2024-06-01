<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','social_handle/preview_social_handle/'.$_GET['page']);
$page = "PREVIEW SOCIAL HANDLE";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['page']) AND is_numeric($_GET['page'])){ //getting the value of the get 
	$cid = test_input(removenum($_GET['page']));
	if(!empty($cid)){	
		$id = content_data('social_handle_table','s_id',$cid,'s_id');
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
			<center>
				<br><br>
				<div class='j-padding'>
					<a href="<?=file_location('admin_url','social_handle/')?>" class="j-bolder j-btn j-color1 j-left j-round j-card-4">Show All Social Handle</a>
					<a href="<?=file_location('admin_url','social_handle/insert_social_handle/')?>"class='j-bolder j-btn j-color1 j-right j-round j-card-4'>Insert New Social Handle</a>
				</div>
				</center>
				<br class='j-clearfix'>
				<div class="j-container">
					<?php
					if($id === false){
						page_not_available('short');
					}else{
						?>
						<h2 class='j-text-color1 j-center'><b>SOCIAL HANDLE DATA</b></h2>
						<span class="j-right j-clickable j-text-color1" onclick="$('#social_handle<?=$id?>').show()"><i class="j-xlarge <?=icon('cog')?>"></i></span>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color3 j-bolder'><b>NAME:</b></div>
							<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('social_handle_table','s_name',$id,'s_id')))?></b></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color3 j-bolder'><b>ICON</b></div>
							<div class='j-col s8 j-text-color5'><i class="<?=icon((content_data('social_handle_table','s_icon',$id,'s_id')),'fab')?>"></i></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color3 j-bolder'><b>LINK:</b></div>
							<div class='j-col s8 j-text-color5'><b><?=(content_data('social_handle_table','s_link',$id,'s_id'))?></b></div>
						</div>
						<br><br>
						<?php
					}
					?>
				</div>
				<span id="st"></span>
			<?php if($adid === 1 && $id !== false){preview_modal('social_handle',$id); }?>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>