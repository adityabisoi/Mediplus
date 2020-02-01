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
    <title>Healthcare</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
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
                    <a class="nav-link" href="search.php">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createPharma.php">Create Pharmacy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createBloodBank.php">Create Blood Bank</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chat.php">Chat</a>
                </li>
                <?php if($_SESSION['loggedin']==true){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li><?php }else{}?>

            </ul>
        </div>
    </nav>
    <?php $name="";
    $name= $_SESSION['userDetails']['name']; ?>
    <div class="main-content-inner">
        <div class="row">

            <!-- Contextual Classes start -->
            <div class="col-lg-6 mt-5" style="margin-left:26em;">
                <div >
                    <div class="card-body" style="text-align:center;">
                        <h4 style="text-align:center" class="header-title">Vaccine Supplies</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-uppercase">
                                        <tr class="table-active">
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <!-- <th scope="col">Action</th> -->



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
$conn = new mysqli("localhost","root","","electrothon");
$sql = "SELECT * FROM resources WHERE name='$name' && type='vaccine' ";
$result = $conn->query($sql);
    $count=0;
if ($result -> num_rows >  0) {
  
 while ($row = $result->fetch_assoc()) 
 {
      $count=$count+1;
      $quan=$row["quantity"];

   ?>


                                        <tr  <?php if($quan<=50){?>class="table-danger"<?php }else{?>class="table-success"<?php } ?>>
                                            <th><?php echo $count ?></th>
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
                    <div class="card-body" style="text-align:center;">
                        <h4 style="text-align:center" class="header-title">Medicine Supplies</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-uppercase">
                                        <tr class="table-active">
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <!-- <th scope="col">Action</th> -->



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
$conn = new mysqli("localhost","root","","electrothon");
$sql = "SELECT * FROM resources WHERE name='$name' && type='medicine' ";
$result = $conn->query($sql);
    $count=0;
if ($result -> num_rows >  0) {
  
 while ($row = $result->fetch_assoc()) 
 {
      $count=$count+1;
      $quan=$row["quantity"];

   ?>


                                        <tr  <?php if($quan<=50){?>class="table-danger"<?php }else{?>class="table-success"<?php } ?>>
                                            <th><?php echo $count ?></th>
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
                    <div class="card-body" style="text-align:center;">
                        <h4 style="text-align:center" class="header-title">Blood Bank Supplies</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-uppercase">
                                        <tr class="table-active">
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <!-- <th scope="col">Action</th> -->



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
$conn = new mysqli("localhost","root","","electrothon");
$sql = "SELECT * FROM resources WHERE name='$name' && type='blood'";
$result = $conn->query($sql);
    $count=0;
if ($result -> num_rows >  0) {
  
 while ($row = $result->fetch_assoc()) 
 {
      $count=$count+1;
      $quan=$row["quantity"];

   ?>


                                        <tr  <?php if($quan<=50){?>class="table-danger"<?php }else{?>class="table-success"<?php } ?>>
                                            <th><?php echo $count ?></th>
                                            <th><?php echo $row["rname"] ?></th>
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
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
</body>
<?php }else{ header ("Location: login.php"); } ?>

</html>