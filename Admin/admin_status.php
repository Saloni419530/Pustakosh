<?php
include "navbar4.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Approve Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            transition: background-color .5s;
        }


        #displayImage img {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 105%;
            filter: brightness(75%);
        }
        .sidenav {
        font-family: 'Brush Script MT', cursive;
        height: 100%;
        margin-top: 50px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222;
        color: #e6d522;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 35px;
        color: #e6d522;
        display: block;
        transition: 0.3s;
    }
    .sidenav a:hover {
        color: #f1f1f1;
    }
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }
        

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                color: gold;
                font-size: 18px;
            }
        }

        .img-circle {
            margin-left: 20px;
			box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
        }

       .container {
    background-color: rgba(0, 0, 0, 0.7); /* Black background with 70% opacity */
    box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
    border: 1px solid gold;
    border-radius: 5px;
    margin-top: 10px;
    overflow-x: auto;
    white-space: pre-wrap;
    padding-top: -10px;
    color: white; /* Ensures text remains fully visible */
    height:auto;
    }


        .container th {
            color: white;
        }

        .container {
            width: 75%;
            margin: 20px auto;
        }

        .srch {
            float: right;
        }

        .navbar-form {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .form-control {
            margin-right: 5px;
           
        }

        .btn-default {
            background-color: #6db6b9e6;
        }

        .h a {
            color: #818181;
            display: block;
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            transition: 0.3s;
        }

        .h a:hover {
            color: #f1f1f1;
        }

        /* Gold table styles */
        .table-gold {
            border-collapse: collapse;
            width: 100%;
        }

        .table-gold th, .table-gold td {
            border: 1px solid gold;
            text-align: center;
            padding: 8px;
            color:white;
        }

        .table-gold th {
            color: white;
            font-size: 2opx;
        }

        table tr:hover td {
    background-color:rgb(175, 171, 171) !important;
}
        h2{
            text-align: center;
        }
    </style>

</head>
<body>
    <div id="displayImage">
        <img src="images/ex.webp" alt="Selected Image">
    </div>
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div style="color: white;; margin-left: 60px; font-size: 35px;">

                <?php
                if(isset($_SESSION['login_user']))

                {   echo "<img class='img-circle profile_img' height=120 width=120 src='images/profile.png'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>


        <a href="request.php">Book Request</a>
        <a href="issue_info.php">Issue Information</a>
        <a href="expired.php">Expired List</a>
    </div>

    <div id="main">

        <span style="font-size:32px;font-family: 'Brush Script MT', cursive; cursor:pointer; color: #e6d522;" onclick="openNav()">&#9776; open</span>


        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "white";
            }
        </script>
        <div class="container">
        <h2 style="font-size:45px;font-family: 'Brush Script MT', cursive;color: #e6d522; text-align:center;">New Requests</h2><br>
            <h3 style="float:left;color: white;">Search one user at a time to approve the request.</h3>
            <div class="srch">
                <form class="navbar-form" method="post" name="form1"
                      style="display: flex; justify-content: flex-end; align-items: center;">

                    <input class="form-control" type="text" name="search" placeholder="Student Username.." required=""
                           style="margin-right: 5px;">
                    <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>
            </div>

            
            <?php

            if (isset($_POST['submit'])) {
                $q = mysqli_query($db, "SELECT first,last,username,email,contact FROM `admin` where username like '%$_POST[search]%' and status='' ");

                if (mysqli_num_rows($q) == 0) {
                    echo "Sorry! No new request found with that username. Try searching again.";
                } else {
                    echo "<div class='code-container'>";
                    echo "<table class='table-gold'>";
                    echo "<tr style='background-color: #6db6b9e6;'>";
                    echo "<th>"; echo "First Name"; echo "</th>";
                    echo "<th>"; echo "Last Name"; echo "</th>";
                    echo "<th>"; echo "Username"; echo "</th>";
                    echo "<th>"; echo "Email"; echo "</th>";
                    echo "<th>"; echo "Contact"; echo "</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_assoc($q)) {
                        $_SESSION['test_name'] = $row['username'];
                        echo "<tr>";
                        echo "<td>"; echo $row['first']; echo "</td>";
                        echo "<td>"; echo $row['last']; echo "</td>";
                        echo "<td>"; echo $row['username']; echo "</td>";
                        echo "<td>"; echo $row['email']; echo "</td>";
                        echo "<td>"; echo $row['contact']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                    ?>
                   <form method="post" style="display: flex; justify-content: center; gap: 15px; margin-top: 10px;">
    <button type="submit" name="submit1"
            style="background-color: #101010ed; color: red; font-weight: 700; font-size: 18px;" class="btn btn-default">
        <span style="color: red" class="glyphicon glyphicon-remove-sign"></span>&nbsp; Remove
    </button>
    <button type="submit" name="submit2"
            style="color: green; font-weight: 700; font-size: 18px;" class="btn btn-default">
        <span style="color: green;" class="glyphicon glyphicon-ok-sign"></span>&nbsp; Approve
    </button>
</form>


                    <?php
                }
            } else {

                $res = mysqli_query($db, "SELECT first,last,username,email,contact FROM `admin` where status='';");
                echo "<div class='code-container'>";
                echo "<table class='table-gold'>";
                echo "<tr style='background-color:#6db6b9e6;'>";
                echo "<th>"; echo "First Name"; echo "</th>";
                echo "<th>"; echo "Last Name"; echo "</th>";
                echo "<th>"; echo "Username"; echo "</th>";
                echo "<th>"; echo "Email"; echo "</th>";
                echo "<th>"; echo "Contact"; echo "</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>"; echo $row['first']; echo "</td>";
                    echo "<td>"; echo $row['last']; echo "</td>";
                    echo "<td>"; echo $row['username']; echo "</td>";
                    echo "<td>"; echo $row['email']; echo "</td>";
                    echo "<td>"; echo $row['contact']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            }
            if (isset($_POST['submit1']) && isset($_SESSION['test_name'])) {
                mysqli_query($db, "DELETE FROM admin WHERE username='$_SESSION[test_name]' AND status='';");
                unset($_SESSION['test_name']);
            }
            if (isset($_POST['submit2']) && isset($_SESSION['test_name'])) {
                mysqli_query($db, "UPDATE admin SET status='yes' WHERE username='$_SESSION[test_name]';");
                unset($_SESSION['test_name']);
            }
            ?>
        </div>
    </div>
</body>
</html>