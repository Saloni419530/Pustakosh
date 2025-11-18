<?php
  include "connection.php";
  include "navbar4.php";
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $username = $_POST['username'];
    $bid = $_POST['bid'];
    $new_status = $_POST['status'];

    $update_query = "UPDATE `fine` SET status='$new_status' WHERE username='$username' AND bid='$bid'";
    mysqli_query($db, $update_query);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Fine Calculation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <style>
    * {
        color: #e6d522;
        font-size: 30px;
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

    .img-circle
{
  margin-left: 20px;
  box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
}
    .container {
        background: rgba(0, 0, 0, 0.7);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 20px 5px rgba(212, 175, 55, 0.7);
        height:auto;
    }
    h2 {
        text-align: center;
        color: #e6d522;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
    border: 2px solid gold !important;
    padding: 10px;
    text-align: center;
    color: white;
    background: none !important;
    background-color: transparent !important; /* Ensure full transparency */
}
    th {
        font-weight: bold;
        background: none !important;
        background-color: transparent !important;
    }
    .profile-container a {
    text-decoration: none;
    color: yellow; /* Change this line */
    display: flex;
    flex-direction: column;
    align-items: center;
}
    .profile-container img {
        cursor: pointer;
    }
    @media screen and (max-height: 450px) {
        .sidenav { padding-top: 15px; }
        .sidenav a { font-size: 18px; }
    }
    table tr:hover td {
    background-color:rgb(175, 171, 171) !important;
}

  </style>
</head>
<body>
  <div id="displayImage">
    <img src="images/fine.webp" alt="Selected Image">
  </div>
    <!--_________________sidenav_______________-->
   
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
  <div class="h"><a href="expired.php">Expired List</a></div>
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
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
    <!--___________________search bar________________________-->
<div class="container">
    <div class="srch">
        <form class="navbar-form" method="post" name="form1" style="display: flex; justify-content: flex-end; align-items: center;">
           
                <input class="form-control" type="text" name="search" placeholder="Student Username.." required="" style="margin-right: 5px;">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
        </form>
    </div>

    <h2 style="font-size:35px;font-family: 'Brush Script MT', cursive;">List Of Users</h2>
    <?php

        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db,"SELECT * FROM `fine` where username like '%$_POST[search]%' ");

            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No Student found with that username. Try searching again.";
            }
            else
            {
        echo "<table class='table table-bordered table-hover' >";
            echo "<tr style='background-color: #6db6b9e6;'>";
                //Table header
                echo "<th>"; echo " UserName ";    echo "</th>";
                echo "<th>"; echo " Bid ";  echo "</th>";
                echo "<th>"; echo " Returned ";  echo "</th>";
                echo "<th>"; echo " Days ";  echo "</th>";
                echo "<th>"; echo " Fines in ₹";  echo "</th>";
                echo "<th>"; echo " Status ";  echo "</th>";
            echo "</tr>";    

            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";
               
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['returned']; echo "</td>";
                echo "<td>"; echo $row['day']; echo "</td>";
                echo "<td>"; echo $row['fine']; echo "</td>";
                echo "<td>"; echo $row['status']; echo "</td>";

                echo "</tr>";
            }
        echo "</table>";
            }
        }
            /*if button is not pressed.*/
        else
        {
            $res=mysqli_query($db,"SELECT * FROM `fine`;");

        echo "<table class='table table-bordered table-hover' >";
            echo "<tr style='background-color: #6db6b9e6;'>";
                //Table header
                echo "<th>"; echo " UserName ";    echo "</th>";
                echo "<th>"; echo " Bid ";  echo "</th>";
                echo "<th>"; echo " Returned ";  echo "</th>";
                echo "<th>"; echo " Days ";  echo "</th>";
                echo "<th>"; echo " Fines in $ ";  echo "</th>";
                echo "<th>"; echo " Status ";  echo "</th>";
            echo "</tr>";    

            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
               
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['returned']; echo "</td>";
                echo "<td>"; echo $row['day']; echo "</td>";
                echo "<td>"; echo $row['fine']; echo "</td>";
                echo "<td>";
        ?>
<form method="post" style="display:inline;">
    <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
    <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
    <select name="status" style="color: black; font-size: 14px; border: 3px solid #e6d522; padding: 2px; width: 80px;">
        <option value="Not Paid" style="font-size: 16px;color: black;" <?php if ($row['status'] == "Not Paid") echo "selected"; ?>>Not Paid</option>
        <option value="Paid" style="font-size: 16px;color: black;" <?php if ($row['status'] == "Paid") echo "selected"; ?>>Paid</option>
    </select>
    <button type="submit" name="update_status" style="color:black; height: 23px; border: 3px solid #e6d522;">Update</button>
</form>

        <?php
        echo "</td>";
        echo "</tr>";
    }
        echo "</table>";
        }

    ?>
</div>
</body>
</html>