<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
if(isset($_POST['s']) && isset($_POST['st'])){
	// creating connection
	require_once(file_location('inc_path','connection.inc.php'));
	@$conn = dbconnect('admin','PDO');
	$searchtext = test_input(($_POST['s']));
	$status2 = ($_POST['st']);
	if($status2 === 'all'){$status = "m_status != ''";}else{$status = "m_status = '{$status2}'" ;}
	if(!empty($searchtext)){ // if the search text is not empty
		$searchtext = $searchtext."*";
		$sql = "SELECT m_id,m_name,m_email,m_subject,m_status,m_datetime FROM message_table
		WHERE (MATCH(m_name,m_email,m_subject,m_message) AGAINST(:searchtext IN BOOLEAN MODE)) AND {$status}
		ORDER BY MATCH(m_name,m_email,m_subject,m_message) AGAINST(:searchtext IN BOOLEAN MODE)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':searchtext',$searchtext,PDO::PARAM_STR);
	}else{ // if it the field is empty
		$sql = "SELECT m_id,m_name,m_email,m_subject,m_status,m_datetime FROM message_table WHERE {$status} ORDER BY m_id DESC";
		$stmt = $conn->prepare($sql);
	}// end of if empty($searchtext)
	$stmt->bindColumn('m_id',$id);
	$stmt->bindColumn('m_name',$name);
	$stmt->bindColumn('m_email',$email);
	$stmt->bindColumn('m_subject',$subject);
	$stmt->bindColumn('m_status',$status);
	$stmt->bindColumn('m_datetime',$datetime);
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 0){// if a record is found
		?>
		<center>
			<div class="j-responsive"style='line-height:27px;'>
				<p class="j-text-color5">
					<b><?=empty($searchtext)?$numRow.' Message(s) found':$numRow." result(s) found for <span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$status2." messages";?></b>
				</p>
				<table class="j-table-all j-border-0 j-large">
					<tr class="j-border-0 j-text-color1">
						<td><b>S/N</b></td><td><b>Name</b></td><td><b>Email</b></td><td><b>Subject</b></td><?php if($status2 === 'all'){echo '<td><b>Status</b></td>';}?><td><b>Date</b></td><td><b>Preview</b></td><td><b>Delete</b></td>
					</tr>
					<?php
					while($stmt->fetch()){
						?>
						<tr class="j-border-0">
							<td><?php s_n();?></td><td><?=ucwords(($name));?></td><td><?=($email)?></td>
							<td><?=ucwords(text_length2(($subject),10))?></td><?php if($status2 === 'all'){echo '<td>'.ucwords(($status)).'</td>';}?><td><?=showdate($datetime,'')?></td>
							<td><a href='<?= file_location('admin_url','message/preview_message/'.addnum($id))?>'><i class="j-large <?= icon('eye');?>"></i></a></td>
							<td><i class="j-large <?= icon('trash');?> j-clickable"onclick="$('#delete_message<?=$id?>').show();"></i></td>
						</tr>
						<?php
						preview_modal('message',$id);
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
				<b><?=empty($searchtext)?"0 $status2 message found":"0 result found for <b><span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$status2." message";?></b>
			</div>
		</center>
			<?php
		}// end of if $numRow
}// end of if isset
?>
<br><br><br><br>