<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
if(isset($_POST['s'])){
	// creating connection
	require_once(file_location('inc_path','connection.inc.php'));
	@$conn = dbconnect('admin','PDO');
	$searchtext = test_input(($_POST['s']));
	if(!empty($searchtext)){ // if the search text is not empty
		$searchtext = $searchtext."*";
		$sql = "SELECT s_id,s_name,s_email FROM subscribe_table
		WHERE (MATCH(s_name,s_email) AGAINST(:searchtext IN BOOLEAN MODE))
		ORDER BY MATCH(s_name,s_email) AGAINST(:searchtext IN BOOLEAN MODE)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':searchtext',$searchtext,PDO::PARAM_STR);
	}else{ // if it the field is empty
		$sql = "SELECT s_id,s_name,s_email FROM subscribe_table ORDER BY s_id DESC";
		$stmt = $conn->prepare($sql);
	}// end of if empty($searchtext)
	$stmt->bindColumn('s_id',$id);
	$stmt->bindColumn('s_name',$name);
	$stmt->bindColumn('s_email',$email);
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 0){// if a record is found
		?>
		<center>
			<div class="j-responsive"style='line-height:27px;'>
				<p class="j-text-color5">
					<b><?=empty($searchtext)?$numRow.' Subscriber(s) found':$numRow." result(s) found for <span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in subscribers";?></b>
				</p>
				<table class="j-table-all j-border-0 j-large">
					<tr class="j-border-0 j-text-color1">
						<td><b>S/N</b></td><td><b>Name</b></td><td><b>Email</b></td><td><b>Preview</b></td><td><b>Delete</b></td>
					</tr>
					<?php
					while($stmt->fetch()){
						?>
						<tr class="j-border-0">
							<td><?php s_n();?></td><td><?=ucwords(($name));?></td><td><?=($email)?></td>
							<td><a href='<?= file_location('admin_url','subscriber/preview_subscriber/'.addnum($id))?>'><i class="j-large <?= icon('eye');?>"></i></a></td>
							<td><i class="j-large <?= icon('trash');?> j-clickable"onclick="$('#delete_subscriber<?=$id?>').show();"></i></td>
						</tr>
						<?php
						preview_modal('subscriber',$id);
					}// end of while
					?>
				</table>
			</div>
		</center>
		<?php
	}else{
		?>
		<br>
		<center>
			<div class='j-text-color5'>
				<b><?=empty($searchtext)?"0 subscriber found":"0 result found for <b><span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in subscriber";?></b>
			</div>
		</center>
			<?php
		}// end of if $numRow
}// end of if isset
?>
<br><br><br><br>