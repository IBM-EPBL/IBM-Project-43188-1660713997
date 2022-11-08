<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vamsid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Garbage Management System: Dashboard</title>

<link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
<link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

<link rel="stylesheet" href="../assets/vendor/charts-c3/plugin.css"/>
<link rel="stylesheet" href="../assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css"/>
<link rel="stylesheet" href="../assets/css/main.css" type="text/css">
</head>
<body class="theme-indigo">

<?php include_once('includes/header.php');?>

<div class="main_content" id="main-content">

    <?php include_once('includes/sidebar.php');?>

    

    <div class="page">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
        </nav>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body" style="border:solid #000 1px">
                            <?php 
                         $did=$_SESSION['vamsdid'];
$sql1 ="SELECT * from  tbllodgedcomplain where AssignTo=:did ";
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':did', $did, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totassrequest=$query1->rowCount();
?>
                            <h6 style="color: red;">Total Assign Complain</h6>
                            <h2><?php echo htmlentities($totassrequest);?></h2>
                            <a href="all-complain.php"><small> View Detail</small></a>
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon sales">
                        <div class="body" style="border:solid #000 1px">
                             <?php 
                         $did=$_SESSION['vamsdid'];
$sql ="SELECT * from  tbllodgedcomplain where Status='On The Way' && AssignTo=:did ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':did', $did, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$tototwcomp=$query->rowCount();
?>
                            <h6 style="color: orange;">Inprogress Complain</h6>
                           <h2><?php echo htmlentities($tototwcomp);?></h2>
                            <a href="ontheway-complain.php"><small> View Detail</small></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon email">
                        <div class="body" style="border:solid #000 1px">
                            <?php 
                         $did=$_SESSION['vamsdid'];
$sql ="SELECT * from  tbllodgedcomplain where Status='Completed' && AssignTo=:did ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':did', $did, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totcompcomplain=$query->rowCount();
?>
                            <h6 style="color: green;">Completed Complain</h6>
                           
                            <h2><?php echo htmlentities($totcompcomplain);?></h2>
                            <a href="completed-complain.php"><small> View Detail</small></a>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body" style="border:solid #000 1px">
                            <?php 
                         $did=$_SESSION['vamsdid'];
$sql1 ="SELECT * from  tblbin where DriverAssignee=:did";
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':did', $did, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totassbin=$query1->rowCount();
?>
                            <h6 style="color: red;">Total Assign Garbage Bin</h6>
                            <h2><?php echo htmlentities($totassbin);?></h2>
                            <a href="total-request.php"><small> View Detail</small></a>
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon sales">
                        <div class="body" style="border:solid #000 1px">
                             <?php 
                         $did=$_SESSION['vamsdid'];
$sql ="SELECT * from  tblbin where Status='On The Way' && DriverAssignee=:did ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':did', $did, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totinpro=$query->rowCount();
?>
                            <h6 style="color: orange;">Inprogress</h6>
                           <h2><?php echo htmlentities($totinpro);?></h2>
                            <a href="ontheway.php"><small> View Detail</small></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon email">
                        <div class="body" style="border:solid #000 1px">
                            <?php 
                         $did=$_SESSION['vamsdid'];
$sql ="SELECT * from  tblbin where Status='Completed' && DriverAssignee=:did ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':did', $did, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totcomp=$query->rowCount();
?>
                            <h6 style="color: green;">Garbage Cleaned</h6>
                           
                            <h2><?php echo htmlentities($totcomp);?></h2>
                            <a href="completed.php"><small> View Detail</small></a>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>    
</div>

<!-- Core -->
<script src="../assets/bundles/libscripts.bundle.js"></script>
<script src="../assets/bundles/vendorscripts.bundle.js"></script>

<script src="../assets/bundles/c3.bundle.js"></script>
<script src="../assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->

<script src="../assets/js/theme.js"></script>
<script src="../assets/js/pages/index.js"></script>
<script src="../assets/js/pages/todo-js.js"></script>
</body>
</html><?php } ?>