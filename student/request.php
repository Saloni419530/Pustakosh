<?php
  include "connection.php";
  include "navbar4.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Request</title>
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
  .srch {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
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
    padding-top: 80px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
    font-size: 20px;
    height:auto;
  }

  input[type="checkbox"] {
    accent-color: #e6d522;
    width: 20px;
    height: 20px;
    cursor: pointer;
  }
  .btn {
    background-color: transparent;
    color: #e6d522;
    font-size: 1.4rem;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    transition: 0.3s ease-in-out;
    border: 2px solid #e6d522;
    }
    .btn:hover {
      background: #e6d522;
      color: black;
    }

    h2 {
      text-align: center;
      color: #e6d522;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      border: 2px solid #e6d522;
      color: white;
      text-align: center;
    }
    th, td {
      padding: 10px;
      text-align: center;
      border: 2px solid #e6d522 !important;
    }
    table tr:hover td {
    background-color:rgb(175, 171, 171) !important;
}
    .profile-container a {
      text-decoration: none;
      color: white;
      display: flex;
      flex-direction: column;
      align: left;
    }

    .profile-container img {
      cursor: pointer;
      align: left;
    }

  </style>
</head>
<body>
<div id="displayImage">
  <img src="images/ex.webp" alt="Selected Image">
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <div class="profile-container" style="margin-left: 35px; font-size: 20px; ">
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

  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
  <div class="h"><a href="fine.php">Pay Fines</a></div>
</div>

<div id="main">
  <span style="font-size:32px;font-family: 'Brush Script MT', cursive; cursor:pointer; color: #e6d522 " onclick="openNav()">&#9776; open</span>
  <div class="container">
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
    
    <br><br>
    
    <?php
        $q = mysqli_query($db, "SELECT * from issue_book where username='$_SESSION[login_user]' and approve='' ;");

        if(mysqli_num_rows($q) == 0) {
            echo "<h2>There's no pending request.</h2>";
        } else { ?>
            <form method="post">
            <?php
            echo "<table class='table table-bordered table-hover'>";
            echo "<tr style='background-color: #6db6b9e6;'>";
            echo "<th>Select</th><th>Book-ID</th><th>Approve Status</th><th>Issue Date</th><th>Return Date</th>";
            echo "</tr>"; 

            while($row = mysqli_fetch_assoc($q)) {
                echo "<tr>"; ?>
                <td><input type="checkbox" name="check[]" value="<?php echo $row["bid"] ?>" ></td>
                <?php
                echo "<td>".$row['bid']."</td>";
                echo "<td>".$row['approve']."</td>";
                echo "<td>".$row['issue']."</td>";
                echo "<td>".$row['return']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
            <p align="center">
              <button type="submit" name="delete" class="btn btn-success" onclick="location.reload()">Delete</button>
            </p>
        <?php } ?>
    </form>
  </div>
</div>

<?php 
  if(isset($_POST['delete'])) {
    if (isset($_POST['check'])) {
      foreach ($_POST['check'] as $delete_id) {
        mysqli_query($db, "DELETE from issue_book WHERE bid='$delete_id' and username='$_SESSION[login_user]' ORDER BY bid ASC LIMIT 1 ;");
      }
    }
  }
?>

</body>
</html>
