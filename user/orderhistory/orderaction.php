<?php
include('../../connection.php');
session_start();
if (isset($_SESSION['is_userlogin'])) {
  $remail = $_SESSION['remail'];
} else {
  echo "<script> location.href='../login/login.html'</script>";
}
echo $_REQUEST['id'];
if(isset($_REQUEST['complete'])){
  $ratings = $_REQUEST['ratings'];
  $oid = $_REQUEST['id'];
  $sql = "UPDATE `o_details` SET `ratings` = '$ratings', `completed` = '1' WHERE `oid` = '$oid'";
  if($conn->query($sql)==TRUE){
    echo '<script>window.alert("Thanks to trust on us")</script>';
    echo '<script>location.href="orderhistory.php"</script>';
  }
  else
  {
    echo '<script>window.alert("Sorry we are unable to process your details tray again later")</script>';
  }
}
if(isset($_REQUEST['cancel'])){
  $oid = $_REQUEST['id'];
  $sql ="DELETE FROM o_details WHERE `oid` = '$oid'";
  if($conn->query($sql)==TRUE){
    echo '<script>window.alert("Your request has been processed successfully")</script>';
    echo '<script>location.href="orderhistory.php"</script>';
  }
  else{
    echo '<script>window.alert("Sorry we are unable to process your details tray again later")</script>';
  }
}
?>