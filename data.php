<?php
	require '/includes/dbconnection.php';
	
	function loadDates() {
		$db = new dbconnection;
		$conn = $db->connect();
		
		$stmt = $conn->prepare("SELECT * FROM donation");
		$stmt->execute();
		$dates = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $donation_date;
	}
?>