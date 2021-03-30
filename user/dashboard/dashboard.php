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
        YCOC
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
     <style>
        .bg-img {

        background-image: url(dish.png);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        min-height: 300px;


        }

        .container-fluid {
        position: absolute;
        width: auto;
        }

        .menudesign {
        position: absolute;
        top: 3rem;
        right: 0px;
        visibility: visible;
        opacity: 1;
        width: 14rem;
        background: rgb(255, 255, 255);
        border-radius: 8px;
        box-shadow: rgb(28 28 28 / 15%) 0px 2px 8px;
        transform: translate(-73px, 10px);
        transition: transform 0.25s ease 0s, opacity 0.25s ease 0s;
        overflow: hidden;
        }

        .show {
        visibility: visible;
        }

        .hidden {
        visibility: hidden;
        }

        .list {
        background-color: greenyellow;
        }

        #menu div:hover {
        background: rgb(232, 232, 232);
        }

        #menu div {

        padding: 0.3rem;
        text-align: left;
        }

        #menu {
        overflow: hidden;
        }
        </style>
                <nav class="navbar navbar-expand-lg" style="border: 1px solid;">
                    <a class="navbar-brand" style="color:black;" href="../../landing/landing.html">YCOC</a>
                   
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <?php
                            echo '<a id="example" class="nav-link ml-1" href="#" style="color:black;"><b>' . $user['rname'] . '</b></a>';
                            ?>
                        </li><a id="example" class="nav-link ml-1" href="#" style="color:black;">
                        </a>
                    </ul>
                    <a id="example" class="nav-link ml-1" href="#" style="color:black;">

                    </a>
                </nav>
                <div id="menu" class="menudesign">
                    <div onClick="profile()" class="list">profile</div>
                    <div class="list">settings</div>
                    <div onClick="logout()" class="list">logout</div>
                </div>
                <script>
                    const example = document.querySelector("#example");
                    const menu = document.querySelector("#menu");
                    console.log(example);
                    example.addEventListener('click', () => {
                        menu.classList.toggle("hidden");
                    })
                </script>
                </a>
               
</body>
<script>
    const example = document.querySelector("#example");
    const menu = document.querySelector("#menu");
    console.log(example);
    example.addEventListener('click', () => {
        menu.classList.toggle("hidden");
    })
</script>


</html>