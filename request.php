<?php //starting session
session_start();
if(isset($_SESSION['loggedin2'])==true)
{ ?>
<!DOCTYPE html>
<html>

<head>
	<title>Request Blood</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- //web font -->
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
			<span class="navbar-brand mb-0 h1">Hospital</span>
		</div>
		<!-- <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Navbar 2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div> -->
		<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<!-- <li class="nav-item">
                        <a class="nav-link" href="pharma.php">Pharmacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blood_bank.php">Blood Bank</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chat.php">Chat</a>
                    </li> -->
				<?php if($_SESSION['loggedin2']==true){ ?>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li><?php }else{}?>
			</ul>
		</div>
	</nav>
	<br><br>
	<h1 style="text-align:center">Request Blood</h1><br><br>
	<!-- main -->
	<!-- <div class="main-w3layouts wrapper">
		<h1>Enter Your Details</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="mailer.php" method="POST">
					<select name="type">
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>
					<div class="wthree-text">

						<div class="clear"> </div>
					</div>
					<input type="submit" value="Request">
				</form>
			</div>
		</div>
	</div> -->
	<form method="POST" class="form-inline" action="mailer.php" style="margin-left:54em;">
		<!-- <div class="form-group">
			<input class="form-control mr-sm-2" name="name" type="search" placeholder="Name" aria-label="Search">

		</div>
		<div class="form-group">
			<input class="form-control mr-sm-2" name="email" type="email" placeholder="E-mail" aria-label="Search">

		</div>
		<div class="form-group">
			<input class="form-control mr-sm-2" name="dcity" type="search" placeholder="City" aria-label="Search">

		</div> -->
		<div class="form-group">
			<select style="margin-right:10px;" name="type" class="form-control" id="exampleFormControlSelect1">
				<option value="A+">A+</option>
				<option value="A-">A-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
			</select>
		</div>

		<button class="btn btn-outline-success my-2 my-sm-0" name="add" type="submit">Submit</button>
	</form>
	<!-- //main -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
</body>
<?php }else{ header ("Location: bloodBankLogin.php"); } ?>

</html>