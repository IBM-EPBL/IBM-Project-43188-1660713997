<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="../assets/images/brand/icon_black.svg" width="48" height="48" alt="ArrOw"></div>
        <p>Please wait...</p>
    </div>
</div>

<nav class="navbar custom-navbar navbar-expand-lg py-2">
    <div class="container-fluid px-0">
        <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
        <a href="dashboard.php" class="navbar-brand"><strong>Garbage</strong> Management System</a>
        <div id="navbar_main">
            <ul class="navbar-nav mr-auto hidden-xs">
                <li class="nav-item page-header">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               
              
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i></a>
                    
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xl py-0">
                        <div class="py-3 px-3">
                            <?php
          $did=$_SESSION['vamsdid'];
$sql="SELECT * from tblbin  where Status='Approved' && DriverAssignee=:did";
$query = $dbh -> prepare($sql);
$query-> bindParam(':did', $did, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
$totalreq=$query->rowCount();
?>

                            <h5 class="heading h6 mb-0">Garbage Bin Notifications <span class="badge badge-pill badge-primary text-uppercase float-right"><?php echo $totalreq;?></span></h5>
                        </div>
                        <div class="list-group">
                            <?php
                        foreach($results as $row)
{ 

  ?>
                            <a href="view-bin-detail.php?editid=<?php echo htmlentities ($row->ID);?>&&binid=<?php echo htmlentities ($row->BinID);?>" class="list-group-item list-group-item-action d-flex">
                                <div class="list-group-content">
                                    <div class="list-group-heading"><?php echo $row->BinID;?> <small><?php echo $row->AssignDate;?></small></div>
                                   
                                </div>
                            </a>
                        </div><?php  } ?>
                        <div class="py-3 text-center">
                            <a href="new-request.php" class="link link-sm link--style-3">View all notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i></a>
                    
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xl py-0">
                        <div class="py-3 px-3">
                            <?php
          $did=$_SESSION['vamsdid'];
$sql="SELECT * from tbllodgedcomplain  where Status='Approved' && AssignTo=:did";
$query = $dbh -> prepare($sql);
$query-> bindParam(':did', $did, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
$totalreq=$query->rowCount();
?>

                            <h5 class="heading h6 mb-0">Compalin Notifications <span class="badge badge-pill badge-primary text-uppercase float-right"><?php echo $totalreq;?></span></h5>
                        </div>
                        <div class="list-group">
                            <?php
                        foreach($results as $row)
{ 

  ?>
                            <a href="view-complain-detail.php?editid=<?php echo htmlentities ($row->compid);?>&&comid=<?php echo htmlentities ($row->ComplainNumber);?>" class="list-group-item list-group-item-action d-flex">
                              <!--   <div class="list-group-img"><span class="avatar bg-purple"><?php echo $row->ComplainNumber;?></span></div> -->
                                <div class="list-group-content">
                                    <div class="list-group-heading"><?php echo $row->ComplainNumber;?> <small><?php echo $row->AssignDate;?></small></div>
                                   
                                </div>
                            </a>
                        </div><?php  } ?>
                        <div class="py-3 text-center">
                            <a href="new-complain-request.php" class="link link-sm link--style-3">View all notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header">Driver menu</h6>
                        <a class="dropdown-item" href="profile.php"><i class="fa fa-user text-primary"></i>My Profile</a>
                        
                        <a class="dropdown-item" href="change-password.php"><i class="fa fa-cog text-primary"></i>Settings</a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out text-primary"></i>Sign out</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>