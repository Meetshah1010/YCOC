<?php
include('../../connection.php');
session_start();
if (isset($_SESSION['is_userlogin'])) {
    $remail = $_SESSION['remail'];
} else {
    echo "<script> location.href='../login/login.html'</script>";
}
if(isset($_REQUEST['update']))
{
    
    $rname = $_REQUEST['rname'];
    $rmob = $_REQUEST['rmob'];
    $rlandmark = $_REQUEST['rarea'];
    $sql = "UPDATE register SET rname='$rname', rmob='$rmob', rlandmark = '$rlandmark' WHERE remail = '$remail'";
    if($conn->query($sql)==TRUE)
    {
        echo '<script>window.alert("Updated successfully")</script>';
        echo '<script>location.href="profile.php"</script>';
    }
    else
    {
        echo '<script>alert("Sorry!We are unable to update your request please try after sometimes")</script>';
        echo '<script>location.href="profile.php"</script>';
    }
}
?>