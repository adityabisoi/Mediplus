<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<?php
$conn = new mysqli("localhost","root","","electrothon");
               $sql = "SELECT * FROM stats ";
               $result = $conn->query($sql);
               if ($result -> num_rows >  0) {
				  
                while ($row = $result->fetch_assoc()) 
                {
                    echo $row['ambno']." ".$row['pulseoxy']." ".$row['pulserate']." ".$row['bp']." ".$row['details']; ?><br><?php
                }
            }

?>
</body>
</html>