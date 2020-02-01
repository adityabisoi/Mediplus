<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Bank Login</title>
     <!-- Font Icon -->
     <link rel="stylesheet" href="src/login/fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="src/login/css/style.css">
    
</head>

<body>
    <?php

    session_start();    //start the session

    $pass=$uname=$name="";
    $status=true;
    if (!empty($_POST)) {
        if (empty($_POST['uname'])) {
            $status=false;
        }
        else {
            $uname=$_POST['uname'];
        }
        if (empty($_POST['name'])) {
            $status=false;
        }
        else {
            $name=$_POST['name'];
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
                FROM bblogin WHERE name='$name' && username='$uname' && password='$pass'";
            $result=$com->query($sql);//finding out how many rows are being returned
            if ($result->num_rows > 0) {
                $record= $result->fetch_assoc();//converting result to associative array
                $_SESSION['loggedin2']=true; //loggedin can be anything
                $_SESSION['userDetails2']=$record;
                header ("Location: blood_bank.php");
            }
            else{
                echo "Invalid credentials. <br>";
            }
        $com->close();
        }
    }

    }
    ?>


    <!-- <div class="wrap">
        <h1>Login</h1>
        <form method="POST">
            <p>Hospital name:</p>
            <input type="text" name="name" placeholder="Name"><br>
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
                        <h2 class="form-title">Blood Bank Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="uname" id="name" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Login"/>
                        </div>
                    </form>

                </div>
            </div>
        </section>

    </div>
<script src="src/login/js/main.js"></script>

</body>

</html>