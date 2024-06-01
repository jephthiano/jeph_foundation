<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','message/');
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['status'])){
	$sta = ($_GET['status']);
	if($sta === 'seen' || $sta === 'new' || $sta === 'all' ){$status = $sta;}else{$status = 'all';}
}else{
$status = 'all';	
}
$page = "MANAGE ".strtoupper($status)." MESSAGES";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
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
			<!--ADMIN SECTION BEGINS -->
			<center>
				<br><h2 class='j-text-color1'><b>MANAGE <?=strtoupper($status)?> MESSAGES</b></h2>
				<div class='j-padding'>
					<?php
					if($status === 'all'){
						?>
						<a href="<?=file_location('admin_url','message/new/')?>"class='j-btn j-color1 j-left j-round j-card-4'><b>Show new messages</b></a>
						<a href="<?=file_location('admin_url','message/seen/')?>"class='j-btn j-color1 j-right j-round j-card-4'><b>Show seen messages</b></a>
						<?php
					}elseif($status === 'new'){
						?>
						<a href="<?=file_location('admin_url','message/')?>"class='j-btn j-color1 j-left j-round j-card-4'><b>Show all messages</b></a>
						<a href="<?=file_location('admin_url','message/seen/')?>"class='j-btn j-color1 j-right j-round j-card-4'><b>Show seen messages</b></a>
						<?php
					}elseif($status === 'seen'){
						?>
						<a href="<?=file_location('admin_url','message/new/')?>"class='j-btn j-color1 j-left j-round j-card-4'><b>Show new messages</b></a>
						<a href="<?=file_location('admin_url','message/')?>"class='j-btn j-color1 j-right j-round j-card-4'><b>Show all messages</b></a>
						<?php
					}
					?>
				</div>
				<br><br>
				<div class="j-container">
					<input type="search"name="sx"id="sx"class="j-input j-border-2 j-border-color1 j-round-large"
					placeholder="Search <?=$status?> messages"style="width:96%;max-width:500px;outline:none;display:inline"onsearch="gmr('<?=$status?>');"onkeyup="gmr('<?=$status?>');"/>
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