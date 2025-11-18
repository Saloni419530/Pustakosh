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
  padding-left: 70%;
}

.form-control {
  width: 300px;
  height: 40px;
  background-color: black;
  color: #e6d522;
}

body {
  font-family: "Lato", sans-serif;
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
  color: #e6d522;
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
  padding-left: 15px;
}

@media screen and (max-height: 450px) {
  .sidenav { padding-top: 15px; }
  .sidenav a { font-size: 18px; }
}

.img-circle {
  margin-left: 20px;
  box-shadow: 0px 0px 15px rgba(245, 241, 4, 0.94);
}

.h:hover {
  color:white;
  width: 300px;
  height: 50px;
}
.sidenav a:hover {
    color: #f1f1f1;
  }

/* Container with transparent background but text remains visible */
.container {
  position: relative;
  height: auto; 
  width: 90%;
  max-width: 1200px;
  margin-top: -13px;
  margin-left: auto;
  margin-right: auto;
  padding: 20px;
  border-radius: 10px;
  background: rgba(0, 0, 0, 0.7); /* Ensures only the background is transparent */
  box-shadow: 0px 0px 15px rgba(245, 241, 4, 0.94);
}

/* Ensuring text and buttons remain fully visible */
.container * {
  position: relative;
  z-index: 1;
  color: white;
}

.scroll {
  width: 100%;
  height: 400px;
  overflow: auto;
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


h3{
  color: #e6d522;
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

  <!-- Sidebar -->
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

    <div class="h"><a href="books.php">Books</a></div>
    <div class="h"><a href="request.php">Book Request</a></div>
    <div class="h"><a href="issue_info.php">Issue Information</a></div>
    <div class="h"><a href="expired.php">Expired List</a></div>
  </div>

  <div id="main">
    <span style="font-size:30px; font-family: 'Brush Script MT', cursive; color: #e6d522; cursor:pointer" onclick="openNav()">&#9776; open</span>

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
      <h2 style="text-align:center; color: #e6d522; font-size:35px;font-family: 'Brush Script MT', cursive;">List of Users</h2>
      <?php
        if(isset($_SESSION['login_user'])) {
      ?>
      <div style="float: right;padding-top: 10px;">
        <h3>Your fine is:
          <?php
            $var=0;
            $result=mysqli_query($db,"SELECT * FROM `fine` WHERE username='$_SESSION[login_user]' AND Status='not paid';");
            while($r=mysqli_fetch_assoc($result)) {
              $var += $r['fine'];
            }
            $var2 = $var + $_SESSION['fine'];
            echo "₹ ".$var2;
          ?>
        </h3>
      </div>
      <br><br><br><br>
      <?php
    }
      $ret='<p style="color:#e6d522; background-color:green;">RETURNED</p>';
         $exp='<p style="color:#e6d522; background-color:red;">EXPIRED</p>';
        
        if(isset($_POST['submit2']))
        {
          
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);

        }
        else if(isset($_POST['submit3']))
        {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }
        else
        {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }

        //Table header
    
        echo "<div class='scroll'>";
  echo "<table class='table' style='width:100%; border-collapse: collapse;'>";
  echo "<tr style='background-color: #6db6b9e6;'>";
  echo "<th>Username</th><th>Roll No</th><th>BID</th><th>Book Name</th><th>Authors Name</th><th>Edition</th><th>Status</th><th>Issue Date</th><th>Return Date</th>";
  echo "</tr>";
  
  while($row=mysqli_fetch_assoc($res)) {
    echo "<tr>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['roll']."</td>";
    echo "<td>".$row['bid']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['authors']."</td>";
    echo "<td>".$row['edition']."</td>";
    echo "<td>".$row['approve']."</td>";
    echo "<td>".$row['issue']."</td>";
    echo "<td>".$row['return']."</td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>";
  ?>
</div>
</body>
</html>