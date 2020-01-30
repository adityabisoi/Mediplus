<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title></title>
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
    <!-- //web font -->
</head>

<body>

    <?php

        $na=$em=$ty="";
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
                
                $sql=  "INSERT INTO donor (name ,email, type) values('$na','$em','$ty') " ;
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
</body>

</html>