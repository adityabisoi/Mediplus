<?php //starting session
session_start();
if(isset($_SESSION['loggedin'])==true)
{ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Blood Bank</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript">
        $(window).on('scroll', function () {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');

            } else {
                $('nav').removeClass('black');
            }
        })
    </script>
    <style>@import "bourbon";

body {
	background: #eee !important;	
}

.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}
</style>
</head>

<body>
    <?php

    $un=$ps=$na="";
    $na=$_SESSION['userDetails']['name'];
    $status= true;
    if (!empty($_POST)) {
        if (empty($_POST['uname'])) {
            $status=false;
        }
        else {
            $un=$_POST['uname'];
        }
        if (empty($_POST['pass'])) {
            $status=false;
        }
        else {
            $ps=sha1($_POST['pass']);
        }

    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname="electrothon";

    //create connection
    $com= new mysqli($servername, $username, $password,$dbname);

    //check coonection
    if ($com->connect_error ) {
        die("Connection failed ".$com->connect_error);
    }
    else{
        if($status){
            $sql="INSERT INTO bblogin(username, password, name) values ('$un','$ps','$na')";
            if ($com->query($sql)) {
                header ('Location: index.php');
            }
            else{
                echo "Error: ".$sql."<br>".$com->error;
            }
        $com->close();
    }}
    }
    ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <span class="navbar-brand mb-0 h1">Navbar</span>
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
            </ul>
        </div>
    </nav>
    <!-- <div class="wrap">
        <h2>Create here</h2>
        <form method="post">
            <input type="text" name="uname" placeholder="Username" required autofocus>
            <input type="password" name="pass" placeholder="password" required>
            <input type="submit" name="submit" value="Create">
        </form>
    </div> -->
    <div class="wrapper">
    <form class="form-signin" method="post">       
      <h2 style="text-align:center;" class="form-signin-heading">Create Blood Bank Account</h2><br>
      <input type="text" class="form-control" name="uname" placeholder="Username" required="" autofocus /><br>
      <input type="password" class="form-control" name="pass" placeholder="Password" required=""/><br>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>   
    </form>


  </div>
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
<?php }else{ header ("Location: login.php"); } ?>

</html>