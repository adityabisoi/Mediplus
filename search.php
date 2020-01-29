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
        $name=$type="";
        $status=true;
        if (!empty($_POST)) {
            if (empty($_POST['type'])) {
                $status=false;
            }
            else {
                $type=$_POST['type'];
            }
            if (empty($_POST['name'])) {
                $status=false;
            }
            else {
                $name=$_POST['name'];
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
                $sql="INSERT INTO resources (name, type, rname, quantity, price) values ('$name','$type','$rname','$quan','$price')";
                if ($com->query($sql)) {
                    header ("Location: pharma.php");
                }
                else{
                    echo "Invalid credentials. <br>";
                }
            $com->close();
            }
        }
    
        }
    ?>
    <div>

        <h1 style="text-align:center">Search</h1><br>

        <body>
            <form method="POST" class="form-inline" action="results.php">
                <div class="form-group">
                    <select name="type">
                        <option value="medicine">Medicine</option>
                        <option value="vaccine">Vaccine</option>
                        <option value="blood">Blood</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">

                </div>
                <button type="submit" class="btn btn-default">Search</button>

            </form>
        </body>
        

                <html>

                <head>
                    <title>Add Item</title>
                    <link rel="stylesheet" type="text/css" href="style.css">
                    <link rel="stylesheet"
                        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
                        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
                        crossorigin="anonymous">
                </head>

                </html>







            </div>

</body>
<?php }else{ header ("Location: closed.php"); } ?>

</html>