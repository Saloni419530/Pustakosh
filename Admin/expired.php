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
    height: 100%;
    filter: brightness(75%);
  }
  .srch {
    padding-left: 70%;
    color: white;
  }
  .form-control {
    width: 300px;
    height: 40px;
    background-color: black;
    color: #e6d522;
    font-weight: bold;
    border: 2px solid #e6d522;
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
    padding-left: 15px;
  }
  @media screen and (max-height: 450px) {
    .sidenav { padding-top: 15px; }
    .sidenav a { font-size: 18px; }
  }
  .img-circle {
    margin-left: 20px;
    box-shadow: 0px 0px 10px rgba(245, 241, 4, 0.94);
  }
  
  .container {
    position: relative;
    height:auto;
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
    height: 280px;
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
  
  /* Gold-colored Username & BID input fields */
  input[name="username"], 
  input[name="bid"] {
    font-weight: bold !important; 
    color: #e6d522 !important;
    background-color: transparent !important;
    border: 2px solid #e6d522 !important;
  }

  /* Gold Submit Button */
  button[name="submit"] {
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

  button[name="submit"]:hover {
    background-color: #c6b300;
      transform: scale(1.05);
  }
  table tr:hover td {
    background-color:rgb(175, 171, 171) !important;
}
  </style>
</head>
<body>
  <div id="displayImage">
    <img src="images/ex.webp" alt="Selected Image">
  </div>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div style="color: white; margin-left: 60px; font-size: 35px;">
      <?php
        if (isset($_SESSION['login_user'])) {
          echo "<img class='img-circle profile_img' height=120 width=120 src='images/profile.png'>";
          echo "<br><br>Welcome " . $_SESSION['login_user'];
        }
      ?>
    </div><br><br>
<a href="books.php">Books</a>
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
        document.body.style.backgroundColor = "#e6d522";
      }
    </script>

    <div class="container">
      <?php if (isset($_SESSION['login_user'])): ?>
       
        
        <div class="srch">
          <br>
          <form method="post" action="" name="form1">
            <input type="text" name="username" class="form-control" placeholder="Username" required><br>
            <input type="text" name="bid" class="form-control" placeholder="BID" required><br>
            <button class="btn btn-default" name="submit" type="submit">Submit</button><br><br>
          </form>
        </div>
      <?php endif; ?>

      <?php

        if(isset($_POST['submit']))
        {

          $res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");
          while($row=mysqli_fetch_assoc($res))
        {
          $d= strtotime($row['return']);
          $c= strtotime(date("Y-m-d"));
          $diff= $c-$d;

          if($diff>=0)
          {
            $day= floor($diff/(60*60*24)); 
            $fine=$day*.3;
          } 
        }
          $x=date("Y-m-d");
          mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine \u{20B9}','not paid') ;");


          $var1='<p style="color:yellow; background-color:green;">RETURNED</p>';
          mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]' ");

          mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ");
        }
      
    
    $c=0;

      
         
        
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
        ?>
  
  

      <div class='scroll'>
      <table class='table table-bordered' style="color: #e6d522;">
  <tr style='background-color: #6db6b9e6;'>
    <th>Username</th>
    <th>Roll No</th>
    <th>BID</th>
    <th>Book Name</th>
    <th>Authors Name</th>
    <th>Edition</th>
    <th>Status</th>
    <th>Issue Date</th>
    <th>Return Date</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($res)): ?>
    <tr>
      <td><?= $row['username'] ?></td>
      <td><?= $row['roll'] ?></td>
      <td><?= $row['bid'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['authors'] ?></td>
      <td><?= $row['edition'] ?></td>
      <td><?= $row['approve'] ?></td>
      <td><?= $row['issue'] ?></td>
      <td><?= $row['return'] ?></td>
    </tr>
  <?php endwhile; ?>
</table>

      </div>
    </div>
  </div>
</body>
</html>