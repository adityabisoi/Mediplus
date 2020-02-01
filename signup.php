<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="src/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="src/login/css/style.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript">
        $(window).on('scroll', function () {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');

            } else {
                $('nav').removeClass('black');
            }
        })
    </script> -->
</head>

<body>
    <?php

    $un=$ps=$na=$ph=$em=$ad=$ct=$ds=$st="";
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
        if (empty($_POST['name'])) {
            $status=false;
        }
        else {
            $na=$_POST['name'];
        }
        if (empty($_POST['phone'])) {
            $status=false;
        }
        else {
            $ph=$_POST['phone'];
        }
        if (empty($_POST['email'])) {
            $status=false;
        }
        else {
            $em=$_POST['email'];
        }
        if (empty($_POST['addr'])) {
            $status=false;
        }
        else {
            $ad=$_POST['addr'];
        }
        if (empty($_POST['city'])) {
            $status=false;
        }
        else {
            $ct=$_POST['city'];
        }
        if (empty($_POST['dist'])) {
            $status=false;
        }
        else {
            $ds=$_POST['dist'];
        }
        if (empty($_POST['state'])) {
            $status=false;
        }
        else {
            $st=$_POST['state'];
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
            $sql="INSERT INTO login(username, password, name, address, city, dist, state, phone, email) values ('$un','$ps','$na','$ad','$ct','$ds','$st','$ph','$em')";
            if ($com->query($sql)) {
                header ('Location: login.php');
            }
            else{
                echo "Error: ".$sql."<br>".$com->error;
            }
        $com->close();
    }}
    }
    ?>
    <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <span class="navbar-brand mb-0 h1">Navbar</span>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav> -->
    <!-- <div class="wrap">
        <h2>Sign Up here</h2>
        <form method="post">
            <input type="text" name="uname" placeholder="Username" required autofocus>
            <input type="text" name="name" placeholder="Hospital name" required>
            <input type="email" name="email" placeholder="abc@xyz.com" required>
            <input type="number" name="phone" placeholder="Number" required>
            <input type="password" name="pass" placeholder="password" required>
            <input type="text" name="addr" placeholder="Address" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="dist" placeholder="District" required>
            <input type="text" name="state" placeholder="State" required>
            <input type="submit" name="submit" value="Signup">
        </form>
    </div> -->
    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Hospital Name" required autofocus/>
                        </div>
                        
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Hospital Email"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="phone" id="name" placeholder="Phone No." required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="addr" id="addr" placeholder="Address" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="city" id="city" placeholder="City" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="dist" id="dist" placeholder="District" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="state" id="state" placeholder="State" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="uname" id="name" placeholder="Username" required />
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="pass" id="password" placeholder="Password"/>
                            <!-- <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span> -->
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p><center>
                    <p class="logihere">
                        <a href="donate.php" class="loginhere-link">Donate Blood</a>
                    </p></center>
                </div>
            </div>
        </section>

    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> -->
    <script src="src/login/js/main.js"></script>

</body>

</html>