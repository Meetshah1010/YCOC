<?php
include('../../connection.php');
session_start();
if(isset($_SESSION['is_adminlogin']))
{
    $remail = $_SESSION['remail'];
}
else
{
    echo "<script> location.href='../index/index.php'</script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            admin
        </title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet"  href="../../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet"  href="../css/custom.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="dashboard.css">
    </head> 
    <body>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" style="color:white;" href="../../landing/landing.html">YCOC</a>
          </nav>
    </body>
</html>