<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>Donate</title>
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

            </ul>
        </div>
    </nav>

    <?php

        $na=$em=$ty=$dct="";
        $status=true;
        if(!empty($_POST))
            {
                if(!empty($_POST["name"]))
                    {
                        $na=$_POST["name"];
                    }
                else{
                    $status=false;
                }
        
            
                if(!empty($_POST["email"]))
                    {
                        $em=$_POST["email"];
                    }
                else{
                    $status=false;
                }
                if(!empty($_POST["type"]))
                    {
                        $ty=$_POST["type"];
                    }
                else{
                    $status=false;
                }
                if(!empty($_POST["dcity"]))
                    {
                        $dct=$_POST["dcity"];
                    }
                else{
                    $status=false;
                }

        //db connection

        $servername="localhost";
        $username="root";
        $password="";
        $dbname="electrothon";

        $conn=new mysqli($servername,$username,$password,$dbname);
        if($conn->connect_error)
        {
            die("Connection failed".$conn->connect_error);
        }

        
        else{
            if($status)
            {
                
                $sql=  "INSERT INTO donor (name ,email, type, dcity) values('$na','$em','$ty','$dct') " ;
                if($conn->query($sql)){
                    header('Location: thank.html');
                }
                else{
                    echo "Error:".$sql."<br>".$conn->error;
                }
                $conn->close();
            }
            
        }
    }

    ?>

    <!-- main html -->
    <div class="main-w3layouts wrapper">
        <h1>Signup Here</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="#" method="post">
                    <input class="text" type="text" name="name" placeholder="Name" required autofocus>
                    <input class="text email" type="email" name="email" placeholder="Email" required>
                    <input class="text email" type="text" name="dcity" placeholder="City" required>
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
                    <input type="submit" value="SIGNUP">
                </form>


            </div>
        </div>

    </div>
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

</html>