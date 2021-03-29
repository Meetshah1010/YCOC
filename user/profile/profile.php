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
$sql = "SELECT * FROM register WHERE remail = '".$remail."'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Profile
        </title>
        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" 
        integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
        <script src="profile.js"></script>
    </head>
    <body>
        <button style="float: right;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
            Edit Profile
        </button>
        <!-- Modal HTML Markup -->
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Edit Profile</h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form  method="POST" action="">
                    <?php
                    if($user['image']!=NULL)
                    {
                        echo '<img style="border: 3px solid; border-radius:50px; white;height:100px;width:100px;" class="zoomA" src="data:image/jpeg;base64,'.base64_encode($user['image'] ).'" />';
                    }
                    else
                    {
                        echo '<img style="border: 3px solid; border-radius:50px; white;height:100px;width:100px;" src="../../assets/images/avtar.png"/>';
                    }
                    
                    echo '<div class="form-group">
                    <fieldset>
                         <legend>Personalia:</legend>
                        <input class="form-control input-lg" type="text" id="fname" name="fname" value="John"><br>
                         </fieldset>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">Login</button>

                            <a class="btn btn-link" href="">Forgot Your Password?</a>
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