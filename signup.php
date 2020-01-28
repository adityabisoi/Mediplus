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
    <nav>
        <img class="logo" src="logo.png">
        <ul>
            <li><a class="active" href="login.php">Login</a></li>
        </ul>
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
</body>

</html>