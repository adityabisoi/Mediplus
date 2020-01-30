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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

        <div class="main-content-inner">
            <div class="row">

                <!-- Contextual Classes start -->
                <div class="col-lg-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Supply</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-dark text-center">
                                        <thead class="text-uppercase">
                                            <tr class="table-active">
                                                <th scope="col">ID</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <!-- <th scope="col">Action</th> -->



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
$conn = new mysqli("localhost","root","","electrothon");
$sql = "SELECT * FROM resources WHERE type='medicine' || type='vaccine'";
$result = $conn->query($sql);
    $count=0;
if ($result -> num_rows >  0) {
  
 while ($row = $result->fetch_assoc()) 
 {
      $count=$count+1;
   ?>


                                            <tr>
                                                <th><?php echo $count ?></th>
                                                <th><?php echo $row["type"] ?></th>
                                                <th><?php echo $row["rname"] ?></th>
                                                <th><?php echo $row["price"]  ?></th>
                                                <th><?php echo $row["quantity"]  ?></th>

                                                <!-- <th> <a href="up" Edit</a> <a
                                                href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a>
                                            <a href="up" Edit</a> <a
                                                href="delete.php?id=<?php echo $row["product_id"] ?>">Delete</a>
                                        </th> -->


                                            </tr>
                                            <?php
 
 }
}

?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous">
            </script>
</body>
<?php }else{ header ("Location: login.php"); } ?>

</html>