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
    <title>Document</title>
</head>
<body>
    <?php 
        $name=$type=$rname=$quan="";
        $name= $_SESSION['userDetails']['name'];
        $status=true;
        if (!empty($_POST)) {
            if (empty($_POST['type'])) {
                $status=false;
            }
            else {
                $type=$_POST['type'];
            }
            if (empty($_POST['rname'])) {
                $status=false;
            }
            else {
                $rname=$_POST['rname'];
            }
            if (empty($_POST['quan'])) {
                $status=false;
            }
            else {
                $quan=$_POST['quan'];
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
                $sql="INSERT INTO resources (name, type, rname, quantity) values ('$name','$type','$rname','$quan')";
                if ($com->query($sql)) {
                    header ("Location: test.php");
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
        <select name="type">
            <option value="blood">Blood</option>
            <option value="medicine">Medicine</option>
            <option value="vaccine">Vaccine</option>
        </select>
        <input type="text" name="rname">
        <input type="number" name="quan">     
        <input type="submit" value="Submit">   
    </form>
</body>
<?php }else{ header ("Location: closed.php"); } ?>
</html>