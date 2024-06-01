<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
if(isset($_POST['s']) && isset($_POST['st'])){
	// creating connection
	require_once(file_location('inc_path','connection.inc.php'));
	@$conn = dbconnect('admin','PDO');
	$searchtext = test_input(($_POST['s']));
	$status2 = ($_POST['st']);
	if($status2 === 'all'){$status = "n_status != ''";}else{$status = "n_status = '{$status2}'" ;}
	if(!empty($searchtext)){ // if the search text is not empty
		$searchtext = $searchtext."*";
		$sql = "SELECT n_id,n_title,n_status,n_regdatetime FROM news_table
		WHERE (MATCH(n_title,n_keyword,n_paragraph1,n_paragraph2,n_paragraph3) AGAINST(:searchtext IN BOOLEAN MODE)) AND {$status}
		ORDER BY MATCH(n_title,n_keyword,n_paragraph1,n_paragraph2,n_paragraph3) AGAINST(:searchtext IN BOOLEAN MODE)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':searchtext',$searchtext,PDO::PARAM_STR);
	}else{ // if it the field is empty
		$sql = "SELECT n_id,n_title,n_status,n_regdatetime FROM news_table WHERE {$status} ORDER BY n_id DESC";
		$stmt = $conn->prepare($sql);
	}// end of if empty($searchtext)
	$stmt->bindColumn('n_id',$id);
	$stmt->bindColumn('n_title',$title);
	$stmt->bindColumn('n_status',$status);
	$stmt->bindColumn('n_regdatetime',$datetime);
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 0){// if a record is found
		?>
		<center>
			<div class="j-responsive"style='line-height:27px;'>
				<p class="j-text-color5">
					<b><?=empty($searchtext)?$numRow.' '.$status2.' News(s) found':$numRow." result(s) found for <span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$status2." news";?></b>
				</p>
				<table class="j-table-all j-border-0 j-large">
					<tr class="j-border-0 j-text-color1">
						<td><b>S/N</b></td><td><b>Title</b></td><?php if($status2 === 'all'){echo '<td><b>Status</b></td>';}?><td><b>Date</b></td><td><b>Preview</b></td><td><b>Edit</b></td><td><b>Delete</b></td>
					</tr>
					<?php
					while($stmt->fetch()){
						?>
						<tr class="j-border-0">
							<td><?php s_n();?></td><td><?=($title)?></td><?php if($status2 === 'all'){echo '<td>'.ucwords(($status)).'</td>';}?><td><?=showdate($datetime,'')?></td>
							<td><a href='<?= file_location('admin_url','news/preview_news/'.addnum($id))?>'><i class="j-large <?= icon('eye');?>"></i></a></td>
							<td><a href='<?= file_location('admin_url','news/update_news/'.addnum($id))?>'><i class="<?= icon('edit');?>"></i></a></td>
							<td><i class="j-large <?= icon('trash');?> j-clickable"onclick="$('#delete_news<?=$id?>').show();"></i></td>
						</tr>
						<?php
						preview_modal('news',$id);
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
				<b><?=empty($searchtext)?"0 $status2 news found":"0 result found for <b><span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$status2." news";?></b>
			</div>
		</center>
			<?php
		}// end of if $numRow
}// end of if isset
?>
<br><br><br><br>