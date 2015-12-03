<?php
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

		<!-- Navigation -->
	    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
			<div class="container-fluid">

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Guestbook</a>
				</div>
				<!-- /.navbar-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="https://github.com/dmulatti/Insecure-Guestbook">GitHub</a></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<!-- /.navbar -->

		<!-- Page Content -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">


					<!-- Forms -->
					<h3>Hey, sign the guestbook!</h3>
          			<h6>(Unless your name is <a href="https://xkcd.com/327/">Robert'); DROP TABLE names; -- </a>)</h6>
					<div class="well">
						<form name=”my_form” id=”my_form” method=”get” action="insert.php">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
					<hr>

				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
    <p class="text-center">
    Top Coolest People:<br>
		<?php
			$result = $mysqli->query("SELECT name FROM names");

			if ($result->num_rows > 0) {
				$rank = 1;
				while($row = $result->fetch_assoc()) {
					echo "#" . $rank . " " . $row["name"] . "<br>";
					$rank +=1;
				}
			} 
			else {
				echo "There are none :(";
			}
			$mysqli->close();
		?>
	</p>

		<!-- JQuery scripts -->
	    <script src="assets/js/jquery-1.11.2.min.js"></script>

		<!-- Bootstrap Core scripts -->
		<script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
