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
<html>

<head>
    <title>
        Profile
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="profile.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color:#fff5f9;margin-bottom:10px;">
        <a class="navbar-brand" style="color:black;" href="../../landing/landing.html">YCOC</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php
                if ($user['image'] != NULL) {
                    echo '<img  style="border: 1px solid; border-radius:30px; white;height:50px;width:50px;" class="zoomA" 
                        src="data:image/jpeg;base64,' . base64_encode($user['image']) . '" />';
                } else {

                    echo '<img id="profileimg" alt="profile image"
                style="border: 1px solid; border-radius:30px; white;height:50px;width:50px;" src="profile.png"/>';
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                echo '<a id="example" class="nav-link ml-1" href="#" style="color:black;"><b>' . $user['rname'] . '</b></a>';
                ?>
            </li>
            <a id="example" class="nav-link ml-1" href="#" style="color:black;"></a>
        </ul>
        <a id="example" class="nav-link ml-1" href="#" style="color:black;"></a>
    </nav>
    <div class="container-sm" style="margin: 0px 146px 0px 146px;">
        <div class="profilebg">
            <?php
            echo '<div class="profileinfo">';
            if ($user['image'] != NULL) {
                echo '
                        <img id="profileimg" src="data:image/jpeg;base64,' . base64_encode($user['image']) . '" 
                        alt="profile image" style="float: left;">
                        ';
            } else {
                echo '<img id="profileimg" alt="profile image" style="float: left;" src="../../assets/images/avtar.png"/>';
            }
            echo '  <div style="margin-top:45px; margin-left:16px; float:right;">
                    <div class="cwhite" style="font-weight:bolder; font-size:22px;">' . $user['rname'] . '</div>
                    <div class="cwhite">' . $user['remail'] . '</div>
                    <div class="cwhite">' . $user['rlandmark'] . '</div>
                </div>';
            ?>
        </div>
        <div class="profileedit">
            <button data-toggle="modal" data-target="#ModalLoginForm" class="edit" role="button" tabindex="0" aria-disabled="false"><span tabindex="-1" class="sc-1kx5g6g-2 gylDKm"><i class="rbbb40-1 MxLSp sc-1kx5g6g-0 gyojlT" color="#FFFFFF" size="10"><svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" width="10" height="10" viewBox="0 0 20 20" aria-labelledby="icon-svg-title- icon-svg-desc-" role="img" class="rbbb40-0 fdFvgA">
                            <path d="M16.66 11.9c-0.522 0.011-0.94 0.437-0.94 0.96 0 0 0 0 0 0v-0 3.32c0 0.006 0 0.013 0 0.020 0 1.049-0.851 1.9-1.9 1.9-0 0-0 0-0 0h-10c-0.006 0-0.013 0-0.020 0-1.049 0-1.9-0.851-1.9-1.9 0-0.007 0-0.014 0-0.021v0.001-10c0-0 0-0 0-0 0-1.049 0.851-1.9 1.9-1.9 0.007 0 0.014 0 0.021 0h3.319c0.467-0.070 0.822-0.469 0.822-0.95s-0.354-0.88-0.817-0.949l-0.005-0.001h-3.32c-0 0-0 0-0 0-2.103 0-3.809 1.699-3.82 3.799v10.001c0 2.11 1.71 3.82 3.82 3.82v0h10c2.101-0.011 3.8-1.717 3.8-3.82 0-0 0-0 0-0v0-3.32c0-0.53-0.43-0.96-0.96-0.96v0zM18.96 1.040c-0.648-0.647-1.542-1.047-2.53-1.047s-1.882 0.4-2.53 1.047l0-0-6.9 6.92c-0.072 0.074-0.132 0.16-0.178 0.254l-0.003 0.006v0.080s0 0 0 0.060l-1.54 5.18c-0.027 0.084-0.042 0.18-0.042 0.28 0 0.265 0.108 0.506 0.282 0.68l0 0c0.174 0.173 0.413 0.28 0.678 0.28 0.001 0 0.002 0 0.002 0h-0c0.039 0.006 0.084 0.009 0.13 0.009s0.091-0.003 0.135-0.009l-0.005 0.001 5.18-1.5h0.14c0.1-0.048 0.186-0.108 0.26-0.18l-0 0 6.92-7c0.647-0.648 1.047-1.542 1.047-2.53s-0.4-1.882-1.047-2.53l0 0zM7.62 12.38l0.52-1.9 1.38 1.38zM17.62 4.76l-6.2 6.22-2.4-2.36 6.22-6.24c0.305-0.305 0.725-0.493 1.19-0.493 0.929 0 1.683 0.753 1.683 1.683 0 0.465-0.188 0.885-0.493 1.19v0z"></path>
                        </svg></i><span class="sc-1kx5g6g-3 dkwpEa">Edit profile</span></span></button>
        </div>
    </div>
    <!-- ////navbar ends left panel start -->

    <div class="leftpanel">
        <div class=" leftitem">
            <h5><a class="">Address</a></h5>
        </div>
        <div class="leftitem">
            <h5><a class="">Recentley Booked</a></h5>
        </div>
        <div class="leftitem"><a class="">Favorite Chef</a></div>
        <div class="leftitem"><a class="">Donate For Charity</a></div>
        <div class="leftitem"><a class=""> Your Friend</a></div>
        <div class="leftitem"><a class="">Order History</a></div>
        <div class="leftitem"><a class="">Report Us</a></div>
    </div>
    </div>
    <!-- Modal HTML Markup -->
    <div id="ModalLoginForm" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Edit Profile</h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="updateuser.php">
                        <?php
                        echo '
                                <div class="img-box" style="border:2px solid black">';
                        if ($user['image'] != NULL) {
                            echo '<img class="image" style=height:100px;width:100px;" class="zoomA" src="data:image/jpeg;base64,' . base64_encode($user['image']) . '" />';
                        } else {
                            echo '<img class="image" style="height:100px;width:100px;" src="profile.png"/>';
                        }

                        echo '<a href="../changepic/changepic.html" target="_blank">
                        <div class="overlay">
                            <div class="circle"></div>
                            <img src="https://img.icons8.com/metro/26/000000/camera.png"/>
                                 </div>
                        </div></a>
                        ';
                        echo '<div class="form-group">
                                <label class="control-label">Full Name</label>
                                <input required type="text" value="' . $user['rname'] . '" class="form-control input-lg" name="rname">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Contact Number</label>
                                    <input required type="text" pattern="[0-9]{10}" required value="' . $user['rmob'] . '" class="form-control input-lg" name="rmob">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Address</label>
                                    <input type="text" required value="' . $user['rlandmark'] . '" class="form-control input-lg" name="rarea">
                                </div>
                                <div class="form-group">
                                    <button class="update" name="update" type="submit">Update</button>
                                </div>';
                        ?>
                </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>