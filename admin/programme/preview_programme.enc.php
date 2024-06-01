<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','programme/preview_programme/'.$_GET['page']);
$page = "PROGRAMME DATA";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['page']) AND is_numeric($_GET['page'])){ //getting the value of the get 
	$cid = test_input(removenum($_GET['page']));
	if(!empty($cid)){	
		$id = content_data('programme_table','p_id',$cid,'p_id');
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
					<a href="<?=file_location('admin_url','programme/')?>" class="j-btn j-color1 j-left j-round j-card-4 j-bolder">Show All Programme</a>
					<a href="<?=file_location('admin_url','programme/insert_programme/')?>"class='j-btn j-color1 j-right j-round j-card-4 j-bolder'>Insert New Programme</a>
				</div>
			</center>
				<br class='j-clearfix'><br>				
				<div class="j-container">
					<?php
					if($id === false){
						page_not_available('short');
					}else{
						?>
						<h2 class='j-text-color1 j-center'><b>PREVIEW DATA</b></h2>
						<span class="j-right j-clickable j-text-color1" onclick="$('#programme<?=$id?>').show();"><i class="j-xlarge <?=icon('cog')?>"></i></span>
						<div class='j-large j-bolder j-text-color1 j-padding'><span>Status: </span> <span> <?=ucwords((content_data('programme_table','p_status',$cid,'p_id')))?></span></div>
						<?php $details_type = 'programme';require_once(file_location('inc_path','news_programme_details.inc.php'));?>
						<?php
					}
					?>
					<br<br><br>
				</div>
				<span id="st"></span>
			<?php preview_modal('programme',$id);?>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>