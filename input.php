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
    <div>

        <h1 style="text-align:center">Add Item Here</h1>

        <body>
            <form method="POST" class="form-inline" action="additem.php">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="product_name">

                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label for="name">Quantity</label>
                    <input type="number" name="quant" id="quant" min="1" max="">
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
                            <h4 class="header-title">Products</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-dark text-center">
                                        <thead class="text-uppercase">
                                            <tr class="table-active">
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Action</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
               $conn = new mysqli("localhost","root","","inventorymanagement");
               $sql = "SELECT * FROM product";
               $result = $conn->query($sql);
					$count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				 {
					  $count=$count+1;
                   ?>


                                            <tr>
                                                <th><?php echo $count ?></th>
                                                <th><?php echo $row["product_name"] ?></th>
                                                <th><?php echo $row["price"]  ?></th>
                                                <th><?php echo $row["quantity"]  ?></th>

                                                <th> <a href="up" Edit</a> <a
                                                        href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a>
                                                    <a href="up" Edit</a> <a
                                                        href="delete.php?id=<?php echo $row["product_id"] ?>">Delete</a>
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
                    </div>
                    <div>


                    </div>
                </div>
                <!-- Contextual Classes end -->

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

</html>