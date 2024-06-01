<div class='j-home-padding j-color5'style='padding-top:40px;padding-bottom:40px;'>
	<div class='j-bolder j-xlarge j-padding'>PROGRAMMES</div>
	<div class='j-row'>
		<?php
		require_once(file_location('inc_path','connection.inc.php'));
		@$conn = dbconnect('admin','PDO');
		$sql = "SELECT p_id from programme_table WHERE p_status = 'active' ORDER BY p_id DESC LIMIT 3 ";
		$stmt = $conn->prepare($sql);
		$stmt->bindColumn('p_id',$programme_id);
		$stmt->execute();
		$numRow = $stmt->rowCount();
		if($numRow > 0){
			while($stmt->fetch()){get_programme($programme_id);}// end of while
			?><a href="<?=file_location('home_url','p/programme/')?>"class='j-btn j-color1 j-round j-bolder'style='margin-top:30px;margin-left:16px;'>See More Programme >></a><?php
		}else{ // if num_row is 0
			?><div class='j-large j-bolder j-padding j-text-color4'>No programme at the moment, check again later</div><?php
		}
		?>
	</div>
	
</div>