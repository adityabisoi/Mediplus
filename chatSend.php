<?php //starting session
session_start();
if(isset($_SESSION['loggedin3'])==true)
{ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Stats</title>
</head>

<body>
    <?php 
        $num=$pulseoxy=$pulserate=$bp=$details="";
        $num= $_SESSION['userDetails3']['ambno'];
        $status=true;
        if (!empty($_POST)) {
            if (empty($_POST['pulseoxy'])) {
                $status=false;
            }
            else {
                $pulseoxy=$_POST['pulseoxy'];
            }
            if (empty($_POST['pulserate'])) {
                $status=false;
            }
            else {
                $pulserate=$_POST['pulserate'];
            }
            if (empty($_POST['bp'])) {
                $status=false;
            }
            else {
                $bp=$_POST['bp'];
            }
            if (empty($_POST['details'])) {
                $status=false;
            }
            else {
                $details=$_POST['details'];
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
                $sql="INSERT INTO stats (ambno, pulseoxy, pulserate, bp, details) values ('$num','$pulseoxy','$pulserate','$bp','$details')";
                if ($com->query($sql)) {
                    header ("Location: chatSend.php");
                }
                else{
                    echo "Invalid credentials. <br>";
                }
            $com->close();
            }
        }
    
        }
    ?>
    <form method="post">
        <input type="search" name="pulseoxy">
        <input type="search" name="pulserate">
        <input type="search" name="bp">
        <textarea name="details" cols="30" rows="10"></textarea>
        <input type="submit" value="Submit">
    </form>
</body>
<?php }else{ header ("Location: ambulanceLogin.php"); } ?>

</html>