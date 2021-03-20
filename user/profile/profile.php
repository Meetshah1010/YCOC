<?php
include('../../connection.php');
session_start();
if(isset($_SESSION['is_userlogin']))
{
    $remail = $_SESSION['remail'];
}
else
{
    echo "<script> location.href='../login/login.html'</script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            YCOC
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
            <a class="navbar-brand" style="color:black;" href="../../landing/landing.html">YCOC</a>
          </nav>
    </body>
</html>