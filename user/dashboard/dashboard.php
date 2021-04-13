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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .dropdown-item:hover {
        font-weight: 600;
    }
</style>

<body>

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
        <form action="../orderprocess/orderprocess.php" method="POST">
            <div>
                <h5><span class="material-icons-outlined">
                        $#e88a
                    </span>Address</h5>
                <input type="text" name="address" id="address" placeholder="venue Address">
            </div>
            <div>
                <h5>Booking date</h5>
                <input type="date" name="odate" id="date">
                <input type="time" name="otime" id="otime">
            </div>
            <h5>Select Cusine </h5>
            <div class="food">
                <div class="btn-group dropright">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="catbtn">
                        food type
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <?php
                        $sql = "SELECT DISTINCT cspec FROM cook";
                        $result = $conn->query($sql);
                        while ($food = $result->fetch_assoc()) {
                            echo '<button class="dropdown-item" type="button" onclick="getmenu(this.innerText,this);">' . $food['cspec'] . '</button>';
                        }
                        echo '<button class="dropdown-item" type="button" onclick="getmenu(this.innerText,this);">Others</button>';
                        ?>
                    </div>
                </div>
            </div>
            <div id="pop">
            </div>
            <label for="">this below inputs are to be made hidden using display:hidden</label>
            <div class="hiddeninputs">
                <input type="hidden" name="catagory" id="cat">
                <input type="hidden" name="list" id="lst">

            </div>








            <div class="gender">
                <h2>please select cook gender:-</h2>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label><br>
            </div>
            <b><label>Would u like to give suggestions</label></b><br>
            <textarea name="suggestion" id="" cols="50" rows="5" maxlength="100" placeholder="suggestion box..."></textarea>
            <input type="hidden" name="adr">
            <input type="hidden" name="date">
            <?php
            echo '<input type="hidden" value="' . $user['id'] . '" name="uid">';
            ?><br>
            <input type="submit" value="Submit">
        </form>


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