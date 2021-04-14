<?php
include('../../connection.php');
session_start();
if (isset($_SESSION['is_userlogin'])) {
    $remail = $_SESSION['remail'];
} else {
    echo "<script> location.href='../login/login.html'</script>";
}
$sql = "SELECT * FROM register WHERE remail = '" . $remail . "'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="orderhistory.css">
  <title>Your order History</title>
</head>

<body>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  <!-- /////////////////////////////////////////////////////top order box ////////////////////////////////// -->
  <div class="topbar">
    <div style="justify-self:flex-end;">
      <img src="../../assets/food-img/iconfinder_curry_3377057.png" alt="">
      <img src="../../assets/food-img/iconfinder_ramen_3377055.png" alt="">
      <img src="../../assets/food-img/iconfinder_bibimbub_3377053.png" alt="">
      </div>
    <h1 style="text-align: center;">Order History!</h1>
      <div>
        <img src="../../assets/food-img/iconfinder_fried_rice_3377056.png" alt="">
        <img src="../../assets/food-img/iconfinder_green_curry_3377058.png" alt="">
        <img src="../../assets/food-img/iconfinder_chow_mein_3377054.png" alt="">
      </div>
  </div>


  <!-- ///////////////////////////////////////////////////////content below order text//////////////////////////////// -->





  <div class="container" style="width: 897px">

    <!-- /////generate more components like hisbox div using php///// -->
    <?php
    $sql = "SELECT * FROM o_details WHERE `uid` ='" .$user['id']."'";
    $result = $conn->query($sql);
    if($result->num_rows>0)
    {
      while($order= $result->fetch_assoc())
      {
        date_default_timezone_set('Asia/Kolkata');
        $string2=strtotime($order['time']);
        $starting_order_hour =  date('H',$string2);
        $starting_order_minute = date("i",$string2);
        $closing_order_hour = $starting_order_hour+1;
        $sql3= "SELECT * FROM images WHERE id = '".$order['cid']."'";
        $result3 = $conn->query($sql3);
        $img = $result3->fetch_assoc();
        echo '
        <div class="hisbox">
          <div class="subdiv">
            <div class="first">
              <div class="imgbox"><img class="dp" src="data:image/jpeg;base64,' . base64_encode($img['img']) . '"" alt="image"></div>
              <div class="ordtl">
                <div class="ckname"><strong>'.$order['cname'].'</strong></div>
                '.$order['dish_name'].'
              </div>
            </div>
    
            <div class="second" style="">
              <div class="order">ORDER-id:- <strong>'.$order['oid'].'</strong></div>
              <div class="date">Date:- <strong>'.$order['date'].'</strong> </div>
            </div>
    
          </div>
          <div class="subdiv">
            <div class="address">Address <br><strong>'.$order['address'].'</strong></div>
            <div class="ckcontact">cook contact no<br><strong>'.$order['cmob'].'</strong></div>
            <div class="bookslot" style="justify-self: end;">booked-slot<br><strong>'.$starting_order_hour.':'.$starting_order_minute.'- '.$closing_order_hour.':'.$starting_order_minute.'</strong> </div>
            <div class="cost" style="margin:5px 0px;">Item cost <br><strong><span>&#8377;</span>100.00</strong></div>
          </div>
          <div class="subdiv" style="border:none">
            <div class="delivered">Prepared with <i class="bi bi-heart-fill" style="color: red;"></i> <span
                id=ratingbox>5<span>&#9733</span></span></div>
            <div class="second" style="color: green;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="green" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                <path
                  d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
              </svg>Repeat Booking</div>
          </div>';
      }
    }
    else{
      echo "You heven't order anythin yet";
    }
    ?>





    </div>
  
  
  
  </div>
 
</body>

</html>