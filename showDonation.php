<?php

	$k = $_POST['donation_id'];
	$k = trim($k);
	include("../includes/dbconnection.php");
	$sql = "SELECT * FROM donation WHERE donation_ ='{$k}'";
	$res = mysqli_query($conn, $sql);
	while($rows = mysqli_fetch_array($res)){
?>
	<tr>
		<!--<td><//?php echo $rows['donation_id']; ?></td>-->
		<td><?php echo $rows['donation_image']; ?></td>
		<td><?php echo $rows['donation_goal']; ?></td>
		<td><?php echo $rows['donation_region']; ?></td>
	</tr>
<?php
	}
	echo $sql;
?>