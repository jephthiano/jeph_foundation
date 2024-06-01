<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','news/update_news/'.$_GET['page']);
$page = "UPDATE NEWS";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['page']) AND is_numeric($_GET['page'])){ //getting the value of the get 
	$cid = test_input(removenum($_GET['page']));
	if(!empty($cid)){	
		$id = content_data('news_table','n_id',$cid,'n_id');
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
				<a href="<?=file_location('admin_url','news/')?>" class="j-btn j-color1 j-left j-round j-card-4 j-bolder">Show All News</a>
				<a href="<?=file_location('admin_url','news/insert_news/')?>"class='j-btn j-color1 j-right j-round j-card-4 j-bolder'>Insert New News</a>
			</center>
				<br>
				<div class="j-container">
					<?php
					if($id === false){
						page_not_available('short');
					}else{
						?>
						<h2 class='j-text-color1 j-center'><b>UPDATE NEWS</b></h2>
						<div>
							<div id='preview'class='j-border-color5 j-border j-circle j-color5 j-vertical-center-container'style='width:100px;height:100px;'
								 onclick="$('#news_pics_modal').show();">
								<img src='<?=file_location('media_url',get_media('news',$id))?>'alt=''class='j-circle j-card-4'style='width:100px;height:100px;border:solid 2px white'>
								<span class='j-text-color4 j-bold j-vertical-center-element'style='font-size:40px;'>+</span>
							</div>
							<br><br>
							<?php image_modal('news',$id)?>
						</div>
						<form onsubmit="event.preventDefault();"class=''>
							<label class="j-large"><b>Title</b> <span class='j-text-color1 mg'id="tte">*</span></label><br class='j-clearfix'>
							<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Title"
								name="tt"id="tt"value="<?=content_data('news_table','n_title',$cid,'n_id')?>"style="width:100%;max-width:400px"/>
							<br>
								
							<label class="j-large"><b>Keywords</b> <span class='j-text-color1 mg'id="kye">*</span></label><br class='j-clearfix'>
							<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Keywords"
								name="ky"id="ky"value="<?=content_data('news_table','n_keyword',$cid,'n_id')?>"style="width:100%;max-width:400px"/>
							<div class='j-small j-itallic'>(Seperate each keyword with | e.g Keyword|good boy|each)</div>
							<br>
							
							<label class="j-large"><b>Paragraph One</b> <span class='j-text-color1 mg'id='p1e'>*</span></label><br class='j-clearfix'>
							<textarea placeholder="Paragraph One"id='p1'name="p1"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"
							><?=content_data('news_table','n_paragraph1',$cid,'n_id')?></textarea>
							<br>
							
							<label class="j-large"><b>Paragraph Two</b></label><br class='j-clearfix'>
							<textarea placeholder="Paragraph Two"id='p2'name="p2"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"
							><?=content_data('news_table','n_paragraph2',$cid,'n_id')?></textarea>
							<div class='j-small j-itallic'>(optional)</div>
							<br>
							
							<label class="j-large"><b>Paragraph Three</b></label><br class='j-clearfix'>
							<textarea placeholder="Paragraph Three"id='p3'name="p3"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"
							><?=content_data('news_table','n_paragraph3',$cid,'n_id')?></textarea>
							<div class='j-small j-itallic'>(optional)</div>
							<br>
							
							<label class="j-large"><b>Datetime</b> <span class='j-text-color1 mg'id="dte"></span></label><br class='j-clearfix'>
							<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Datetime"
								name="dt"id="dt"value="<?=content_data('news_table','n_regdatetime',$cid,'n_id')?>"style="width:100%;max-width:400px"/>
							<div class='j-small j-itallic'>(if field is left blank, current time will be used or type in your date in the following format 2021-09-05 15:45:23)</div>
							<br>
							
							<input type='hidden'name='tid'value='<?=addnum($id)?>'/>
							<button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round-large j-bolder">Update News</button>
						</form>
						<?php
					}
					?>
				</div>
				<span id="st"></span>
				<br><br>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>