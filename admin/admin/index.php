<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','admin/');
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['status'])){
	$sta = ($_GET['status']);
	if($sta === 'active' || $sta === 'suspended' || $sta === 'all' ){$status = $sta;}else{$status = 'all';}
}else{
$status = 'all';	
}
$page = "MANAGE ".strtoupper($status)." ADMIN";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
if($adid !== 1){trigger_error_manual(404);}
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
		<div id="maincol">
			<center>
				<br><h2 class='j-text-color1'><b>MANAGE <?=strtoupper($status)?> ADMINS</b></h2>
				<div class='j-padding'>
					<?php
					if($status === 'all'){
						?>
						<a href="<?=file_location('admin_url','admin/suspended/')?>"class='j-btn j-color1 j-left j-round j-card-4'><b>Show suspended admin</b></a>
						<a href="<?=file_location('admin_url','admin/active/')?>"class='j-btn j-color1 j-center j-round j-card-4'><b>Show active admin</b></a>
						<a href="<?=file_location('admin_url','admin/insert_admin/')?>"class='j-btn j-color1 j-right j-round j-card-4'><b>Insert New Admin</b></a>
						<?php
					}elseif($status === 'suspended'){
						?>
						<a href="<?=file_location('admin_url','admin/')?>"class='j-btn j-color1 j-left j-round j-card-4'><b>Show all admin</b></a>
						<a href="<?=file_location('admin_url','admin/active/')?>"class='j-btn j-color1 j-center j-round j-card-4'><b>Show active admin</b></a>
						<a href="<?=file_location('admin_url','admin/insert_admin/')?>"class='j-btn j-color1 j-right j-round j-card-4'><b>Insert New Admin</b></a>
						<?php
					}elseif($status === 'active'){
						?>
						<a href="<?=file_location('admin_url','admin/suspended/')?>"class='j-btn j-color1 j-left j-round j-card-4'><b>Show suspended admin</b></a>
						<a href="<?=file_location('admin_url','admin/')?>"class='j-btn j-color1 j-center j-round j-card-4'><b>Show all admin</b></a>
						<a href="<?=file_location('admin_url','admin/insert_admin/')?>"class='j-btn j-color1 j-right j-round j-card-4'><b>Insert New Admin</b></a>
						<?php
					}
					?>
				</div>
				<br><br>
				<div class="j-container">
					<input type="search"name="sx"id="sx"class="j-input j-border-2 j-border-color1 j-round-large"
					placeholder="Search <?=$status?> admins"style="width:96%;max-width:500px;outline:none;display:inline"onsearch="gar('<?=$status?>');"onkeyup="gar('<?=$status?>');"/>
				</div>
				<div id="shr"></div>
			</center>
			<span id="st"></span>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>