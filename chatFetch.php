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
    <title></title>
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
                <?php if($_SESSION['loggedin']==true){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li><?php }else{}?>
            </ul>
        </div>
    </nav>

    <div class="main-content-inner">
        <div class="row">

            <div class="col-lg-7 mt-5" style="margin-left:26em;">
                <div>
                    <div class="card-body" style="text-align:center;">
                    <u> <h4 style="text-align:center" class="header-title">Ambulance</h4></u>

                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-uppercase">
                                        <tr class="table-active">
                                            <th scope="col">Ambulance NO</th>
                                            <th scope="col">Pulse oxy (%)</th>
                                            <th scope="col">Pulse rate (bpm)</th>
                                            <th scope="col">Systolic (mm HG)</th>
                                            <th scope="col">Diastolic (mm HG)</th>
                                            <th scope="col">Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $name="";
                                            $name= $_SESSION['userDetails']['name'];
                                            $conn = new mysqli("localhost","root","","electrothon");

               $sql = "SELECT * FROM stats WHERE forhosp='$name'";
               $result = $conn->query($sql);
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				 {

                   ?>


                                        <tr >
                                            <th scope="row"><?php echo $row["ambno"] ?></th>
                                            <th <?php if($row["pulseoxy"]<=90){?>class="table-danger"<?php }else{?>class="bg-success"<?php } ?> scope="row"><?php echo $row["pulseoxy"]  ?></th>
                                            <th <?php if($row["pulserate"]<=60 || $row["pulserate"]>=100){?>class="table-danger"<?php }else{?>class="bg-success"<?php } ?> scope="row"><?php echo $row["pulserate"]  ?></th>
                                            <th <?php if($row["systolic"]<=120){?>class="bg-success"<?php }else if($row["systolic"]>=120 && $row["systolic"]<=140){?>class="bg-warning"<?php }else{?>class="bg-danger"<?php } ?> scope="row"><?php echo $row["systolic"]  ?></th>
                                            <th <?php if($row["diastolic"]<=80){?>class="bg-success"<?php }else if($row["diastolic"]>=80 && $row["diastolic"]<=90){?>class="bg-warning"<?php }else{?>class="bg-danger"<?php } ?> scope="row"><?php echo $row["diastolic"]  ?></th>
                                            <th class="table-warning" scope="row"><?php echo $row["details"]  ?></th>
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

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<?php }else{ header ("Location: login.php"); } ?>

</html>