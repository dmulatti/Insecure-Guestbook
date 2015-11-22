<?php
header( "refresh:5;url=index.php" );
include 'dbaccess.php'
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Secure Guestbook</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- icons -->
		<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="favicon.ico">

		<!-- Bootstrap Core CSS file -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="assets/css/styles.css">

	</head>
	
	<body>
	<p class="text-center">
		<?php
			$name = $_GET["name"];

			if ($name == "clearall"){
				$mysqli->multi_query("DELETE FROM `names` WHERE 1");
				echo "Table Cleared.<br>";
			}
			else if ($name != ""){
				if (!$mysqli->multi_query("INSERT INTO `mulatti_data`.`names` (`name`) 
										VALUES ('" . $name . "')"))
									printf("Errormessage: %s\n", $mysqli->error);
				else
					echo "<code>" . $name . "</code> is now on the list.";
			}
			else
				echo "No name was entered!";
		?>
		<br>
		<a href="index.php">Go Back</a>
	</p>
	
	</body>
</html>