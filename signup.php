<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="src/styles.css">
    <link rel="stylesheet" href="src/styles1.css">
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
</head>

<body class="body1">
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
                header ('Location: hello.php');
            }
            else{
                echo "Error: ".$sql."<br>".$com->error;
            }
        $com->close();
    }}
    }
    ?>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
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
                <a class="nav-link" href="#">Right</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="wrap">
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
            <input type="submit" name="submit" value="Submit">
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

</html>