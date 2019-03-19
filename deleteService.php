<?php
	include("connection.php");

	$serviceCode = $_POST['serviceCode'];

	$sql = "DELETE FROM service WHERE serviceCode = $serviceCode";


	if(mysqli_query($db, $sql) === TRUE) {
			$message = "The service deleted successfully";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href = 'ManageServicesProvided.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $db->error;
		}


//	$conn->close();

?>
