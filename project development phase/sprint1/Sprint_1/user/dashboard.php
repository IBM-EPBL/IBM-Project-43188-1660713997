<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uuid']==0)) {
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
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body">
                            <?php
                     $uid=$_SESSION['uuid'];
                    $sql="SELECT FullName,Email from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $row)
{    
$email=$row->Email;   
$fname=$row->FullName;     
}   ?>
                            <h4 style="color: red;"> Welcome to user Panel !! <?php  echo $fname ;?></h4>
                            
                            <a href="profile.php" class="btn btn-primary"><small> View Profile</small></a>
                          
<?php 
$sql="SELECT tbluser.ID as uid from tbllodgedcomplain join tbluser on tbluser.ID=tbllodgedcomplain.UserID where tbllodgedcomplain.UserID=:uid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totallodgedcomplain=$query->rowCount();
?>
<div class="row clearfix" style="margin-top:2%;">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body" style="border:solid #000 1px">
                                                        <h6>Total Lodged Complain</h6>
                            <h2><?php echo $totallodgedcomplain;?></h2>
                           <a href="lodged-complain-history.php"><small> View Detail</small></a>
                        </div>
                    </div>
                </div>

<?php 
$sql="SELECT tbluser.ID as uid from tbllodgedcomplain join tbluser on tbluser.ID=tbllodgedcomplain.UserID where tbllodgedcomplain.UserID=:uid and  (tbllodgedcomplain.Status is null || tbllodgedcomplain.Status='')";
$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$newlodgedcomplain=$query->rowCount();
?>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon sales">
                        <div class="body" style="border:solid #ff0000 1px">
                                                         <h6>New Lodged Complain</h6>
                            <h2><?php echo $newlodgedcomplain;?></h2>
                           <a href="lodged-complain-history.php"><small> View Detail</small></a>
                        </div>
                    </div>
                </div>

<?php 
$sql="SELECT tbluser.ID as uid from tbllodgedcomplain join tbluser on tbluser.ID=tbllodgedcomplain.UserID where tbllodgedcomplain.UserID=:uid and  (tbllodgedcomplain.Status='Completed')";
$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$completedlodgedcomplain=$query->rowCount();
?>

                <div class="col-lg-4 col-md-6 col-sm-12" >
                    <div class="card widget_2 big_icon email">
                        <div class="body" style="border:solid #009900 1px">
                                                      
                             <h6>Completed Lodged Complain</h6>
                            <h2><?php echo $completedlodgedcomplain;?></h2>
                           <a href="lodged-complain-history.php"><small> View Detail</small></a>
                        </div>
                    </div>
                </div>
        
            </div>







                          
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