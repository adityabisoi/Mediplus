<?php //starting session
session_start();
if(isset($_SESSION['loggedin2'])==true)
{ ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blood Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        $(window).on('scroll', function () {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');

            } else {
                $('nav').removeClass('black');
            }
        })
    </script>
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
                <!-- <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pharma.php">Pharmacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="request.php">Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chat.php">Chat</a>
                    </li> -->
                <?php if($_SESSION['loggedin2']==true){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li><?php }else{}?>
            </ul>
        </div>
    </nav>

    <?php 
        $rname=$quantity="";
        $type='blood';
        $name= $_SESSION['userDetails2']['name'];
        $status=true;
        if (!empty($_POST)) {
            if (empty($_POST['rname'])) {
                $status=false;
            }
            else {
                $rname=$_POST['rname'];
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
                $sql="INSERT INTO resources (name, type,rname, quantity) values ('$name','$type','$rname', '$quantity')";
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
        <br><br>
        <h1 style="text-align:center">Blood Supplies</h1><br>

        <body>
            <form method="POST" class="form-inline" style="margin-left:48em;">
                <div class="form-group">
                    <select style="margin-right:10px;" name="rname" class="form-control" id="exampleFormControlSelect1">
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
                    <input class="form-control mr-sm-2" name="quantity" type="search" placeholder="Quantity" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" name="add" type="submit">Add</button>
                </div>
            </form>
        </body>
        <div class="main-content-inner">
            <div class="row">

                <div class="col-lg-7 mt-5" style="margin-left:26em;">
                    <div>
                        <div class="card-body" style="text-align:center;">
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="text-uppercase">
                                            <tr class="table-active">
                                                <th scope="col">ID</th>
                                                <th scope="col">Group</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Action</th>



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

                   ?>


                                            <tr>
                                                <th scope="row"><?php echo $count ?></th>
                                                <th scope="row"><?php echo $row["rname"]  ?></th>
                                                <th scope="row"><?php echo $row["quantity"]  ?></th>

                                                <th scope="row"> <a href="up" Edit</a> <a
                                                        href="editb.php?id=<?php echo $row["product_id"] ?>">Edit</a>

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
                    <!-- page container area end -->
                    <!-- offset area start -->


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
<?php }else{ header ("Location: bloodBankLogin.php"); } ?>
</body>

</html>