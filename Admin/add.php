<?php
  include "connection.php";
  include "navbar4.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        #displayImage img {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 105%;
            filter: brightness(75%);
        }

        /* Side navigation styles */
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

        /* Main content area adjustments */
        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        /* Style for img-circle */
        .img-circle {
            margin-left: 20px;
            border-radius: 50%;
            box-shadow: 0px 0px 20px 5px rgba(212, 175, 55, 0.7);
        }


        /* Form styling */
        .book {
          width: 400px;
          padding: 20px;
          background-color: rgba(0, 0, 0, 0.7); /* Only background is affected */
          border-radius: 10px;
          box-shadow: 0px 0px 20px 5px rgba(212, 175, 55, 0.7);
          color: #e6d522; /* Ensure text color remains bright */
          }

        .form-control {
            background-color: transparent;
            color: #e6d522;
            height: 40px;
            padding-left: 10px;
            border: 1px solid #e6d522;
            border-radius: 5px;
        }

        .form-control::placeholder {
            color: white;
        }

        /* Button styling */
        button {
            width: 100%;
            padding: 10px;
            background-color: #e6d522; 
            color: black; /* Set text color to black */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; /* Optional: Adjust text size */
        }

        button:hover {
            background-color: #e6d522; 
        }

        /* Search bar styling */
        .srch {
            float: right;
            padding: 10px;
        }

        /* Flexbox for centering content */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }


        @media screen and (max-width: 600px) {
            .book {
                width: 90%;
            }
        }
    </style>
</head>
<body>
  <div id="displayImage">
    <img src="images/ex.webp" alt="Selected Image">
  </div>

    <!-- Side Navigation -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div style="color: white; margin-left: 60px; font-size: 35px;">
            <?php
            if (isset($_SESSION['login_user'])) {
                echo "<img class='img-circle' height=120 width=120 src='images/profile.png'>";
                echo "</br></br>";
                echo "Welcome " . $_SESSION['login_user'];
            }
            ?>
        </div><br>
<a href="add.php">Add Books</a> 
<a href="request.php">Book Request</a>
<a href="issue_info.php">Issue Information</a>
    </div>

    <div id="main">
        <span style="font-size:30px;font-family: 'Brush Script MT', cursive; cursor:pointer; color: #e6d522;" onclick="openNav()">&#9776; open</span>

        <div class="container">
            
            <form class="book" action="" method="post">
            <h1 style="color:#e6d522;text-align: center; margin-top:0;font-size:35px;font-family: 'Brush Script MT', cursive;">Add New Books</h1>
                <input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br>
                <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
                <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
                <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
                <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
                <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>

                <button style="text-align: center;" type="submit" name="submit">Add</button>
            </form>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            if (isset($_SESSION['login_user'])) {
                mysqli_query($db, "INSERT INTO books VALUES ('$_POST[bid]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]', '0');");
                ?>
                <script type="text/javascript">
                    alert("Book Added Successfully.");
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert("You need to login first.");
                </script>
                <?php
            }
        }
        ?>
    </div>

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

</body>
</html> 
