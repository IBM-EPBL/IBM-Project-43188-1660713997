<div class="left_sidebar">
        <nav class="sidebar">
            <div class="user-info">
                <div class="image"><a href="javascript:void(0);"><img src="../assets/images/user.png" alt="User"></a></div>
                <div class="detail mt-3">
                    <?php
                     $did=$_SESSION['vamsdid'];
                    $sql="SELECT Name,Email from  tbldriver where DriverID=:did";
$query = $dbh -> prepare($sql);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $row)
{    
$email=$row->Email;   
$fname=$row->Name;     
}   ?>
                    <h5 class="mb-0"><?php  echo $fname ;?></h5>
                    <small><?php  echo $email ;?></small>
                </div>
            </div>
            <ul id="main-menu" class="metismenu">
            
                <li class="active"><a href="dashboard.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
               
               <li>
                    <a href="javascript:void(0)" class="has-arrow"><i class="ti-pencil-alt"></i><span>Assign Complain</span></a>
                    <ul>
                        <li><a href="new-complain-request.php">New Complain</a></li>
                        <li><a href="ontheway-complain.php">On the way Complain</a></li>
                        <li><a href="completed-complain.php">Completed Complain</a></li>
                        <li><a href="all-complain.php">All Complain</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow"><i class="ti-pencil-alt"></i><span>Assign Garbage Bin</span></a>
                    <ul>
                        <li><a href="new-request.php">New Garbage Bin</a></li>
                        <li><a href="ontheway.php">On the way Garbage Bin</a></li>
                        <li><a href="completed.php">Completed Garbage Bin</a></li>
                        <li><a href="total-request.php">Total Garbage Bin</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow"><i class="ti-search"></i><span>Search</span></a>
                    <ul>
                        <li><a href="search-bin.php">Search Bin</a></li>
                        <li><a href="search-complain.php">Search Lodged Complain</a></li>
                       
                       
                    </ul>
                </li>
                 
                
                <li class="open-top">
                    <a href="javascript:void(0)" class="has-arrow"><i class="ti-lock"></i><span>Report</span></a>
                    <ul>
                        <li><a class="dropdown-item" href="collected-bin-report.php">Collected Bin Report</a></li>
                       <li><a class="dropdown-item" href="lodged-complain-report.php">Lodged Complain Report</a></li>
                    </ul>
                </li>
            </ul>            
        </nav>
    </div>