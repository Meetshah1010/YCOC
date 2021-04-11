<?php
include('../../connection.php');
session_start();
if (isset($_SESSION['is_userlogin'])) {
    $remail = $_SESSION['remail'];
} else {
    echo "<script> location.href='../login/login.html'</script>";
}
$uid = $_REQUEST['uid'];
$addr = $_REQUEST['address'];
$odate = $_REQUEST['odate'];
$otime = $_REQUEST['otime'];
$gender = $_REQUEST['gender'];
$spec = $_REQUEST['catagory'];
$dish = $_REQUEST['list'];
$suggestion = $_REQUEST['suggestion'];
$sql = "SELECT * FROM register WHERE id = '" . $uid . "'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
$uname=$user['rname'];
$umob = $user['rmob'];
$sql ="SELECT DISTINCT * FROM cook WHERE cspec= '".$spec."' AND cgender = '".$gender."' AND available = '0'";
$result=$conn->query($sql);
$cook = $result->fetch_assoc();
$cid = $cook['cid'];
$cname = $cook['cname'];
$cmob = $cook['cmob'];
$img = "SELECT * FROM images WHERE id = '".$cook['cid']."'";
$result=$conn->query($img);
$image = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Profile
        </title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet"  href="../../assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet"  href="../assets/css/custom.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="orderprocess.css">
    </head> 
    <body>
<div class="row gutters-sm">
  <div class="col-md-4 mb-3">
  <?php echo  '<img style="margin:20px;border: 3px solid; border-radius:50px; white;height:120px; width:120px;"  src="data:image/jpeg;base64,'.base64_encode($image['img'] ).'" />
  <h1>Cook image</h1>';
  ?>
  </div>  
  <div class="col-md-8">
  <div class="card mb-3">
                <div class="card-body">
                  <h1>Cook Details</h1>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <?php
                    echo '<div class="col-sm-9 text-secondary">'.$cook['cname'].'</div>';
                    ?>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contact Number</h6>
                    </div>
                    <?php
                    echo '<div class="col-sm-9 text-secondary">'.$cook['cmob'].'</div>';
                    ?>
                  </div>
                  <hr>
                  <h1>Order Details</h1>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Venue Address</h6>
                    </div>
                    <?php
                    echo '<div class="col-sm-9 text-secondary">'.$addr.'</div>';
                    ?>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Order Date</h6>
                    </div>
                    <?php
                    echo '<div class="col-sm-9 text-secondary">'.$odate.'</div>';
                    ?>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Time</h6>
                    </div>
                    <?php
                    echo '<div class="col-sm-9 text-secondary">'.$otime.'</div>';
                    ?>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Order type</h6>
                    </div>
                    <?php
                    echo '<div class="col-sm-9 text-secondary">'.$spec.'</div>';
                    ?>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Dish Name</h6>
                    </div>
                    <?php
                    echo '<div class="col-sm-9 text-secondary">'.$dish.'</div>';
                    ?>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Your Suggestion</h6>
                    </div>
                    <?php
                    if($suggestion==NULL){
                      echo '<div class="col-sm-9 text-secondary">There is no suggestion from your side</div>';
                    }
                    else{
                      echo '<div class="col-sm-9 text-secondary">'.$suggestion.'</div>';
                    }
                    ?>
                  </div>
                  <hr>
                  <div class="row">
                    <?php
                    $sql = "INSERT INTO `o_details` (`food_type`, `dish_name`, `uid`, `uname`, `umob`, `address`, `date`, `time`, `suggestion`, `cid`, `cname`, `cmob`) VALUES ( '$spec', '$dish', '$uid', '$uname', '$umob', '$addr', '$odate', '$otime', '$suggestion', '$cid', '$cname', '$cmob ')";
                    if($conn->query($sql)==TRUE)
                    {
                     /* $sql2="UPDATE cook SET available='1' WHERE cid = '$cid'";
                      if($conn->query($sql2)==TRUE)
                      {
                        echo "<script>window.alert('Thanks to trust on us $uname your cook $cname will come to $addr at $odate Thanks')</script>
                        <script>location.href='../dashboard/dashboard.php'</script>";
                      }
                      else{
                        echo '<script>window.alert("Sorry we are unable to accept your order at this time please try again later")</script>';
                      }
                    }*/echo "<script>window.alert('Thanks to trust on us $uname your cook $cname will come to $addr at $odate Thanks')</script>
                    <script>location.href='../dashboard/dashboard.php'</script>";
                  }
                    else{
                      echo '<script>window.alert("Sorry we are unable to accept your order at this time please try again later")</script>';
                    }
                    ?>
                  </div>
                  <hr>
                </div>
              </div>
  </div>
</div>
        
    </body>
</html>
         
