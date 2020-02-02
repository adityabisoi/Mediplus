<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="src/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="src/login/css/style.css">
    <!-- <link rel="stylesheet" href="src/styles.css">
    <link rel="stylesheet" href="src/styles1.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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

    session_start();    //start the session

    $pass=$uname="";
    $status=true;
    if (!empty($_POST)) {
        if (empty($_POST['uname'])) {
            $status=false;
        }
        else {
            $uname=$_POST['uname'];
        }
        if (empty($_POST['password'])) {
            $status=false;
        }
        else {
            $pass=sha1($_POST['password']);
        }

        $servername= "localhost";
        $username= "root";
        $password= "";
        $dbname="electrothon";

        //create connection
        $com= new mysqli($servername, $username, $password,$dbname);

        //check connection
        if ($com->connect_error ) {
            die("Connection failed ".$com->connect_error);
        }
        else{

        if ($status) {
            $sql="SELECT *
                FROM login WHERE username='$uname' AND password='$pass'";
            $result=$com->query($sql);//finding out how many rows are being returned
            if ($result->num_rows > 0) {
                $record= $result->fetch_assoc();//converting result to associative array
                $_SESSION['loggedin']=true; //loggedin can be anything
            // $_SESSION['']=$record
                $_SESSION['userDetails']=$record;
                header ("Location: index.php");
            }
            else{
                echo "Invalid credentials. <br>";
            }
        $com->close();
        }
    }

    }
    ?>

    <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <span class="navbar-brand mb-0 h1">Hospital</span>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pharmaLogin.php">Pharmacy</a>
                </li>
            </ul>
        </div>
    </nav> -->
    <!-- <div class="wrap">
        <h1>Login</h1>
        <form method="POST">
            <p>Username:</p>
            <input type="text" name="uname" placeholder="Username"><br>
            <p>Password:</p>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div> -->
    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Hospital Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="uname" id="name" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Login"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Don't have an account ? <a href="signup.php" class="loginhere-link">Signup here</a>
                    </p><center>
                    <p class="logihere">
                        <a href="donate.php" class="loginhere-link">Donate Blood</a>
                    </p>
                    <p class="loginhre">
                        <a href="bloodBankLogin.php" class="loginhere-link">Blood Bank Login</a>
                    </p>
                    <p class="loginhre">
                        <a href="pharmaLogin.php" class="loginhere-link">Pharmacy Login</a>
                    </p>
                    <p class="loginhre">
                        <a href="ambulanceLogin.php" class="loginhere-link">Ambulance Login</a>
                    </p></center>
                </div>
            </div>
        </section>

    </div>

    <script src="src/login/js/main.js"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> -->
</body>

</html>