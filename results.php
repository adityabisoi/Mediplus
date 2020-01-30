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


    <div>

        <h1 style="text-align:center">Add Item Here</h1><br>
        <div class="main-content-inner">
            <div class="row">

                <!-- Contextual Classes start -->
                <div class="col-lg-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="header-title">Medicines</h4> -->
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-dark text-center">
                                        <thead class="text-uppercase">
                                            <tr class="table-active">
                                                <th scope="col">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                $name=$_POST['name'];
                $type=$_POST['type'];
               $conn = new mysqli("localhost","root","","electrothon");
               $sql = "SELECT name FROM resources WHERE type='$type' && rname='$name' ";
               $result = $conn->query($sql);
					$count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				 {
                   ?>


                                            <tr>
                                                <th><?php echo $row["name"] ?></th>
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
<?php }else{ header ("Location: login.php"); } ?>

</html>