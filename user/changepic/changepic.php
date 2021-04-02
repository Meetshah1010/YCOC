<?php
include('../../connection.php');
session_start();
if (isset($_SESSION['is_userlogin'])) 
{
    $remail = $_SESSION['remail'];
} 
else
{
    echo "<script> location.href='../login/login.html'</script>";
}
$sql = "SELECT * FROM register WHERE remail = '" . $remail . "'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
$file = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
if(isset($_REQUEST['update']))
{
    
    $sql="UPDATE register SET img = '".$file."' WHERE remail = '" . $remail . "'";;
    if($conn->query($sql)==TRUE)
    {
        echo '<script>window.alert("Updated successfully")</script>';
        echo '<script>location.href="../profile/profile.php"</script>';
        
    }
    else
    {
        echo '<script>window.alert("Sorry!We are unable to update your request please try after sometimes")</script>';
        echo '<script>location.href="../profile/profile.php"</script>';
    }
}
?>