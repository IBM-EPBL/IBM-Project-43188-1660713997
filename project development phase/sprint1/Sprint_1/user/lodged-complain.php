<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uuid']==0)) {
  header('location:logout.php');
  } else{
     if(isset($_POST['submit']))
  {
    $uid=$_SESSION['uuid'];
    $area=$_POST['area'];
  $locality=$_POST['locality'];
  $landmark=$_POST['landmark'];
  $address=$_POST['address'];
  $note=$_POST['note'];
  $complainnum=mt_rand(100000000, 999999999);
  $garbagephoto=$_FILES["garbagephoto"]["name"];
 $extension = substr($garbagephoto,strlen($garbagephoto)-4,strlen($garbagephoto));
 $allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('garbage photo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$garbagephoto=md5($garbagephoto).time().$extension;
 move_uploaded_file($_FILES["garbagephoto"]["tmp_name"],"images/".$garbagephoto);
  $sql="insert into tbllodgedcomplain(UserID,ComplainNumber,Area,Locality,Landmark,Address,Photo,Note)values(:uid,:complainnum,:area,:locality,:landmark,:address,:garbagephoto,:note)";
  $query=$dbh->prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':area',$area,PDO::PARAM_STR);
$query->bindParam(':locality',$locality,PDO::PARAM_STR);
$query->bindParam(':landmark',$landmark,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':complainnum',$complainnum,PDO::PARAM_STR);
$query->bindParam(':garbagephoto',$garbagephoto,PDO::PARAM_STR);
$query->bindParam(':note',$note,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your complain has been lodged succeffuly.")</script>';
echo "<script>window.location.href ='lodged-complain.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

}}
  ?>
<!doctype html>
<html lang="en">
<head>
<title>Garbage Management System: Lodged Complain</title>

<link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
<link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="../assets/vendor/parsleyjs/css/parsley.css">

<link rel="stylesheet" href="../assets/css/main.css" type="text/css">
</head>
<body class="theme-indigo">
    <?php include_once('includes/header.php');?>

    <div class="main_content" id="main-content">
       <?php include_once('includes/sidebar.php');?>
        <div class="page">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);">Lodged Complain</a>
               
            </nav>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Lodged Complain</h2>
                            </div>
                            <div class="body">
                                <form method="post" novalidate enctype="multipart/form-data">
                                   
                                    <div class="form-group">
                                        <label>Area</label>
                                        <input type="text" class="form-control" id="area" name="area" value="" required='true'>
                                    </div>
                                    <div class="form-group">
                                        <label>Locality</label>
                                        <input type="text" class="form-control" id="locality" name="locality" value="" required='true'>
                                    </div>
                                    <div class="form-group">
                                        <label>Landmark</label>
                                        <input type="text" class="form-control" id="landmark" name="landmark" value="" required='true'>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                       
                                       <textarea id="address" name="address" class="form-control"></textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Photo</label>
                                         <input type="file" class="form-control" id="garbagephoto" name="garbagephoto" value="" required='true'>
                                    </div>
                                    <div class="form-group">
                                        <label>Note(if any)</label>
                                         <input type="text" class="form-control" id="note" name="note" value="">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </form>
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

<script src="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="../assets/vendor/parsleyjs/js/parsley.min.js"></script>

<!-- Theme JS -->
<script src="../assets/js/theme.js"></script>
<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
</script>
</body>
</html><?php }  ?>
