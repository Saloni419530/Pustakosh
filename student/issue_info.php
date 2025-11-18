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
* {
        
    }

      /* Background Image */
  #displayImage img {
    position: fixed;
    top: 0;
    left: 0;
    z-index: -1;
    width: 100%;
    height: 100%;
    filter: brightness(75%);
  }

    .srch
    {
      padding-left: 850px;

    }
    .form-control
    {
      width: 300px;
      height: 40px;
      background-color: black;
      color: white;
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
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
  margin-left: 20px;
  box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
}
.h:hover
{
  color:white;
  width: 300px;
  height: 50px;

}
.container {
      margin-top: 30px;
      width: 75%;
      background: rgba(0, 0, 0, 0.5);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
      text-align: center;
      height:auto;
    }
  
.scroll
{
  width: 100%;
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
  <!-- Background Image -->
<div id="displayImage">
  <img src="images/book.jpg" alt="Selected Image">
</div>
<!--_________________sidenav_______________-->
  
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
  <div class="container">
    <h3 style="text-align: center; font-size:35px;font-family: 'Brush Script MT', cursive;">Information of Borrowed Books</h3><br>
    <?php
    $c=0;

      if(isset($_SESSION['login_user']))
      {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.username ='$_SESSION[login_user]' and issue_book.approve !='' ORDER BY `issue_book`.`return` ASC";
        $res=mysqli_query($db,$sql);
        
       echo "<div class='scroll'>";
       echo "<table class='table table-bordered' style='width:100%;' >";
      
        
        //Table header
        echo "<tr style='background-color: #6db6b9e6; color:white; border:2px solid #e6d522;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>";
      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";
       
      }
      else
      {
        ?>
          <h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
        <?php
      }
    ?>
  </div>
</div>
</body>
</html>