<?php //starting session
session_start();
if(isset($_SESSION['loggedin'])==true)
{ ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body>
    
<?php 
        $type=$quantity="";
        // $name= $_SESSION['userDetails']['name'];
        $status=true;
        if (!empty($_POST)) {
            if (empty($_POST['type'])) {
                $status=false;
            }
            else {
                $type=$_POST['type'];
            }
            if (empty($_POST['quantity'])) {
                $status=false;
            }
            else {
                $quantity=$_POST['quantity'];
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
                $sql="INSERT INTO bloodbank (type, quantity) values ('$type','$quantity')";
                if ($com->query($sql)) {
                    header ("Location: blood_bank.php");
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

        <h1 style="text-align:center">Add Item Here</h1><br>

        <body>
            <form method="POST" class="form-inline">
                <div class="form-group">
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
                </div>
                <div class="form-group">
                    <label for="name">Quantity</label>
                    <input type="number" name="quantity">
                </div>
                <button type="submit" class="btn btn-default" name="add">Add item</button>

            </form>
        </body>
        <div class="main-content-inner">
            <div class="row">

                <!-- Contextual Classes start -->
                <div class="col-lg-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Details</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-dark text-center">
                                        <thead class="text-uppercase">
                                            <tr class="table-active">
                                                <th scope="col">ID</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Action</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
               $conn = new mysqli("localhost","root","","electrothon");
               $sql = "SELECT * FROM bloodbank ";
               $result = $conn->query($sql);
					$count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				 {
					  $count=$count+1;
                   ?>


                                            <tr>
                                                <th><?php echo $count ?></th>
                                                <th><?php echo $row["type"]  ?></th>
                                                <th><?php echo $row["quantity"]  ?></th>

                                                <th> <a href="up" Edit</a> <a
                                                        href="editb.php?id=<?php echo $row["product_id"] ?>">Edit</a>
                                                    <!-- <a href="up" Edit</a> <a
                                                        href="deleteb.php?id=<?php echo $row["product_id"] ?>">Delete</a> -->
                                                </th>


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
                        <!-- main content area end -->

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
<!-- page container area end -->
<!-- offset area start -->

<!-- offset area end -->
<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>

<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
<?php }else{ header ("Location: closed.php"); } ?>
</body>

</html>