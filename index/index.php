<?php
include('../connection.php');
if(isset($_REQUEST['rlogin']))
{
    $remail = $_REQUEST['remail'];
    $rpass = $_REQUEST['rpass'];
    $sql = "SELECT remail,rpass FROM register WHERE remail = '".$remail."' AND rpass = '".$rpass."' limit 1 ";
    $result = $conn->query($sql);
    if($result->num_rows == 1)
    {
        session_start();
        $_SESSION['remail']=$_POST['remail'];
        $_SESSION['rpass']=$_POST['rpass'];
        echo "<script>location.href='../profile.php';</script>";
    }
    else
    {
        echo "<script>window.alert('Failed! incorrect password or email id');</script>";
        echo "<script>location.href='index.html'</script>";
    }
}
?>