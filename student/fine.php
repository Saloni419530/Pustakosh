<?php
  include "connection.php";
  include "navbar4.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Fine Calculation</title>
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

  .img-circle {
  margin-left: 20px;
  box-shadow: 0px 0px 15px rgba(245, 241, 4, 0.94);
  }

  #main {
      transition: margin-left .5s;
      padding: 16px;
  }

  .container {
    background: rgba(0, 0, 0, 0.7);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
    margin-top: 10px;
    color: white;
    font-size: 20px;
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
    border: 2px solid #e6d522 !important;
    padding: 10px;
    text-align: center;
    background: none !important;
    background-color: transparent !important;
  }

  th {
      font-weight: bold;
      background: none !important;
      background-color: transparent !important;
  }

  table tr:hover td {
    background-color:rgb(175, 171, 171) !important;
  }
  
  .profile-container a {
  text-decoration: none;
  color: white; /* Change this line */
  display: flex;
  flex-direction: column;
  }

  .profile-container img {
    cursor: pointer;
  }
  
  @media screen and (max-height: 450px) {
    .sidenav { padding-top: 15px; }
    .sidenav a { font-size: 18px; }
  }

  </style>
</head>
<body>
  <div id="displayImage">
    <img src="images/fine.webp" alt="Selected Image">
  </div>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="profile-container" style="margin-left: 35px; font-size: 20px;">
        <?php
        if(isset($_SESSION['login_user'])) { 
            echo "<a href='profile.php'>";
            echo "<img class='img-circle profile_img' height=120 width=120 src='images/sprofile.png'>";
            echo "<br>Welcome " . $_SESSION['login_user']; 
            echo "</a>";
        }
        ?>
    </div>
    <br>
    <div ><a href="request.php">Book Request</a></div>
    <div ><a href="issue_info.php">Issue Information</a></div>
    <div ><a href="expired.php">Expired List</a></div>
  </div>

  <div id="main">
    <span style="font-size:30px;font-family: 'Brush Script MT', cursive; cursor:pointer; color: #e6d522;" onclick="openNav()">&#9776; open</span>
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
    <div class="container">
      <h2 style="font-size:35px;font-family: 'Brush Script MT', cursive;">List Of Users</h2><br>
      <?php
        $res=mysqli_query($db,"SELECT * FROM `fine` where username='$_SESSION[login_user]' ;");
        echo "<table class='table table-bordered table-hover'>";
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th> Username </th><th> Bid </th><th> Returned </th><th> Days </th><th> Fines in ₹ </th><th> Status </th>";
        echo "</tr>"; 
        while($row=mysqli_fetch_assoc($res)) {
          echo "<tr>";
          echo "<td>" . $row['username'] . "</td>";
          echo "<td>" . $row['bid'] . "</td>";
          echo "<td>" . $row['returned'] . "</td>";
          echo "<td>" . $row['day'] . "</td>";
          echo "<td>" . $row['fine'] . "</td>";
          echo "<td>" . $row['status'] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
      ?>
    </div>
  </div>
</body>
</html>
