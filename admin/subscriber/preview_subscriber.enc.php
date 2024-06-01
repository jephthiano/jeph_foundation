<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','subscriber/preview_subscriber/'.$_GET['page']);
$page = "PREVIEW SUBSCRIBER";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['page']) AND is_numeric($_GET['page'])){ //getting the value of the get 
	$cid = test_input(removenum($_GET['page']));
	if(!empty($cid)){	
		$id = content_data('subscribe_table','s_id',$cid,'s_id');
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
					<a href="<?=file_location('admin_url','subscriber/')?>"class='j-btn j-color1 j-right j-round j-card-4 j-bolder'>Show All Subscriber(s)</a>
				</div>
				</center>
				<br class='j-clearfix'>
				<div class="j-container j-large">
					<?php
					if($id === false){
						page_not_available('short');
					}else{
						?>
						<h2 class='j-text-color1 j-center'><b>PREVIEW SUBSCRIBER</b></h2>
						<span class="j-right j-clickable j-text-color1" onclick="$('#subscriber<?=$id?>').show()"><i class="j-xlarge <?=icon('cog')?>"></i></span>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>NAME:</b></div>
							<div class='j-col s8'><?=ucwords((content_data('subscribe_table','s_name',$id,'s_id')))?></div>
						</div>
						<div class="j-row-padding j-padding">
							<div class='j-col s4 j-text-color1'><b>EMAIL:</b></div>
							<div class='j-col s8'><?=(content_data('subscribe_table','s_email',$id,'s_id'))?></div>
						</div>
						<?php
					}
					?>
				</div>
				<br><br>
				<span id="st"></span>
			<?php if($adid === 1 && $id !== false){ preview_modal('subscriber',$id); } ?>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>