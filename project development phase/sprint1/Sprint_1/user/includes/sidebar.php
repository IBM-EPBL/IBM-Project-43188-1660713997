<div class="left_sidebar">
        <nav class="sidebar">
            <div class="user-info">
                <div class="image"><a href="javascript:void(0);"><img src="../assets/images/user.png" alt="User"></a></div>
                <div class="detail mt-3">
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
                    <h5 class="mb-0"><?php  echo $fname ;?></h5>
                    <small><?php  echo $email ;?></small>
                </div>
            </div>
            <ul id="main-menu" class="metismenu">
            
                <li class="active"><a href="dashboard.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
               
               <li><a href="lodged-complain.php"><i class="ti-files"></i><span>lodged Complain</span></a></li>
                <li><a href="lodged-complain-history.php"><i class="ti-files"></i><span>Complain History</span></a></li>
                
                
                 <li><a href="search.php"><i class="ti-search"></i><span>Search</span></a></li>
                
               
            </ul>            
        </nav>
    </div>