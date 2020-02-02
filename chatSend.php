<?php //starting session
session_start();
if(isset($_SESSION['loggedin3'])==true)
{ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Stats</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="src/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="src/login/css/style.css">
</head>

<body>
    <?php 
        $num=$pulseoxy=$pulserate=$syst=$diast=$details=$forhosp="";
        $num= $_SESSION['userDetails3']['ambno'];
        $status=true;
        if (!empty($_POST)) {
            if (empty($_POST['pulseoxy'])) {
                $status=false;
            }
            else {
                $pulseoxy=$_POST['pulseoxy'];
            }
            if (empty($_POST['pulserate'])) {
                $status=false;
            }
            else {
                $pulserate=$_POST['pulserate'];
            }
            if (empty($_POST['syst'])) {
                $status=false;
            }
            else {
                $syst=$_POST['syst'];
            }
            if (empty($_POST['diast'])) {
                $status=false;
            }
            else {
                $diast=$_POST['diast'];
            }
            if (empty($_POST['details'])) {
                $status=false;
            }
            else {
                $details=$_POST['details'];
            }
            if (empty($_POST['forhosp'])) {
                $status=false;
            }
            else {
                $forhosp=$_POST['forhosp'];
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
                $sql="INSERT INTO stats (ambno, pulseoxy, pulserate, systolic, diastolic, details, forhosp) values ('$num','$pulseoxy','$pulserate','$syst', '$diast','$details', '$forhosp')";
                if ($com->query($sql)) {
                    header ("Location: chatSend.php");
                }
                else{
                    echo "Invalid credentials. <br>";
                }
            $com->close();
            }
        }
    
        }
    ?>
    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Send Statistics</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="forhosp" id="name" placeholder="Hospital You Are Headed To" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="pulseoxy" id="name" placeholder="Pulse Oxymeter Reading" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="pulserate" id="name" placeholder="Pulserate (in %)" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="syst" id="name" placeholder="Systolic Blood Pressure (in bpm)" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="diast" id="name" placeholder="Diastolic Blood Pressure (in mm HG)" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="details" id="name" placeholder="Details Of Condition (in mm HG)" />
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Login" />
                        </div>
                    </form>

                </div>
            </div>
        </section>

    </div>

    <script src="src/login/js/main.js"></script>
</body>
<?php }else{ header ("Location: ambulanceLogin.php"); } ?>

</html>