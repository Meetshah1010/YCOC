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
    
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

        /* arrow button animaton
        @keyframes up {
            from {
                transform: rotate(180deg);
            }

            to {
                transform: rotate(0deg);
            }
        }

        @keyframes down {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(-180deg);
            }
        }

        .arrow {
            animation-name: up;
            animation-duration: 1s;
            animation-direction: alternate;
            /* animation-iteration-count: 1; */
        /* animation-fill-mode: forwards;
        }

        /* .arrow-down {
            animation-name: down;
            animation-duration: 1s;
            animation-direction: alternate;
            /* animation-iteration-count: 1; */
        /* animation-fill-mode: forwards; */
        }

        */ #menu {
            overflow: hidden;
        }



        .transform {
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
            -ms-transition: all 1s ease;
            transition: all 1s ease;
        }

        .transform-active {
            transform: rotate(-180deg);
        }
        .dishid{
            display:none;
        }
    </style>
    <!-- <nav class="navbar navbar-expand-lg" style="border: 1px solid;">
        <a class="navbar-brand" style="color:black;" href="../../landing/landing.html">YCOC</a>
        <ul class="navbar-nav ml-auto" id="example" style="margin-right: 77px;">
            <?php echo '
            <li class="nav-item">';
            if ($user['img'] != NULL) {
                echo ' <img class="image" style="height: 50px; width:50px;border:2px solid black; 
               border-radius:50px; margin-top:10px;" class="zoomA" 
               src="data:image/jpeg;base64,' . base64_encode($user['img']) . '" />';
            } else {
                echo '<img src="../../assets/images/avtar.png" alt="" style="height: 30px; width:auto; margin-top:10px;">';
            }
            echo '</li>';
            echo '<div class="nav-item">
                
                    <a class="nav-link ml-1" href="#" style="color:black;"><b>' . $user['rname'] . '</b></a>';
            ?>

            </div>
            <div id="arrow" class="transform">
                <img id="svg" src="arrow.png" alt="arrow" style="float: right; margin-top:15px;">
            </div>

        </ul>

    </nav> -->

    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/de/user/";
    include($IPATH . "navigationbar.html"); ?>
    <div id="menu" class="menudesign hidden">
        <div onClick="profile()" class="list">profile</div>
        <div class="list">settings</div>
        <div onClick="logout()" class="list">logout</div>
    </div>







    <div class="container mainmenu">
        <!-- Default dropright button -->
       
        <div class="food">
            <div class="btn-group dropright">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    food type 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button" onclick="getmenu(this.innerText);">chinese</button>
                    <button class="dropdown-item" type="button" onclick="getmenu(this.innerText);">punjabi</button>
                    <button class="dropdown-item" type="button" onclick="getmenu(this.innerText);">southindian</button>
                </div>
            </div>
        </div>
        
        <div class="chinese dishid">
            <div class="btn-group dropright">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    chinese
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">noodles</button>
                    <button class="dropdown-item" type="button">manchurian</button>
                    <button class="dropdown-item" type="button">momos</button>
                    <button class="dropdown-item" type="button">chowmin</button>
                </div>
            </div>
        </div>
        
        <div class="punjabi dishid">
            <div class="btn-group dropright">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    punjabi
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">parotaha</button>
                    <button class="dropdown-item" type="button">lassi</button>
                    <button class="dropdown-item" type="button">butter nan</button>
                </div>
            </div>
        </div>
        <div class="southindian dishid">
            <div class="btn-group dropright">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    south indian 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">idli</button>
                    <button class="dropdown-item" type="button">dosa</button>
                    <button class="dropdown-item" type="button">uttapam</button>
                </div>
            </div>
        </div>
            
        <div class="gender">
            <h2>please select cook gender:-</h2>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
            </div>





    </div>




















    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        const example = document.querySelector("#example");
        const menu = document.querySelector("#menu");
        // const arrow = document.querySelector("#arrow");
        // console.log(example);
        example.addEventListener('click', () => {
            menu.classList.toggle("hidden");
            arrow.classList.toggle("transform-active");
            $('.transform').toggleClass('transform-active');
        });
        $(function() {
            $("#nbar").load("nav.html");
        });
    </script>
<script src="dashboard.js"></script>

</body>
<!-- <script>
    const example = document.querySelector("#example");
    const menu = document.querySelector("#menu");
    console.log(example);
    example.addEventListener('click', () => {
        menu.classList.toggle("show");
    })
</script> -->


</html>