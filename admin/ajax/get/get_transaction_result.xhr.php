<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
if(isset($_POST['s']) && isset($_POST['st'])){
	// creating connection
	require_once(file_location('inc_path','connection.inc.php'));
	@$conn = dbconnect('admin','PDO');
	$searchtext = test_input(($_POST['s']));
	$status2 = ($_POST['st']);
	if($status2 === 'all'){$status = "t_status != ''";}else{$status = "t_status = '{$status2}'" ;}
	if(!empty($searchtext)){ // if the search text is not empty
		$searchtext = $searchtext."*";
		$sql = "SELECT t_id,t_name,t_amount,t_currency,t_status,t_regdatetime FROM transaction_table
		WHERE (MATCH(t_name,t_email,t_phonenumber,t_ref_id) AGAINST(:searchtext IN BOOLEAN MODE)) AND {$status}
		ORDER BY MATCH(t_name,t_email,t_phonenumber,t_ref_id) AGAINST(:searchtext IN BOOLEAN MODE)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':searchtext',$searchtext,PDO::PARAM_STR);
	}else{ // if it the field is empty
		$sql = "SELECT t_id,t_name,t_amount,t_currency,t_status,t_regdatetime FROM transaction_table WHERE {$status} ORDER BY t_id DESC";
		$stmt = $conn->prepare($sql);
	}// end of if empty($searchtext)
	$stmt->bindColumn('t_id',$id);
	$stmt->bindColumn('t_name',$name);
	$stmt->bindColumn('t_amount',$amount);
	$stmt->bindColumn('t_currency',$currency);
	$stmt->bindColumn('t_status',$status);
	$stmt->bindColumn('t_datetime',$datetime);
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 0){// if a record is found
		?>
		<center>
			<div class="j-responsive"style='line-height:27px;'>
				<p class="j-text-color5">
					<span class='j-btn j-round j-color1 j-bolder j-right j-large'>Total: #<?=money(get_sum('transaction_table','t_amount','t_status',$status2))?></span><span class='clearfix'></span><br>
					<b><?=empty($searchtext)?$numRow.' Transaction(s) found':$numRow." result(s) found for <span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$status2." transactions";?></b>
				</p>
				<table class="j-table-all j-border-0 j-large">
					<tr class="j-border-0 j-text-color1">
						<td><b>S/N</b></td><td><b>Name</b></td><td><b>Currency</b></td><td><b>Amount</b></td><?php if($status2 === 'all'){echo '<td><b>Status</b></td>';}?><td><b>Date</b></td><td><b>Preview</b></td><td><b>Delete</b></td>
					</tr>
					<?php
					while($stmt->fetch()){
						?>
						<tr class="j-border-0">
							<td><?php s_n();?></td><td><?=ucwords(($name));?></td><td><?=($currency)?></td>
							<td><?=money($amount)?></td><?php if($status2 === 'all'){echo '<td>'.ucwords(($status)).'</td>';}?><td><?=showdate($datetime,'')?></td>
							<td><a href='<?= file_location('admin_url','transaction/preview_transaction/'.addnum($id))?>'><i class="j-large <?= icon('eye');?>"></i></a></td>
							<td><i class="j-large <?= icon('trash');?> j-clickable"onclick="$('#delete_transaction<?=$id?>').show();"></i></td>
						</tr>
						<?php
						preview_modal('transaction',$id);
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
				<b><?=empty($searchtext)?"0 $status2 transaction found":"0 result found for <b><span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$status2." transaction";?></b>
			</div>
		</center>
			<?php
		}// end of if $numRow
}// end of if isset
?>
<br><br><br><br>